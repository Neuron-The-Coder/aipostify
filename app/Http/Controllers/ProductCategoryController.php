<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{

  public static function add($product_id, $product_category){

    foreach($product_category as $pc){
      ProductCategory::insert([
        "product_id" => $product_id,
        "category_id" => $pc
      ]);
    }

  }


}
