<?php

namespace App\Http\Requests\Store;

use Illuminate\Foundation\Http\FormRequest;

class StoreSettingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'nullable|string|max:255',
            'email' => 'nullable|string|email',
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:15',
            'facebook' => 'nullable|string|max:255',
            'instagram' => 'nullable|string|max:255',
            'youtube' => 'nullable|string|max:255',
            'whatsapp' => 'nullable|string|max:15',
            'tiktok' => 'nullable|string|max:255',
            'logo' => 'nullable|mimes:png,jpg,jpeg'
        ];
    }
}
