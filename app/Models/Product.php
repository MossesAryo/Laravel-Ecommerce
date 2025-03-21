<?php

namespace App\Models;

use App\Models\category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;


    protected  $table =  'products';
    protected $fillable = ['category_id','nama_produk','harga','deskripsi','stok','img','created_at','updated_at'];

    public function Category(): BelongsTo
    {
        return $this->belongsTo(category::class);
    }
}

