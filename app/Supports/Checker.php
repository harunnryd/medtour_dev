<?php

namespace App\Supports;

use App\Models\Doctor;

class Checker
{
    public static function noDoctorEntity(Doctor $doctor)
    {
        return is_null($doctor->entity_id);
    }
}
