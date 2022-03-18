@extends('padrao.padrao')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('atendente.create') }}" class="btn btn-warning btn-circle btn-lg"><i
                        class="fa fa-plus"></i></a>

            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel ">
                    <div class="panel-heading">
                        <h3 class="panel-title">ATENDENTES</h3>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table id="myTable" class="table table-striped">
                                <thead>

                                    <tr>
                                        <th>Ordem</th>
                                        <th>Nome</th>
                                        <th>Setor</th>
                                        <th>Ações</th>

                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Ordem</th>
                                        <th>Nome</th>
                                        <th>Setor</th>
                                        <th>Ações</th>

                                    </tr>
                                </tfoot>
                                <tbody>

                                    @forelse ($atendentes as $atendente)
                                        <tr>
                                            <td>{{ $atendente->id }}</td>
                                            <td>
                                                {{ $atendente->user->name }}
                                            </td>
                                            <td>{{$atendente->setor->name}}</td>

                                            <td>
                                                <a class="btn btn-primary" href="{{ url('agenda', $atendente->id) }}">Agenda</a>
                                                <a class="btn btn-warning"
                                                    href="{{ url('admin/atendente/edit', $atendente->id) }}">Editar</a>
                                                <a class="btn btn-danger"
                                                    href="{{ url('admin/atendente/delete', $atendente->id) }}">Excluir</a>
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
