<?php

namespace App\Modules\Pompe\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Modules\Pompe\Models\Etat;
use App\Modules\Pompe\Models\Pompe;

class Etat extends Model {

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
    protected $table = 'isens_etats';

    public function pompe()
   {
      return $this->hasMany('App\Modules\Pompe\Models\Pompe');
   }

}
