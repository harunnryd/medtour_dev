<?php

//create
Route::middleware('access:createUser')->group(function () {
    //Route::get('doctor/create', 'DoctorController@create');
    //Route::get('hospital/create', 'HospitalController@create');
    //Route::get('access/create', 'AccessRightController@create');
    //Route::get('city/create', 'CityController@create');
    //Route::get('province/create', 'ProvinceController@create');
    //Route::get('country/create', 'CountryController@create');
    //Route::get('entity/create', 'EntityController@create');
    //Route::get('facility/create', 'FacilityController@create');
    //Route::get('language/create', 'LanguageController@create');
    //Route::get('role/create', 'RoleController@create');
    //Route::get('specialization/create', 'SpecializationController@create');
    //Route::get('certification/create', 'CertificationController@create');

    //Route::post('doctor', 'DoctorController@store');
    //Route::post('hospital', 'HospitalController@store');
    //Route::post('access', 'AccessRightController@store');
    //Route::post('city', 'CityController@store');
    //Route::post('province', 'ProvinceController@store');
    //Route::post('country', 'CountryController@store');
    //Route::post('entity', 'EntityController@store');
    //Route::post('facility', 'FacilityController@store');
    //Route::post('language', 'LanguageController@store');
    //Route::post('role', 'RoleController@store');
    //Route::post('specialization', 'SpecializationController@store');
    //Route::post('certification', 'CertificationController@store');
    Route::post('rating', 'RatingController@ratingStore')->name('user.rating.store');
});

//read
Route::middleware('access:viewUser')->group(function () {
    //Route::get('doctor', 'DoctorController@index')->name('doctor.index');
    //Route::get('hospital', 'HospitalController@index')->name('hospital.index');
    //Route::get('access', 'AccessRightController@index');
    //Route::get('city', 'CityController@index');
    //Route::get('province', 'ProvinceController@index');
    //Route::get('country', 'CountryController@index');
    //Route::get('entity', 'EntityController@index')->name('entity.index');
    //Route::get('facility', 'FacilityController@index');
    //Route::get('language', 'LanguageController@index');
    //Route::get('role', 'RoleController@index');
    //Route::get('specialization', 'SpecializationController@index');
    //Route::get('certification', 'CertificationController@index');

    //Route::get('doctor/{doctor}', 'DoctorController@show')->name('doctor.show');
    //Route::get('hospital/{hospital}', 'HospitalController@show')->name('hospital.show');
    //Route::get('access/{access}', 'AccessRightController@show');
    //Route::get('city/{city}', 'CityController@show');
    //Route::get('province/{province}', 'ProvinceController@show');
    //Route::get('country/{country}', 'CountryController@show');
    //Route::get('entity/{entity}', 'EntityController@show');
    //Route::get('facility/{facility}', 'FacilityController@show');
    //Route::get('language/{language}', 'LanguageController@show');
    //Route::get('role/{role}', 'RoleController@show');
    //Route::get('specialization/{specialization}', 'SpecializationController@show');
    //Route::get('certification/{certification}', 'CertificationController@show');
});

//update
Route::middleware('access:updateUser')->group(function () {
    //Route::get('doctor/{doctor}/edit', 'DoctorController@edit')->name('doctor.edit');
    //Route::get('hospital/{hospital}/edit', 'HospitalController@edit')->name('hospital.edit');
    //Route::get('access/{access}/edit', 'AccessRightController@edit');
    //Route::get('city/{city}/edit', 'CityController@edit');
    //Route::get('province/{province}/edit', 'ProvinceController@edit');
    //Route::get('country/{country}/edit', 'CountryController@edit');
    //Route::get('entity/{entity}/edit', 'EntityController@edit');
    //Route::get('facility/{facility}/edit', 'FacilityController@edit');
    //Route::get('language/{language}/edit', 'LanguageController@edit');
    //Route::get('role/{role}/edit', 'RoleController@edit');
    //Route::get('specialization/{specialization}/edit', 'SpecializationController@edit');
    //Route::get('certification/{certification}/edit', 'CertificationController@edit');

    //Route::patch('doctor/{doctor}', 'DoctorController@update');
    //Route::patch('hospital/{hospital}', 'HospitalController@update');
    //Route::patch('access/{access}', 'AccessRightController@update');
    //Route::patch('city/{city}', 'CityController@update');
    //Route::patch('province/{province}', 'ProvinceController@update');
    //Route::patch('country/{country}', 'CountryController@update');
    //Route::patch('entity/{entity}', 'EntityController@update');
    //Route::patch('facility/{facility}', 'FacilityController@update');
    //Route::patch('language/{language}', 'LanguageController@update');
    //Route::patch('role/{role}', 'RoleController@update');
    //Route::patch('specialization/{specialization}', 'SpecializationController@update');
    //Route::patch('certification/{certification}', 'CertificationController@update');
});

//delete
Route::middleware('access:deleteUser')->group(function () {
    //Route::delete('doctor/{doctor}', 'DoctorController@destroy')->name('doctor.destroy');
    //Route::delete('hospital/{hospital}', 'HospitalController@destroy')->name('hospital.destroy');
    //Route::delete('access/{access}', 'AccessRightController@destroy');
    //Route::delete('city/{city}', 'CityController@destroy');
    //Route::delete('province/{province}', 'ProvinceController@destroy');
    //Route::delete('country/{country}', 'CountryController@destroy');
    //Route::delete('entity/{entity}', 'EntityController@destroy');
    //Route::delete('facility/{facility}', 'FacilityController@destroy');
    //Route::delete('language/{language}', 'LanguageController@destroy');
    //Route::delete('role/{role}', 'RoleController@destroy');
    //Route::delete('specialization/{specialization}', 'SpecializationController@destroy');
    //Route::delete('certification/{certification}', 'CertificationController@destroy');
});
