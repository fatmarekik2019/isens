<?php

namespace App\Modules\Pompe\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Modules\Pompe\Models\Pompe;
use App\Modules\Pompe\Models\Etat;

class Pompe extends Model {

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
    protected $table = 'isens_pumps';

    public function diffuser()
   {
      return $this->hasOne('App\Modules\Diffuser\Models\Diffuser','Id','Diffuser_Id');
   }
   public function etat()
   {
      return $this->hasOne('App\Modules\Pompe\Models\Etat','Id','Etat');
   }

}
