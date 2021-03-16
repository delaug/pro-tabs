<?php

namespace App\Http\Requests\Tab;

use App\Http\Requests\BaseRequest;
use App\Services\TokenService;

class StoreTabRequest extends BaseRequest
{
    /**
     * Ability for create
     *
     * @var string
     */
    public $tokenAbility = TokenService::DATA_CREATE;

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => ['required'],
            'band_id' => ['required', 'exists:bands,id'],
            'file_id' => ['required', 'exists:files,id'],
        ];
    }
}
