<?php

namespace App\Http\Requests\Instrument;

use App\Http\Requests\BaseRequest;
use App\Models\InstrumentTranslations;
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
        // Find translation
        $instrumentTransitionsEn = InstrumentTranslations::where(['language_id' => 1, 'instrument_id' => $this->instrument])->select('id')->first();
        $id = $instrumentTransitionsEn ? $instrumentTransitionsEn->id : false;

        return [
            'title.en' => ['required', "unique:instrument_translations,title,{$id}"],
            'title.ru' => ['nullable'],
        ];
    }
}
