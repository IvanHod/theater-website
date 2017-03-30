<?php

namespace App\Models;

class News extends AbstractModel
{
	public static function GetEntity()
	{
		return self::class;
	}

	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'news';
}