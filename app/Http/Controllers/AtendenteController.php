<?php

namespace App\Http\Controllers;

use App\Models\Atendente;
use App\Models\Setor;
use App\Models\User;
use Illuminate\Http\Request;

class AtendenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $atendentes = Atendente::all();

        return view('atendente.index', compact('atendentes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $setors = Setor::all();

        return view('atendente.create', compact('users', 'setors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => ['required'],
            'setor_id' => ['required'],
        ]);

        $user = User::find($request->user_id);

        $user->fill(['tipo' => 1]);
        $user->save();
        Atendente::create($request->all());
        return redirect()->back()
            ->with('success', 'Atendente cadastrado com Sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Atendente  $atendente
     * @return \Illuminate\Http\Response
     */
    public function show(Atendente $atendente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Atendente  $atendente
     * @return \Illuminate\Http\Response
     */
    public function edit(Atendente $atendente)
    {

        return view('atendente.edit',compact('atendente'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Atendente  $atendente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Atendente $atendente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Atendente  $atendente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Atendente $atendente)
    {
        //
    }
}
