<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UnidadNoticia extends Model
{
  public $timestamps = false;
  protected $table = 'unidadnoticia';
  protected $fillable = ['idNoticias', 'idUnidadacademica'];
}
