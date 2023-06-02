<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

class Slider extends Model
{
    use HasFactory;

    protected $table = 'sliders';
    protected $fillable = [
        'name', 'slug', 'description', 'image'
    ];

    public function getAll()
    {
        return $this->select('id','name', 'slug', 'description', 'image', 'created_at')->orderBy('id', 'desc')->paginate(8);
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

    public function deleteData($id)
    {
        $id = Crypt::decrypt($id);

        return $this->where('id', $id)->delete();
    }

}
