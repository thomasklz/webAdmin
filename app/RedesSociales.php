<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RedesSociales extends Model
{
  public $timestamps = false;
  protected $table = 'redessociales';
  protected $fillable = ['redSocial', 'link', 'estado'];
}
