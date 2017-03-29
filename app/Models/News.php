<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
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
		$new = new self();
		$new->name = $fields["name"] ? htmlspecialchars($fields["name"]) : "";
		$new->picture = $fields["picture"] ? htmlspecialchars($fields["picture"]) : "";
		$new->description = $fields["description"] ? htmlspecialchars($fields["description"]) : "";
		$new->save();
		return $new->id;
	}

	public static function Edit($id, array $fields)
	{
		$new = self::find($id);
		if($fields["name"])
		{
			$new->name = htmlspecialchars($fields["name"]);
		}
		if($fields["picture"])
		{
			$new->picture = htmlspecialchars($fields["picture"]);
		}
		if($fields["description"])
		{
			$new->description = htmlspecialchars($fields["description"]);
		}
		$new->save();
		return $new;
	}


	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'news';
}