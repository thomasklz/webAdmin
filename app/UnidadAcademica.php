<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UnidadAcademica extends Model
{
  public $timestamps = false;
  protected $table = 'unidadacademica';
  protected $fillable = ['nombre', 'logo', 'frase', 'resumen','contenido','foto', 'estado', 'colorplantilla'];
}
