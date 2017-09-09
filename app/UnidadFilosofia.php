<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UnidadFilosofia extends Model
{
  public $timestamps = false;
  protected $table = 'unidadfilosofia';
  protected $fillable = ['idFilosofia', 'idUnidadacademica'];
}
