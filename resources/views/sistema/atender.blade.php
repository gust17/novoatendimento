@extends('padrao.padrao')

@section('content')
    <br>
    <div class="container">
        <div class="panel">
            <div class="panel-heading">{{ $atendimento->user->name }}</div>
            <div class="panel-body">
                {{ $atendimento->descricao }}
            </div>
            <div class="panel-footer">
                <form action="{{ url('status/atendimento') }}" method="post">

                    @csrf
                    <div class="form-group">
                        <input type="hidden" name="atendimento_id" value="{{ $atendimento->id }}">
                        <label for="">Status Atendimento</label>
                        <select name="status" class="form-control" id="">
                            <option value="1">Atendido</option>
                            <option value="2">Não Compareceu</option>
                        </select>
                    </div>
                    <div class="form-group">

                        <button class="btn btn-success btn-block">Cadastrar </button>
                    </div>
                </form>
            </div>
        </div>


    </div>
@endsection
