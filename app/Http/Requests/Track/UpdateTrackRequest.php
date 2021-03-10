<?php

namespace App\Http\Requests\Track;

use App\Http\Requests\BaseRequest;
use App\Services\TokenService;

class UpdateTrackRequest extends BaseRequest
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
            'instrument_id' => ['required', 'exists:instruments,id,deleted_at,NULL'],
            'tune_id' => ['required', 'exists:tunes,id,deleted_at,NULL'],
            'tab_id' => ['required', 'exists:tabs,id,deleted_at,NULL'],
        ];
    }
}
