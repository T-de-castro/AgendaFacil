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

<form action="{{Route('users.index')}}" method="GET" class="mb-3">
<div class="input-group input-group-sm">
    <input type="text" name="keyword" placeholder="Pesquise por Nome ou E-mail" class="form-control" value="{{request()?->keyword}}">
    <button class="btn btn-primary" type="submit">Pesquisar</button>
</div>
</form>

<table class="table">
    <colgroup>
        <col style="width: 5%">
        <col style="width: 40%">
        <col style="width: 35%">
        <col style="width: 20%">
    </colgroup>
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
                <div class="d-flex gap-1">
                    <a href="{{route('users.edit', $user->id) }}" class="btn btn-primary btn-sm">Editar</a>
                    @can('destroy', \App\Models\User::class)
                    <form action="{{route('users.destroy', $user->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">Excluir</button>
                    <button class="btn btn-warning btn-sm">Status</button>

                    </form>
                </div>
                @endcan
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>

  {{$users->links()}}
@endsection
