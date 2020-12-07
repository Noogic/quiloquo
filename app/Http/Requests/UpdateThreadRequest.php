<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateThreadRequest extends FormRequest
{
    public function rules()
    {
        return [
            'title' => ['string', 'min:5', 'max:50'],
        ];
    }
}
