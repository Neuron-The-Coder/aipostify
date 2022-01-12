<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class HeaderTransaction extends Model
{
    use HasFactory;

    protected $name = 'header_transactions';
    public $incrementing = false;

    public function getKeyType(){
        return 'string';
    }

}
