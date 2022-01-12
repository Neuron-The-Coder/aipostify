<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaction extends Model
{
    use HasFactory;

    protected $table = 'detail_transactions';
    public $timestamps = false;
    protected $fillable = ['id', 'product_id', 'price_per_unit', 'quantity', 'total_price'];

}
