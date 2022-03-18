@extends('padrao.padrao')

@section('content')
    <br><br>
    <div class="container">
        <div class="panel panel-success">

            <div class="panel-heading">
                <h3 class="panel-title"> Buscar Usuario</h3>
            </div>

            <div class="panel-body">
                <form action="{{ url('buscarcpf') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">CPF</label>
                        <input type="text" name="cpf" class="form-control">
                    </div>
                    <input type="hidden" name="setor_id" value="{{ $setor->id }}">
                    <div class="form-group">
                        <button class="bn btn-success btn-block">Pesquisar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
