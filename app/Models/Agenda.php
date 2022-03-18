<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    use HasFactory;

    protected $fillable = [
        'data',
        'setor_id',
        'hora',
        'aberto'
    ];




    public function getDataFormatedAttribute()
    {
        //   \Carbon\Carbon::setLocale('pt_BR');
        \Carbon\Carbon::setLocale('pt_BR');
        //dd(Carbon::getLocale());

        return Carbon::createFromFormat('Y-m-d', $this->attributes['data'])->format('d-m-Y');
        //return Carbon::parse()->format('D');
    }

    public function setor()
    {
       return $this->belongsTo(Setor::class);
    }

    public function atendimento()
    {

        return $this->hasOne(Atendimento::class);
    }
}
