<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Filosofia extends Model
{
  public $timestamps = false;
  protected $table = 'filosofia';
  protected $fillable = ['titulo', 'contenido', 'foto', 'estado'];
}
