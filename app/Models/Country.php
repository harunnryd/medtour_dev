<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = ['name', 'slug',];
    protected $guarded  = ['id'];

    protected static function boot() {
        parent::boot();
        static::observe(app('country-observer'));
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function provinces() {
        return $this->hasMany(Province::class);
    }

    public function cities() {
        return $this->hasManyThrough(City::class, Province::class);
    }

    public function getNameAttribute($name) {
        return ucwords($name);
    }

    public function setNameAttribute($name) {
        $this->attributes['name'] = strtolower($name);
    }
}
