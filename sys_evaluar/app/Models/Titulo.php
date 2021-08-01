<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// Cargo n a Evaluadores 1 (n a 1)
class Titulo extends Model
{
    protected $fillable = ['descrip'];

    public static $rules = [
        'descrip' => 'required|min:3',
    ];

    public static $customMessages = [
        'descrip.required' => 'El campo descripción es obligatorio.',
        'descrip.min' => 'El campo descripción debe tener al menos 3 caracteres.'
    ];
    public function pregunta()
    {
        return $this->belongsTo(Titulo::class);
    }
}
