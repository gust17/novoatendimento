@extends('padrao.padrao')

@section('content')
    <br>
    <div class="container">
        <div class="box box-widget">
            <div class="box-header with-border">
                <div class="user-block">
                    <img class="img-circle" src="{{ asset('user.jpg') }}" alt="User Image">
                    <span class="username"><a href="#">Outorgado: {{ $atendimento->user->name }}</a></span>
                    <span class="username"><a href="#">Outorgante: {{ $atendimento->terceiro->name }}</a></span>

                </div>



            </div>

            <div class="box-body">

                <p>{{ $atendimento->descricao }}</p>

            </div>

            <div class="box-footer box-comments">
                @forelse ($atendimento->respostas as $reposta)
                    <div class="box-comment">

                        <img class="img-circle img-sm" src="{{ asset('user.jpg') }}" alt="User Image">
                        <div class="comment-text">
                            <span class="username">
                                {{ $reposta->user->name }}
                                <span class="text-muted pull-right">8:03 PM Today</span>
                            </span>
                            {{ $reposta->texto }}
                        </div>

                    </div>
                @empty
                @endforelse



            </div>

            <div class="box-footer">
                <form action="{{ url('atendente/resposta') }}" method="post">
                    @csrf

                    <img class="img-responsive img-circle img-sm" src="{{ asset('user.jpg') }}" alt="Alt Text">
                    <input type="hidden" name="atendimento_id" value="{{ $atendimento->id }}">
                    <div class="img-push">
                        <input type="text" name="texto" class="form-control input-sm"
                            placeholder="Press enter to post comment">
                        <button class="btn btn-success btn-block">Enviar</button>
                    </div>

                </form>
            </div>

        </div>
    </div>
@endsection
