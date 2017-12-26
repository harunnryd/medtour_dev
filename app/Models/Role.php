<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['has'];
    protected $guarded  = ['id'];

    protected static function boot() {
        parent::boot();
        static::observe(app('role-observer'));
    }

    public function accessright() {
        return $this->hasOne(AccessRight::class);
    }

    public function users() {
        return $this->hasMany(\App\User::class);
    }

    public function admins() {
        return $this->hasMany(\App\Admin::class);
    }

    public function getHasAttribute($has) {
        return strtolower($has);
    }

    public function setHasAttribute($has) {
        $this->attributes['has'] = strtolower($has);
    }

}
