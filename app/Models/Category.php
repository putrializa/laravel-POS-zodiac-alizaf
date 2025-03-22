<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';
    protected $fillable = ['name']; // Sesuaikan dengan kolom kategori di database

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id');
    }
}
