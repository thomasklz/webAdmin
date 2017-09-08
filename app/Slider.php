<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
  public $timestamps = false;
  protected $table = 'slider';
  protected $fillable = ['titulo', 'foto', 'link', 'estado'];
}
