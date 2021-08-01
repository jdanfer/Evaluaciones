<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    protected $fillable = ['descrip', 'jefatura_id'];

    public function jefatura()
    {
        return $this->belongsTo('App\Models\Jefatura');
    }
}
