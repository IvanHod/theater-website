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
		$models = Collective::GetList();
		return view('collective/index', array('models' => $models));
	}

	public function createForm($id = '')
	{
		$model = Collective::find($id);
		if(!$model)
		{
			$model = new Collective();
		}
		return view('collective/edit', array('model' => $model));
	}

	public function create(Request $request)
	{
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
		$path = '';
		if ($request->hasFile('pictureFile')) {
			$path = '/storage/app/' . $request->pictureFile->store('images');
		}
		$id = Collective::Create(array(
			'name' => $request->name,
			'picture' => $path,
			'description' => $request->description,
			'city' => $request->city,
			'count' => intval($request->count),
			'creator' => intval($user->id),
		));
		$models = Collective::GetList();
		return view('collective/index', array('models' => $models));
	}

	public function edit($id, Request $request)
	{
		$path = $request->picture;
		if($request->hasFile('pictureFile'))
		{
			$path = '/storage/app/' . $request->pictureFile->store('images');
		}
		$model = Collective::Edit(intval($id), array(
			'name' => $request->name,
			'picture' => $path,
			'city' => $request->city,
			'description' => $request->description,
			'count' => $request->count,
		));
		$user = \App\User::find(intval($model->creator));
		if($user)
		{
			$model->username = $user->name;
			$model->email = $user->email;
		}
		return view('collective/view', array('model' => $model));
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
		$user = \App\User::find(intval($model->creator));
		if($user)
		{
			$model->username = $user->name;
			$model->email = $user->email;
		}
		return view('collective/view', array('model' => $model));
	}
}
