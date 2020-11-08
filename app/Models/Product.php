<?php

// 1:1 Um para um (Loja e usuário) hasOne e BelongsTo
// 1:N Um para muitos (Loja e produto) hasMany e belongsTo
// N:N Muitos para muitos (Produtos e categorias) belongsToMany
namespace App\Models;

use Illuminate\Database\Eloquent\Model;


/* Relações
    1:1 - Um para um (Usuário e loja) - hasOne e belongsTo - tem um e pertence a
    1:N - Um para muitos (Loja e produtos) | hasMany e belongsTo - Tem muitos e pertence a
    N:N - muitos para muitos (Produtos e categorias) | belongsToMany - Pertence a muitos
*/

class Product extends Model
{
    protected $fillable = ['name', "description", "body", "price", "slug"];

    public function store(){
        return $this->belongsTo(Store::class);
    }

    public function categories(){
        return $this->belongsToMany(Category::class); // Para N:N (belongsToMany) o laravel procura o nome da tabela em ordem alfabética, se não tiver em ordem passar o nome correto no segundo parametro da belongsToMany. p.e: $this->belongsToMany(Product::class, products_categories);
    }
}
