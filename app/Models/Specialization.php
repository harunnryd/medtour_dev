<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Specialization extends Model
{
    protected $fillable = ['type', 'slug',];
    protected $guarded  = ['id'];

    protected static function boot() {
        parent::boot();
        static::observe(app('specialization-observer'));
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function doctors() {
        return $this->belongsToMany(Doctor::class);
    }

    public function getTypeAttribute($type) {
        return Str::title($type);
    }

    public function setTypeAttribute($type) {
        $this->attributes['type'] = Str::lower($type);
    }

    // public function treatments()
    // {
    //     return $this->hasMany(Treatment::class);
    // }
}
