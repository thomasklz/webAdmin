<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enlace extends Model
{
  public $timestamps = false;
  protected $table = 'enlace';
  protected $fillable = ['logo', 'titulo', 'ruta', 'estado'];
}
