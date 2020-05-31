<?php

namespace App\Http\Controllers;

use App\Empresa;
use App\Ponto;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mpdf\Mpdf;

class RelatorioController extends Controller
{
    public function index($id)
    {
        $users = User::where('empresa_id', $id)->get();
        return view('relatorios.index', compact('users'));
    }

    public function relatorioAll(Request $request, $id)
    {
        $data = $request->all();
        $empresa = Empresa::find($id);
        $dataInicial = new Carbon($data['inicial']);
        $dataFinal = new Carbon($data['final']);
        $dataFinal->addHours(23);
        $pontos = DB::table('pontos')
            ->whereRaw('empresa_id = ? and data >= ? and data <= ? and status = ?', [$id, $dataInicial, $dataFinal, 1])
            ->orderBy('user_id')
            ->get();
        $mpdf = new Mpdf();
        $html = view('relatorios.all', compact('pontos', 'empresa', 'dataInicial', 'dataFinal'));
        $mpdf->WriteHTML($html);
        $mpdf->Output('Relatorio todos os colaboradores.pdf', "D");
        return redirect()->back();
    }

    public function relatorioSelect(Request $request)
    {
        $data = $request->all();
        $user = User::find($data['user']);
        $empresa = Empresa::find($user->empresa_id);
        $dataInicial = new Carbon($data['inicial']);
        $dataFinal = new Carbon($data['final']);
        $dataFinal->addHours(23);
        $pontos = DB::table('pontos')
            ->whereRaw('user_id = ? and data >= ? and data <= ? and status = ?', [$user->id, $dataInicial, $dataFinal, 1])
            ->orderBy('data', 'desc')
            ->get();
        $mpdf = new Mpdf();
        $html = view('relatorios.select', compact('pontos', 'user', 'empresa', 'dataInicial', 'dataFinal'));
        $mpdf->WriteHTML($html);
        $mpdf->Output('Relatorio '.$user->name.'.pdf', "D");
        return redirect()->back();
    }
}
