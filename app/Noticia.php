<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
  public $timestamps = false;
  protected $table = 'noticias';
  protected $fillable = ['titulo', 'resumen', 'contenido', 'publicar','fechaPublicacion','idCategoria','estado'];
}
