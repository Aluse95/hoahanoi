<?php

namespace App\Models;

use App\Models\Cat;
use App\Models\Users;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $table = 'product';

    protected $fillable = ['name', 'product_alias', 'cat_id', 'admin_id', 'price', 'old_price', 'content', 'image','description', 'status'];

    public $timestamps = true;

    public function cat() {

        return $this->belongsTo(Cat::class);
    }

    public function user() {

        return $this->belongsToMany(Users::class, 'product_user', 'product_id','user_id')
        ->withPivot('id','quantity');
    }

    public function getByCatId($cat_id, $quantity) {

        $data = Product::where('cat_id', $cat_id)->take($quantity)->get();

        return $data;
    }

    public function getByCatIdExcept($cat_id, $quantity) {
        
        $data = Product::whereNot('cat_id', $cat_id)
        ->inRandomOrder()
        ->take($quantity)->get();

        return $data;
    }
}
