<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/* Relações
    1:1 - Um para um (Usuário e loja) - hasOne e belongsTo - tem um e pertence a
    1:N - Um para muitos (Loja e produtos) | hasMany e belongsTo - Tem muitos e pertence a
    N:N - Um para um (Produtos e categorias) | belongsToMany - Pertence a muitos
*/


class Category extends Model
{
    public function products()
    {
        return $this->belongsToMany(Product::class); // Para as tabelas intermediárias ou pivor o laravel procura as chaves estrangeiras em ordem alfabética, como são
    }
}
