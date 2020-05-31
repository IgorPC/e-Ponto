<h1 style="text-align: center">Relatorio de ponto</h1>
<hr>
<div style="text-align: center; font-size: 15px; font-weight: bold">
    <p>Colaborador: {{$user->name}}</p>
    <p>Empresa: {{$empresa->nome}}</p>
    <p>Periodo: {{$dataInicial->day.'/'.$dataInicial->month.'/'.$dataInicial->year}} até {{$dataFinal->day.'/'.$dataFinal->month.'/'.$dataFinal->year}}</p>
</div>
<hr>
<table style='border: solid 1px black; width: 100%; text-align: center'>
    <thead>
    <tr>
        <th style="border: solid 1px black">Data</th>
        <th style="border: solid 1px black">1º ponto</th>
        <th style="border: solid 1px black">2º ponto</th>
        <th style="border: solid 1px black">3º ponto</th>
        <th style="border: solid 1px black">4º ponto</th>
        <th style="border: solid 1px black">Total de horas</th>
    </tr>
    </thead>
    <tbody style="border: solid 1px black">
        @foreach($pontos as $ponto)
            <tr>
                @php
                    $point = \App\Ponto::find($ponto->id);
                @endphp
                <td style="border: solid 1px black">{{$point->data->day.'/'.$point->data->month.'/'.$point->data->year}}</td>
                <td style="border: solid 1px black">{{$point->primeira_entrada->hour.':'.$point->primeira_entrada->minute.':'.$point->primeira_entrada->second}}</td>
                <td style="border: solid 1px black">{{$point->primeira_saida->hour.':'.$point->primeira_saida->minute.':'.$point->primeira_saida->second}}</td>
                <td style="border: solid 1px black">{{$point->segunda_entrada->hour.':'.$point->segunda_entrada->minute.':'.$point->segunda_entrada->second}}</td>
                <td style="border: solid 1px black">{{$point->segunda_saida->hour.':'.$point->segunda_saida->minute.':'.$point->segunda_saida->second}}</td>
                <td style="border: solid 1px black">{{$point->horas_trabalhadas}}</td>
            </tr>
        @endforeach
    </tbody>
</table>
