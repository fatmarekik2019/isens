<?php

namespace App\Modules\User\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\User\Models\User;
use App\Modules\Company\Models\Company;
use App\Modules\UserGroup\Models\UserGroup;
use App\Modules\Diffuser\Models\Diffuser;
use App\Providers\ShaHashServiceProvider;
use Carbon\Carbon;
use Validator;
use Auth;
use Session;
use Mail;
use Input;
use Yoeunes\Toastr\ToastrServiceProvider;
use Redirect;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    //partie FrontOffice


    public function showRegister()
    {
        return view("User::frontOffice.register");
    }

    public function handleUserLogin()
    {
        $data = Input::all();

        $rules = [
            'email' => 'required|email|regex:' . $this->EMAIL_REGEX,
            'password' => 'required',
        ];

        $messages = [
            'email.required' => 'L\'email est obligatoire',
            'password.required' => 'Le mot de passe est obligatoire',
            'email.email' => 'L\'email est invalide',
        ];

        $validation = Validator::make($data, $rules, $messages);

        if ($validation->fails())
        {
            return redirect()->back()->withErrors($validation->errors());
        }

        else
        {
            $credentials = [
                'email'    => $data['email'],
                'password' => $data['password'],
            ];
            if (Auth::attempt($credentials))
            {
                $user = Auth::user();
                User::where('email', '=', $data['email'])->update(
                    [
                        'lastlogin' => Carbon::now(),
                    ]);

                $admin = User::with('group')->with('company')->where('email', '=', $data['email'])->first();

                Session::put('admin',
                                [
                                    'id'              => $admin->id, 
                                    'email'           => $admin->email, 
                                    'name'            => $admin->display_name, 
                                    'country'         => $admin->Country, 
                                    'city'            => $admin->City,
                                    'date_registered' => $admin->date_registered,
                                    'group'           => $admin->group->admin, 
                                    'access_level'    => $admin->group->access_level, 
                                    'company'         => $admin->company->Name, 
                                ]);

                if (!empty($user->dolibarr_id))
                {
                    Session::put('dolibarr_id',  $admin->dolibarr_id);
                }

                if (!empty($user->avatar))
                {
                    Session::put('avatar',  $admin->avatar);
                } 
                else
                {
                    Session::put('avatar',  "no-avatar.png");
                }

                toastr()->success('Bienvenue!');
                return redirect(route('showHome'));
            }
            else
            {
                toastr()->warning('Vérifiez votre email et mot de passe !');
                return redirect(route('showHome'));
            }
        }
         
    }


    public function handleLogout()
    {
        Auth::logout();
        return redirect(route('showHome'));
    }

    public function handleCreateUser()
    {
  
        $data = Input::all();
        
        $rules = [
            'display_name' => 'required|min:5',
            'email'        => 'required|email|unique:users|regex:' . $this->EMAIL_REGEX,
            'Enseigne'     => 'required',
            'Country'      => 'required',
            'password'     => 'required|min:6|regex:' . $this->PASSWORD_REGEX,
            'Serial'       => 'required',
            'City'         => 'required',
            ];

        $messages = [
            'display_name.required' => 'Votre nom est obligatoire',
            'display_name.min'      => 'Votre nom doit dépasser 5 caractères',
            'email.required'        => 'L\'email est obligatoire',
            'email.email'           => 'L\'email est invalide',
            'email.regex'           => 'L\'email est invalide',
            'password.required'     => 'Le mot de passe est obligatoire',
            'password.min'          => 'Le mot de passe doit dépasser 6 caractères',
            'password.regex'        => 'Minimum un chiffre et un caractère spécial pour le mot de passe',
            'Enseigne'              => 'Veuillez saisir le nom de votre enseigne',
            'Country'               => 'Veuillez saisir le nom de votre pays',
            'Serial'                => 'Le numéro de serie du diffuseur est obligatoire',
            'City'                  => 'Veuillez saisir le nom de votre ville',
        ];

        $validation = Validator::make($data, $rules, $messages);

        if ($validation->fails()) 
        {
            return redirect()->back()->withErrors($validation->errors());
        }
        //entamer l'inscription
        else
        {
            //test si l'utilisateur existe (!!!remplacé par une rule au dessus!!!)
            // $user = User::where('email', '=', $data['email'])->first();
            // if ($user) 
            // {
            //     return redirect()->back()->withErrors($validation->errors());
            //     toastr()->info('Votre email existe déjà !');
            //     return redirect(route('showHome'));
            // }
            
            //test si la companie et le diffuseur qui lui est affecté existent
            $diffuser = Diffuser::where('User_Id', '=',0)->where('Num_serie','=',$data['Serial'])->first();
            $company  = Company::where('Name','=',$data['Enseigne'])->first();
            if($diffuser->Id > 0 && $company->Id > 0 && ($diffuser->Company_Id == $company->Id || $diffuser->Reseau_Id == $company->Id))    
            {
                $user = User::create(
                    [
                        'display_name'      => $data['display_name'],
                        'email'             => $data['email'],
                        'Company_Id'        => $company->Id,
                        'password'          => sha1($data['password']),
                        'Country'           => $data['Country'],
                        'City'              => $data['City'],
                        'date_registered'   => Carbon::now(),
                        'group_Id'          => 2,
                        'Reseau_Id'         => $diffuser->Reseau_Id,
                        'lastlogin'         => Carbon::now(),
                        'lastip'            =>'127.0.0.1',
                        'avatar'            => 'gggg',
                        'temporary_password'=>'da39a3ee5e6b4b0d3255bfef95601890afd80709',
                        'facebook_id'       =>'0',
                        'type'              =>'core',
                        'dolibarr_id'       => NULL,
                        'language'          => $data['language'],
                    ]
                );
                //affectation de user_id au diffuseur
                Diffuser::where('Num_serie', '=', $data['Serial'])->update(
                    [
                        'User_Id' => $user->id,
                    ]);

                toastr()->info('User has been created!');

                $data_mail = array('email'=> $data['email'],'display_name'=> $data['display_name'],'password' => $data['password']);
                if($data['language']=="fr")
                {
                    Mail::send("User::mail.confirm_mail.confirm_fr", ['data_mail'=>$data_mail], function($message) use ($data_mail, $data)
                     {
                         $message->to($data['email'])->subject('Insciption réussie');
                     });
                }
                elseif($data['language']=="en")
                {
                    Mail::send("User::mail.confirm_mail.confirm_en", ['data_mail'=>$data_mail], function($message) use ($data_mail, $data)
                     {
                         $message->to($data['email'])->subject('Registration Success');
                     });
                }
                elseif($data['language']=="esp")
                {
                    Mail::send("User::mail.confirm_mail.confirm_esp", ['data_mail'=>$data_mail], function($message) use ($data_mail, $data)
                     {
                         $message->to($data['email'])->subject('Registración exitosa');
                     });
                }
            }
            else
            {
                toastr()->info('Veuillez verifier vos données');
                return back();
            }
        }
    }
    public function showChangePassword()
    {
        return view('User::frontOffice.changePassword');
    }
    public function handleChangePassword()
    {
        $data = Input::all();
        $rules = [
            'old_password'  => 'required',
            'new_password_1'=> 'required|min:6|regex:' . $this->PASSWORD_REGEX,
            'new_password_2'=> 'required|min:6|regex:' . $this->PASSWORD_REGEX,
        ];

        $messages = [
            'old_password.required'       => 'Veuillez confirmer votre mot de passe actuel',
            'new_password_1.required'     => 'Le mot de passe est obligatoire',
            'new_password_1.min'          => 'Le mot de passe doit dépasser 6 caractères',
            'new_password_1.regex'        => 'Minimum un chiffre et un caractère spécial pour le mot de passe',
            'new_password_2.required'     => 'Veuillez confirmer votre mot de passe',
            'new_password_2.min'          => 'La confirmation du mot de passe doit dépasser 6 caractères',
            'new_password_2.regex'        => 'Minimum un chiffre et un caractère spécial pour la confirmation du mot de passe',
        ];

        $validation = Validator::make($data, $rules, $messages);

        if ($validation->fails()) 
        {
            return redirect()->back()->withErrors($validation->errors());
        }

        if (sha1($data['old_password']) != Auth::user()->password)
        { 
            return redirect()->back()->withErrors('Mot de passe actuel incorrect');
        }
        else
        {
            if ($data['new_password_1']==$data['new_password_2'])
            {
                $user = Auth::user();
                $user->password = sha1($data['new_password_1']);
                $user->save();
                toastr()->info('Mot de passe modifié avec succès');
                return redirect(route('showHome'));
            }
            else
            {
                return redirect()->back()->withErrors('Veuillez confirmer votre mot de passe');
            }
        }
    }

    public function showLostPassword()
    {
        if (Auth::user()) 
        {
            toastr()->warning('Vous êtes déjà connecté !');
            return redirect(route('showHome'));
        }
        return view("User::frontOffice.retrievePassword");
    }

    public function handleLostPassword()
    {
        if (Auth::user()) {
            toastr()->warning('Vous êtes déjà connecté !');
            return redirect(route('showHome'));
        }

        $data = Input::all();

        $rules = [
            'email' => 'required|email|regex:' . $this->EMAIL_REGEX,
        ];

        $messages = [
            'email.required' => 'L\'email est obligatoire',
            'email.email' => 'L\'email est invalide',
            'email.regex' => 'L\'email est invalide',
        ];

        $validation = Validator::make($data, $rules, $messages);

        if ($validation->fails()) 
        {
            return redirect()->back()->withErrors($validation->errors());
        }

        $user = User::where('email', '=', $data['email'])->first();

        if ($user) {

            $resetURL = route('handleResetPassword',
                ['email' => base64_encode(base64_encode(base64_encode($user->email))),
                    'timestamp' => now()->timestamp]);

            $content = ['display_name' => $user->display_name, 'resetURL' => $resetURL];

            Mail::send('User::mail.lostPassword', $content, function ($message) use ($user) {
                $message->to($user->email, $user->display_name);
                $message->subject('Restauration de Mot de Passe');
            });
            if(count(Mail::failures()) > 0 ) {
                toastr()->warning('L\'envoi des mails a échoué, contactez le support');
            }

            toastr()->info($message = 'Oops', $title = 'Un email contenant un lien de ré-initialisation du mot de passe vous a été envoyé !', $options = []);
            return redirect(route('showHome'));
        } else {
            toastr()->warning($message = 'Oops', $title = 'Aucun utilisateur trouvé !', $options = []);
            return back();
        }
    }

    public function handleResetPassword($email, $timestamp)
    {
        if (Auth::user()) {
            toastr()->warning('Vous êtes déjà connecté !');
            return redirect(route('showHome'));
        }

        $realEmail = base64_decode(base64_decode(base64_decode($email)));

        $user = User::where('email', '=', $realEmail)->first();

        if (Carbon::createFromTimestamp($timestamp)->format('Y-m-d H:i') < now()->subDays(2)->format('Y-m-d H:i')) {
            toastr()->warning('Le code de réinitialisation n\'est plus valide');
            return redirect(route('showHome'));
        }
        if ($user) {
            $newPassword = str_random(10);
            $user->password = sha1($newPassword);
            $user->save();

            $content = ['display_name' => $user->display_name, 'password' => $newPassword];

            Mail::send('User::mail.resetPassword', $content, function ($message) use ($user) {
                $message->to($user->email, $user->display_name);
                $message->subject('Nouveau Mot de Passe');
            });

            if(count(Mail::failures()) > 0 ) {
                toastr()->warning('L\'envoi des mails a échoué, contactez le support');
            }

            toastr()->info('Un email contenant un lien de ré-initialisation du mot de passe vous a été envoyé !');
            return redirect(route('showHome'));
        } else {
            toastr()->warning('Aucun utilisateur trouvé !');
            return back();
        }
    }

    //partie BackOffice

    public function showAdminHome()
    {
        return view('User::backOffice.adminHome');
    }

    public function showAccount()
    {
        return view('User::backOffice.account');
    }

    public function showAddUser()
    { 
        $company = Company::all();
        return view('User::backOffice.addUser' , ['company'=> $company]);
    }
     public function showUser()
    { 
        $users = User::all();

        return view('User::backOffice.resumeUser' , ['users'=> $users]);
    }
      public function showAssociation()
    { 
        $users = User::all();
        $diffusers =Diffuser::all();
        return view('User::backOffice.association' , ['users'=> $users , 'diffusers'=> $diffusers] );
    }
}


