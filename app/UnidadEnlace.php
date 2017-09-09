<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UnidadEnlace extends Model
{
  public $timestamps = false;
  protected $table = 'unidadenlace';
  protected $fillable = ['idEnlace', 'idUnidadacademica'];
}
