<?php

namespace App;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends \Eloquent implements Authenticatable
{
	use EntrustUserTrait;
	use AuthenticableTrait;

}
