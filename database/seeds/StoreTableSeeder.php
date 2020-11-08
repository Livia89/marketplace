<?php

use Illuminate\Database\Seeder;

class StoreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $stores = \App\Models\Store::all();
<<<<<<< HEAD

        foreach ($stores as $store){
            $store->products()->save(factory(\App\Models\Product::class)->make());

=======
        foreach ($stores as $store){
            $store->products()->save(factory(\App\Models\Product::class)->make());
>>>>>>> 3df03da3ebe39c7378f7cbafe7793a651828bf7b
        }
    }
}
