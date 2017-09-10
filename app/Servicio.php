<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
  public $timestamps = false;
  protected $table = 'servicio';
  protected $fillable = ['titulo', 'contenido', 'foto', 'enlace', 'fecha', 'estado'];
}
