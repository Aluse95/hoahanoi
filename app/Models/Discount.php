<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Discount extends Model
{
    use HasFactory;

    protected $table = 'discount';

    protected $fillable = ['name','sale_off'];

    public $timestamps = false;
}
