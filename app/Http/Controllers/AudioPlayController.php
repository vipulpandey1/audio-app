<?php

namespace App\Http\Controllers;
use App\Models\ProductMedia;
use Illuminate\Http\Request;
use App\Models\ProductMediaDuration;
use App\Models\RecentSave;
use App\Models\LikeSave;
use Auth;
class AudioPlayController extends Controller
{
    public function index($id){
      // $audio = ProductMedia::with('productDuration')->where('id',$id)->with('product')->first();
       $audio = ProductMedia::where('id',$id)->with('product','productAds')->first();
       if(!empty(Auth::guard('user')->user()) && Auth::guard('user')->user()->role_id == 2){
       $produration = ProductMediaDuration::where(["product_media_id"=>$id,"product_id"=>$audio->product_id,"user_id" => Auth::guard('user')->user()->id])->first();
        //dd($produration);
       }
       else{
           $produration = 0;
       }
       $related_audio = ProductMedia::where('product_id',$audio->product_id)->get();
       return view("fronts.audioplay",compact("audio","related_audio","produration"));
    }


    public function saveAudioDuration(Request $req){
        $data = $req->all();
        $data['user_id'] = Auth::guard('user')->user()->id;
       // $get_time = ProductMediaDuration::where(["product_media_id"=>$req->product_media_id,"product_id"=>$req->product_id,"user_id" => Auth::guard('user')->user()->id])->first();
        if($req->status){
        ProductMediaDuration::where(["product_media_id"=>$req->product_media_id,"product_id"=>$req->product_id,"user_id" => Auth::guard('user')->user()->id])->delete();
        }else{
        $result = ProductMediaDuration::updateOrCreate(["product_media_id"=>$req->product_media_id,"product_id"=>$req->product_id,'user_id' => Auth::guard('user')->user()->id],$data);
        if($result){
            $q = ProductMediaDuration::where(["product_media_id"=>$req->product_media_id,"product_id"=>$req->product_id,"user_id"=>Auth::guard('user')->user()->id])->first();
            return response()->json(['status'=>200,"result"=>$q]);
        }
        }
    }

 public function onpage_player(Request $req){
     $allData = array();
       $audio = ProductMedia::where('id',$req->id)->with('product','productAds')->withCount(['countLikes'=>function($q){
           return $q->where('like_dislike',1);
           
       }])->first();
       
    //var_dump($count);
       if(!empty(Auth::guard('user')->user()) && Auth::guard('user')->user()->role_id == 2){
           
        $st = LikeSave::where(["media_id"=>$req->id,"product_id"=>$audio->product_id,"user_id" => Auth::guard('user')->user()->id])->first();
       if($st){
           $allData['likeStatus'] = $st->like_dislike;
       }
       else{
           $allData['likeStatus']  = 1;
       }   
           
       $produration = ProductMediaDuration::where(["product_media_id"=>$req->id,"product_id"=>$audio->product_id,"user_id" => Auth::guard('user')->user()->id])->first();
        //dd($produration);
       }
       else{
           $produration = 0;
       }
       $related_audio = ProductMedia::where('product_id',$audio->product_id)->get();
      //$allData['Likecount'] = LikeSave::where('media_id',$req->id)->first();
      
       $allData['audio'] = $audio;
       $allData['produration'] = $produration;
       $allData['related_audio'] = $related_audio;
        return response()->json(['status'=>200,"result"=>$allData]);
      // return view("fronts.audioplay",compact("audio","related_audio","produration"));
 }
 
 function WatchhomeStatusActive(Request $req){
      ProductMediaDuration::where(["product_id"=>$req->product_id,'user_id' => Auth::guard('user')->user()->id])->update(['homestatus'=>'0']);
     
     $data = $req->all();
     $data['homestatus'] = 1;
      $result = ProductMediaDuration::updateOrCreate(["product_media_id"=>$req->id,"product_id"=>$req->product_id,'user_id' => Auth::guard('user')->user()->id],$data);
      return response()->json(['status'=>200]);
 }
    
}
