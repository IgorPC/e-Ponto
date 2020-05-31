<?php

namespace App\Http\Controllers;

use App\Empresa;
use App\Http\Requests\EmpresaRequest;
use App\Ponto;
use App\User;
use App\Vinculo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmpresaController extends Controller
{
    private $empresa;

    public function __construct(Empresa $empresa)
    {
        $this>$this->empresa = $empresa;
    }

    public function index(Request $request)
    {
        $user = auth()->user();
        if($user->empresa_id == null){
            return redirect()->route('admin.home');
        }
        $empresa = $this->empresa->where('id', $user->empresa_id)->first();
        $sucesso = $request->session()->get('sucesso');
        $vinculos = DB::table('vinculos')
            ->whereRaw('empresa_id = ? and status = ?', [$empresa->id, 1])
            ->get();
        $colaboradores = User::where('empresa_id', $empresa->id)->get();
        return view('empresa.index', compact( 'empresa', 'user', 'sucesso', 'colaboradores', 'vinculos'));
    }

    public function create()
    {
        if(auth()->user()->verify_data == 0){
            return redirect()->route('admin.home');
        }
        return view('empresa.create');
    }

    public function store(EmpresaRequest $request)
    {
        $data = $request->all();
        $user = auth()->user();
        $empresa = $user->empresa()->create([
            'nome' => $data['nome'],
            'email' => $data['email'],
            'celular' => $data['celular'],
            'rua' => $data['rua'],
            'numero' => $data['numero'],
            'bairro' => $data['bairro'],
            'cidade' => $data['cidade'],
            'pais' => $data['pais'],
            'user_id' => $user->id
        ]);
        $vinculo = Vinculo::create([
            'user_id' => $user->id,
            'empresa_id' => $empresa->id,
            'status' => 3
        ]);
        $user->update([
            'empresa_id' => $empresa->id,
            'vinculo_id' => $vinculo->id
        ]);

        session()->flash('sucesso', 'A empresa foi cadastrada!');

        return redirect()->route('admin.empresa.index');
    }

    public function edit($id)
    {
        $empresa = $this->empresa->find($id);
        return view ('empresa.edit', compact('empresa'));
    }

    public function update(EmpresaRequest $request, $id)
    {
        $empresa = $this->empresa->find($id);
        $data = $request->all();
        $empresa->update($data);

        session()->flash('sucesso', 'A empresa foi editada!');

        return redirect()->route('admin.empresa.index');
    }

    public function destroy(Request $request, $id)
    {
        $empresa = $this->empresa->find($id);
        $users = User::where('empresa_id', $empresa->id)->get();
        $pontos = Ponto::where('empresa_id', $empresa->id)->get();
        $vinculos = Vinculo::where('empresa_id', $empresa->id)->get();
        foreach ($vinculos as $vinculo) {
            $vinculo->update([
                'status' => 4
            ]);
        }
        foreach ($users as $user){
            if($empresa->user_id != $user->id){
                $user->update([
                    'data_ponto' => null,
                    'empresa_id' => null,
                    'ponto_status' => null
                ]);
            }
        }
        foreach ($pontos as $ponto){
            $ponto->update([
                'status' => 2
            ]);
        }
        $empresa->update([
            'status' => 2
        ]);

        $request->session()->flash('sucesso', 'Empresa inativada com sucesso');

        return redirect()->back();
    }

    public function ativar(Request $request, $id)
    {
        $empresa = $this->empresa->find($id);
        $empresa->update([
            'status' => 1
        ]);

        $request->session()->flash('sucesso', 'Empresa ativada com sucesso');

        return redirect()->back();
    }

}
