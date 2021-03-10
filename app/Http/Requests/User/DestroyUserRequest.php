<?php

namespace App\Http\Requests\User;

use App\Http\Requests\BaseRequest;
use App\Services\TokenService;

class DestroyUserRequest extends BaseRequest
{
    /**
     * Ability for soft delete
     *
     * @var string
     */
    public $tokenAbility = TokenService::USERS_SOFT_DELETE;

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
