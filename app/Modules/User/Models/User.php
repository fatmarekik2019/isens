<?php

namespace App\Modules\User\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use App\Modules\UserGroup\Models\UserGroup;
use App\Modules\Company\Models\Company;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable {

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
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'display_name',
        'email',
        'Company_Id',
        'password',
        'Country',
        'City',     
        'date_registered',
        'group_Id',
        'Reseau_Id',
        'lastip',
        'avatar',
        'lastlogin',
        'temporary_password',
        'facebook_id',
        'type',
        'dolibarr_id',
        'language'
    ];


    public function group()
    {
       return $this->hasOne('App\Modules\UserGroup\Models\UserGroup','id','group_id');
    }

    public function company()
    {
       return $this->hasOne('App\Modules\Company\Models\Company','Id','Company_Id');
    }

}
