<div class="card">

    <form action="{{Route('users.updateInterests', $user->id)}}" method="POST">
        @csrf
        @method('PUT')

    <div class="card-header">
        Interesses
    </div>

    <div class="card-body">
        @foreach (['Futebol', 'Futsal', 'Kings League'] as $item)
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="{{$item}}" name="interests[name]">
                <label class="form-check-label @error('interests') is-invalid @enderror">
                {{$item}}
                </label>

                @if($loop->last)
                    @error('interests')
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






