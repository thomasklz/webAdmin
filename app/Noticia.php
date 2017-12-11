<?php

namespace App;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
  use HasSlug;

  public $timestamps = false;
  protected $table = 'noticias';
  protected $fillable = ['titulo', 'resumen', 'contenido', 'publicar','fechaPublicacion','slug','idCategoria','estado'];

     /**
      * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('titulo')
            ->saveSlugsTo('slug')
            ->slugsShouldBeNoLongerThan(50);;
    }
}
