<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

//spatie/laravel-sluggable 
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;


/* Relações
    1:1 - Um para um (Usuário e loja) - hasOne e belongsTo - tem um e pertence a
    1:N - Um para muitos (Loja e produtos) | hasMany e belongsTo - Tem muitos e pertence a
    N:N - Um para um (Produtos e categorias) | belongsToMany - Pertence a muitos
*/

class Store extends Model
{
    use HasSlug;
    // protected $table = 'lojas'; - Caso quisesse ter uma tabela com nome diferente do normal (Stores) mas não é padrão.
    protected $fillable = ['name', "description", "phone", "mobile_phone", 'logo', "slug"];

      /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }
    
    public function user(){
        // Uma loja pertence a um usuario
        return $this->belongsTo(User::class);
    }

    public function products(){
        return $this->hasMany(Product::class);
    }

}


