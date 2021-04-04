<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InstrumentTranslations extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'language_id', 'instrument_id'];

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = ['language'];

    public function language()
    {
        return $this->belongsTo(Language::class);
    }

    public function instrument()
    {
        return $this->belongsTo(Instrument::class);
    }
}
