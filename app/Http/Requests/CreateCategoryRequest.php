<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCategoryRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => ['string', 'min:2', 'max:25', 'unique:categories'],
        ];
    }
}
