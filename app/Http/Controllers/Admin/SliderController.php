<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    public function index(){
        $slider = Slider::latest()->paginate(20);
        $category = Category::all();
        return view('admin.slider.index',compact('slider','category'));
    }

    public function addSliderImage(Request $req){
       $data = $req->all();
       $path = 'uploads/slider/';
       $pathMob = 'uploads/slider/mobile';
        
          
       
       if($req->type == 2 && !empty($req->category)){
        $data['category_id'] = $req->category;
        
        $path = 'uploads/slider/category/'.$req->category;
        $pathMob = 'uploads/slider/category/mobile/'.$req->category;
       }else{
        $data['category_id'] = null;
       }
        if(!empty($req->file)){
           $image = $req->file('file');
           $extension = $image->getClientOriginalExtension();
           $filename = str_replace(".".$extension, "", $image->getClientOriginalName()); // Filename without extension
        //   // Add timestamp hash to name of the file
           $filename .= "_" . md5(time()) . "." . $extension;
        //   $file_path =  $image->storeAs($path, $filename);
           $image->move(public_path($path),$filename);
           $data['image'] = $filename;  
      
       // $imgname= time().'.'.$image->extension();
        
        //$data['image'] = $imgname;
        

        }

        if(!empty($req->mobile_image)){
            $image = $req->file('mobile_image');
            $extension = $image->getClientOriginalExtension();
            $filename = str_replace(".".$extension, "", $image->getClientOriginalName()); // Filename without extension
            // // Add timestamp hash to name of the file
            $filename .= "_" . md5(time()) . "." . $extension;
            // $file_path =  $image->storeAs($pathMob, $filename);
            // $data['mobile_image'] = $filename;  
            // $imgname= time().'.'.$image->extension();
            $image->move(public_path($pathMob),$filename);
            $data['mobile_image'] = $filename;
 
         }

        

        $result = Slider::create($data);
        if($result){
            return back()->with("message","Slider image inserted successfully");
        }
    }


    public function removeSlider($id){
        $category = Slider::find($id);
        $desk_path =  "public/slider/";
        if($category->type == 2 && !empty($category->category)){
            $desk_path = $desk_path.'/category'.$category->category;
        }
        Storage::delete($desk_path);

        if($category->delete()){
            return back()->with("message","Slider image deleted successfully");
        }

    }

        

        
}
