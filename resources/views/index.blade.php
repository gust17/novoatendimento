@extends('padrao')
@section('css')
@endsection
@section('content')

    @forelse ($dados as $dado)
        <div id="myModal{{ $dado['busca'] }}" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">{{ $dado['name'] }}</h4>
                    </div>
                    <div class="modal-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Serviço</th>


                                        <th>Atendimento</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($dado['eventos'] as $evento)
                                        <tr>
                                            <td>{{ $evento->setor->name }}</td>


                                            <td>


                                                    <a href="{{ url("agendar") }}"
                                                        class="btn btn-success">Agendar</a>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>

    @empty
    @endforelse


    <div class="container">
        <div class="panel panel-danger">
            <div class="panel-heading">
                <h3 class="panel-title">
                    ORIENTAÇÕES GERAIS PARA O SISTEMA DE ATENDIMENTO
                </h3>
                <div class="panel-body">
                    <li>Selecione do dia do atendimento;</li>
                    <li>Selecione a categoria você está precisando;</li>


                </div>
            </div>
        </div>
    </div>

    <div class="container">

        <div class="row">
            @forelse ($dados as $dado)
                <div class="col-md-2">
                    <div id="selecionado" class="panel panel-default outro text-center">
                        <div class="panel-heading">
                            {{ $dado['name'] }}
                        </div>
                        <div class="panel-body">
                            <button data-toggle="modal" data-target="#myModal{{ $dado['busca'] }}"
                                class="btn btn-success boleado btn-block">Selecionar
                                Setor</button>
                        </div>
                    </div>
                </div>

            @empty
            @endforelse
        </div>

        @forelse ($dados as $dado)
            <div class="panel-group">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" href="#collapse{{ $dado['busca'] }}">{{ $dado['name'] }}</a>
                        </h4>
                    </div>
                    <div id="collapse{{ $dado['busca'] }}" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Serviço</th>
                                            <th>Sub Serviço</th>
                                            <th>Inicio</th>
                                            <th>Termino</th>
                                            <th>Atendimento</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($dado['eventos'] as $evento)
                                            <tr>
                                                <td>{{ $evento->setor->name }}</td>
                                                <td>
                                                    @if ($evento->subsetor)
                                                        {{ $evento->subsetor->name }}
                                                    @endif
                                                </td>
                                                <td>{{ $evento->inicio }}</td>
                                                <td>{{ $evento->fim }}</td>

                                                <td>

                                                    @if ($agora >= $evento->inicio && $agora <= $evento->fim && $dia == $evento->dia)
                                                        <a href="{{ backpack_url('novoatendimento', $evento->id) }}"
                                                            class="btn btn-success">Iniciar</a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>


        @empty
        @endforelse


    </div>






    {{-- ...Some more scripts... --}}

@endsection


@section('js')
    <script src='{{ asset(url('jquery.MultiFile.min.js')) }}' type="text/javascript" language="javascript"></script>




    <script>
        $(":submit").closest("form").submit(function() {
            $(':submit').attr('disabled', 'disabled');
        });
        $('.btn').on('click', function() {
            var $this = $(this);
            $this.button('loading');
            setTimeout(function() {
                $this.button('reset');
            });
        });
    </script>
@endsection
