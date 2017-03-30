<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Festival;
use \Illuminate\Support\Facades\Auth;

class FestivalController extends Controller
{
	public function index()
	{
		$festivals = Festival::GetList();
		return view('festival/index', array('festivals' => $festivals));
	}

	public function createForm($id = '')
	{
		if(Auth::user()->can('create-festival'))
		{
			$festival = Festival::find($id);
			if(!$festival)
			{
				$festival = new Festival();
			}
			return view('festival/edit', array('festival' => $festival));
		}
		else
			throw new \Exception('You haven`t permission for this action');
	}

	public function create(Request $request)
	{
		if(Auth::user()->can('create-festival')) {
			$path = '';
			if ($request->hasFile('pictureFile')) {
				$path = '/storage/app/' . $request->pictureFile->store('images');
			}
			$id = Festival::Create(array(
				'name' => $request->name,
				'picture' => $path,
				'city' => $request->city,
				'description' => $request->description,
				'date_begin' => $request->date_begin,
				'date_end' => $request->date_end,
			));
			$festivals = Festival::GetList();
			return view('festival/index', array('festivals' => $festivals));
		}
		else
			throw new \Exception('You haven`t permission for this action');
	}

	public function edit($id, Request $request)
	{
		if(Auth::user()->can('create-festival'))
		{
			$path = $request->picture;
			if($request->hasFile('pictureFile'))
			{
				$path = '/storage/app/' . $request->pictureFile->store('images');
			}
			$model = Festival::Edit(intval($id), array(
				'name' => $request->name,
				'picture' => $path,
				'city' => $request->city,
				'description' => $request->description,
				'date_begin' => $request->date_begin,
				'date_end' => $request->date_end,
			));
			return view('festival/view', array('festival' => $model));
		}
		else
			throw new \Exception('You haven`t permission for this action');
	}

	public function delete($id)
	{
		$model = Festival::find(intval($id));
		if($model)
		{
			$model->delete();
			return 1;
		}
		return 0;
	}

	public function view($id)
	{
		$festival = Festival::find(intval($id));
		return view('festival/view', array('festival' => $festival));
	}
}
