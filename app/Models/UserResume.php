<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserResume extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'objetivo',
        'skills',
        'nascimento',
        'telefone',
        'email',
        'uf',
        'cidade',
        'cursos_complementares',
        'formacao'
    ];

    protected $casts = [
        'nascimento' => 'datetime:Y-m-d H:i:s',
        'skills' => 'array'
    ];

    public function cities()
    {
        return UserResume::select('name')->get();
    }
}
