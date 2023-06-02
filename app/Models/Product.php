<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $fillable = [
        'name', 'slug', 'product_category_id', 'description',
        'price', 'width', 'height', 'wide', 'meta_keywords',
        'meta_description', 'image', 'status'
    ];

    public function productCategory()
    {
        return $this->belongsTo(ProductCategory::class);
    }

    public function getAll()
    {
        return $this->select('id', 'name', 'product_category_id', 'price', 'status')->orderBy('id', 'desc')->paginate(10);
    }

    public function createData(array $data)
    {
        return $this->create($data);
    }

    public function getById($id)
    {
        $id = Crypt::decrypt($id);

        return $this->where('id', $id)->first();
    }

    public function updateData(array $data, $id)
    {
        $id = Crypt::decrypt($id);

        return $this->where('id', $id)->update($data);
    }

    public function deleteData($id)
    {
        $product = $this->getById($id);

        return $product->delete();

    }
}
