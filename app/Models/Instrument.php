<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Instrument extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = ['translations'];

    public function tracks() {
        return $this->hasMany(Track::class);
    }

    public function translations() {
        return $this->hasMany(InstrumentTranslations::class);
    }
}
