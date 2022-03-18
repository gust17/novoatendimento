@extends('padrao.padrao')


@section('content')
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Cadastrar Agenda</h4>
                </div>
                <div class="modal-body">
                    <form action="{{ url('agenda/create') }}" method="post">
                        @csrf

                        <div class="form-group">
                            <label for="">Data</label>
                            <input type="date" name="data" class="form-control">
                        </div>
                        <input type="hidden" name="setor_id" value="{{ $setor->id }}">
                        <div class="form-group">
                            <label for="">Hora</label>
                            <input type="time" name="hora" class="form-control">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success">Cadastrar</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <button data-toggle="modal" data-target="#myModal" class="btn btn-warning btn-circle btn-lg"><i
                        class="fa fa-plus"></i></button>

            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel ">
                    <div class="panel-heading">
                        <h3 class="panel-title">{{ $setor->name }}</h3>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table id="myTable" class="table table-striped">
                                <thead>

                                    <tr>
                                        <th>Ordem</th>
                                        <th>Data</th>
                                        <th>Hora</th>
                                        <th>Ações</th>


                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Ordem</th>
                                        <th>Data</th>
                                        <th>Hora</th>
                                        <th>Ações</th>

                                    </tr>
                                </tfoot>
                                <tbody>

                                    @forelse ($agendas as $agenda)
                                        <tr>
                                            <td>{{ $agenda->id }}</td>
                                            <td>
                                                {{ $agenda->data }}
                                            </td>
                                            <td>{{ $agenda->hora }}</td>

                                            <td>

                                                <a class="btn btn-warning"
                                                    href="{{ url('admin/agenda/edit', $agenda->id) }}">Editar</a>
                                                <a class="btn btn-danger"
                                                    href="{{ url('admin/agenda/delete', $agenda->id) }}">Excluir</a>
                                            </td>

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
