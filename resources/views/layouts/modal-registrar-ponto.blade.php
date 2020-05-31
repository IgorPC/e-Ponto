@php
    $empresa = \App\Empresa::where('id', auth()->user()->empresa_id)->first();
@endphp
<!-- MODAL REGISTRAR PONTO -->
<div class="modal fade" id="modalPonto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Registrar Ponto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <ul class="list-group text-center mb-3">
                    <li class="list-group-item"><strong>{{$empresa->nome}}</strong></li>
                    <li class="list-group-item"><strong>{{auth()->user()->name}}</strong></li>
                </ul>
            </div>
            <div class="modal-footer">
                @if(auth()->user()->ponto_status == 0 || is_null(auth()->user()->ponto_status))
                    <a href="{{route('admin.ponto.store')}}" type="button" class="btn btn-primary">Registrar Ponto</a>
                @else
                    <a href="{{route('admin.ponto.update', ['id' => auth()->user()->id])}}" type="button" class="btn btn-primary">Registrar Ponto</a>
                @endif
            </div>
        </div>
    </div>
</div><?php
