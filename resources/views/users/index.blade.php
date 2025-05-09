@extends('layouts.layout')

@section('page-actions')
    <a href="{{Route('users.create')}}" class="btn btn-primary">Adicionar</a>
@endsection

@section('page-title', 'Usuários')
@section('content')

@session('status')
    <div class="alert alert-success" role="alert">
        {{$value}}
    </div>
@endsession('status')

<table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Nome</th>
        <th scope="col">Email</th>
        <th scope="col">Ação</th>
      </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <th scope="row">{{$user->id}}</th>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>
                <a href="{{route('users.edit', $user->id) }}" class="btn btn-primary btn-sm">Editar</a>
                <form action="{{route('users.destroy', $user->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">Excluir</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
@endsection
