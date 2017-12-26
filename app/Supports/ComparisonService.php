<?php

namespace App\Supports;

use Carbon\Carbon;
// use DoctorService;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Repositories\DoctorRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ComparisonService
{
    protected $request;
    private $doctor;

    public function __construct(Request $request, DoctorRepository $doctor)
    {
        $this->doctor = $doctor;
        $this->request = $request;
    }

    public function doctorRepository()
    {
        return $this->doctor;
    }

    public function lists()
    {
        return $this->request->cookie('comparison');
    }

    public function totalDoctor()
    {
        return count($this->lists());
    }

    public function isEmpty()
    {
        return $this->totalDoctor() < 1;
    }

    public function details()
    {
        $result = [];
        if ($this->totalDoctor() > 0) {
            foreach ($this->lists() as $id) {
                $doctor = $this->doctorRepository()
                               ->makeModel()
                               ->find($id);

                if ($doctor !== null) {
                    $result = Arr::prepend($result, [
                            'id'              => $doctor->id,
                            'detail'          => $doctor->toArray(),
                            'entity'          => $doctor->entity,
                            'specializations' => $doctor->specializations->toArray(),
                            'country'         => $doctor->entity->city->province->country->toArray(),
                            'experience'      => Carbon::parse($doctor['experience'])->diff(Carbon::now())->format('%y Years %m Month'),
                    ]);
                }
            }
        }

        return $result;
    }
}
