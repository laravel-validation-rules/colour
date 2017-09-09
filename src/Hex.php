<?php

namespace LVR\Colour;

use Illuminate\Contracts\Validation\Rule;

class Hex implements Rule
{
    /**
     * @var bool
     */
    protected $forceFull;

    public function __construct($forceFull = false)
    {
        $this->forceFull = $forceFull;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string $attribute
     * @param  mixed  $value
     *
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $pattern = '/^#([a-fA-F0-9]{6}';

        if (!$this->forceFull) {
            $pattern .= '|[a-fA-F0-9]{3}';
        }

        $pattern .= ')$/';

        return (bool) preg_match($pattern, $value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The hex code is not valid';
    }
}
