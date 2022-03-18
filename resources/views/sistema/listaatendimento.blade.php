@extends('padrao.padrao')
@section('content')
    <br>
    <div class="container">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">{{ $setor->name }}</h3>
            </div>
        </div>

        @foreach ($atendimentos as $atendimento)
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">{{ $atendimento->agenda->data_formated }} -
                        {{ $atendimento->agenda->hora }}</h3>
                </div>
                <div class="panel-body">
                    <p>Solicitante: <strong>{{ $atendimento->user->name }}</strong></p>
                    <p>{{ $atendimento->agenda->descricao }}</p>
                </div>
                <div class="panel-footer">
                    <div class="row">
                        <div class="col-md-6">
                            <a href="{{ url('atender', $atendimento->id) }}" class="btn btn-success btn-block">Atender</a>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ url('responder', $atendimento->id) }}"
                                class="btn btn-primary btn-block">Responder</a>
                        </div>

                    </div>
                </div>
            </div>
        @endforeach

    </div>
@endsection
