<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Category\Database\Seeders\CategorySeederTableSeeder;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            UserSeeder::class,
            AdminSeeder::class,
            //Module Category
           CategorySeederTableSeeder::class,

        ]);
    }
}
