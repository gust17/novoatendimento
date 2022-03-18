@extends('padrao.padrao')


@section('content')
    <br>
    <div class="container">


        <br>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-primary ">
                    <div class="panel-heading">
                        <h3 class="panel-title">PAINEL SETOR</h3>
                    </div>
                    <div class="panel-body">

                        <div class="row">
                            @forelse ($setores as $setor)
                                <div class="col-md-6">
                                    <div id="selecionado{{ $setor->id }}" class="panel outro text-center">
                                        <div class="panel-heading">
                                            {{ $setor->name }}
                                        </div>
                                        <div class="panel-body">
                                            <a class="btn btn-success btn-block"
                                                href="{{ url('recepcao/abrir', $setor->id) }}">Selecionar</a>
                                        </div>
                                    </div>
                                </div>

                            @empty
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="panel ">
                    <div class="panel-heading">
                        <h3 class="panel-title">ATENDIMENTOS de {{ date('d-m-Y') }}</h3>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table id="myTable" class="table table-striped">
                                <thead>

                                    <tr>
                                        <th>Setor</th>
                                        <th>Solicitante</th>
                                        <th>Horario</th>



                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Setor</th>
                                        <th>Solicitante</th>
                                        <th>Horario</th>


                                    </tr>
                                </tfoot>
                                <tbody>

                                    @forelse ($atendimentos as $atendimento)
                                        <tr>
                                            <td>{{ $atendimento->setor->name }}</td>
                                            <td>
                                                {{ $atendimento->atendimento->user->name }}
                                            </td>
                                            <td>{{ $atendimento->hora }}</td>


                                        </tr>
                                    @empty
                                        <p>Vazio</p>
                                    @endforelse


                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
@section('js')
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.1.0/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.print.min.js"></script>

    <script>
        $('#myTable').DataTable({
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.11.4/i18n/pt_br.json'
            },
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],
            "columns": [{
                    "searchable": false
                },
                {
                    "searchable": true
                },
                {
                    "searchable": false
                },


            ]

        });
    </script>
@endsection
