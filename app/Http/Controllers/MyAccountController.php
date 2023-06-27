<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\RecentSave;
use App\Models\LikeSave;
use App\Models\Product;
use Auth;
use Hash;
class MyAccountController extends Controller
{
    public function index(){
        $subarray = array();
         $Likesubarray = array();
    $user = User::with('roles','recent')->find(Auth::guard('user')->user()->id);
      if(!empty(Auth::guard('user')->user()) && Auth::guard('user')->user()->role_id == 2){
        $topRec = RecentSave::where('user_id',Auth::guard('user')->user()->id)->orderBy('id','DESC')->get();
        foreach($topRec as $ids) {
        array_push($subarray,$ids->product_id);
        }
         $rec = RecentSave::whereIn('product_id', $subarray)->where('user_id',Auth::guard('user')->user()->id)->with('product')->orderBy('id','DESC')->get();
       
      }
      else{
         $rec = 0; 
      }
         //dd($rec);
     
        return view("fronts.playlist",compact('user','rec'));
    }
    
     public function myaccount(){
        return view("fronts.myaccount");
    }
    
    public function changepassword(Request $req){
         User::where('id',Auth::guard('user')->user()->id)->update(['password'=>Hash::make($req->password)]);
         return redirect()->route('myaccount')->with("message","Password change successfully");
    }
    
     public function likeList(){
        $subarray = array();
         $Likesubarray = array();
    $user = User::with('roles','recent')->find(Auth::guard('user')->user()->id);
      if(!empty(Auth::guard('user')->user()) && Auth::guard('user')->user()->role_id == 2){
       
       $likeRec1 = LikeSave::where(['user_id' => Auth::guard('user')->user()->id, 'like_dislike' => 1])->orderBy('id','DESC')->get();
        foreach($likeRec1 as $ids) {
        array_push($Likesubarray,$ids->product_id);
        }
        
         $rec = LikeSave::whereIn('product_id', $Likesubarray)->where('user_id',Auth::guard('user')->user()->id)->with('product')->orderBy('id','DESC')->get();
      }
      else{
         $rec = 0;
      }
         //dd($rec);
     
        return view("fronts.likelist",compact('user','rec'));
    }
    
    
     public function saveRecent(Request $req){
        //  echo $req->product_id;
        if($req->status == 0){
        $data = $req->all();
        $data['user_id'] = Auth::guard('user')->user()->id;
        $result = RecentSave::updateOrCreate(["media_id"=>$req->id,"product_id"=>$req->product_id,"user_id"=>Auth::guard('user')->user()->id],$data);
        }
        else{
          $result =   RecentSave::where(["media_id"=>$req->id,"product_id"=>$req->product_id,"user_id"=>Auth::guard('user')->user()->id])->delete();
        }
         if($result){
            return response()->json(['status'=>200]);
        }
    }
    
    public function saveLike(Request $req){
        //  echo $req->product_id;
        $data = $req->all();
        
        $data['like_dislike'] = (int)$req->likeDislike;
        $data['media_id'] = $req->id;
        $data['user_id'] = Auth::guard('user')->user()->id;
       // $result = LikeSave::updateOrCreate(["media_id"=>$req->id,"product_id"=>$req->product_id,"user_id"=>Auth::guard('user')->user()->id],$data);
        $result = LikeSave::updateOrCreate(["product_id"=>$req->product_id,"user_id"=>Auth::guard('user')->user()->id],$data);
         if($result){
              $res = LikeSave::where(['like_dislike'=>1,"media_id"=>$req->id])->count();
              //$res = LikeSave::where(['like_dislike'=>1,"product_id"=>$req->product_id])->count();
            return response()->json(['status'=>200,'count'=>$res]);
        }
    }


   
}
