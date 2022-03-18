@extends('padrao.padrao')

@section('content')
    <div class="container">

        <a href="{{ route('setor.index') }}" class="btn btn-warning btn-circle btn-lg"><i class="fa fa-angle-left"></i></a>


    </div>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="box ">
                    <div class="box-header">Cadastrar Setor</div>
                    <div class="box-body">

                        <form action="{{ route('setor.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Nome</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            <div class="checkbox">
                                <label><input type="checkbox" id="checkbox1" name="aberto" value="1">Atendimento sem agendamento</label>


                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary btn-block">Salvar</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>


        </div>

    </div>
@endsection
