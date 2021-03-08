<?php

use Illuminate\Database\Seeder;

class PostsTabelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Notifications\Posts::class, 100)->create();
    }
}
