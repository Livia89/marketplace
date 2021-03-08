<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

//spatie/laravel-sluggable 
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;


/* Relações
    1:1 - Um para um (Usuário e loja) - hasOne e belongsTo - tem um e pertence a
    1:N - Um para muitos (Loja e produtos) | hasMany e belongsTo - Tem muitos e pertence a
    N:N - muitos para muitos (Produtos e categorias) | belongsToMany - Pertence a muitos

    
*/


class Category extends Model
{
    use HasSlug;
    protected $fillable = ['name', 'description', 'slug'];

      /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class); // Para as tabelas intermediárias ou pivor o laravel procura as chaves estrangeiras em ordem alfabética, como são
    }
}
