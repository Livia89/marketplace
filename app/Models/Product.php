<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


/* Relações
    1:1 - Um para um (Usuário e loja) - hasOne e belongsTo - tem um e pertence a
    1:N - Um para muitos (Loja e produtos) | hasMany e belongsTo - Tem muitos e pertence a
    N:N - Um para um (Produtos e categorias) | belongsToMany - Pertence a muitos
*/

class Product extends Model
{
    public function store(){
        return $this->belongsTo(Store::class, 'store_id');
    }

    public function categories(){
        return $this->belongsToMany(Product::class); // Para N:N (belongsToMany) o laravel procura o nome da tabela em ordem alfabética, se não tiver em ordem passar o nome correto no segundo parametro da belongsToMany. p.e: $this->belongsToMany(Product::class, products_categories);
    }
}
