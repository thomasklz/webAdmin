<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UnidadEventos extends Model
{
  public $timestamps = false;
  protected $table = 'unidadeventos';
  protected $fillable = ['idEventos', 'idUnidadacademica'];
}
