<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UnidadPersona extends Model
{
  public $timestamps = false;
  protected $table = 'personaunidad';
  protected $fillable = ['idPersona', 'idUnidadacademica'];
}
