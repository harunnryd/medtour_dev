<?php

// create
Route::middleware('access:createAdmin')->group(function ($route) {
    $route->get('doctor/create', 'DoctorController@create')->name('admin.doctor.create');
    // $route->get('doctor/{doctor}/entity/create', 'DoctorController@entityCreate')->name('admin.doctor.entity-create');
    $route->get('hospital/create', 'HospitalController@create')->name('admin.hospital.create');
    // $route->get('access/create', 'AccessRightController@create');
    // $route->get('city/create', 'CityController@create');
    // $route->get('province/create', 'ProvinceController@create');
    // $route->get('country/create', 'CountryController@create');
    $route->get('entity/create', 'EntityController@create')->name('admin.entity.create');
    // $route->get('facility/create', 'FacilityController@create');
    // $route->get('language/create', 'LanguageController@create');
    // $route->get('role/create', 'RoleController@create');
    $route->get('specialization/create', 'SpecializationController@create')->name('admin.specialization.create');
    // $route->get('certification/create', 'CertificationController@create');
    $route->get('treatment/create', 'TreatmentController@create')->name('admin.treatment.create');
    $route->get('doctor/{doctor}/prices/create', 'PriceController@create')->name('admin.doctor.treatment.prices.create');

    $route->post('doctor', 'DoctorController@store')->name('admin.doctor.store');
    // $route->post('doctor/entity', 'DoctorController@entityStore')->name('admin.doctor.entity-store');
    $route->post('hospital', 'HospitalController@store')->name('admin.hospital.store');
    $route->post('access', 'AccessRightController@store');
    $route->post('city', 'CityController@store')->name('admin.city.store');
    $route->post('province', 'ProvinceController@store')->name('admin.province.store');
    $route->post('country', 'CountryController@store')->name('admin.country.store');
    $route->post('entity', 'EntityController@store');
    $route->post('facility', 'FacilityController@store');
    $route->post('language', 'LanguageController@store')->name('admin.language.store');
    $route->post('role', 'RoleController@store');
    $route->post('specialization', 'SpecializationController@store')->name('admin.specialization.store');
    $route->post('certification', 'CertificationController@store');
    $route->post('treatment', 'TreatmentController@store')->name('admin.treatment.store');
    $route->post('doctor/{doctor}/prices', 'PriceController@store')->name('admin.doctor.treatment.prices.store');
});

// read
Route::middleware('access:viewAdmin')->group(function ($route) {
    $route->get('doctor', 'DoctorController@index')->name('admin.doctor.index');
    $route->get('hospital', 'HospitalController@index')->name('admin.hospital.index');
    $route->get('access', 'AccessRightController@index');
    $route->get('city', 'CityController@index')->name('admin.city.index');
    $route->get('province', 'ProvinceController@index')->name('admin.province.index');
    $route->get('country', 'CountryController@index')->name('admin.country.index');
    $route->get('entity', 'EntityController@index')->name('admin.entity.index');
    $route->get('facility', 'FacilityController@index');
    $route->get('language', 'LanguageController@index')->name('admin.language.index');
    $route->get('role', 'RoleController@index');
    $route->get('specialization', 'SpecializationController@index')->name('admin.specialization.index');
    $route->get('certification', 'CertificationController@index');
    $route->get('treatment', 'TreatmentController@index');

    $route->get('doctor/{doctor}', 'DoctorController@show')->name('admin.doctor.show');
    $route->get('hospital/{hospital}', 'HospitalController@show')->name('admin.hospital.show');
    $route->get('access/{access}', 'AccessRightController@show');
    $route->get('city/{city}', 'CityController@show');
    $route->get('province/{province}', 'ProvinceController@show');
    $route->get('country/{country}', 'CountryController@show');
    $route->get('entity/{entity}', 'EntityController@show');
    $route->get('facility/{facility}', 'FacilityController@show');
    $route->get('language/{language}', 'LanguageController@show');
    $route->get('role/{role}', 'RoleController@show');
    //$route->get('specialization/{specialization}', 'SpecializationController@show')->name('admin.specialization.show');
    $route->get('certification/{certification}', 'CertificationController@show');
    $route->get('treatment/{treatment}', 'TreatmentController@show');
});

// update
Route::middleware('access:updateAdmin')->group(function ($route) {
    $route->get('doctor/{doctor}/edit', 'DoctorController@edit')->name('admin.doctor.edit');
    $route->get('hospital/{hospital}/edit', 'HospitalController@edit')->name('admin.hospital.edit');
    $route->get('access/{access}/edit', 'AccessRightController@edit');
    $route->get('city/{city}/edit', 'CityController@edit');
    $route->get('province/{province}/edit', 'ProvinceController@edit');
    $route->get('country/{country}/edit', 'CountryController@edit');
    $route->get('entity/{entity}/edit', 'EntityController@edit');
    $route->get('facility/{facility}/edit', 'FacilityController@edit');
    $route->get('language/{language}/edit', 'LanguageController@edit');
    $route->get('role/{role}/edit', 'RoleController@edit');
    $route->get('specialization/{specialization}/edit', 'SpecializationController@edit')->name('admin.specialization.edit');
    $route->get('certification/{certification}/edit', 'CertificationController@edit');
    $route->get('treatment/{treatment}/edit', 'TreatmentController@edit')->name('admin.treatment.edit');

    $route->patch('doctor/{doctor}', 'DoctorController@update')->name('admin.doctor.update');
    $route->patch('hospital/{hospital}', 'HospitalController@update')->name('admin.hospital.update');
    $route->patch('access/{access}', 'AccessRightController@update');
    $route->patch('city/{city}', 'CityController@update')->name('admin.city.update');
    $route->patch('province/{province}', 'ProvinceController@update')->name('admin.province.update');
    $route->patch('country/{country}', 'CountryController@update')->name('admin.country.update');
    $route->patch('entity/{entity}', 'EntityController@update');
    $route->patch('facility/{facility}', 'FacilityController@update');
    $route->patch('language/{language}', 'LanguageController@update');
    $route->patch('role/{role}', 'RoleController@update');
    $route->patch('specialization/{specialization}', 'SpecializationController@update')->name('admin.specialization.update');
    $route->patch('certification/{certification}', 'CertificationController@update');
    $route->patch('treatment/{treatment}', 'TreatmentController@update')->name('admin.treatment.update');
});

// delete
Route::middleware('access:deleteAdmin')->group(function ($route) {
    $route->delete('doctor/{doctor}', 'DoctorController@destroy')->name('admin.doctor.destroy');
    $route->delete('hospital/{hospital}', 'HospitalController@destroy')->name('admin.hospital.destroy');
    $route->delete('access/{access}', 'AccessRightController@destroy');
    $route->delete('city/{city}', 'CityController@destroy');
    $route->delete('province/{province}', 'ProvinceController@destroy');
    $route->delete('country/{country}', 'CountryController@destroy');
    $route->delete('entity/{entity}', 'EntityController@destroy');
    $route->delete('facility/{facility}', 'FacilityController@destroy');
    $route->delete('language/{language}', 'LanguageController@destroy');
    $route->delete('role/{role}', 'RoleController@destroy');
    $route->delete('specialization/{specialization}', 'SpecializationController@destroy')->name('admin.specialization.destroy');
    $route->delete('certification/{certification}', 'CertificationController@destroy');
    $route->delete('treatment/{treatment}', 'TreatmentController@destroy')->name('admin.treatment.destroy');
});
