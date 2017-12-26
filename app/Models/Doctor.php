<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use App\Models\Observers\ObserverInterface;
use willvincent\Rateable\Rateable;

class Doctor extends Model
{
    use Rateable;
    
    protected $fillable = ['name', 'slug', 'gender', 'entity_id', 'experience'];
    protected $guarded  = ['id'];

    protected static function boot()
    {
        parent::boot();
        static::observe(app('doctor-observer'));
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function entity()
    {
        return $this->belongsTo(Entity::class);
    }

    public function specializations()
    {
        return $this->belongsToMany(Specialization::class);
    }

    public function languages()
    {
        return $this->belongsToMany(Language::class);
    }

    public function certifications()
    {
        return $this->hasMany(Certification::class);
    }

    public function practices()
    {
        return $this->belongsToMany(Hospital::class, 'practices');
    }

    public function getNameAttribute($name)
    {
        return Str::title($name);
    }

    public function setNameAttribute($name)
    {
        $this->attributes['name'] = Str::lower($name);
    }

    public function getGenderAttribute($gender)
    {
        return Str::title($gender);
    }

    public function setGenderAttribute($gender)
    {
        $this->attributes['gender'] = Str::lower($gender);
    }

    public function setExperienceAttribute($experience)
    {
        $this->attributes['experience'] = Carbon::createFromFormat('d/m/Y', $experience)->toDateString();
    }

    public function getDates()
    {
        return ['created_at', 'updated_at', 'experience'];
    }
}
