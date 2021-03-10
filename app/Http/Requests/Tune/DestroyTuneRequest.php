<?php

namespace App\Http\Requests\Tune;

use App\Http\Requests\BaseRequest;
use App\Services\TokenService;

class DestroyTuneRequest extends BaseRequest
{
    /**
     * Ability for soft delete
     *
     * @var string
     */
    public $tokenAbility = TokenService::DATA_SOFT_DELETE;

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
