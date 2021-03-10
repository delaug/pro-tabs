<?php

namespace App\Http\Requests\Tune;

use App\Http\Requests\BaseRequest;
use App\Services\TokenService;

class UpdateTuneRequest extends BaseRequest
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
            'title' => ['required', "unique:tunes,title,{$this->tune}"]
        ];
    }
}
