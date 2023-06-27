<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(){
        return view('fronts.search');
    }

    public function result(Request $req){
        $result = Product::where('name','like','%'.$req->terms.'%')->get();
        $response = array();
		foreach($result as $newdata){
			 $response[] = array("key"=>$newdata->id,"label"=>$newdata->name,"url"=>$newdata->url);
		}

        return response()->json($response);
    }
}
