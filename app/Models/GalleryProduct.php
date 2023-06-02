<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryProduct extends Model
{
    use HasFactory;

    protected $table = 'gallery_products';
    protected $fillable = [
        'product_id', 'image'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function createData(array $data)
    {
        return $this->create($data);
    }
}
