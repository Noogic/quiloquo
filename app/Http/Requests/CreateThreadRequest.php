<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateThreadRequest extends FormRequest
{
    public function rules()
    {
        return [
            'title' => ['string', 'min:3', 'max:50'],
        ];
    }
}
