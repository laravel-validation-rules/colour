<?php

namespace LVR\Colour;

use Illuminate\Contracts\Validation\Rule;

class Hex implements Rule
{
    /**
     * @var bool
     */
    protected $forceFull;

    /**
     * @var bool
     */
    protected $allowAlpha;

    public function __construct($forceFull = false, $allowAlpha = false)
    {
        $this->forceFull = $forceFull;
        
        $this->allowAlpha = $allowAlpha;
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

        if ($this->allowAlpha) {
            $pattern .= '|[a-fA-F0-9]{8}';
    
            if (!$this->forceFull) {
                $pattern .= '|[a-fA-F0-9]{4}';
            }
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
