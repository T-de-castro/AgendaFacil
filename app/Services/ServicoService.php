<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class ServicoService
{
    protected $baseUrl = 'http://127.0.0.1:8001/api';

    public function listar()
    {
        $response = Http::get($this->baseUrl . '/servico');
        $data = $response->object();

        return $data;
    }

    public function buscarPorId($id)
    {
        $response = Http::get("{$this->baseUrl}/clientes/{$id}");
        return $response->json();
    }

    public function criar(array $dados)
    {
        $response = Http::post("{$this->baseUrl}/servico", $dados);
        return $response->object();
    }

    public function atualizar($id, array $dados)
    {
        $response = Http::put("{$this->baseUrl}/clientes/{$id}", $dados);
        return $response->object();
    }

    public function deletar($id)
    {
        $response = Http::delete("{$this->baseUrl}/clientes/{$id}");
        return $response->successful();
    }
}