<?php

namespace App\Http\Controllers;

use App\Empresa;
use App\Ponto;
use App\User;
use App\Vinculo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VinculoController extends Controller
{
    private $vinculo;

    public function __construct(Vinculo $vinculo)
    {
        $this->vinculo = $vinculo;
    }

    public function index(Request $request)
    {
        $empresas = Empresa::where('status', '!=', 0)->OrderBy('status')->get();
        $sucesso = $request->session()->get('sucesso');
        $vinculos = $this->vinculo->where('user_id', auth()->user()->id)->OrderBy('status')->get();
        return view('vinculo.index', compact('empresas', 'vinculos', 'sucesso'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $user = User::find(auth()->user()->id);
        $empresa = Empresa::find($data['empresa']);
        $this->vinculo->create([
            'user_id' => $user->id,
            'empresa_id' => $empresa->id,
            'status' => 1
        ]);

        $request->session()->flash('sucesso', 'A solicitação foi enviada com sucesso');

        return redirect()->back();
    }

    public function show(Request $request, $id)
    {
        $sucesso = $request->session()->get('sucesso');
        $empresa = Empresa::find($id);
        $vinculos = $this->vinculo->where('empresa_id', $empresa->id)->OrderBy('status')->get();
        return view('vinculo.show', compact('empresa', 'vinculos', 'sucesso'));
    }

    public function aceitar(Request $request, $id)
    {
        $vinculo = $this->vinculo->find($id);
        $user = User::find($vinculo->user_id);
        $user->update([
            'empresa_id' => $vinculo->empresa_id,
            'vinculo_id'=> $vinculo->id
        ]);
        $vinculo->update([
            'status' => 3
        ]);

        $request->session()->flash('sucesso', 'O colaborador foi aceito com sucesso');

        return redirect()->back();
    }

    public function rejeitar(Request $request, $id)
    {
        $vinculo = $this->vinculo->find($id);
        $vinculo->update([
            'status' => 2
        ]);

        $request->session()->flash('sucesso', 'O colaborador foi rejeitado com sucesso');

        return redirect()->back();
    }

    public function finalizarVinculo(Request $request, $id)
    {
        $user = User::find($id);
        $vinculo = $this->vinculo->find($user->vinculo_id);
        $pontos = Ponto::where('user_id', $user->id)->get();
        foreach ($pontos as $ponto){
            $ponto->update([
                'status' => 2
            ]);
        }
        $vinculo->update([
            'status' => 4
        ]);
        $user->update([
            'data_ponto' => null,
            'empresa_id' => null,
            'ponto_status' => null
        ]);

        $request->session()->flash('sucesso', 'O colaborador foi rejeitado com sucesso');

        return redirect()->route('admin.empresa.index');
    }
}
