<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\ImplicitRule;

class EmptyIf implements ImplicitRule
{
    private string $field;

    private string $message;

    /**
     * Create a new rule instance.

     */
    public function __construct(string $field, string $message)
    {
        $this->field = $field;
        $this->message = $message;
    }

    /**
     * Determine if the validation rule passes.
     */
    public function passes($attribute, $value): bool
    {
        $field = \Request::input($this->field);

        return empty($field) || empty($value);
    }

    /**
     * Get the validation error message.
     */
    public function message(): string
    {
        return $this->message;
    }
}
