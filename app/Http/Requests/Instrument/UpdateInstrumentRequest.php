<?php

namespace App\Http\Requests\Instrument;

use App\Http\Requests\BaseRequest;
use App\Services\TokenService;

class UpdateInstrumentRequest extends BaseRequest
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
            'title' => ['required', "unique:instruments,name,{$this->instrument}"]
        ];
    }
}
