<?php

namespace App\Http\Controllers;

use App\Models\CustomerInformation;
use App\Models\DetailTransaction;
use App\Models\HeaderTransaction;
use App\Models\Product;
use Illuminate\Http\Request;

class TransactionController extends Controller{

  public static function addDetail($id, $products){
    foreach($products as $key => $data){
      DetailTransaction::insert([
        "id" => $id,
        "product_id" => $data["id"],
        "quantity" => $data["quantity"],
        "price_per_unit" => $data["price_per_unit"],
        "total_price" => $data["total_price"]
      ]);

      $prod = Product::find($key);
      $prod->stock -= (int)$data["quantity"];
      $prod->save();
    }
  }

  public static function addCustomerInformation($id, $info){
    CustomerInformation::insert([
      "id" => $id,
      "age" => $info["age"],
      "gender" => $info["gender"],
      "address" => $info["address"]
    ]);
  }
  
  public static function addBill(Request $req = null){
    
    // Get ID of last inserted
    HeaderTransaction::insertGetId([
      "user_id" => $req->additional_information["user_id"],
      "customer_name" => $req->additional_information["name"]
    ]);

    $latest = HeaderTransaction::latest('transaction_date')->first();
    $id = $latest->id;

    self::addDetail($id, $req->products);
    self::addCustomerInformation($id, $req->additional_information);

  }



}
