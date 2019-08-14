<?php

namespace App\Modules\Company\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use App\Modules\User\Models\User;
use App\Modules\Diffuser\Models\Diffuser;

class Company extends Model {

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
    protected $table = 'isens_company';

    public function users()
    {
       return $this->hasMany('App\Modules\User\Models\User','Company_Id','Id');
    }

     public function Diffuser()
    {
      return $this->hasMany('App\Modules\Diffuser\Models\Diffuser');
    }

}