<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        \DB::table('users')->insert(
////            [
////                'name' => 'Administrator',
////                'email' => 'admin@admin.com',
////                'email_verified_at' => now(),
////                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
////                'remember_token' => '987654321',
////            ]
////        );          

        // Na criação de cada utilizador cria uma loja
        // Método save trabalha com objetos e o create com arrays
        factory(\App\Models\User::class, 40)->create()->each(function ($user){
            // Cria 40 users e na criação de cada user cria tb uma loja associada com os dados fakes da factory. O make devolve uma instancia do objeto com os dados do fake

            $user->store()->save(factory(\App\Models\Store::class)->make());
        });

    }

}
