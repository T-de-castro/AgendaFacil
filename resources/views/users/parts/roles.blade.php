<div class="card">

    <form action="{{Route('users.updateRoles', $user->id)}}" method="POST">
        @csrf
        @method('PUT')

    <div class="card-header">
        Cargos
    </div>

    <div class="card-body">
        @foreach ($roles as $role)
            <div class="form-check">
                <input
                    class="form-check-input @error('roles') is-invalid @enderror"
                    type="checkbox"
                    value="{{$role->id}}"
                    name="roles[]"
                    @checked(in_array($role->name, $user->roles->pluck('name')->toArray()))
                >
                <label class="form-check-label">
                {{$role->name}}
                </label>

                @if($loop->last)
                    @error('roles')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                @endif
            </div>
        @endforeach
    </div>

    <div class="card-footer">
        <a href="{{route('users.index')}}" class="btn btn-secondary">Voltar</a>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </div>

    </form>
</div>





