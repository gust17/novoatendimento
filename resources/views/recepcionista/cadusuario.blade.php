@extends('padrao.padrao')


@section('content')
    <br>
    <br>
    <div class="container">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Cadastro Usuario</h3>
            </div>
            <div class="panel-body">

                <form action="{{ url('recepcao/caduser') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="">Nome</label>
                        <input class="form-control" type="text" name="name" id="">
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input class="form-control" type="email" name="email" id="">
                    </div>
                    <div class="form-group">
                        <label for="">RG</label>
                        <input class="form-control" type="text" name="rg" id="">
                    </div>
                    <div class="form-group">
                        <label for="">CPF</label>
                        <input class="form-control" type="text" name="cpf" id="">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success">Cadastar Usuario</button>
                    </div>
                    <input type="hidden" name="setor_id" value="{{ $setor->id }}">
                </form>



            </div>
        </div>
    </div>
@endsection
