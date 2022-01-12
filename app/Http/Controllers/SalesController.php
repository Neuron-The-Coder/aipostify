<?php

namespace App\Http\Controllers;

use App\Models\HeaderTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SalesController extends Controller{
  
  public function getOverallSales(Request $req){

    $res = HeaderTransaction::select(DB::raw(
      "DATE_FORMAT(ht.transaction_date, '%Y-%m') `date`,
      SUM(dt.total_price) `total`"
    ))
    ->from('header_transactions as ht')
    ->join('detail_transactions as dt', 'dt.id', '=', 'ht.id')
    ->join('products as p', 'p.id', '=', 'dt.product_id')
    ->groupBy(DB::raw("DATE_FORMAT(ht.transaction_date, '%Y-%m')"))
    ->orderBy('date', 'ASC')
    ->get();

    //tempdata
    $data = [
      "detail" => [
        [
          "date" => "2021-12",
          "total" => "500000"
        ],
        [
          "date" => "2022-01",
          "total" => "700000"
        ],
        [
          "date" => "2022-02",
          "total" => "850000"
        ]
      ],
      "popular" => [
        "age" => $this->getPopular("Age"),
        "male" => $this->getPopular("Gender", "Male"),
        "female" => $this->getPopular("Gender", "Female"),
        "unknown" => $this->getPopular("Gender", "NULL")
      ],
      "overall" => $this->getProductSales()
    ];

    return response()->json($data);

  }

  public function getPopular($by="", $value="", $order="desc"){
    $res = DB::table("products as p")
            ->join("detail_transactions as dt", "dt.product_id", "=", "p.id")
            ->join("header_transactions as ht", "ht.id", "=", "dt.id")
            ->join("customer_informations as ci", "ci.id", "=", "ht.id");

    if ($by == "Age"){
      $res->groupBy("p.name", "p.image", "ci.age");
      $res->select("p.name", "p.image", "ci.age", DB::raw("SUM(dt.quantity) as quantity"));
    }
    else if ($by == "Gender"){
      $res->groupBy("p.name", "p.image", "ci.gender");
      $res->select("p.name", "p.image", "ci.gender", DB::raw("SUM(dt.quantity) as quantity"));
      if ($value !== "NULL") $res->where("ci.gender", "=", $value);
      else $res->whereRaw("ci.gender IS NULL");
    } 
    else {
      $res->select("p.name", "p.image", DB::raw("SUM(dt.quantity) as quantity"));
    }
    $res->orderBy("dt.quantity", $order);
    return $res->get();
  }

  public function getProductSales(){
    $res = DB::table("products as p")
            ->join("detail_transactions as dt", "dt.product_id", "=", "p.id")
            ->groupBy("p.name", "p.image")
            ->select("p.name", "p.image", DB::raw("ROUND(SUM(dt.total_price) / SUM(dt.quantity), 2) as ratio"))
            ->orderBy("ratio", "desc")
            ->get();

    return $res;


  }

}
