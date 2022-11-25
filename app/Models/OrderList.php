<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderList extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = ['name','firstname','address','email','phone','city','note','product','price'];

    public $timestamps = true;
}
