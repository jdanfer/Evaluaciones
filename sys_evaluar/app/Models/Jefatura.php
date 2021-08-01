<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jefatura extends Model
{
    protected $fillable = ['descrip'];
    public static $rules = [
        'descrip' => 'required|min:3',
    ];
    public static $customMessages = [
        'descrip.required' => 'El campo descripción es obligatorio.',
        'descrip.min' => 'El campo descripción debe tener al menos 3 caracteres.'
    ];

    public function cargo()
    {
        return $this->belongsTo(Jefatura::class);
    }
}
