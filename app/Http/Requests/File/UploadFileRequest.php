<?php

namespace App\Http\Requests\File;

use App\Http\Requests\BaseRequest;
use App\Rules\TabFileExtension;
use App\Services\TokenService;

class UploadFileRequest extends BaseRequest
{
    /**
     * Ability for upload
     *
     * @var string
     */
    public $tokenAbility = TokenService::FILES_UPLOAD;

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'attachment' => ['required', 'file', new TabFileExtension]
        ];
    }
}
