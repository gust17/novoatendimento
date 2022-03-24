<?php

namespace App\Http\Controllers;

use App\Models\Disponibilidade;
use App\Models\Setor;
use Illuminate\Http\Request;

class DisponibilidadeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $disponibilidades  = Disponibilidade::all();
        return view('disponibilidade.index',compact('disponibilidades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $setors = Setor::all();
        return view('disponibilidade.create',compact('setors'));
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
            'dia' => ['required'],

            'setor_id' => ['required'],


        ]);

        Disponibilidade::create($request->all());
        return redirect()->route('disponibilidade.index') ->with('success', 'Dia Cadastrado');;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Disponibilidade  $disponibilidade
     * @return \Illuminate\Http\Response
     */
    public function show(Disponibilidade $disponibilidade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Disponibilidade  $disponibilidade
     * @return \Illuminate\Http\Response
     */
    public function edit(Disponibilidade $disponibilidade)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Disponibilidade  $disponibilidade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Disponibilidade $disponibilidade)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Disponibilidade  $disponibilidade
     * @return \Illuminate\Http\Response
     */
    public function destroy(Disponibilidade $disponibilidade)
    {
        //
    }
}
