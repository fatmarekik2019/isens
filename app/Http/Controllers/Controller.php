<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Session;
use App;
use Config;
use App\Modules\User\Models\User;
use Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $EMAIL_REGEX = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
    protected $PASSWORD_REGEX = '/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\X])(?=.*[^a-zA-Z0-9]).*$/';
    
    public function changeLanguage($lang)
    {
    	Session::put('language', $lang);

    	if(Auth::user())
    	{
    		User::where('id', '=', Auth::User()->id)->update(
                   [
                       'language' => $lang,
                   ]);
    	}

    	return back();
    }


}
