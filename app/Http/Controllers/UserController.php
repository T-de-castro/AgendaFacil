<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserProfile;
use App\Models\Role;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request){
        $users = User::query();
        $users->when($request->keyword, function($query, $keyword) {
            $query->where(function($q) use($keyword){
                $q->where('name', 'ilike', '%' .$keyword .'%')
                ->orWhere('email', 'ilike', '%' .$keyword .'%');
            });
        });

        $users = $users->orderBy('name')->paginate(2);
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

        return redirect(Route('users.index', $user->id))
        //->Route('users.index')
            ->with('status', 'Usuário adicionado com sucesso!');
    }

    public function edit(User $user){
        //Gate::authorize('edit', User::class);
        //Vai buscar a relação profile no model User
        $user->load(['profile', 'interests']);
        $roles = Role::all();
        return view('users.edit', compact('user', 'roles'));

        return redirect(Route('users.index', $user->id))
            //->Route('users.edit', $user->id)
            ->with('status', 'Usuário editado com sucesso!');
    }

    public function update(User $user, Request $request){
        //Gate::authorize('edit', User::class);
        $users =$request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'exclude_if:password,null|min:6'
        ]);

        $user->fill($users);
        $user->save();

        return redirect(Route('users.index', $user->id))
            //->Route('users.edit', $user->id)
            ->with('status', 'Usuário editado com sucesso!');
    }

    public function updateProfile(User $user, Request $request){
        //Gate::authorize('edit', User::class);
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

        return redirect(Route('users.index', $user->id))
            //->Route('users.edit', $user->id)
            ->with('status', 'Usuário editado com sucesso!');
    }

    public function updateInterests(User $user, Request $request){
        //Gate::authorize('edit', User::class);
        $users =$request->validate([
            'interests' => 'nullable|array'
        ]);

        $user->interests()->delete();

        if(!empty($users['interests'])){
            $user->interests()->createMany($users['interests']);
        }

        return redirect(Route('users.index', $user->id))
            ->with('status', 'Usuário editado com sucesso!');
    }

    public function updateRoles(User $user, Request $request){
        //Gate::authorize('edit', User::class);
        $users =$request->validate([
            'roles' => 'required|array'
        ]);

        // No Model User, pegamos a relação roles e usamos o método attach para relacionar as duas tabelas
        //Alterando o attach para sync, ele deleta tudo da tabela e registra novamente, para evitar duplicidades
        $user->roles()->sync($users['roles']);

        return redirect(Route('users.index', $user->id))
            ->with('status', 'Usuário editado com sucesso!');
    }

    public function destroy(User $user){
        Gate::authorize('destroy', User::class);
        $user->delete();

        return redirect(Route('users.index', $user->id))
            ->with('status', 'Usuário deletado com sucesso!');
    }


}
