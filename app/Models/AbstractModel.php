<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AbstractModel extends Model
{
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
		$entity = self::GetEntity();
		$model = new $entity;
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
}