<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

class Faq extends Model
{
    use HasFactory;

    protected $table = 'faqs';
    protected $fillable = [
        'title', 'slug' ,'content', 'meta_keywords', 'meta_description', 'image'
    ];

    public function getAll()
    {
        return $this->select('id', 'title', 'slug', 'content', 'meta_keywords', 'meta_description', 'image')->first();
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
}
