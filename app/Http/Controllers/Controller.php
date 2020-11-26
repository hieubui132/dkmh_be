<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getPage($data){
    	return [
            
            'content'    => $data->items(),
            'totalPage' => $data->lastPage(),
            'totalItems' => $data->total(),
        ];
    }

    public function badRequest(){
    	return [
    		'success' => false,
            'status_code' => 403,
            'data'    =>null,
            'message' => "Bad request",
    	];
    }
    public function ok($data, $message = "ok"){
    	return  response()->json([
    		'success' => true,
            'status_code' => 200,
            'data'    => $data,
            'message' =>  $message ,
    	],200);
    }
    public function error($code, $message = "ok"){
    	return  response()->json([
    		'success' => false,
            'status_code' => $code, 
            'message' =>  $message ,
    	],$code);
    }
}
