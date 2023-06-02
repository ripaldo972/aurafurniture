<?php

namespace App\Models;

use App\Http\Requests\Store\StoreSettingRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;

class Setting extends Model
{
    use HasFactory;

    protected $table = 'settings';
    protected $fillable = [
        'name', 'email', 'address', 'phone', 'facebook',
        'instagram', 'youtube', 'whatsapp', 'tiktok', 'location',
        'logo'
    ];

    public function getAll()
    {
        return $this->select('id','name', 'address', 'email', 'phone', 'facebook', 'instagram', 'youtube', 'whatsapp', 'tiktok', 'location', 'logo')->first();
    }

    public function getById($id)
    {
        $id = Crypt::decrypt($id);

        return $this->where('id', $id)->first();
    }

    public function createData(array  $data)
    {
        return $this->create($data);
    }

    public function updateData(array $data, $id)
    {
        $id = Crypt::decrypt($id);

        return $this->where('id', $id)->update($data);
    }
}
