<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ads;
use App\Models\AdsMedia;
use App\Models\Product;
use App\Models\ProductMedia;
use File;
class AdsController extends Controller
{
    public function index(){
        $slider = Ads::latest()->paginate(20);
        return view('admin.ads.index',compact('slider'));
    }

    public function addSliderImage(Request $req){
        $data = $req->all();
        $path = 'uploads/ads/';
         
         if(!empty($req->file)){
            $image = $req->file('file');
            $extension = $image->getClientOriginalExtension();
            $filename = str_replace(".".$extension, "", $image->getClientOriginalName()); // Filename without extension
            // Add timestamp hash to name of the file
            $filename .= "_" . md5(time()) . "." . $extension;
            $image->move(public_path($path),$filename);
            $data['banner'] = $filename;
            $data['linkads'] = $req->linkadd;
           //$file_path =  $image->storeAs($path, $filename);
            //$data['image'] = $filename;          
         }
 
         $result = Ads::create($data);
         if($result){
             return back()->with("message","Ads Banner image inserted successfully");
         }
     
 
    }
     public function removeAds($id){
        $category = Ads::find($id);
        $desk_path = 'uploads/ads/'.$category->banner;
        //Storage::delete($desk_path);
       // unlink($desk_path);
        if($category->delete()){
             return back()->with("message","Ads image deleted successfully");
         }
 
     }
     
      public function adspopup(){
        $ads = AdsMedia::latest()->paginate(20);
         $product = Product::all();
        return view('admin.ads.media',compact('ads','product'));
    }
    
    public function DropdownProductMedia(Request $req){
       $subcate = ProductMedia::where('product_id',$req->id)->get(["title", "id"]);
        return response()->json($subcate);
    }
    
    public function adspopupMediaInsert(Request $req){
         if(!empty($req->popupFile)){

            $image = $req->file('popupFile');
            $extension = $image->getClientOriginalExtension();
            $filename = str_replace(".".$extension, "", $image->getClientOriginalName()); // Filename without extension
            // Add timestamp hash to name of the file
            $filename .= "_" . md5(time()) . "." . $extension;
            // $file_path =  $image->storeAs('public/product/audio/'.$req->prduct_id.'/', $filename);
            $image->move(public_path('uploads/product/audio/attachment/'),$filename);
            // dd($pat);

            $data['media_file'] = $filename;   

            $files = AdsMedia::where(["product_id"=>$req->product_id,"pro_media_id"=>$req->pro_media_id])->first();
            if(!empty($files->media_file)){

                $image_path = "uploads/product/audio/attachment/".$files->media_file;  // Value is not URL but directory file path
                if(File::exists($image_path)) {
                    File::delete($image_path);
                }
            }
              $data['title'] = $req->title;
              $data['pro_media_id'] = $req->pro_media_id;
              $data['product_id'] = $req->product_id;
              $q = AdsMedia::updateOrCreate(["product_id"=>$req->product_id,"pro_media_id"=>$req->pro_media_id],$data);
            //$q = $files->update(["popup_file"=>$filename]);
          
            if($q){
                return back()->with("message","Product media attachment inserted");
                
            }
        }
    }
    
    public function AdsMediaRemove($id){
        $adsVal = AdsMedia::find($id);
         $desk_path = 'uploads/product/audio/attachment/'.$adsVal->media_file;
        // //Storage::delete($desk_path);
        // unlink($desk_path);
        if(File::exists($desk_path)) {
                    File::delete($desk_path);
                }
        if($adsVal->delete()){
             return back()->with("message","Ads deleted successfully");
         }
    }
    
    public function EditAds($id){
          $valMedia = AdsMedia::find($id);
          $product = Product::all();
          return view('admin.ads.edit',compact('valMedia','product'));
    }
    
    public function saveAdsMedia(Request $req){
         if(!empty($req->media_file)){
            $image = $req->file('media_file');
            $extension = $image->getClientOriginalExtension();
            $filename = str_replace(".".$extension, "", $image->getClientOriginalName()); // Filename without extension
            // Add timestamp hash to name of the file
            $filename .= "_" . md5(time()) . "." . $extension;
            // $file_path =  $image->storeAs('public/product/audio/'.$req->prduct_id.'/', $filename);
            $image->move(public_path('uploads/product/audio/attachment/'),$filename);
            // dd($pat);

            $data['media_file'] = $filename;   

            $files = AdsMedia::where(["product_id"=>$req->product_id,"pro_media_id"=>$req->pro_media_id])->first();
            if(!empty($files->media_file)){

                $image_path = "uploads/product/audio/attachment/".$files->media_file;  // Value is not URL but directory file path
                if(File::exists($image_path)) {
                    File::delete($image_path);
                }
            }
         }
            
              $data['title'] = $req->title;
              $data['pro_media_id'] = $req->pro_media_id;
              $data['after_time'] = $req->after_time;
              $data['product_id'] = $req->product_id;
              $q = AdsMedia::where('id',$req->id)->update($data);
             // $q = AdsMedia::updateOrCreate(["product_id"=>$req->product_id,"pro_media_id"=>$req->pro_media_id],$data);
            //$q = $files->update(["popup_file"=>$filename]);
          
            if($q){
                return back()->with("message","Product media attachment inserted");
                
            }
        
    }
    
    public function GetProductMediaEditMode(Request $req){
         $singleAds = AdsMedia::find($req->id);
         return response()->json($singleAds);
    }
}
