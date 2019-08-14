<?php

namespace App\Modules\Diffuser\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Modules\Company\Models\Company;

class Diffuser extends Model {

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
    protected $table = 'isens_diffusers';

    public function company()
   {
      return $this->hasOne('App\Modules\Company\Models\Company','Id','Company_Id');
   }

}
