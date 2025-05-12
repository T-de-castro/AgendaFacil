<div class="card">

    <form action="{{Route('users.updateProfile', $user->id)}}" method="POST">
        @csrf
        @method('PUT')
    <div class="card-header">
        Perfil
    </div>
    <div class="card-body">
        <div class="mb-3">
            <label for="type" class="form-label">Tipo de Pessoa</label>
            <select name="type" id="type" class="form-control @error('type') is-invalid @enderror">
                @foreach(['PJ', 'PF'] as $type)
                    <option value="{{$type}}" @selected(old('type') === $type || $user?->profile?->type === $type)>
                        {{$type}}
                    </option>
                @endforeach
            </select>
            @error('type')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Endereço</label>
            <input type="address" class="form-control @error('address') is-invalid @enderror" name="address" placeholder="Endereço" value="{{old('address') ?? $user?->profile?->address}}">
            @error('address')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
    </div>
    <div class="card-footer">
        <a href="{{route('users.index')}}" class="btn btn-secondary">Voltar</a>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </div>
    </form>
</div>






