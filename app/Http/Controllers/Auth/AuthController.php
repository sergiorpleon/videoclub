<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

use App\User as User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    //
    public function getLogin()
    {
        #return View::make('auth.login');
        return view('auth/login');
    }
    
    public function postLogin()
    {
        $userdata = array(
            'email' => Input::get('email'),
            'password' => Input::get('password')
        );
        if ( Auth::attempt($userdata) )
        {
            // Ya hemos iniciado sesión, vamos al inicio
            #return redirect()->action('CatalogController@getIndex');
            return Redirect::to('catalog');
        }
        else
        {
            // error de autentificación! Volvamos al login!
            return Redirect::to('auth/login')->with('login_errors', true);
            // Pasa las notificaciones de error que quieras
            // me gusta hacerlo así
        }
    }
    
    public function getLogout()
    {
        Auth::logout();
        return Redirect::to('auth/login');
    }
    
    public function getRegister()
    {
        return view('auth/register');
    }
    public function postRegister()
    {
        $user = new User;
        $user->name = Input::get('name');
        $user->email = Input::get('email');
        $user->password = bcrypt(Input::get('password'));
        $user->save();
        
        return Redirect::to('auth/login');
    }
    

}
