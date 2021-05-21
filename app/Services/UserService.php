<?php

namespace App\Services;

use App\Models\User;

class UserService
{
    public function save($request, $id = null)
    {
        $user = $id ? User::find($id) : new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->sexo = $request->sexo;
        $user->idade = $request->idade;
       
        $user->save();

        return $user;
    }
}
