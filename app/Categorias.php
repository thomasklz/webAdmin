<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorias extends Model
{
  public $timestamps = false;
  protected $table = 'categorias';
  protected $fillable = ['categoria', 'estado'];

}
