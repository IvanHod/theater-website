<?php

namespace App;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

use Illuminate\Support\Facades\Auth;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends \Eloquent implements Authenticatable
{
	use EntrustUserTrait;
	use AuthenticableTrait;

	public static function GetList($filters = array(), $count = 10)
	{
		$news = self::all();
		foreach ($filters as $key => $filter)
		{
			$news = $news->where($key, $filter);
		}
		$news->take($count);
		return $news;
	}

	public static function Create(array $fields)
	{
		$model = new User();
		foreach ($fields as $key => $field)
		{
			$model->$key = $field ? htmlspecialchars($field) : "";
		}
		$model->save();
		return $model->id;
	}

	public static function Edit($id, array $fields)
	{
		$model = self::find($id);
		foreach ($fields as $key => $field)
		{
			if($field)
			{
				$model->$key = htmlspecialchars($field);
			}
		}
		$model->save();
		return $model;
	}

	public static function isEditCollective($collectiveId)
	{
		$user = Auth::user();
		if($user)
		{
			$collective = \App\Models\Collective::find(intval($collectiveId));
			if($collective && ($user->id == $collective->creator || $user->hasRole('admin') ))
			{
				return true;
			}
		}
		return false;
	}
}
