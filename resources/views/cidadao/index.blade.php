@extends('padrao.padrao')


@section('content')
    <div class="container">
        <h2>Qual serviço você precisa de atendimento?</h2>
        <div class="row">
            <div class="col-md-7">

                @forelse ($setores as $setor)
                    <div class="col-md-6">
                        <div id="selecionado{{ $setor->id }}" class="panel outro text-center">
                            <div class="panel-heading">
                                {{ $setor->name }}
                            </div>
                            <div class="panel-body">
                                <button onclick="seleciona({{ $setor->id }})" style="background-color:" type="submit"
                                    class="btn btn-success boleado btn-block">Selecionar
                                    Setor</button>
                            </div>
                        </div>
                    </div>

                @empty
                @endforelse

                <div class="col-md-12 continua">
                    <div class="panel">
                        <div class="panel-heading">Selecione o Dia/Horario para o seu Atendimento</div>
                        <div id="cadastro" class="panel-body">



                            <form class="m-t" method="POST" action="{{ url('geraragendamento') }}">
                                @csrf


                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                                <!-- Email Address -->

                                <br>

                                <div class="form-group">
                                    <select class="form-control boleado" name="agenda" id="agenda"></select>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="">Descrição</label>
                                    <textarea class="form-control" name="descricao" id="" cols="30" rows="10"></textarea>
                                </div>
                                <!-- Password -->


                                <br>
                                <div class="checkbox">
                                    <label><input type="checkbox" id="checkbox1" name="novo" value="1">Atendimento a
                                        Terceiro</label>


                                </div>

                                <div id="" class="form-group terceiro">
                                    <label for="">Outorgantes</label>
                                    <select class="form-control" name="terceiro_id" id="">
                                        <option value=""></option>
                                        @forelse (Auth::user()->terceiros as $terceiro)
                                            <option value="{{ $terceiro->id }}">{{ $terceiro->name }}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                </div>


                                <div class="d-grid gap-2">

                                    <button type="submit" class="btn btn-lg btn-success boleado btn-block">Agendar</button>
                                    <br>
                                </div>

                            </form>


                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-5">
                <div class="panel">
                    <div class="panel-heading text-center">
                        <h3 class="panel-title">Meus Agendamentos</h3>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Setor</th>
                                    <th>Dia/Hora</th>

                                </tr>
                            </thead>
                            <tbody>
                                @forelse (Auth::user()->atendimentos as $atendimento)
                                    <tr>
                                        <td> <a
                                                href="{{ url('responder', $atendimento->id) }}">{{ $atendimento->setor->name }}</a>
                                        </td>
                                        <td>{{ $atendimento->agenda->data }} -
                                            {{ $atendimento->agenda->hora }}
                                        </td>

                                    </tr>

                                @empty
                                @endforelse


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection


@section('js')
    <script>
        $(document).ready(function() {

            var heights = $(".outro").map(function() {
                    return $(this).height();
                }).get(),

                maxHeight = Math.max.apply(null, heights);

            $(".outro").height(maxHeight);
            $(".continua").hide();
            $(".terceiro").hide();
        });
    </script>
    <script>
        function seleciona(valor) {
            $(".outro").css("color", "black");
            $(".outro").css("background-color", "white");
            $(".continua").show();
            // document.getElementById('selecionado' + valor).style.backgroundColor = '#055863';
            $("#selecionado" + valor).css("background-color", "#055863");
            $("#selecionado" + valor).css("color", "white");
            // document.getElementById('selecionado' + valor).style.backgroundColor = '#055863';
            document.getElementById('cadastro').scrollIntoView();


            $.ajax({
                type: 'GET',
                url: '{{ url('api/buscadados') }}' + '/' + valor,

                success: function(data) {
                    console.log(data);

                    //  $('#plano').val(data[0].name);
                    //alert(names);
                    // $('#cand').html(data);

                    var option = '<option>Selecione um Dia/Horario</option>';
                    $.each(data, function(i, obj) {
                        option += '<option value="' + obj.id + '">' + obj.data + ' ' + obj.hora +
                            '</option>';
                    });

                    $('#agenda').html(option).show();



                }
            });


        }
        $('#checkbox1').change(function() {

            if (this.checked) {

                $(".terceiro").show();
            } else {
                $(".terceiro").hide();
            }
            $('#textbox1').val(this.checked);
        });
    </script>
@endsection
