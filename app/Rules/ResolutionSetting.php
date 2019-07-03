<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ResolutionSetting implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed  $value
     *
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return !is_null(auth()->user()->company->resolutions->where('type_document_id', $value)->first());
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'La resolución no está configurada.';
    }
}
