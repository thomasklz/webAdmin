<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
  public $timestamps = false;
  protected $table = 'persona';
  protected $fillable = ['nombre', 'apellido', 'cedula', 'cargo','telefono','correo','foto','estado'];
}
