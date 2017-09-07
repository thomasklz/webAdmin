<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UnidadProyecto extends Model
{
  public $timestamps = false;
  protected $table = 'unidadproyecto';
  protected $fillable = ['idProyecto', 'idUnidadacademica'];
}
