<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EstadoProyecto extends Model
{
  public $timestamps = false;
  protected $table = 'estadoproyecto';
  protected $fillable = ['nombre', 'estado'];
}
