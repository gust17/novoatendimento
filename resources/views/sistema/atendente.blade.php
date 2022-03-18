@extends('padrao.padrao')


@section('content')
    <div class="container">
        <h3>Meus Setores</h3>
    </div>

    <div class="container">
        <div class="row">
            @forelse (Auth::user()->atendentes as $atendente)
                <div class="col-md-3">
                    <div class="panel text-center">
                        <div class="panel-heading">
                            <h3 class="panel-title">{{ $atendente->setor->name }}</h3>
                        </div>
                        <div class="panel-body">
                            <a href="{{ url('entrar/setor', $atendente->setor->id) }}"
                                class="btn btn-success btn-block">Selecionar Setor</a>
                        </div>
                    </div>
                </div>

            @empty
            @endforelse
        </div>
    </div>
@endsection
