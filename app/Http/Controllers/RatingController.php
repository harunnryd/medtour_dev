<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\DoctorInterface as Doctor;
use willvincent\Rateable\Rating;
use Illuminate\Http\Request;
use Redirect;

class RatingController extends Controller
{
    protected $rating;

    public function __construct(Rating $rating)
    {
        $this->rating = $rating;
    }

    public function ratingStore(Request $request)
    {
        $doctor = \App\Models\Doctor::whereSlug($request->doctor_slug)->first();
        // $rating = new Rating;
        $this->rating->rating  = $request->rating;
        $this->rating->comment = $request->comment;
        $this->rating->user_id = \Auth::guard('web')->user()->id;
        $doctor->ratings()->save($this->rating);

        return Redirect::back();
    }
}
