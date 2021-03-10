<?php

namespace App\Http\Requests\User;

use App\Http\Requests\BaseRequest;
use App\Services\TokenService;

class UpdateUserRequest extends BaseRequest
{
    /**
     * Ability for soft update
     *
     * @var string
     */
    public $tokenAbility = TokenService::USERS_UPDATE;

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }
}
