<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UnidadRedesSociales extends Model
{
  public $timestamps = false;
  protected $table = 'unidadredessociales';
  protected $fillable = ['idRedessociales', 'idUnidadacademica'];
}
