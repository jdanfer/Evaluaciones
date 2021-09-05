<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evalua extends Model
{
    protected $fillable = ['persona_id', 'jefatura_id', 'titulo_id', 'puntos', 'pregunta_id', 'periodo'];

    public static $rules = [
        'persona_id' => 'required',
        'jefatura_id' => 'required',
        'titulo_id' => 'required',
        'puntos' => 'required',
        'pregunta_id' => 'required',
        'periodo' => 'required',
    ];

    public static $customMessages = [
        'persona_id.required' => 'El campo de persona es obligatorio.',
        'jefatura_id.required' => 'El campo Jefatura es obligatorio.',
        'titulo_id.required' => 'El campo Título es obligatorio.',
        'puntos.required' => 'El campo Puntos es obligatorio.',
        'pregunta_id.required' => 'El campo pregunta es obligatorio.',
        'periodo.required' => 'El campo Período es obligatorio.'
    ];

    public function persona()
    {
        return $this->belongsTo('App\Models\Persona');
    }

    public function titulo()
    {
        return $this->belongsTo('App\Models\Titulo');
    }

    public function jefatura()
    {
        return $this->belongsTo('App\Models\Jefatura');
    }

    public function pregunta()
    {
        return $this->belongsTo('App\Models\Pregunta');
    }
}
