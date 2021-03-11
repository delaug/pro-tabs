<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\UploadedFile;

class TabFileExtension implements Rule
{
    /**
     * Allowed file extensions
     *
     * @var string[]
     */
    public $allowedExtensions = ['gtp','gp3','gp4','gp5','gpx','gp','mid','midi','xml','mxl','musicxml','txt','tab','btab','ptb','taf'];

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
        return in_array($ext, $this->allowedExtensions);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute must be a file of type: '.implode(', ', $this->allowedExtensions);
    }
}
