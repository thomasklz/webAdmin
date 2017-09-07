<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoriaProyecto extends Model
{
  public $timestamps = false;
  protected $table = 'categoriaproyecto';
  protected $fillable = ['categoria', 'estado'];
}
