<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atendente extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'setor_id',
        'ativo'
    ];


    public function user()
    {
       return $this->belongsTo(User::class);
    }

    public function setor()
    {
       return $this->belongsTo(Setor::class);
    }
}
