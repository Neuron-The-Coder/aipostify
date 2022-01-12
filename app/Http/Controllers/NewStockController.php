<?php

namespace App\Http\Controllers;

use App\Models\NewStock;
use Illuminate\Http\Request;

class NewStockController extends Controller
{
  
  public static function add($user_id, $product_id, $quantity, $price_per_unit = null, $total_price = null){
    NewStock::insert([
      'user_id' => $user_id,
      'product_id' => $product_id,
      'quantity' => $quantity,
      'price_per_unit' => $price_per_unit,
      'total_price' => $total_price
    ]);

  }
}
