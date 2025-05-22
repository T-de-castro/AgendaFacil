<?php

namespace App\Http\Controllers;

use App\Services\ServicoService;
use Illuminate\Http\Request;

class ServicoController extends Controller
{
    protected $ServicoService;

    public function __construct(ServicoService $ServicoService)
    {
        $this->ServicoService = $ServicoService;
    }

    public function index()
    {
        $servico = $this->ServicoService->listar();
        return view('servicos.index', compact('servico'));
    }

    public function create(){
        return view('servicos.create');
    }

    public function store(Request $request){
        $servico =$request->validate([
            'descricao' => 'required',
            'preco' => 'required',
        ]);
        $servico = $this->ServicoService->criar($servico);
        return redirect(Route('servico.index'))
            ->with('status', 'Serviço adicionado com sucesso!');
    }
    
}
