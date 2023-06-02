<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ProductCategory extends Model
{
    use HasFactory;

    protected $table = 'product_categories';
    protected $fillable = [
        'name', 'slug', 'description', 'image'
    ];

    public function getName()
    {
        return $this->select('id', 'name')->orderBy('id', 'desc')->paginate(5);
    }

    public function getData()
    {
        return $this->select('id', 'name', 'slug', 'description', 'count', 'image')->orderBy('id', 'desc')->get();
    }

    public function getAll()
    {
        return $this->select('id', 'name', 'slug', 'description', 'count', 'image')->orderBy('id', 'desc')->paginate(8);
    }

    public function getById($id)
    {
        $id = Crypt::decrypt($id);
        return $this->where('id', $id)->first();
    }

    public function createData(array $data)
    {
        return $this->create($data);
    }

    public function updateData(array $data, $id)
    {
        $id = Crypt::decrypt($id);

        return $this->where('id', $id)->update($data);
    }

    public function countAdd($id)
    {
        $category = $this->getById($id);

        return $this->where('id', $category->id)->update(['count' => $category->count + 1]);
    }

    public function countMinus($id)
    {
        $category = $this->getById($id);

        return $this->where('id', $category->id)->update(['count' => $category->count - 1]);
    }

    public function deleteData($id)
    {
        $id = Crypt::decrypt($id);

        DB::table('products')->where('product_category_id', $id)->update(['product_category_id' => 0]);

        return $this->where('id', $id)->delete();
    }
}
