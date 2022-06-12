<?php

namespace Modules\Category\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Category\Entities\Category;
use Facker\Factory as Facker;
class CategoryDatabaseSeeder extends Seeder
{

    protected $mode = Category::class;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $this->call("OthersTableSeeder");

       Category::factory()->count(10)->create();
    }
}
