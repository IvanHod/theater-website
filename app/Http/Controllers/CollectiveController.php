<?php

namespace App\Http\Controllers;

use App\Models\Collective;
use App\Models\Role;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Auth;

class CollectiveController extends Controller
{
	public function index()
	{
		$model = Collective::GetList();
		return view('collective/index', array('collectives' => $model));
	}

	public function createForm($id = '')
	{
		if(Auth::user()->can('create-collective'))
		{
			$model = Collective::find($id);
			if(!$model)
			{
				$model = new Collective();
			}
			return view('festival/edit', array('collectives' => $model));
		}
		else
			throw new \Exception('You haven`t permission for this action');
	}

	public function create(Request $request)
	{
		$path = '';
		if ($request->hasFile('pictureFile')) {
			$path = '/storage/app/' . $request->pictureFile->store('images');
		}
		$user = Auth::user();
		if(!$user)
		{
			$user = new \App\User();
			$user->name = $request->username;
			$user->email = $request->email;
			$user->password = bcrypt($request->password);
			$user->save();
			$user->attachRole(Role::where('name', '=', 'collective')->first());
			Auth::login($user);
		}
		$id = Collective::Create(array(
			'name' => $request->name,
			'picture' => $path,
			'description' => $request->description,
			'city' => $request->city,
			'count' => intval($request->count),
			'creator' => intval($user->id),
		));
		$collectives = Collective::GetList();
		return view('collective/index', array('collectives' => $collectives));
	}

	public function edit($id, Request $request)
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
			'description' => $request->count,
			'description' => $request->description,
		));
		return view('festival/view', array('festival' => $model));
	}

	public function delete($id)
	{
		if(Auth::user()->can('delete-collective'))
		{
			$model = Collective::find(intval($id));
			if($model)
			{
				$model->delete();
				return 1;
			}
		}
		return 0;
	}

	public function view($id)
	{
		$model = Collective::find(intval($id));
		return view('collective/view', array('collective' => $model));
	}
}
