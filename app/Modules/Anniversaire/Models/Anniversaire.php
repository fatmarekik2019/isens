<?php

namespace App\Modules\Anniversaire\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Anniversaire extends Model {

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
    protected $table = 'isens_diffusers_livr';

    public function company()
    {
    	return $this->hasOne('App\Modules\Company\Models\Company','Id','Company_Id');
    }
}

