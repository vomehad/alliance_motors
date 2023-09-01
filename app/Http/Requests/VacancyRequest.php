<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VacancyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'vacancy.id' => 'nullable',
            'vacancy.title' => 'required|string|max:128',
            'vacancy.description' => 'required|string|max:1024',
            'vacancy.requirements' => 'required',
            'vacancy.conditions' => 'required',
            'vacancy.min' => 'required|int',
            'vacancy.max' => 'required|int',
            'vacancy.active' => 'bool',
        ];
    }
}
