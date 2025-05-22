@extends('layouts.layout')

@section('page-title', 'Adicionar Serviço')
@section('content')
    <form action="{{Route('servico.store')}}" method="POST">
        @csrf
    <div class="mb-3">
        <label for="descricao" class="form-label">Descrição</label>
        <input type="text" class="form-control @error('descricao') is-invalid @enderror" name="descricao" placeholder="Descrição" value="{{old('descricao')}}">
        @error('descricao')
        <div class="'invalid-feedback">
            {{$message}}
        </div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="preco" class="form-label">Preço</label>
        <input type="text" class="form-control @error('preco') is-invalid @enderror" name="preco" placeholder="Preço" value="{{old('preco')}}">
        @error('preco')
        <div class="'invalid-feedback">
            {{$message}}
        </div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>
@endsection

