<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
    protected $fillable = ['descrip', 'pregunta_nro', 'titulo_id', 'jefatura_id'];

    public static $rules = [
        'descrip' => 'required|min:3',
    ];

    public static $customMessages = [
        'descrip.required' => 'El campo descripción es obligatorio.',
        'descrip.min' => 'El campo descripción debe tener al menos 3 caracteres.'
    ];

    public function titulo()
    {
        return $this->belongsTo('App\Models\Titulo');
    }

    public function jefatura()
    {
        return $this->belongsTo('App\Models\Jefatura');
    }
}
