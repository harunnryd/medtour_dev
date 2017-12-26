<?php

namespace App\Supports;

use App\Repositories\SpecializationRepository;
use Illuminate\Support\Collection as Collect;
use App\Repositories\EntityRepository;
use App\Http\Requests\EntityRequest;
use App\Http\Requests\SearchRequest;
use Illuminate\Support\Arr;
use Carbon\Carbon;

class EntityService
{

    private $entity, $specialization;

    public function __construct(EntityRepository $entity, SpecializationRepository $specialization)
    {
        $this->entity = $entity;
        $this->specialization = $specialization;
    }

    public function entityRepository()
    {
        return $this->entity;
    }

    public function specializationRepository()
    {
        return $this->specialization;
    }

    public function search(SearchRequest $request)
    {
        $collect = [];

        if ($request->has('specialization')) {
            if (!$request->has('country')) {
                $collect = $this->querySpecialization($request);
            }

            if ($request->has('country')) {
                $collect = $this->querySpecializationCountry($request);
            }
        }

        if ($request->has('country')) {
            if (!$request->has('specialization')) {
                $collect = $this->queryCountry($request);
            }
        }

        if (!$request->has('specialization') && !$request->has('country')) {
            $collect = $this->noQuery($request);
        }

        // mengecek filter view
        if ($request->exists('view')) {
            $views = $request->view;
            switch ($views) {
                case 'doctor':
                    $collect = Collect::make($collect)->keyBy('doctor_slug')->forget('');
                    break;

                default:
                    $collect = Collect::make($collect)->keyBy('hospital_slug')->forget('');
                    break;
            }
        }

        // cek province & city bila ada
        if ($request->exists('country')) {
            if ($request->exists('province')) {
                $collect = Collect::make($collect)->where('province_slug', $request->province);

                if ($request->exists('city')) {
                    $collect = Collect::make($collect)->where('city_slug', $request->city);
                }
            }
        }

        return $collection = (new Collection($collect))->paginate(20)
                                                       ->appends([
                                                           'specialization' => $request->specialization,
                                                           'country'        => $request->country,
                                                           'province'       => $request->province,
                                                           'city'           => $request->city,
                                                           'view'           => $request->view,
                                                       ]);
    }

    public function querySpecializationCountry(SearchRequest $request)
    {
        $items   = [];
        $collect = [];

        if ($request->exists('specialization') && $request->exists('country')) {
            $specialization = $this->specializationRepository()
                                   ->findBy('slug', $request->specialization)
                                   ->load('doctors.practices');

            foreach ($specialization->doctors as $doctor) {
                foreach ($doctor->practices as $practice) {
                    if (!is_null($practice)) {
                        $items = Arr::prepend($items, [
                            'hospital_slug' => $practice->slug,
                            'entity_id'     => $practice->entity->id,
                            'name'          => $practice->name,
                            'contact'       => $practice->entity->contact,
                            'photo'         => $practice->entity->photo,
                            'city'          => $practice->entity->city,
                            'province'      => $practice->entity->city->province,
                            'country'       => $practice->entity->city->province->country,
                            'city_slug'     => $practice->entity->city->slug,
                            'province_slug' => $practice->entity->city->province->slug,
                            'country_slug'  => $practice->entity->city->province->country->slug,
                        ]);
                    }
                    if (!is_null($doctor)) {
                        $items = Arr::prepend($items, [
                            'doctor_slug'   => $doctor->slug,
                            'entity_id'     => $doctor->entity->id,
                            'name'          => $doctor->name,
                            'experience'    => Carbon::parse($doctor['experience'])->diff(Carbon::now())->format('%y Years %m Month'),
                            'contact'       => $doctor->entity->contact,
                            'photo'         => $doctor->entity->photo,
                            'city'          => $doctor->entity->city,
                            'province'      => $doctor->entity->city->province,
                            'country'       => $doctor->entity->city->province->country,
                            'city_slug'     => $doctor->entity->city->slug,
                            'province_slug' => $doctor->entity->city->province->slug,
                            'country_slug'  => $doctor->entity->city->province->country->slug,
                        ]);
                    }
                }
            }

            // filter nama yang sama
            $collect = Collect::make($items)->unique('name');
            // masukkan ulang semua nilai yang sudah di filter
            $collect = $collect->values()
                               ->all();

            return Collect::make($collect)->where('country_slug', $request->country);
        }
    }

    public function querySpecialization(SearchRequest $request)
    {
        $items   = [];
        $collect = [];

        if ($request->exists('specialization') && !$request->exists('country')) {
            $specialization = $this->specializationRepository()
                                   ->findBy('slug', $request->specialization)
                                   ->load('doctors.practices');

            foreach ($specialization->doctors as $doctor) {
                foreach ($doctor->practices as $practice) {
                    $items = Arr::prepend($items, [
                        'hospital_slug' => $practice->slug,
                        'entity_id'     => $practice->entity->id,
                        'name'          => $practice->name,
                        'contact'       => $practice->entity->contact,
                        'photo'         => $practice->entity->photo,
                        'city'          => $practice->entity->city,
                        'province'      => $practice->entity->city->province,
                        'country'       => $practice->entity->city->province->country,
                        'city_slug'     => $practice->entity->city->slug,
                        'province_slug' => $practice->entity->city->province->slug,
                        'country_slug'  => $practice->entity->city->province->country->slug,
                    ]);
                }   $items = Arr::prepend($items, [
                        'doctor_slug'   => $doctor->slug,
                        'entity_id'     => $doctor->entity->id,
                        'name'          => $doctor->name,
                        'experience'    => Carbon::parse($doctor['experience'])->diff(Carbon::now())->format('%y Years %m Month'),
                        'contact'       => $doctor->entity->contact,
                        'photo'         => $doctor->entity->photo,
                        'city'          => $doctor->entity->city,
                        'province'      => $doctor->entity->city->province,
                        'country'       => $doctor->entity->city->province->country,
                        'city_slug'     => $doctor->entity->city->slug,
                        'province_slug' => $doctor->entity->city->province->slug,
                        'country_slug'  => $doctor->entity->city->province->country->slug,
                    ]);
            }
            // filter nama yang sama
            $collect = Collect::make($items)->unique('name');
            // kembalikan semua nilainya
            return $collect->values()->all();
        }
    }

    public function queryCountry(SearchRequest $request)
    {
        $items   = [];
        $collect = [];

        if ($request->exists('country') && !$request->exists('specialization')) {
            $entity  = $this->entityRepository()
                            ->makeModel()
                            ->with('city.province.country', 'doctor', 'hospital')
                            ->get();

            foreach ($entity as $e) {
                if ($e->doctor !== null) {
                    $items = Arr::prepend($items, [
                        'doctor_slug'   => $e->doctor->slug,
                        'entity_id'     => $e->doctor->entity_id,
                        'name'          => $e->doctor->name,
                        'experience'    => Carbon::parse($e['experience'])->diff(Carbon::now())->format('%y Years %m Month'),
                        'contact'       => $e->contact,
                        'photo'         => $e->photo,
                        'city_slug'     => $e->city->slug,
                        'province_slug' => $e->city->province->slug,
                        'country_slug'  => $e->city->province->country->slug,
                        'city'          => $e->city,
                        'province'      => $e->city->province,
                        'country'       => $e->city->province->country,
                    ]);
                }

                if ($e->hospital !== null) {
                    $items = Arr::prepend($items, [
                        'hospital_slug' => $e->hospital->slug,
                        'entity_id'     => $e->hospital->entity_id,
                        'name'          => $e->hospital->name,
                        'contact'       => $e->contact,
                        'photo'         => $e->photo,
                        'city_slug'     => $e->city->slug,
                        'province_slug' => $e->city->province->slug,
                        'country_slug'  => $e->city->province->country->slug,
                        'city'          => $e->city,
                        'province'      => $e->city->province,
                        'country'       => $e->city->province->country,
                    ]);
                }
            }
            // filter nama yang sama
            $collect = Collect::make($items)->unique('name');
            // masukkan ulang nilai yang sudah di filter
            $collect = $collect->values()
                               ->all();

            return Collect::make($collect)->where('country_slug', $request->country);
        }
    }

    public function noQuery(SearchRequest $request)
    {
        $collect = [];
        $items = [];

        if (!$request->exists('specialization') || $request->exists('country')) {
            $entity  = $this->entityRepository()
                            ->makeModel()
                            ->with('city.province.country', 'doctor', 'hospital')
                            ->get();

            foreach ($entity as $e) {
                if ($e->doctor !== null) {
                    $items = Arr::prepend($items, [
                        'doctor_slug'   => $e->doctor->slug,
                        'entity_id'     => $e->doctor->entity_id,
                        'name'          => $e->doctor->name,
                        'experience'    => Carbon::parse($e['experience'])->diff(Carbon::now())->format('%y Years %m Month'),
                        'contact'       => $e->contact,
                        'photo'         => $e->photo,
                        'city_slug'     => $e->city->slug,
                        'province_slug' => $e->city->province->slug,
                        'country_slug'  => $e->city->province->country->slug,
                        'city'          => $e->city,
                        'province'      => $e->city->province,
                        'country'       => $e->city->province->country,
                    ]);
                }

                if ($e->hospital !== null) {
                    $items = Arr::prepend($items, [
                        'hospital_slug' => $e->hospital->slug,
                        'entity_id'     => $e->hospital->entity_id,
                        'name'          => $e->hospital->name,
                        'contact'       => $e->contact,
                        'photo'         => $e->photo,
                        'city_slug'     => $e->city->slug,
                        'province_slug' => $e->city->province->slug,
                        'country_slug'  => $e->city->province->country->slug,
                        'city'          => $e->city,
                        'province'      => $e->city->province,
                        'country'       => $e->city->province->country,
                    ]);
                }
            }
            // filter nama yang sama
            $collect = Collect::make($items)->unique('name');
            // kembalikan semua nilai
            return $collect->values()
                           ->all();
        }
    }
}
