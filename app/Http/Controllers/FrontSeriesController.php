<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\ReccommendationSave;
use App\Models\RecentSave;
use App\Models\ReadingList;
use Auth;
class FrontSeriesController extends Controller
{
    public function index($id,$url){
        $products = Product::where(['url' => $url,'id' => $id])->with("audios","category","reading")->First();
         //dd($products);
        if(!empty(Auth::guard('user')->user()) && Auth::guard('user')->user()->role_id == 2 && !empty($products->audios[0])){
        $SaveStatus = RecentSave::where(['media_id'=> $products->audios[0]->id,'user_id' => Auth::guard('user')->user()->id,'product_id' => $products->id])->with("audios","category")->count();
        }
        else{
           $SaveStatus = 0;  
        }
        $products_all = Product::all();
        // dd($products_all);
        return view("fronts.products",compact('products','products_all','SaveStatus'));
    }

    public function saveReccommendation(Request $req){
        $data = $req->all();
        $data['user_id'] = Auth::guard('user')->user()->id;
        $q = ReccommendationSave::where(["sub_id"=>$req->id,"user_id"=>Auth::guard('user')->user()->id])->first();
        if($q){
            $data['click'] = $q->click + 1;  
        }
        else{
            $data['click'] = 1; 
        }
        $result = ReccommendationSave::updateOrCreate(["sub_id"=>$req->id,"user_id"=>Auth::guard('user')->user()->id],$data);
         if($result){
        //    // $q = ProductMediaDuration::where(["product_media_id"=>$req->product_media_id,"product_id"=>$req->product_id,"user_id"=>Auth::guard('user')->user()->id])->first();
            return response()->json(['status'=>200,"result"=>$q]);
        }
    }
    
    public function getChapter(Request $req){
        $q = ReadingList::where(["product_id"=>$req->id])->get();
        return response()->json(['status'=>200,"result"=>$q]);
    }
    
    
}
