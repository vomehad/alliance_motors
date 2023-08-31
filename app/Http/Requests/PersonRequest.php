<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonRequest extends FormRequest
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
            'person.name' => 'required|string|max:128',
            'person.surname' => 'required|string|max:128',
            'person.job' => 'required|string|max:128',
            'person.department' => 'required|string|max:128',
//            'picture' => 'nullable|image',
        ];
    }
}
