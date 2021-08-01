<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $fillable = ['persona_doc', 'persona_nom1', 'persona_nom2', 'persona_ape1', 'persona_ape2', 'persona_ingreso', 'persona_nac', 'persona_genero', 'cargo_id'];

    public static $rules = [
        'persona_doc' => 'required',
        'persona_nom1' => 'required',
        'persona_ape1' => 'required',
        'persona_ingreso' => 'required',
        'persona_nac' => 'required',
        'cargo_id' => 'required',
    ];

    public static $customMessages = [
        'persona_doc.required' => 'El campo documento es obligatorio.',
        'persona_nom1.required' => 'El campo Nombre es obligatorio.',
        'persona_ape1.required' => 'El campo Apellido es obligatorio.',
        'persona_ingreso.required' => 'El campo Ingreso es obligatorio.',
        'persona_nac.required' => 'El campo Nacimiento es obligatorio.',
        'cargo_id.required' => 'El campo Cargo es obligatorio.'
    ];

    public function cargo()
    {
        return $this->belongsTo('App\Models\Cargo');
    }
}
