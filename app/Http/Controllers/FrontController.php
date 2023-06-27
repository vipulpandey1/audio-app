<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use App\Models\Ads;
use App\Models\SubCategory;
use App\Models\ReccommendationSave;
use App\Models\ProductMediaDuration;
use Auth;
class FrontController extends Controller
{
    public function index()
    {
        $subarray = array();$watch_subarray = array();$myval = array();
        $category = Category::with('subCate','slider.category','product')->paginate(10);
        $trending = Product::where('f_status','1')->paginate(10);
        $recentAdd =  Product::orderBy('id','DESC')->limit(10)->get();
        $webseries = Product::where("category_id",9)->paginate(10);
        $subcategory = Subcategory::where('status','1')->with('product')->get();
        $ads = Ads::first();
        // if(Auth::guard('user')->check()){
        if(!empty(Auth::guard('user')->user()) && Auth::guard('user')->user()->role_id == 2){
        $topRec = ReccommendationSave::where('user_id',Auth::guard('user')->user()->id)->orderBy('click','DESC')->limit(3)->get();
        foreach($topRec as $ids) {
        array_push($subarray,$ids->sub_id);
        }
        $topwatch = ProductMediaDuration::where('user_id',Auth::guard('user')->user()->id)->orderBy('id','DESC')->get();
        foreach($topwatch as $idsw) {
        array_push($watch_subarray ,$idsw->product_id);
        }
        //dd($watch_subarray);
        $rec = Product::whereIn('sub_category_id', $subarray)->orderByRaw('RAND()')->limit(15)->get();
        $watching = ProductMediaDuration::whereIn('product_id', $watch_subarray)->where(['user_id'=> Auth::guard('user')->user()->id,"homestatus" => 1])->with('products')->orderBy('id','DESC')->limit(15)->get();
        //dd($watching);
        
        }else{
          $rec = Product::where('status', 1)->limit(15)->get();
          $watching = 0;
        }
        
       // $shuffled = $rec->shuffle();

      //  dd($rec);
        $slider_top = Slider::where('type',"1")->get();
        return view('fronts.index',compact('category','subcategory','slider_top','rec','ads','webseries','watching','trending','recentAdd'));
       // return view('fronts.category',compact('category'));
    }
}
