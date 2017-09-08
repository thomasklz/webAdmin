<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UnidadSlider extends Model
{
  public $timestamps = false;
  protected $table = 'unidadslider';
  protected $fillable = ['idSlider', 'idUnidadacademica'];
}
