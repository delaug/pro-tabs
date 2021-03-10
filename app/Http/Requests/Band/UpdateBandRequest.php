<?php

namespace App\Http\Requests\Band;

use App\Http\Requests\BaseRequest;
use App\Services\TokenService;

class UpdateBandRequest extends BaseRequest
{
    /**
     * Ability for soft update
     *
     * @var string
     */
    public $tokenAbility = TokenService::DATA_UPDATE;

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', "unique:bands,name,{$this->band}"]
        ];
    }
}
