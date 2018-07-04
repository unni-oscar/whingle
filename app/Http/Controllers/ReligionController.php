<?php

namespace App\Http\Controllers;
use App\Models\Religion;
use Illuminate\Http\Request;

class ReligionController extends Controller
{
    public function castes(Religion $religion) {
		return $religion->castes()->orderBy('name', 'ASC')->get(['id', 'name']);
    }
}
