<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FotosNoticias extends Model
{
  public $timestamps = false;
  protected $table = 'noticiasfotos';
  protected $fillable = ['fotos', 'principal','publicar','idNoticias'];
}
