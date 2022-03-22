@extends('padrao.padrao')

@section('content')
    <div class="container">

        <a href="{{ route('atendente.index') }}" class="btn btn-warning btn-circle btn-lg"><i class="fa fa-angle-left"></i></a>


    </div>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="box ">
                    <div class="box-header">Cadastrar Atendente</div>
                    <div class="box-body">

                        <form action="" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Usuario</label>
                                <br>
                                <label for="">{{$atendente->user->name}}</label>
                            </div>

                            <div class="form-group">
                                <label for="setor">Setor</label>
                                <br>
                                <label for="">{{$atendente->setor->name}}</label>

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


@section('js')
    <script>
        $(document).ready(function() {
            $('.users').select2();
            $('.setors').select2();
        });
    </script>
@endsection
