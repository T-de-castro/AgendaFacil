@extends('layouts/auth')

@section('body-class', 'login-page')

@section('content')

<div class="login-box" style="width: 30%">
    <div class="login-logo">
      <a href="/login"><b>Admin</b>LTE</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Faça login para iniciar a Sessão</p>

        @session('status')
        <div class="alert alert-success" role="alert">
            {{$value}}
        </div>
        @endsession('status')

        <form action="{{route('login')}}" method="post">
            @csrf
          <div class="input-group mb-3">
            <div class="input-group-text"><span class="bi bi-envelope"></span></div>
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" value="{{ old('email') }}" />
            @error('email')
               <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="input-group mb-3">
            <div class="input-group-text"><span class="bi bi-lock-fill"></span></div>
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" />
            @error('password')
               <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

              <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">Login</button>
              </div>

        </form>
        <div class="mt-2 text-center">
            <p class="mb-1">
                <a href="/forgot-password">Esqueci a senha</a>
            </p>
            <p class="mb-0">
                <a href="/register" class="text-center"> Não tenho cadastro </a>
            </p>
        </div>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>

@endsection
