@extends('layouts/auth')

@section('body-class', 'register-page')

@section('content')

<div class="register-box" style="width: 30% ">
    <!-- /.register-logo -->
    <div class="card card-outline card-primary">
      <div class="card-header">
          <h1 class="mb-0 text-center"><b>Admin</b>LTE</h1>
      </div>
      <div class="card-body register-card-body">
        <p class="register-box-msg">Redefina sua senha</p>

        <form action="{{route('password.update')}}" method="POST">
            @csrf
            <input type="hidden" name="token" value="{{(request()->token)}}">
          <div class="input-group mb-1">
            <div class="input-group-text"><span class="bi bi-envelope"></span></div>
            <div class="form-floating">
              <input id="registerEmail" name="email" type="email" value="{{(request()->email)}}" class="form-control @error('email') is-invalid @enderror" placeholder="" />
              @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
              <label for="registerEmail">E-mail</label>
            </div>
          </div>
          <div class="input-group mb-1">
            <div class="input-group-text"><span class="bi bi-lock-fill"></span></div>
            <div class="form-floating">
              <input id="registerPassword" name="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="" />
              @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
              <label for="registerPassword">Senha</label>
            </div>
          </div>
          <div class="input-group mb-1">
            <div class="input-group-text"><span class="bi bi-lock-fill"></span></div>
            <div class="form-floating">
              <input id="confirmedPassword" name="password_confirmation" type="password" class="form-control" placeholder="" />
              <label for="confirmedPassword">Confirmação da Senha</label>
            </div>
          </div>
          <!--begin::Row-->
          <div class="row">
            <!-- /.col -->

              <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">Alterar a senha</button>
              </div>
            <!-- /.col -->
          </div>
          <!--end::Row-->
        </form>
        <p class="mb-0 text-center">
          <a href="/login" class="link-primary text-center"> Voltar para o Login </a>
        </p>
      </div>
      <!-- /.register-card-body -->
    </div>
  </div>

  @endsection
