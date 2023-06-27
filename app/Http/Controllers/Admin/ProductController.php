<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\ProductMedia;
use App\Models\Category;
use Pion\Laravel\ChunkUpload\Handler\AbstractHandler;
use Pion\Laravel\ChunkUpload\Handler\HandlerFactory;
use Pion\Laravel\ChunkUpload\Receiver\FileReceiver;
use Pion\Laravel\ChunkUpload\Exceptions\UploadFailedException;
use Pion\Laravel\ChunkUpload\Exceptions\UploadMissingFileException;
use Illuminate\Http\UploadedFile;
use Str;
use Illuminate\Support\Facades\Storage;

use File;

class ProductController extends Controller
{
    public function index(){
        $subcategory = Product::whereNotIn('category_id', [12,11])->get();
        return view('admin.product.index',compact('subcategory'));
    }

    public function productAdd(){
        $category = Category::all();
        return view('admin.product.add',compact('category'));
    }

    public function getSubCateById(Request $req){
        $subcate = Category::with('subCate')->find($req->id);
        return response()->json($subcate);
    }


    public function productEdit($id){
        $subcategory = Product::with('category','subCategory')->find($id);
        $category = Category::all();
        $subCate = SubCategory::all();
        return view('admin.product.edit',compact('subcategory','category','subCate'));

    }

    public function removeProduct($id){
        $category = Product::find($id);
        $desk_path =  "public/product/desktop-image".$category->desktop_image;
        Storage::delete($desk_path);

        $mob_path =  "public/product/mobile-image".$category->mobile_image;
        Storage::delete($mob_path);

        if($category->delete()){
            return redirect()->route('product')->with("message","Product deleted successfully");
        }

    }


    public function saveProduct(Request $req){
        $data = $req->all();

        if(!empty($req->desktop_image)){

            $image = $req->file('desktop_image');
            $extension = $image->getClientOriginalExtension();
            $filename = str_replace(".".$extension, "", $image->getClientOriginalName()); // Filename without extension
            
            // Add timestamp hash to name of the file
            $filename .= "_" . md5(time()) . "." . $extension;
            // $file_path =  $image->storeAs('public/product/desktop-image', $filename);
            $image->move(public_path('uploads/product/desktop-image'),$filename);

            $data['desktop_image'] = $filename;   
        }

        if(!empty($req->mobile_image)){

            $image = $req->file('mobile_image');
            $extension = $image->getClientOriginalExtension();
            $filename = str_replace(".".$extension, "", $image->getClientOriginalName()); // Filename without extension
            
            // Add timestamp hash to name of the file
            $filename .= "_" . md5(time()) . "." . $extension;
            // $file_path =  $image->storeAs('public/product/mobile-image', $filename);
            $image->move(public_path('uploads/product/mobile-image'),$filename);

            $data['mobile_image'] = $filename;   
        }
        $data['url'] = Str::slug($req->name);
        //dd($data);
        $category = Product::updateOrCreate(["id"=>$req->id],$data);
        if($category){
            return redirect()->route('product')->with("message","Product inserted successfully");
        }

    }


    public function audioUpload(Request $req){

        if(!empty($req->file)){

            $image = $req->file('file');
            $extension = $image->getClientOriginalExtension();
            $filename = str_replace(".".$extension, "", $image->getClientOriginalName()); // Filename without extension
            // Add timestamp hash to name of the file
            $filename .= "_" . md5(time()) . "." . $extension;
            // $file_path =  $image->storeAs('public/product/audio/'.$req->prduct_id.'/', $filename);
            $image->move(public_path('uploads/product/audio/'),$filename);
            // dd($pat);

            $data['media_name'] = $filename;   
        }
        $data['product_id'] = $req->product_id;
        $data['title'] = $req->title;
        $data['duration'] = $req->duration;
        
        
        $query = ProductMedia::updateOrCreate(["product_id"=>$req->product_id,"id"=>$req->productMediaId],$data);
        if($query){
            if(!empty($req->productMediaId)){
                return redirect()->route('product.get-media',$req->product_id)->with("message","Product updated successfully");
            }else{
                return redirect()->route('product.get-media',$req->product_id)->with("message","Product inserted successfully");
            }


        }


    }


          /**
     * Receive file 
     *
	 * @param 
     * @return \Illuminate\Contracts\Support\Renderable
    */

    public function saveAccountMedia(Request $request)
    {   
       
        // create the file receiver
        $receiver = new FileReceiver("file", $request, HandlerFactory::classFromRequest($request));

        // check if the upload is success, throw exception or return response you need
        if ($receiver->isUploaded() === false) {
            throw new UploadMissingFileException();
        }

        // receive the file
        $save = $receiver->receive();
        
        // check if the upload has finished (in chunk mode it will send smaller files)
        if ($save->isFinished()) {
			
            // save the file and return any response you need, current example uses `move` function. If you are
            // not using move, you need to manually delete the file by unlink($save->getFile()->getPathname())
            return  $this->saveFile($save->getFile(), $request->input('product_id'),$request->input('product_media_id'));



        }

        // we are in chunk mode, lets send the current progress
        /** @var AbstractHandler $handler */
        $handler = $save->handler();

        return response()->json([
            "done" => $handler->getPercentageDone(),
            'status' => true
        ]);		
		
        return response()->json($training);

    }
	
	/**
     * Saves the file
     *
     * @param UploadedFile $file
     *
     * @return JsonResponse
     */
    protected function saveFile(UploadedFile $file, $product_id,$product_media_id)
    {	
       
        $fileName = $this->createFilename($file);
        // Group files by mime type
        $mime = str_replace('/', '-', $file->getMimeType());
        // Group files by the date (week
        $dateFolder = date("Y-m-W");

        // Build the file path
        $filePath = "uploads/product/audio/";
        // $finalPath = storage_path("app/".$filePath);
        $medias = ProductMedia::where(["id"=>$product_media_id])->first();
        if(!empty($medias->media_name)){

            $image_path = "uploads/product/audio/".$medias->media_name;  // Value is not URL but directory file path
            if(File::exists($image_path)) {
                File::delete($image_path);
            }
        }
        // move the file name
        // $file->storeAs('public/product/'.$product_id.'/', $fileName);
        $file->move(public_path('uploads/product/audio/'),$fileName);

        //$file->move(, $fileName);

        $data = [
            "media_name" => $fileName,
            "media_path" => $filePath,
            "media_type" => $mime
        ];

        

        ProductMedia::updateOrCreate(["id"=>$product_media_id,"product_id" => $product_id],$data);

        return response()->json([
            'path' => $filePath,
            'name' => $fileName,
            'mime_type' => $mime,
            'product_id' => $product_id
        ]);
    }
	
	/**
     * Create unique filename for uploaded file
     * @param UploadedFile $file
     * @return string
     */
    protected function createFilename(UploadedFile $file)
    {
        $extension = $file->getClientOriginalExtension();
        $filename = str_replace(".".$extension, "", $file->getClientOriginalName()); // Filename without extension

        // Add timestamp hash to name of the file
        $filename .= "_" . md5(time()) . "." . $extension;

        return $filename;
    }

   public function audioIndex($id,$audio=null){
    $productId = $id;
    $proMedia = $audio;
    $media = ProductMedia::where('id', $proMedia)->first();
    return view('admin.product.upload-attachment',compact('productId','proMedia','media'));
   }
    /**
     * get complaint images
     *
	  * @param  $id  (complaint id)
     * @return \Illuminate\Contracts\Support\Renderable
    */
    public function getMedias($id){
    $productId = $id;

        $accountMedias = ProductMedia::where('product_id', $id)->get();
        
       return view('admin.product.audio-list',compact('accountMedias','productId'));
      
    }


    	/**
     * delete complaint media
     *
	  * @param  $id  (training id)
     * @return \Illuminate\Contracts\Support\Renderable
    */
    public function deleteMedia(Request $request){
        $accountMedia = ProductMedia::find($request->id);
      
        if($accountMedia->delete()){
          return back()->with("message","Product audio file deleted");
        }
    }

    public function changeStatus(Request $req){
        $sub = Product::find($req->id);
        $sub->update(["status"=>$req->status]);
  
        return response()->json(["status"=>200]);
    }
    
     public function FeaturechangeStatus(Request $req){
        $sub = Product::find($req->id);
        $sub->update(["f_status"=>$req->status]);
  
        return response()->json(["status"=>200]);
    }


    public function dropZoneMedia($id){
        $media = ProductMedia::where('id', $id)->first();
        if($media){
            response()->json(["status"=>200,"media"=>$media]);
        }  
    }

    public function changePopUpStatus(Request $req){
        $sub = ProductMedia::find($req->id);
        $sub->update(["popup_status"=>$req->popup_status]);
  
        return response()->json(["status"=>200]);
    }


    public function productMediaPopUpAttachment(Request $req){
        if(!empty($req->popupFile)){

            $image = $req->file('popupFile');
            $extension = $image->getClientOriginalExtension();
            $filename = str_replace(".".$extension, "", $image->getClientOriginalName()); // Filename without extension
            // Add timestamp hash to name of the file
            $filename .= "_" . md5(time()) . "." . $extension;
            // $file_path =  $image->storeAs('public/product/audio/'.$req->prduct_id.'/', $filename);
            $image->move(public_path('uploads/product/audio/attachment/'),$filename);
            // dd($pat);

            // $data['popup_file'] = $filename;   

            $files = ProductMedia::where(["product_id"=>$req->product_id,"id"=>$req->product_media_id])->first();
            if(!empty($files->popup_file)){

                $image_path = "uploads/product/audio/attachment/".$files->popup_file;  // Value is not URL but directory file path
                if(File::exists($image_path)) {
                    File::delete($image_path);
                }
            }

            $q = $files->update(["popup_file"=>$filename]);
          
            if($q){
                return back()->with("message","Product media attachment inserted");
                
            }
        }
    }
}
