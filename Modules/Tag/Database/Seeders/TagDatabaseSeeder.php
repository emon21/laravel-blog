<?php

namespace Modules\Tag\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Tag\Entities\Tag;
class TagDatabaseSeeder extends Seeder
{
    protected $mode = Tag::class;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $this->call([
            // CategorySeederTableSeeder::class,
            TagTableSeeder::class,
             // UserSeeder::class,
         ]);
        // $this->call("OthersTableSeeder");
        //Tag::factory(10)->create();
    }
}
