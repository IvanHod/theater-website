<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Festival extends Model
{
	public static function GetList($filters = array(), $count = 10)
	{
		$festivals = self::all();
		foreach ($filters as $key => $filter)
		{
			$festivals = $festivals->where($key, $filter);
		}
		$festivals->take($count);
		return $festivals;
	}

	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'festivals';
}