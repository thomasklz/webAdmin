<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoriaDocumento extends Model
{
  public $timestamps = false;
  protected $table = 'categoriadocumento';
  protected $fillable = ['categoria', 'estado'];
}
