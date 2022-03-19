@extends('padrao.padrao')


@section('content')
    <br>
    <div class="container">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Dados para Agendamento</h3>
            </div>

            <div class="col-md-12 continua">
                <div class="panel">
                    <div class="panel-heading">Selecione o Dia/Horario para o seu Atendimento no {{ $setor->name }}</div>
                    <div id="cadastro" class="panel-body">



                        <form class="m-t" method="POST" action="{{ url('geraragendamento') }}">
                            @csrf


                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                            <!-- Email Address -->

                            <br>

                            <div class="form-group">
                                <select class="form-control boleado" name="agenda" id="agenda">
                                    <option value=""></option>
                                    @forelse ($agendas as $agenda)
                                        <option value="{{ $agenda->id }}">{{ $agenda->data_formated }} -
                                            {{ $agenda->hora }}</option>

                                    @empty
                                    @endforelse
                                </select>
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
            <div class="panel-footer">


            </div>
        </div>

    </div>
@endsection


@section('js')
    <script>
        $(document).ready(function() {


            $(".terceiro").hide();
        });
    </script>
    <script>
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
