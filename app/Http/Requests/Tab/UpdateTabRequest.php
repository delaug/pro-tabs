<?php

namespace App\Http\Requests\Tab;

use App\Http\Requests\BaseRequest;
use App\Services\TokenService;

class UpdateTabRequest extends BaseRequest
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
            'title' => ['required'],
            'src' => ['required'],
            'band_id' => ['required', 'exists:bands,id,deleted_at,NULL'],
        ];
    }
}
