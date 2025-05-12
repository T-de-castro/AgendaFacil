<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserProfile;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create() {
        return view('users.create');
    }

    public function store(Request $request) {
        $users =$request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        User::create($users);

        return back()
        //->Route('users.index')
            ->with('status', 'Usuário adicionado com sucesso!');
    }

    public function edit(User $user){
        //Vai buscar a relação profile no model User
        $user->load('profile');
        return view('users.edit', compact('user'));
    }

    public function update(User $user, Request $request){
        $users =$request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'exclude_if:password,null|min:6'
        ]);

        $user->fill($users);
        $user->save();

        return back()
            //->Route('users.edit', $user->id)
            ->with('status', 'Usuário editado com sucesso!');
    }

    public function updateProfile(User $user, Request $request){
        $users =$request->validate([
            'type' => 'required',
            'address' => 'nullable',
        ]);

        //Irá verificar se já existe um user_id, caso tenha irá atualizar, caso não tenha criar, com os dados do $request
        UserProfile::updateOrCreate([
            'user_id' => $user->id,
        ], [
            'type' => $request->type,
            'address' => $request->address
        ]);

        //Irá criar um novo registro toda vez
        //$user->profile()->create($request);

        return back()
            //->Route('users.edit', $user->id)
            ->with('status', 'Usuário editado com sucesso!');
    }

    public function updateInterests(User $user, Request $request){
        $users =$request->validate([
            'interests' => 'nullable|array'
        ]);

        $user->interests()->delete();

        if(!empty($users['interests'])){
            $user->interests()->createMany($users['interests']);
        }

        return back()
            ->with('status', 'Usuário deletado com sucesso!');
    }

    public function destroy(User $user){
        $user->delete();

        return back()
            ->with('status', 'Usuário deletado com sucesso!');
    }


}
