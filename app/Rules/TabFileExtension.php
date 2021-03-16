<?php

namespace App\Rules;

use App\Services\FilesFacade;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\UploadedFile;

class TabFileExtension implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        // Check type
        if(!$value instanceof UploadedFile)
            return false;

        $ext = preg_replace('/.*\./', '', $value->getClientOriginalName());

        // Check empty
        if(empty($ext))
            return false;

        // Check extension
        return in_array($ext, FilesFacade::getAllowedExtensions());
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute must be a file of type: '.implode(', ', FilesFacade::getAllowedExtensions());
    }
}
