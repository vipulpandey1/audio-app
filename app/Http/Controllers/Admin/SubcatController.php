<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;

use Illuminate\Support\Facades\Storage;

class SubcatController extends Controller
{
    public function index(){
        $subcategory = SubCategory::paginate(20);
        return view('admin.subcategory.index',compact('subcategory'));
    }

    public function addView(){
        $category = Category::all();
        return view('admin.subcategory.add',compact('category'));

    }

    public function editView($id){
        $subcategory = SubCategory::with('categories')->find($id);
        $category = Category::all();

        return view('admin.subcategory.edit',compact('subcategory','category'));

    }

    public function removesubCategory($id){
        $category = SubCategory::find($id);
        $desk_path =  "public/desktop-image".$category->desktop_image;
        Storage::delete($desk_path);

        $mob_path =  "public/mobile-image".$category->mobile_image;
        Storage::delete($mob_path);

        if($category->delete()){
            return redirect()->route('subcategory')->with("message","SubCategory deleted successfully");
        }

    }


    public function savesubCategory(Request $req){
        $data = $req->all();

        if(!empty($req->desktop_image)){

            $image = $req->file('desktop_image');
            $extension = $image->getClientOriginalExtension();
            $filename = str_replace(".".$extension, "", $image->getClientOriginalName()); // Filename without extension
            
            // Add timestamp hash to name of the file
            $filename .= "_" . md5(time()) . "." . $extension;
            $file_path =  $image->move(public_path('uploads/desktop-image'), $filename);
            $data['desktop_image'] = $filename;   
        }

        if(!empty($req->mobile_image)){

            $image = $req->file('mobile_image');
            $extension = $image->getClientOriginalExtension();
            $filename = str_replace(".".$extension, "", $image->getClientOriginalName()); // Filename without extension
            
            // Add timestamp hash to name of the file
            $filename .= "_" . md5(time()) . "." . $extension;
            //$file_path =  $image->storeAs('public/mobile-image', $filename);
            $image->move(public_path('uploads/mobile-image'),$filename);
            $data['mobile_image'] = $filename;   
        }

        $category = SubCategory::updateOrCreate(["id"=>$req->id],$data);
        if($category){
            return redirect()->route('subcategory')->with("message","SubCategory inserted successfully");
        }

    }

    public function changeStatus(Request $req){
        $sub = SubCategory::find($req->id);
        $sub->update(["status"=>$req->status]);
  
        return response()->json(["status"=>200]);
    }
}
