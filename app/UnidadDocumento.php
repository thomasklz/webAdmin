<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UnidadDocumento extends Model
{
  public $timestamps = false;
  protected $table = 'unidaddocumento';
  protected $fillable = ['idDocumento', 'idUnidadacademica'];
}
