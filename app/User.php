<?php

namespace App;

use App\Models\Store;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/* Relações
    1:1 - Um para um (Usuário e loja) - hasOne e belongsTo - tem um e pertence a
    1:N - Um para muitos (Loja e produtos) | hasMany e belongsTo - Tem muitos e pertence a
    N:N - Um para um (Produtos e categorias) | belongsToMany - Pertence a muitos
*/

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function store(){
        // o utilizador tem uma loja
        return $this->hasOne(Store::class); // o laravel pegar o nome da classe e procurar pelo nomeDoMetodo_id (chave estrangeira), se tivesse colocado o nome da foreign key loja_id, infomava no segundo parametro
        // return $this->hasOne(Store::class, loja_id);
    }

}
