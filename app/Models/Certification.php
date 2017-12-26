<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Certification extends Model
{
    protected $fillable = ['name', 'slug', 'doctor_id'];
    protected $guarded  = ['id'];

    protected static function boot() {
        parent::boot();
        static::observe(app('certification-observer'));
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
