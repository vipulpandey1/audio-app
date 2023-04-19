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
       $path = 'public/slider/';
       
       if($req->type == 2 && !empty($req->category)){
        $data['category_id'] = $req->category;
        
        $path = 'public/slider/category/'.$req->category;
       }else{
        $data['category_id'] = null;
       }
        if(!empty($req->file)){
           $image = $req->file('file');
           $extension = $image->getClientOriginalExtension();
           $filename = str_replace(".".$extension, "", $image->getClientOriginalName()); // Filename without extension
           // Add timestamp hash to name of the file
           $filename .= "_" . md5(time()) . "." . $extension;
           $file_path =  $image->storeAs($path, $filename);
           $data['image'] = $filename;   

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
