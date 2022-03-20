@extends('padrao.padrao')

@section('content')
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"> Alteração de Senha</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" method="POST" action="{{ url('changePasswordPost') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('current-password') ? ' has-error' : '' }}">
                            <label for="new-password" class="col-md-4 control-label">Senha Atual</label>

                            <div class="col-md-6">
                                <input id="current-password" type="password" class="form-control" name="current-password"
                                    required>

                                @if ($errors->has('current-password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('current-password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('new-password') ? ' has-error' : '' }}">
                            <label for="new-password" class="col-md-4 control-label">Nova Senha</label>

                            <div class="col-md-6">
                                <input id="new-password" type="password" class="form-control" name="new-password"
                                    required>

                                @if ($errors->has('new-password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('new-password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="new-password-confirm" class="col-md-4 control-label">Confirmar Nova Senha</label>

                            <div class="col-md-6">
                                <input id="new-password-confirm" type="password" class="form-control"
                                    name="new-password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Change Password
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
    <br><br>

    <div class="container">
        <div class="box collapsed-box">
            <div class="box-header">
                <h3 class="box-title"> Minha Conta</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                    </button>
                </div>
            </div>
            <div class="box-body">

                <div class="form-group">
                    <label for="">Nome:</label>
                    <label for="">{{ Auth::user()->name }}</label>
                </div>
                <div class="form-group">
                    <label for="">CPF:</label>
                    <label for="">{{ Auth::user()->cpf }}</label>
                </div>
                <div class="form-group">
                    <label for="">Email:</label>
                    <label for="">{{ Auth::user()->email }}</label>
                </div>
                <div class="form-group">
                    <label for="">Telefone:</label>
                    <label for="">{{ Auth::user()->telefone }}</label>
                </div>
                <div class="form-group">
                    <button data-toggle="modal" data-target="#myModal">Alterar Senha</button>
                </div>


            </div>
        </div>



    </div>
@endsection



@section('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {

            $('.js-example-basic-single').select2();
            $.ajax({
                type: 'GET',
                url: 'https://brasilapi.com.br/api/banks/v1',

                success: function(dados) {

                    if (dados.length > 0) {
                        var option = '<option>Selecione seu banco</option>';
                        $.each(dados, function(i, obj) {
                            option += '<option value="' + obj.code + '">' + obj.name +
                                '</option>';
                        })
                        $('#mensagem').html('<span class="mensagem">Total de paises encontrados.: ' +
                            dados.length + '</span>');
                        $('#cmbPais').html(option).show();
                    } else {
                        Reset();
                        $('#mensagem').html(
                            '<span class="mensagem">Não foram encontrados paises!</span>');
                    }
                }
            });
            $("#cmbPais").change(function() {

                var valor = document.getElementById('cmbPais').value;

                //  alert(valor);
                // alert(valor);
                $.ajax({
                    type: 'GET',
                    url: 'https://brasilapi.com.br/api/banks/v1/' + valor,

                    success: function(data) {
                        // alert(data.code);
                        $('input[name="code"]').val(data.code);
                        $('input[name="name"]').val(data.name);
                    }
                });
            });

            $("#cep").change(function() {

                var valor = document.getElementById('cep').value;

                // alert(valor);
                $.ajax({
                    type: 'GET',
                    url: 'https://viacep.com.br/ws/' + valor + '/json/',

                    success: function(data) {
                        var names = data.bairro
                        $('input[name="endereco"]').val(data.logradouro);
                        $('input[name="bairro"]').val(data.bairro);
                        $('input[name="cidade"]').val(data.localidade);
                        $('input[name="uf"]').val(data.uf);
                        //alert(names);
                        // $('#cand').html(data);
                    }
                });
            });
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>
    <script>
        $(document).ready(function() {

            $('form').ajaxForm({
                beforeSend: function() {
                    $('#success').empty();
                },
                uploadProgress: function(event, position, total, percentComplete) {
                    $('.progress-bar').text(percentComplete + '%');
                    $('.progress-bar').css('width', percentComplete + '%');
                },
                success: function(data) {
                    if (data.errors) {
                        $('.progress-bar').text('0%');
                        $('.progress-bar').css('width', '0%');
                        $('#success').html('<span class="text-danger"><b>' + data.errors +
                            '</b></span>');
                    }
                    if (data.success) {
                        $('.progress-bar').text('Uploaded');
                        $('.progress-bar').css('width', '100%');
                        $('#success').html('<span class="text-success"><b>' + data.success +
                            '</b></span><br /><br />');
                        $('#success').append(data.image);

                        location.reload();
                    }
                }
            });

        });
    </script>
@endsection
