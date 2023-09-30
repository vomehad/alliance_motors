<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PhotoRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'photo.id' => 'int|nullable',
            'photo.src' => 'int|string',
            'photo.image' => 'required',
        ];
    }
}
