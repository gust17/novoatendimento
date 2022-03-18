@extends('padrao.padrao')

@section('content')
    <div class="container">

        <a href="{{ url('terceiros') }}" class="btn btn-warning btn-circle btn-lg"><i class="fa fa-angle-left"></i></a>


    </div>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="box ">
                    <div class="box-header">Cadastrar Outorgante</div>
                    <div class="box-body">

                        <form action="{{ url('terceiro') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Nome/Razão Social</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="name">CPF/CNPJ</label>
                                <input type="text" name="cpf" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="name">Telefone</label>
                                <input type="text" name="telefone" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="name">EMail</label>
                                <input type="email" name="email" class="form-control">
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
