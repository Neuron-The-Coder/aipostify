<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

use function PHPSTORM_META\type;

class ProductController extends Controller{

  public function getAll(Request $req) {
    $q = Product::from('products as p');
    if (isset($req->with_category) && $req->with_category) {
      $q->join('product_categories AS pc', 'pc.product_id', '=', 'p.id');
      $q->join('categories AS c', 'pc.category_id', '=', 'c.id');
      $q->selectRaw('p.*, GROUP_CONCAT(c.name SEPARATOR \', \') as categories');
      $q->groupBy('p.id', 'p.name', 'p.image', 'p.description', 'p.stock', 'p.deleted_at');
    } else $q->select('p.*');

    if (isset($req->search) && $req->search !== "") {
      $q->where('p.name', 'LIKE', "%" . $req->search . "%");
    }

    $res = $q->get();
    return response()->json($res);
  }

  public function add(Request $req){
    $name = $req->name;
    $description = $req->description;
    $image = $req->file('image');
    $categories = $req->categories;

    $validator = Validator::make($req->all(), [
      "name" => ["required", "unique:products,name"],
      "description" => ["required"],
      "image" => ["file", "max:1024", "image", "mimetypes:image/jpeg,image/jpg,image/png"],
      "categories" => ["required", "array", "min:1"]
    ]);

    $response = [
      "message" => "Success",
      "status" => 1
    ];

    if ($validator->fails()) {
      $response["status"] = 0;
      $response["message"] = $validator->errors()->first();
      return response()->json($response);
    }

    $filename = $name . "." . $image->getClientOriginalExtension();
    Storage::putFileAs('public/product_image', $image, $name . "." . $image->getClientOriginalExtension());
    $id = Product::insertGetId([
      "name" => $name,
      "image" => asset('storage/product_image/' . $filename),
      "description" => $description
    ]);

    ProductCategoryController::add($id, $categories);

    return response()->json($response);
  }
  
  public function addStock(Request $req){
    
    $response = [
      'message' => 'Success',
      'status' => 1
    ];
    
    $validator = Validator::make($req->all(), [
      "id" => ['required', 'numeric', 'exists:products,id'],
      "user_id" => ['exists:users,id', 'numeric'],
      "price_per_unit" => ['required_without:total_price', 'sometimes', 'nullable', 'numeric'],
      "quantity" => ['required', 'numeric'],
      "total_price" => ['required_without:price_per_unit', 'sometimes', 'nullable', 'numeric']
    ], [
      'price_per_unit.required_without' => 'Either Total or Price per Unit must be filled',
      'total_price.required_without' => 'Either Total or Price per Unit must be filled'
    ]);
    
    // var_dump(Auth::id(), $req->id, $req->quantity, $req->price_per_unit, $req->total_price);
    if ($validator->fails()){
      $response['message'] = $validator->errors()->first();
      $response['status'] = 0;
      return response()->json($response);
    }
    
    $prod = Product::find($req->id);
    $prod->stock += $req->quantity;
    $prod->save();
    
    $total_price = (isset($req->total_price) ?? $req->total_price);
    if (!$total_price) $total_price = $req->quantity * $req->price_per_unit; 
    
    NewStockController::add($req->user_id, $req->id, $req->quantity, $req->price_per_unit, $req->total_price);
    
    return response()->json($response);

  }

  public function addBill(Request $req){
    // Field ada _token, additional_information, products
    
    // Validate additional information
    $info = $req->additional_information;
    $additional_info_validator = Validator::make($info, [
      "name" => ['sometimes', 'nullable', 'max:200'],
      "age" => ['sometimes', 'nullable', 'numeric', 'max:120'],
      "gender" => [Rule::in(['Male', 'Female', 'Unknown'])],
      "address" => ['sometimes', 'nullable', 'max:900']
    ]);

    if ($additional_info_validator->fails()){
      return GlobalController::sendResponse($additional_info_validator->errors()->first(), 0);
    }
    
    $products = $req->products;
    if (!$products) return GlobalController::sendResponse('Cannot submit empty bill', 0);

    // Loop and validate ALL THE FRICKIN PRODUCTS
    foreach($products as $id => $data){
      if (!Product::where('id', '=', $id)->exists()) return GlobalController::sendResponse("No record was found for " . $data["name"] . ". Re-add the product", 0);
      $products_db = Product::find($id);
      $stock = $products_db->stock;
      $name = $products_db->name;
      $data["quantity"] = (int)$data["quantity"];
      if ($data["quantity"] > $stock) return GlobalController::sendResponse("Insufficient stock for $name", 0);
    }

    // All has been passed. Now for the insertings
    $id = TransactionController::addBill($req);

    return GlobalController::sendResponse('Success', 1);


  }

}
