<?php

namespace App\Http\Controllers;

use App\Ponto;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use function Sodium\add;

class PontoController extends Controller
{
    private $ponto;

    public function __construct(Ponto $ponto)
    {
        $this->ponto = $ponto;
    }

    public function index(Request $request)
    {
        $user = User::find(auth()->user()->id);
        $sucesso = $request->session()->get('sucesso');
        $aviso = $request->session()->get('aviso');
        $pontos = $this->ponto->where('user_id', $user->id)->orderBy('data', 'desc')->get();
        return view('ponto.index', compact('user', 'pontos', 'sucesso', 'aviso'));
    }

    public function store(Request $request)
    {
        $user = User::find(auth()->user()->id);
        date_default_timezone_set('America/Sao_Paulo');
        Carbon::setLocale('pt-br');

        if($user->ponto_status == null || $user->ponto_status == 0){
            if($user->data_ponto != null) {
                $now = new Carbon('now');
                $userData = new Carbon($user->data_ponto);
                $today = $now->year . $now->month . $now->day;
                $userDay = $userData->year . $userData->month . $userData->day;
                if ($userDay == $today) {
                    $request->session()->flash('aviso', 'Você ja finalizou os 4 pontos do dia');
                    return redirect()->route('admin.ponto.index', ['id' => $user->id]);
                }
            }
        }

        if(is_null($user->ponto_status) || $user->ponto_status == 0){
            $user->update([
                'ponto_status' => 1,
                'data_ponto' => $data = date('Y-m-d')
            ]);
        }
        $ponto = $user->pontos()->create([
            'user_id' => $user->id,
            'empresa_id' => $user->empresa_id,
            'data' => $data = new Carbon('now'),
            'primeira_entrada' => $entrada = new Carbon('now')
        ]);
        $user->update([
            'ponto_id' => $ponto->id
        ]);

        $request->session()->flash('sucesso', 'Ponto registrado com sucesso');

        return redirect()->route('admin.ponto.index', ['id' => $user->id]);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        date_default_timezone_set('America/Sao_Paulo');
        Carbon::setLocale('pt-br');
        if($user->ponto_status === 1){
            $user->update([
                'ponto_status' => 2
            ]);
            $ponto = Ponto::find($user->ponto_id);
            $ponto->update([
                'primeira_saida' => $date = new Carbon('now')
            ]);
        }
        elseif ($user->ponto_status == 2){
            $user->update([
                'ponto_status' => 3
            ]);
            $ponto = Ponto::find($user->ponto_id);
            $ponto->update([
                'segunda_entrada' => $date = new Carbon('now')
            ]);
        }
        elseif ($user->ponto_status == 3){
            $ponto = Ponto::find($user->ponto_id);
            \Illuminate\Support\Carbon::setLocale('pt-BR');
            $date = new Carbon('now');
            $horas = $date->diffAsCarbonInterval($ponto->primeira_entrada);

            $ponto->update([
                'segunda_saida' => $date,
                'horas_trabalhadas' => $horas->forHumans()
            ]);
            $user->update([
                'ponto_status' => 0
            ]);
        }

        $request->session()->flash('sucesso', 'Ponto registrado com sucesso');

        return redirect()->route('admin.ponto.index', ['id' => $user->id]);
    }
}
