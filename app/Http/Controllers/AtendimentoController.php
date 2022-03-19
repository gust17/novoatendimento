<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\Atendimento;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AtendimentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'agenda' => ['required', 'int'],
        ]);


        //dd($request->all());
        $agenda = Agenda::find($request->agenda);
        if ($agenda->aberto == 0) {
            $request['agenda_id'] = $agenda->id;
            $request['setor_id'] = $agenda->setor_id;



            $agenda->fill(['aberto' => 1]);
            $agenda->save();

            // dd($request->all());
            Atendimento::create($request->all());

            return redirect(url('dashboard'))
                ->with('success', 'Created successfully!');
        } else {
            return redirect(url('dashboard'))
                ->with('error', 'Dia e Horario ja preenchidos');
            return redirect(url('dashboard'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Atendimento  $atendimento
     * @return \Illuminate\Http\Response
     */
    public function show(Atendimento $atendimento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Atendimento  $atendimento
     * @return \Illuminate\Http\Response
     */
    public function edit(Atendimento $atendimento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Atendimento  $atendimento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Atendimento $atendimento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Atendimento  $atendimento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Atendimento $atendimento)
    {
    }
}
