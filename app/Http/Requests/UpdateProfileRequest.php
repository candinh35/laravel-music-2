<?php

namespace App\Http\Requests;

use App\Rules\NotAllowField;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            //
            'name' => 'required',
            'wallet' => new NotAllowField,
            'email' => new NotAllowField,
            'password' => new NotAllowField,
        ];
    }
}
