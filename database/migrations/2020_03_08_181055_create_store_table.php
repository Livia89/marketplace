<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger("user_id");
            $table->string("name");
            $table->string("description");
            $table->string("phone");
            $table->string("mobile_phone");
            $table->string("slug"); // Para deixar as rotas mais bonitinhas -> loja da maria = loja-da-maria

            $table->foreign("user_id")->references("id")->on("users"); //  Nome da chave estrangeira -> stores_user_id_foreign (nomeTabela_idRecebeAChave_foreign)

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('store');
    }
}
