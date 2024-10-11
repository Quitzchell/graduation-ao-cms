<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\ImplicitRule;

class EmptyIf implements ImplicitRule
{
    /** @var string $field */
    private $field;

    /** @var string $message */
    private $message;

    /**
     * Create a new rule instance.
     *
     * @param string $field
     * @param string $message
     * @return void
     */
    public function __construct(string $field, string $message)
    {
        $this->field = $field;
        $this->message = $message;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value): bool
    {
        $field = \Request::input($this->field);

        return empty($field) || empty($value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message(): string
    {
        return $this->message;
    }
}
