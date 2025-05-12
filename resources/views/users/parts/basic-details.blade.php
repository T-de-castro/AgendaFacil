<div class="card">
    <form action="{{Route('users.update', $user->id)}}" method="POST">
        @csrf
        @method('PUT')
    <div class="card-header">
        Dados Básicos
    </div>
    <div class="card-body">
        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" class="form-control @error('email') is-invalid @enderror" name="name" placeholder="Nome" value="{{old('name') ?? $user->name}}">
            @error('name')
            <div class="'invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email" value="{{old('email') ?? $user->email}}">
            @error('email')
            <div class="'invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Senha</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Senha">
            @error('password')
                <div>
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






