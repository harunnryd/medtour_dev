<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Supports\SpecializationService;
use App\Supports\ComparisonService;
use App\Supports\TreatmentService;
use App\Supports\LanguageService;
use App\Supports\ProvinceService;
use App\Supports\HospitalService;
use App\Supports\CountryService;
use App\Supports\DoctorService;
use App\Supports\EntityService;
use App\Supports\PriceService;
use App\Supports\RoleService;
use App\Supports\CityService;
use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        View::composer([
            'admin',
            'prices.create',
            'doctors.index',
            'partials._doctor'], 'App\Http\ViewComposers\DoctorComposer');

        View::composer([
            'admin',
            'doctors.create',
            'doctors._add-entity',
            'doctors.edit',
            'entities.*',
            'treatments.create'], 'App\Http\ViewComposers\SpecializationComposer');

        View::composer([
            'admin',
            'doctors.create',
            'doctors._add-entity',
            'doctors.edit'], 'App\Http\ViewComposers\LanguageComposer');

        View::composer([
            'admin',
            'doctors.create',
            'doctors._add-entity',
            'doctors.edit',
            'hospitals.*',
            'entities.*',
            'cities.index'], 'App\Http\ViewComposers\CityComposer');

        View::composer([
            'admin',
            'provinces.index',
            'entities.*'], 'App\Http\ViewComposers\ProvinceComposer');

        View::composer([
            'admin',
            'countries.index',
            'entities.*'], 'App\Http\ViewComposers\CountryComposer');

        View::composer([
            'admin',
            'hospitals.index',
            'partials._hospital'], 'App\Http\ViewComposers\HospitalComposer');

        View::composer('admin', 'App\Http\ViewComposers\RoleComposer');

        View::composer('*', 'App\Http\ViewComposers\ComparisonComposer');

        View::composer('*', 'App\Http\ViewComposers\PriceComposer');

        View::composer('*', 'App\Http\ViewComposers\TreatmentComposer');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('console', function () {
            return new \Symfony\Component\Console\Output\ConsoleOutput;
        });

        $this->app->singleton('DoctorService', function ($app) {
            return $app[DoctorService::class];
        });

        $this->app->singleton('EntityService', function ($app) {
            return $app[EntityService::class];
        });

        $this->app->singleton('HospitalService', function ($app) {
            return $app[HospitalService::class];
        });

        $this->app->singleton('SpecializationService', function ($app) {
            return $app[SpecializationService::class];
        });

        $this->app->singleton('PriceService', function ($app) {
            return $app[PriceService::class];
        });

        $this->app->singleton('RoleService', function ($app) {
            return $app[RoleService::class];
        });

        $this->app->singleton('ComparisonService', function ($app) {
            return $app[ComparisonService::class];
        });

        $this->app->singleton('LanguageService', function ($app) {
            return $app[LanguageService::class];
        });

        $this->app->singleton('ProvinceService', function ($app) {
            return $app[ProvinceService::class];
        });

        $this->app->singleton('TreatmentService', function ($app) {
            return $app[TreatmentService::class];
        });

        $this->app->singleton('CityService', function ($app) {
            return $app[CityService::class];
        });

        $this->app->singleton('CountryService', function ($app) {
            return $app[CountryService::class];
        });
    }
}
