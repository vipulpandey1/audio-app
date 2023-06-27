<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;
use App\Models\ProductMedia;



class DashboardController extends Controller
{
    public function dashboard(){
        $category = Category::count();
        $sub = SubCategory::count();
        
        $product = Product::count();
        $media = ProductMedia::count();
        
        return view('admin.dashboard',compact('category','sub','product','media'));
    }

   
}
