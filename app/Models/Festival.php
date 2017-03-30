<?php

namespace App\Models;

class Festival extends AbstractModel
{

	public static function GetEntity()
	{
		return Festival::class;
	}

	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'festivals';
}