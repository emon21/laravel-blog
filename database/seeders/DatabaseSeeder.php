<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Category\Database\Seeders\CategorySeederTableSeeder;
use Modules\tag\Database\Seeders\TagTableSeeder;
use Modules\Blog\Database\Seeders\PostSeederTableSeeder;
use App\Models\User;
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
           TagTableSeeder::class,
           PostSeederTableSeeder::class

        ]);
      //  User::factory(10)->create();
    }
}
