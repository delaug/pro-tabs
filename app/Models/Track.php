<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Track extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['instrument_id','tune_id','tab_id'];

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = ['instrument','tune'];

    public function tab() {
        return $this->belongsTo(Tab::class);
    }

    public function instrument() {
        return $this->belongsTo(Instrument::class);
    }

    public function tune() {
        return $this->belongsTo(Tune::class);
    }
}
