@extends('layouts.layout')

@section('page-title', 'Adicionar Usuário')
@section('content')
    <form action="{{Route('users.store')}}" method="POST">
        @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Nome</label>
        <input type="text" class="form-control @error('email') is-invalid @enderror" name="name" placeholder="Nome" value="{{old('name')}}">
        @error('name')
        <div class="'invalid-feedback">
            {{$message}}
        </div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email" value="{{old('email')}}">
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
    <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>
@endsection

