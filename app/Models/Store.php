<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

<<<<<<< HEAD
class Store extends Model
{
    protected $fillable = ['name', 'description', 'phone', 'mobile_phone', 'slug'];

    public function user(){
=======
/* Relações
    1:1 - Um para um (Usuário e loja) - hasOne e belongsTo - tem um e pertence a
    1:N - Um para muitos (Loja e produtos) | hasMany e belongsTo - Tem muitos e pertence a
    N:N - Um para um (Produtos e categorias) | belongsToMany - Pertence a muitos
*/

class Store extends Model
{
    // protected $table = 'lojas'; - Caso quisesse ter uma tabela com nome diferente do normal (Stores) mas não é padrão.
    protected $fillable = ['name', "description", "phone", "mobile_phone", "slug"];

    public function user(){
        // Uma loja pertence a um usuario
>>>>>>> 3df03da3ebe39c7378f7cbafe7793a651828bf7b
        return $this->belongsTo(User::class);
    }

    public function products(){
        return $this->hasMany(Product::class);
    }
<<<<<<< HEAD
}
=======

}


>>>>>>> 3df03da3ebe39c7378f7cbafe7793a651828bf7b
