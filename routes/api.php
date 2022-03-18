<?php

use App\Models\Agenda;
use App\Models\Terceiro;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('buscadados/{id}', function ($id) {
    $agendas = Agenda::where("aberto", 0)->where("setor_id", $id)->orderBy('data')->get();

    $dados = [];



    foreach ($agendas as $agenda) {
        $dados[] = ['data' => $agenda->data_formated, 'id' => $agenda->id, 'hora' => $agenda->hora];
    }


    return $dados;
});


Route::post('file-upload/terceiro/doc/upload', function (Request $request) {

    //return ($request->all());

    $rules = array(
        'file' => 'required|mimes:jpeg,jpg,png,pdf|max:32760'
    );

    $error = Validator::make($request->all(), $rules);

    if ($error->fails()) {
        return response()->json(['errors' => $error->errors()->all()]);
    }
    //  $cliente = User::find($request->cliente_id);

    // return ($cliente);
    $image = $request->file('file');

    $new_name = rand() . '.' . $image->getClientOriginalExtension();
    //$image->move(public_path('arquivos'), $new_name);
    $busca = Terceiro::find($request->terceiro_id);



    if (!empty($busca->arquivo)) {
        unlink('arquivos/produtos/doc' . $busca->arquivo);
    }
    if (isset($busca)) {
        $image->move(public_path('arquivos'), $new_name);
        $salvar =  $busca->first();
        $salvar->fill(['procuracao' => $new_name]);
        $salvar->save();
        //dd($cliente->doc);
        ///  $cliente->doc->fill(['frente' => $new_name]);


        // $cliente->doc->save();
    } else {
        $image->move(public_path('arquivos'), $new_name);
        $salvar =  $busca->first();
        $salvar->fill(['procuracao' => $new_name]);
        $salvar->save();
    }

    $output = array(
        'success' => 'Image uploaded successfully',
        'image' => '<img src="/images/' . $new_name . '" class="img-thumbnail" />'
    );

    return $output;

    // $grava = ['custom' => $request['name'], 'name' => $new_name, 'protocolo_id' => $request['protocolo_id']];
});
