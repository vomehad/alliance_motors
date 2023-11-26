<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class OfficeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'office.id' => 'nullable',
            'office.address' => 'required|string|max:255',
            'office.tel' => 'required|string|max:255',
            'office.geo' => 'required|string|max:255',
            'office.email' => 'required|email',
            'office.active' => 'required|boolean',
        ];
    }
}
