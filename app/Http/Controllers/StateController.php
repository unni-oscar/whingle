<?php

namespace App\Http\Controllers;
use App\Models\State;
use Illuminate\Http\Request;

class StateController extends Controller
{
    public function cities(State $state) {
		return $state->cities()->orderBy('name', 'ASC')->get(['id', 'name']);
    }
}
