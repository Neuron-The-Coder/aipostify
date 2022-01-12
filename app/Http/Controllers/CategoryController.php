<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function getAll(){
        $res = Category::all();
        return response()->json($res);
    }

    public function insert(Request $req){
        $res = [
            "message" => "Success",
            "status" => 1
        ];

        $validator = Validator::make($req->all(), [
            "name" => ["unique:categories,name", "filled"]
        ], [
            "name.unique" => "Must be a NEW category",
            "filled" => "All fields must be filled"
        ]);

        if ($validator->fails()){
            $res["message"] = $validator->errors()->first();
            $res["status"] = 0;
        }
        else {
            Category::insert([
                "name" => $req->name
            ]);
        }
        // $res["message"] = $req->name;
        return response()->json($res);
    }
}
