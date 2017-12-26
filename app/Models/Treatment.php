<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Treatment extends Model
{
    protected $fillable = ['specialization_id', 'name', 'slug'];
    protected $guarded = ['id'];

    protected static function boot() {
        parent::boot();
        static::observe(app('treatment-observer'));
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function entities()
    {
        return $this->belongsToMany(Entity::class);
    }

    // public function specialization()
    // {
    //     return $this->belongsTo(Specialization::class);
    // }

    public function setNameAttribute($name)
    {
        $this->attributes['name'] = Str::lower($name);
    }

    public function getNameAttribute($name)
    {
        return Str::title($name);
    }
}
