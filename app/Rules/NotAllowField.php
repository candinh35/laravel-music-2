<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\InvokableRule;

class NotAllowField implements InvokableRule
{
    /**
     * Run the validation rule.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     * @return void
     */
    public function __invoke($attribute, $value, $fail)
    {
        //
        if(request()->has($attribute)){
            $fail('The :attribute field is not allowed');
        }
    }
}
