<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Auth;
use App\User;

class UserController extends Controller
{
	public function index()
	{
		$models = User::GetList();
		return view('user/index', array('models' => $models));
	}

	public function createForm($id = '')
	{
		if(Auth::user()->can('create-user'))
		{
			$model = User::find($id);
			if(!$model)
			{
				$model = new User();
			}
			return view('user/edit', array('model' => $model, 'roles' => $this->getRoles()));
		}
		else
			throw new \Exception('You haven`t permission for this action');
	}

	public function create(Request $request)
	{
		if(Auth::user()->can('create-user')) {
			$id = User::Create(array(
				'name' => $request->name,
				'email' => $request->email,
				'password' => $request->password,
			));
			$user = User::find(intval($id));
			$role = Role::find(intval($request->role));
			$user->attachRole($role);
			$models = User::GetList();
			return view('user/index', array('models' => $models));
		}
		else
			throw new \Exception('You haven`t permission for this action');
	}

	public function edit($id, Request $request)
	{
		if(Auth::user()->can('create-user'))
		{
			$model = User::Edit(intval($id), array(
				'name' => $request->name,
				'email' => $request->email,
				'password' => bcrypt($request->password),
			));
			\DB::table('role_user')->where('user_id', $model->id)->delete();
			$role = Role::find(intval($request->role));
			$model->attachRole($role);
			return view('user/view', array('model' => $model));
		}
		else
			throw new \Exception('You haven`t permission for this action');
	}

	public function delete($id)
	{
		if(Auth::user()->can('delete-user'))
		{
			$model = User::find(intval($id));
			if ($model) {
				$model->delete();
				return 1;
			}
			else
				return false;
		}
		else
			throw new \Exception('You haven`t permission for this action');
	}

	private function getRoles()
	{
		return Role::all();
	}

	public function view($id)
	{
		$model = User::find(intval($id));
		return view('user/view', array('model' => $model));
	}
}
