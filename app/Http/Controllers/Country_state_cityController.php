<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use DB;

class Country_state_cityController extends Controller
{
    public function getState($id){
		$states= State::where('country_id', $id)->pluck('name', 'id');
		return json_encode($states);
	}

	public function getCity($id){
		$cities= City::where('state_id', $id)->pluck('name', 'id');
		return json_encode($cities);
	}
}
