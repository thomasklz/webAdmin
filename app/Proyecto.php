<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
  public $timestamps = false;
  protected $table = 'proyecto';
  protected $fillable = ['autor', 'titulo', 'contenido', 'foto','fecha','estado','idEstadoproyecto','idCategoriaproyecto'];
}
