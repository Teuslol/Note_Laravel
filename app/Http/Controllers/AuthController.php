<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }



    public function loginSubmit(Request $request)
    {
        // form validation
        $request->validate(
            // rules
            [
                'text_username' => 'required|email',
                'text_password' => 'required|min:6|max:15'
            ],
            //errors massages
            [
                'text_username.required' => 'Preencha o campo de Email!',
                'text_username.email' => 'Preencha com um Email Válido!',
                'text_password.required' => 'Preencha o campo de Senha!',
                'text_password.min' => 'A senha deve ter no minimo :min caracteres!',
                'text_password.max' => 'A senha deve ter no maximo :max caracteres!'
            ]
        );
        // get user input
        $username = $request->input('text_username');
        $password = $request->input('text_password');

        //Chek if user exist

        $user = User::where('username', $username)->where('deleted_at', null)->first();

        if(!$user){
            return redirect()->back()->withInput()->with('loginError', 'Usuario ou Senha incorretos. ');

        }

        // check password
        if(!password_verify($password, $user->password)){
            return redirect()->back()->withInput()->with('loginError', 'Usuario ou Senha incorretos. ');

        }

        //update last login
        $user->last_login = date('Y-m-d H:i:s');
        $user->save();


        // login user logado
        session([
            'user' => [
                'id' => $user->id,
                'username' => $user->username
            ]
        ]);

        return redirect()->to('/');


        /* as an object instance of the models class
        $userModel = new user();
        $users = $userModel->all()->toArray();

        //get all the users from database
        $users = User::all()->toArray()   ;
        echo '<pre>';
        print_r($users); */

    }


    public function logout()
    {
        session()->forget('user');
        return redirect()->to('/login');
    }


}
