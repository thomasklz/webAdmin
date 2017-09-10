<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Eventos extends Model
{
  public $timestamps = false;
  protected $table = 'eventos';
  protected $fillable = ['titulo', 'detalle', 'url', 'fecha','lugar','estado'];
}
