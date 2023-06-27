<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Category;
class CategoryController extends Controller
{
    public function index(){
        $category = Category::paginate(20);
        return view('admin.category.index',compact('category'));
    }

    public function addView(){
        return view('admin.category.add');

    }

    public function editView($id){
        $category = Category::find($id);
        return view('admin.category.edit',compact('category'));

    }

    public function removeCategory($id){
        $category = Category::find($id);
        $desk_path =  "public/desktop-image".$category->desktop_image;
        Storage::delete($desk_path);

        $mob_path =  "public/mobile-image".$category->mobile_image;
        Storage::delete($mob_path);
// dd($desk_path,$mob_path);
        if($category->delete()){
            return redirect()->route('category')->with("message","Category deleted successfully");
        }

    }
    

    public function saveCategory(Request $req){
        $data = $req->all();

        if(!empty($req->desktop_image)){

            $image = $req->file('desktop_image');
            $extension = $image->getClientOriginalExtension();
            $filename = str_replace(".".$extension, "", $image->getClientOriginalName()); // Filename without extension
            
            // Add timestamp hash to name of the file
            $filename .= "_" . md5(time()) . "." . $extension;
            //$file_path =  $image->storeAs('public/desktop-image', $filename);
            $image->move(public_path('uploads/desktop-image'),$filename);
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

        $category = Category::updateOrCreate(["id"=>$req->id],$data);
        if($category){
            return redirect()->route('category')->with("message","Category inserted successfully");
        }

    }
}
