<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Users extends Model
{
    use HasFactory;

    protected $table = 'user';

    protected $fillable = ['name','email','password'];

    public $timestamps = true;

    public function product() {

        return $this->belongsToMany(Product::class, 'product_user','user_id', 'product_id')
        ->withPivot('id','quantity');
    }
}
