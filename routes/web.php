<?php

use App\Http\Controllers\AtendenteController;
use App\Http\Controllers\AtendimentoController;
use App\Http\Controllers\DisponibilidadeController;
use App\Http\Controllers\SetorController;
use App\Models\Agenda;
use App\Models\Atendimento;
use App\Models\Resposta;
use App\Models\Setor;
use App\Models\Terceiro;
use App\Models\User;
use Carbon\Carbon;
use GuzzleHttp\Promise\Create;
use Hamcrest\Core\Set;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use RealRashid\SweetAlert\Facades\Alert;

use function GuzzleHttp\Promise\all;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    redirect(url('/dashboard'));
});

Route::get('testeindex', function () {
    $now = \Carbon\Carbon::now();
    //echo $now->year;
    // echo $now->month;
    $agora = \Carbon\Carbon::now()->format('H:i:m');


    $inicio = \App\Models\Disponibilidade::orderBy('dia', 'asc')->whereMonth('dia', $now->month)->first();
    $fim = \App\Models\Disponibilidade::orderBy('dia', 'desc')->whereMonth('dia', $now->month)->first();
    $dados = [];

    if (isset($inicio)) {


        $begin = \Carbon\Carbon::now();


        $end = \Carbon\Carbon::createFromDate($fim->dia)->modify('+1 day');

        //dd($end);

        for ($i = $begin; $i <= $end; $i->modify('+1 day')) {


            $total = \App\Models\Disponibilidade::whereDate('dia', $i->format("Y-m-d"))->get();
            if (count($total) > 0) {
                $dados[] = ['busca' => $i->format("Y-m-d"), 'name' => $i->locale('pt_br')->isoFormat('dddd, MMMM D  YYYY'), 'eventos' => $total];
            }
        }
    }

    $dia = \Carbon\Carbon::now()->format('Y-m-d');
    //dd($dia);
    // dd($dados);


    return view('index', compact('dados', 'agora', 'dia'));
});
Route::resource('atendente', AtendenteController::class)->middleware(['auth']);
Route::resource('disponibilidade', DisponibilidadeController::class)->middleware(['auth']);
Route::get('agenda/{id}', function ($id) {

    $setor = Setor::find($id);

    $agendas = Agenda::where('setor_id', $id)->get();


    return view('agenda.index', compact('setor', 'agendas'));
})->middleware(['auth']);

Route::post('agenda/create', function (HttpRequest $request) {

    $request->validate([
        'data' => ['required'],

        'hora' => ['required'],


    ]);

    Agenda::create($request->all());

    return redirect()->back();
})->middleware(['auth']);

Route::post('geraragendamento', [AtendimentoController::class, 'store'])->middleware(['auth']);

Route::resource('setor', SetorController::class)->middleware(['auth']);

Route::get('/dashboard', function () {
    $setores = Setor::all();
    if (Auth::user()->tipo == 3) {
        return redirect(url('recepcao'));
    }
    if (Auth::user()->tipo == 2) {
        return redirect(url('sistema/atendente'));
    }
    if (Auth::user()->tipo == 1) {
        return redirect(url('usuarios'));
    }

    return redirect(url('/cidadao'));
})->middleware(['auth'])->name('dashboard');


Route::get('cidadao', function () {
    $setores = Setor::where("aberto", 0)->get();
    return view('cidadao.index', compact('setores'));
})->middleware(['auth']);

Route::get('sistema/atendente', function () {
    return view('sistema.atendente');
})->middleware(['auth']);
Route::get('entrar/setor/{id}', function ($id) {
    $setor = Setor::find($id);

    $agendas = Agenda::where('aberto', 0)->orderBy('data')->get();


    $atendimentos = Atendimento::where('setor_id', $setor->id)->where('aberto', 0)->get();

    //dd($atendimentos);


    return view('sistema.listaatendimento', compact('setor', 'agendas', 'atendimentos'));
})->middleware(['auth']);

Route::get('responder/{id}', function ($id) {
    $atendimento = Atendimento::find($id);

    return view('sistema.responder', compact('atendimento'));
})->middleware(['auth']);

Route::post('atendente/resposta', function (HttpRequest $request) {
    $request->validate([
        'texto' => ['required'],

    ]);
    $request['user_id'] = Auth::user()->id;

    Resposta::create($request->all());

    return redirect()->back()
        ->with('success', 'Respondido com sucesso');
})->middleware(['auth']);

Route::get('atender/{id}', function ($id) {
    $atendimento = Atendimento::find($id);

    return view('sistema.atender', compact('atendimento'));
})->middleware(['auth']);


Route::get('terceiros', function () {
    $terceiros = Terceiro::where("user_id", Auth::user()->id)->get();
    return view('terceiro.index', compact('terceiros'));
})->middleware(['auth']);


Route::get('terceiro/create', function () {

    return view('terceiro.create');
})->middleware(['auth']);
Route::post('terceiro', function (HttpRequest $request) {
    $request->validate([
        'name' => 'required',
        'cpf' => 'required|cpf',
        'telefone' => 'required',
        'email' => 'required',
    ]);
    $request['user_id'] = Auth::user()->id;

    $terceiro = Terceiro::create($request->all());

    return redirect(url('caddoc/terceiro', $terceiro->id));
})->middleware(['auth']);

Route::get('recepcao', function () {

    $atendimentos = Agenda::whereHas('atendimento')->where("data", date('Y-m-d'))->get();
    $setores = Setor::all();
    //  dd($atendimentos);
    return view('recepcionista.index', compact('atendimentos', 'setores'));
})->middleware(['auth']);

Route::get('caddoc/terceiro/{id}', function ($id) {
    $terceiro = Terceiro::find($id);

    return view('terceiro.cadfoto', compact('terceiro'));
})->middleware(['auth']);

Route::get('recepcao/abrir/{id}', function ($id) {

    $setor = Setor::find($id);

    return view('recepcionista.abriratendimento', compact('setor'));
});

Route::post('buscarcpf', function (HttpRequest $request) {
    $request->validate([

        'cpf' => ['required', 'cpf'],
    ]);

    $request['cpf'] = preg_replace("/[^0-9]/", "", $request->cpf);
    $usuario = User::where('cpf', $request->cpf)->first();
    $setor = Setor::find($request->setor_id);

    if (isset($usuario)) {
        return redirect(url('recepcao/geraratendimento/' . $usuario->id . '/setor/' . $setor->id));
    };

    return redirect(url('recepcao/cadusuario/setor', $setor->id));
});

Route::get('recepcao/geraratendimento/{user}/setor/{setor}', function ($user, $setor) {
    $usuario = User::find($user);
    $setor = Setor::find($setor);



    if ($setor->aberto == 1) {
        return view('recepcionista.geraratendimento', compact('usuario', 'setor'));
    }

    $hoje = Carbon::now();
    $agendas = Agenda::where("aberto", 0)->where("setor_id", $setor->id)->whereDate('data', '>=', $hoje)->orderBy('data')->get();

    return view('recepcionista.geraratendimentofechado', compact('usuario', 'setor', 'agendas'));
});
Route::get('receberatendimento/{id}', function ($id) {
    $setor = Setor::find($id);
    $user = Auth::user()->id;

    //dd($user);

    return redirect(url("recepcao/geraratendimento/$user/setor/$setor->id"));
})->middleware(['auth']);

Route::post('recepcao/geraratendimento', function (HttpRequest $request) {

    $gravaagenda = [
        'data' => Carbon::now(),
        'setor_id' => $request->setor_id,
        'hora' => Carbon::now(),
        'aberto' => 0
    ];

    $agenda = Agenda::create($gravaagenda);
    $gravaatendimento = [
        'agenda_id' => $agenda->id,
        'setor_id' => $request->setor_id,

        'user_id' => $request->user_id,

    ];

    Atendimento::create($gravaatendimento);

    return redirect(url('recepcao'))
        ->with('success', 'Respondido com sucesso');
});

Route::get('recepcao/cadusuario/setor/{id}', function ($id) {

    $setor = Setor::find($id);

    return view('recepcionista.cadusuario', compact('setor'));
});


Route::post('recepcao/caduser', function (HttpRequest $request) {
    $request->validate([
        'name' => ['required'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'rg' => ['required'],
        'cpf' => ['required', 'cpf', 'unique:users'],
    ]);

    $request['password'] = bcrypt($request->cpf);
    $request['cpf'] = preg_replace("/[^0-9]/", "", $request->cpf);
    $user = User::create($request->all());

    $setor = Setor::find($request->setor_id);

    if ($setor->aberto == 0) {
        return redirect(url('recepcao/geraratendimento/' . $user->id . '/setor/' . $setor->id));
    }

    $gravaagenda = [
        'data' => Carbon::now(),
        'setor_id' => $request->setor_id,
        'hora' => Carbon::now(),
        'aberto' => 0
    ];

    $agenda = Agenda::create($gravaagenda);
    $gravaatendimento = [
        'agenda_id' => $agenda->id,
        'setor_id' => $request->setor_id,
        'user_id' => $user->id,

    ];

    Atendimento::create($gravaatendimento);

    return redirect(url('recepcao'))
        ->with('success', 'Respondido com sucesso');
});


Route::post('status/atendimento', function (HttpRequest $request) {
    // dd($request->all());
    $atendimento = Atendimento::find($request->atendimento_id);
    $atendimento->fill(['aberto' => $request->status]);
    $atendimento->save();
    return redirect(url('entrar/setor', $atendimento->setor_id));
});

Route::get('usuarios', function () {
    $users  = User::all();
    //dd($usuarios);

    return view('admin.users', compact('users'));
});
Route::get('admin/usuarios/edit/{id}', function ($id) {
    $user = User::find($id);
    //$usuarios = User::all();
    // HelpersLogActivity::addToLog('Acessou aba de Edição do usuario ' . $user->name);
    return view('admin.edituser', compact('user'));
});

Route::post('admin/user/edit', function (HttpRequest $request) {
    $request->validate([
        'name' => 'required',
        'email' => ['required'],
        'cpf' => ['required', 'cpf'],

    ]);

    if (empty($request['password'])) {
        unset($request['password']);
    } else {
        $request['password'] = bcrypt($request['password']);
    }

    $user = User::find($request->id);

    $user->fill($request->all());
    $user->save();

    return redirect(url('usuarios'))->with('success', 'Usuario atualizado com sucesso');;
});

Route::get('admin/agenda/delete/{id}', function ($id) {
    Agenda::destroy($id);

    return redirect()->back()->with('success', 'Agenda deletada com sucesso');
});

Route::get('minhaconta', function () {
    return view('minhaconta');
});

Route::post('changePasswordPost', function (HttpRequest $request) {
    if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
        // The passwords matches
        return redirect()->back()->with("error", "Your current password does not matches with the password.");
    }

    if (strcmp($request->get('current-password'), $request->get('new-password')) == 0) {
        // Current password and new password same
        return redirect()->back()->with("error", "New Password cannot be same as your current password.");
    }

    $validatedData = $request->validate([
        'current-password' => 'required',
        'new-password' => 'required|string|min:8|confirmed',
    ]);

    //Change Password
    $user = Auth::user();
    $user->password = bcrypt($request->get('new-password'));
    $user->save();

    return redirect()->back()->with("success", "Password successfully changed!");
});

require __DIR__ . '/auth.php';
