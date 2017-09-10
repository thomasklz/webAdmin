<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UnidadServicio extends Model
{
  public $timestamps = false;
  protected $table = 'unidadservicio';
  protected $fillable = ['idServicio', 'idUnidadacademica'];
}
