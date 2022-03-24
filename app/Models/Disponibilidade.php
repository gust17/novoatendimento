<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disponibilidade extends Model
{
    use HasFactory;


    protected $fillable = [
        'dia',
        'setor_id',
        'agendavel'
    ];


    public function setor()
    {
        return $this->belongsTo(Setor::class);
    }


    public function getDiaFormatedAttribute()
    {
       return Carbon::parse($this->attributes['dia'])->format('d/m/Y');
    }
}
