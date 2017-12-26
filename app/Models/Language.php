<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $fillable = ['spoken', 'slug',];
    protected $guarded  = ['id'];

    protected static function boot() {
        parent::boot();
        static::observe(app('language-observer'));
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function doctors() {
        return $this->belongsToMany(Doctor::class);
    }

    public function getSpokenAttribute($spoken) {
        return ucwords($spoken);
    }

    public function setSpokenAttribute($spoken) {
        $this->attributes['spoken'] = strtolower($spoken);
    }
}
