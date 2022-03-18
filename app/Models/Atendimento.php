<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atendimento extends Model
{
    use HasFactory;



    protected $fillable = [
        'agenda_id',
        'setor_id',
        'aberto',
        'user_id',
        'descricao',
        'atendente_id',
        'terceiro_id',
    ];


    public function setor()
    {
        return $this->belongsTo(Setor::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function respostas()
    {
        return $this->hasMany(Resposta::class);
    }

    public function agenda()
    {
        return $this->belongsTo(Agenda::class);
    }

    public function terceiro()
    {
        return $this->belongsTo(Terceiro::class);
    }
}
