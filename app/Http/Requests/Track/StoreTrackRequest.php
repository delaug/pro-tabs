<?php

namespace App\Http\Requests\Track;

use App\Http\Requests\BaseRequest;
use App\Services\TokenService;

class StoreTrackRequest extends BaseRequest
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
            'instrument_id' => ['required', 'exists:instruments,id'],
            'tune_id' => ['required', 'exists:tunes,id'],
            'tab_id' => ['required', 'exists:tabs,id'],
        ];
    }
}
