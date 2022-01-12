<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GlobalController extends Controller{

  public static function sendResponse($message, $status){
    $response = [
      'message' => $message,
      'status' => $status
    ];
    return response()->json($response);
  }

}
