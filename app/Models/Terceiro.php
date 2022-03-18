<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Terceiro extends Model
{
    use HasFactory;


    protected $fillable =
    [
        'name',
        'cpf',
        'telefone',
        'email',
        'procuracao',
        'status',
        'user_id',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getStatusFormatedAttribute()
    {
        if ($this->attributes['status'] == 1) {
            return 'HABILITADO';
        }
        if ($this->attributes['status'] == 0) {
            return 'EM ÁNALISE';
        }
        if ($this->attributes['status'] == 2) {
            return 'INDEFERIDO';
        }
    }
}
