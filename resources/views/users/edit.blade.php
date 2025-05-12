@extends('layouts.layout')

@section('page-title', 'Editar Usuário')
@section('content')

    @session('status')
    <div class="alert alert-success" role="alert">
        {{$value}}
    </div>
    @endsession('status')

    @include('users.parts.basic-details')
    <br>
    @include('users.parts.interests')
    <br>
    @include('users.parts.profile')
@endsection

