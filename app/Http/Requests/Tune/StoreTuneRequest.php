<?php

namespace App\Http\Requests\Tune;

use App\Http\Requests\BaseRequest;
use App\Services\TokenService;

class StoreTuneRequest extends BaseRequest
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
            'title' => ['required', 'unique:tunes']
        ];
    }
}
