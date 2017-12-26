<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = ['name', 'slug', 'province_id'];
    protected $guarded  = ['id'];

    protected static function boot() {
        parent::boot();
        static::observe(app('city-observer'));
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function entities() {
        return $this->hasMany(Entity::class);
    }

    public function province() {
        return $this->belongsTo(Province::class);
    }

    public function getNameAttribute($name) {
        return ucwords($name);
    }

    public function setNameAttribute($name) {
        $this->attributes['name'] = strtolower($name);
    }

}
