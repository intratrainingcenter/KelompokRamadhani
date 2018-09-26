<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        // $this->call(siswasTableSeeder::class);
        $this->call(kelassTableSeeder::class);
        // $this->call(gurusTableSeeder::class);
        // $this->call(mapelsTableSeeder::class);
        // $this->call(absensisTableSeeder::class);
        // $this->call(jadpiketsTableSeeder::class);


    }
}
