<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductMediaDuration;
use App\Models\ReccommendationSave;
use Auth;
class CategoryController extends Controller
{
    public function index($id)
    {
        $subarray = array();
        $watch_subarray  = array();
        $category = Category::with('subCate','slider.category','product')->find($id);
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
        //$watching = ProductMediaDuration::whereIn('product_id', $watch_subarray)->where('user_id',Auth::guard('user')->user()->id)->with('product')->orderBy('id','DESC')->limit(15)->get();
        //$watchcount = $watching->count();
        }else{
          $rec = Product::where('status', 1)->limit(15)->get();
          //$watching = 0;
        }
       
        return view('fronts.category',compact('category','rec'));
    }
}
