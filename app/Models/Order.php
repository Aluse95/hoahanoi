<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $table = 'product_user';

    protected $fillable = ['product_id','user_id','quantity'];

    public $timestamps = false;

}

