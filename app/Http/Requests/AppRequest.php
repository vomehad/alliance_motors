<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AppRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string',
//            'family' => 'nullable|string',
//            'o' => 'nullable|string',
            'number' => 'required|string',
        ];
    }
}
