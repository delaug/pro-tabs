<?php

namespace App\Http\Requests\User;

use App\Http\Requests\BaseRequest;
use App\Services\TokenService;

class StoreUserRequest extends BaseRequest
{
    /**
     * Ability for create
     *
     * @var string
     */
    public $tokenAbility = TokenService::USERS_CREATE;

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [

        ];
    }
}
