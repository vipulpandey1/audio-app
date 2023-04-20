<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\Category;



class ProductController extends Controller
{
    public function index(){
        $subcategory = Product::paginate(20);
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
        $desk_path =  "public/desktop-image".$category->desktop_image;
        Storage::delete($desk_path);

        $mob_path =  "public/mobile-image".$category->mobile_image;
        Storage::delete($mob_path);

        if($category->delete()){
            return redirect()->route('product')->with("message","SubCategory deleted successfully");
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
            $file_path =  $image->storeAs('public/product/desktop-image', $filename);
            $data['desktop_image'] = $filename;   
        }

        if(!empty($req->mobile_image)){

            $image = $req->file('mobile_image');
            $extension = $image->getClientOriginalExtension();
            $filename = str_replace(".".$extension, "", $image->getClientOriginalName()); // Filename without extension
            
            // Add timestamp hash to name of the file
            $filename .= "_" . md5(time()) . "." . $extension;
            $file_path =  $image->storeAs('public/product/mobile-image', $filename);
            $data['mobile_image'] = $filename;   
        }

        $category = Product::updateOrCreate(["id"=>$req->id],$data);
        if($category){
            return redirect()->route('product')->with("message","SubCategory inserted successfully");
        }

    }
}
