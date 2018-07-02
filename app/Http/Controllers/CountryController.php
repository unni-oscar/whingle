<?php

namespace App\Http\Controllers;
use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function states(Country $country) {
		return $country->states()->orderBy('name', 'ASC')->get(['id', 'name']);
    }
}
