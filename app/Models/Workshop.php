<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

class Workshop extends Model
{
    use HasFactory;

    protected $table = 'workshops';
    protected $fillable = [
        'title', 'slug', 'address', 'date', 'image'
    ];

    public function getAll()
    {
        return $this->select('id', 'title', 'slug', 'address', 'date', 'image')->orderBy('id', 'desc')->paginate(8);
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
        $id = Crypt::decrypt($id);

        return $this->where('id', $id)->delete();
    }
}
