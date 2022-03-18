@extends('padrao.padrao')


@section('content')
    <br>
    <div class="container">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Dados para Agendamento</h3>
            </div>
            <div class="panel-body">
                <p>Usuario: {{$usuario->name}}</p>
                <p>CPF: {{$usuario->cpf}}</p>
                <p>Setor: {{$setor->name}}</p>
            </div>
            <div class="panel-footer">
                <form action="{{url('recepcao/geraratendimento')}}" method="POST">
                    @csrf
                    <input type="hidden" name="user_id" value="{{$usuario->id}}">
                    <input type="hidden" name="setor_id" value="{{$setor->id}}">
                    <button class="btn btn-success">Gerar Atendimento</button>
                </form>

            </div>
        </div>

    </div>
@endsection
