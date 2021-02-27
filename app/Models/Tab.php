<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tab extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'src',
        'band_id',
    ];

    protected $hidden = [
        'band_id',
    ];

    public function band() {
        return $this->belongsTo(Band::class);
    }

    public function tracks() {
        return $this->hasMany(Track::class);
    }
}
