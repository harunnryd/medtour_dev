<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
//----------------------------------------------------------------
use App\Models\Observers\Contracts\ObserverInterface as Observer;
//----------------------------------------------------------------
use App\Models\Observers\DoctorObserver as Doctor;
use App\Models\Observers\CertificationObserver as Certification;
use App\Models\Observers\LanguageObserver as Language;
use App\Models\Observers\SpecializationObserver as Specialization;
use App\Models\Observers\EntityObserver as Entity;
use App\Models\Observers\HospitalObserver as Hospital;
use App\Models\Observers\FacilityObserver as Facility;
use App\Models\Observers\CityObserver as City;
use App\Models\Observers\ProvinceObserver as Province;
use App\Models\Observers\CountryObserver as Country;
use App\Models\Observers\AccessRightObserver as AccessRight;
use App\Models\Observers\RoleObserver as Role;
use App\Models\Observers\TreatmentObserver as Treatment;

class ObserverServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->doctor();
        $this->certification();
        $this->language();
        $this->specialization();
        $this->entity();
        $this->hospital();
        $this->facility();
        $this->city();
        $this->province();
        $this->country();
        $this->accessRight();
        $this->role();
        $this->treatment(); 

    }

    public function doctor() {
        $this->app->singleton('doctor-observer', function ($app) {
            $app->instance(Observer::class, Doctor::class);
            return $app[Observer::class];
        });
    }

    public function certification() {
        $this->app->singleton('certification-observer', function ($app) {
            $app->instance(Observer::class, Certification::class);
            return $app[Observer::class];
        });
    }

    public function language() {
        $this->app->singleton('language-observer', function ($app) {
            $app->instance(Observer::class, Language::class);
            return $app[Observer::class];
        });
    }

    public function specialization() {
        $this->app->singleton('specialization-observer', function ($app) {
            $app->instance(Observer::class, Specialization::class);
            return $app[Observer::class];
        });
    }

    public function entity() {
        $this->app->singleton('entity-observer', function ($app) {
            $app->instance(Observer::class, Entity::class);
            return $app[Observer::class];
        });
    }

    public function hospital() {
        $this->app->singleton('hospital-observer', function ($app) {
            $app->instance(Observer::class, Hospital::class);
            return $app[Observer::class];
        });
    }

    public function facility() {
        $this->app->singleton('facility-observer', function ($app) {
            $app->instance(Observer::class, Facility::class);
            return $app[Observer::class];
        });
    }

    public function city() {
        $this->app->singleton('city-observer', function ($app) {
            $app->instance(Observer::class, City::class);
            return $app[Observer::class];
        });
    }

    public function province() {
        $this->app->singleton('province-observer', function ($app) {
            $app->instance(Observer::class, Province::class);
            return $app[Observer::class];
        });
    }

    public function country() {
        $this->app->singleton('country-observer', function ($app) {
            $app->instance(Observer::class, Country::class);
            return $app[Observer::class];
        });
    }

    public function accessRight() {
        $this->app->singleton('accessright-observer', function ($app) {
            $app->instance(Observer::class, AccessRight::class);
            return $app[Observer::class];
        });
    }

    public function role() {
        $this->app->singleton('role-observer', function ($app) {
            $app->instance(Observer::class, Role::class);
            return $app[Observer::class];
        });
    }

    public function treatment() {
        $this->app->singleton('treatment-observer', function ($app) {
            $app->instance(Observer::class, Treatment::class);
            return $app[Observer::class];
        });
    }
}