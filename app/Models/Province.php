<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $fillable = ['name', 'slug', 'country_id'];
    protected $guarded  = ['id'];

    protected static function boot() {
        parent::boot();
        static::observe(app('province-observer'));
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function cities() {
        return $this->hasMany(City::class);
    }

    public function country() {
        return $this->belongsTo(Country::class);
    }

    public function getNameAttribute($name) {
        return ucwords($name);
    }

    public function setNameAttribute($name) {
        $this->attributes['name'] = strtolower($name);
    }
}
