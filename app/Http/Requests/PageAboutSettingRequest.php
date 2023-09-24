<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class PageAboutSettingRequest extends FormRequest
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
    #[ArrayShape(['about.id' => "string", 'about.name' => "string", 'about.description' => "string", 'about.value' => "string", 'about.extra' => "string", 'about.type' => "string"])] public function rules(): array
    {
        return [
            'about.id' => 'int|nullable',
            'about.name' => 'string|max:128',
            'about.description' => 'string|max:128',
            'about.value' => 'string|max:128',
            'about.extra' => 'string|max:128',
            'about.type' => 'string|max:128',
        ];
    }
}
