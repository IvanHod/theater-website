<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Festival;

class FestivalController extends Controller
{
	public function index()
	{
		$festivals = Festival::GetList();
		return view('festival/index', array('festivals' => $festivals));
	}
}
