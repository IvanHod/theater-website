<?php

namespace App\Models;

class Collective extends AbstractModel
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
	protected $table = 'collectives';
}