<?php

namespace App\Modules\UserGroup\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use App\Modules\User\Models\User;

class UserGroup extends Model {

	use Notifiable;

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users_groups';

    public function users()
	{
       return $this->hasMany('App\Modules\User\Models\User','group_id','id');
 	}

}
