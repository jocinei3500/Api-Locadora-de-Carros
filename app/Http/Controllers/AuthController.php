<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Nette\Utils\Json;

class AuthController extends Controller
{
    public function login(Request $request)
    {


        //retornar um JWT Json Web Token
        $credentials = $request->all('email', 'password');

        //autenticação(email e senha)
        $token = auth('api')->attempt($credentials);
        if($token){
            return response()->json(['token'=>$token],200);
        }else{
            return response()->json(['erro'=>'Usuário ou senha incorreto/s'],403);

        }
    }

    public function logout()
    {
        return 'logout';
    }

    public function refresh()
    {
        return 'refresh';
    }

    public function me()
    {
        return 'me';
    }
}
