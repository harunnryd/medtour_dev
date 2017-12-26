<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    protected $fillable = ['name', 'slug', 'beds', 'inpatients', 'outpatients', 'entity_id'];
    protected $guarded  = ['id'];

    protected static function boot() {
        parent::boot();
        static::observe(app('hospital-observer'));
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function entity() {
        return $this->belongsTo(Entity::class);
    }

    public function facilities() {
        return $this->hasMany(Facility::class);
    }

    public function practices() {
        return $this->belongsToMany(Doctor::class, 'practices');
    }

    public function getNameAttribute($name) {
        return ucwords($name);
    }

    public function setNameAttribute($name) {
        $this->attributes['name'] = strtolower($name);
    }

    public function setBedsAttribute($beds) {
        $this->attributes['beds'] = (int) $beds;
    }

    public function setInpatientsAttribute($inpatients) {
        $this->attributes['inpatients'] = (int) $inpatients;
    }

    public function setOutpatientsAttribute($outpatients) {
        $this->attributes['outpatients'] = (int) $outpatients;
    }

}
