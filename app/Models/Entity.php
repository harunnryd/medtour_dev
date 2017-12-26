<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entity extends Model
{
    protected $fillable = ['photo', 'address', 'contact', 'city_id'];
    protected $guarded  = ['id'];

    protected static function boot() {
        parent::boot();
        static::observe(app('entity-observer'));
    }

    public function treatments()
    {
        return $this->belongsToMany(Treatment::class);
    }

    public function city() {
        return $this->belongsTo(City::class);
    }

    public function doctor() {
        return $this->hasOne(Doctor::class);
    }

    public function hospital() {
        return $this->hasOne(Hospital::class);
    }

    public function getAddressAttribute($address) {
        return ucwords($address);
    }

    public function setAddressAttribute($address) {
        $this->attributes['address'] = strtolower($address);
    }

    public function setContactAttribute($contact) {
        $this->attributes['contact'] = (String) $contact;
    }

    public function getPhotoAttribute($photo) {
        $path = public_path(). DIRECTORY_SEPARATOR. 'img'. DIRECTORY_SEPARATOR. $photo;
        if (!app('files')->exists($path)) {
            return 'default.jpg';
        }   return $photo;
    }


}
