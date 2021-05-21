<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Services\UserService;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return response()->json($users);
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required',
            'sexo' => 'required|max:1',
            'idade' => 'required',
        ]);

        $userService = new UserService();
        $user = $userService->save($request);

        return response()->json($user);
    }

    public function show($id)
    {
        $user = User::find($id);

        return response()->json($user);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required',
            'sexo' => 'required|max:1',
            'idade' => 'required',
        ]);

        $userService = new UserService();
        $user = $userService->save($request, $id);

        return response()->json($user);
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return response()->json('Usuário removido com sucesso!');
    }
}
