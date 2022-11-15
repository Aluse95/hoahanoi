<?php

namespace App\Models;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cat extends Model
{
    use HasFactory;

    protected $table = 'cat';

    protected $fillable = ['name', 'cat_alias', 'admin_id', 'status_product'];

    public $timestamps = true;

    public function product() {

        return $this->hasMany(Product::class);
    }
}
