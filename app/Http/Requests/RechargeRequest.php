<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RechargeRequest extends FormRequest
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
            'money' => 'required|numeric|min:10000',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'money' => str_replace(",", '', $this->money),
        ]);
    }
}
