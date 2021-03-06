<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    public $timestamps = false;

    public function productCategory(){
        return $this->hasMany(ProductCategory::class, 'product_id', 'id');
    }

}
