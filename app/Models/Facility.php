<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    protected $fillable = ['name', 'slug', 'hospital_id'];
    protected $guarded  = ['id'];

    protected static function boot() {
        parent::boot();
        static::observe(app('facility-observer'));
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function doctor() {
        return $this->belongsTo(Doctor::class);
    }

    public function getNameAttribute($name) {
        return ucwords($name);
    }

    public function setNameAttribute($name) {
        $this->attributes['name'] = strtolower($name);
    }
}
