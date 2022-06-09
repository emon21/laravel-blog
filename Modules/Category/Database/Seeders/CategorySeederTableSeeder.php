<?php

namespace Modules\Category\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Category\Entities\Category;
use Illuminate\Support\Str;
class CategorySeederTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();


    //   for ($i=0; $i <10 ; $i++) {

    //     $category = New Category();
    //     $category->category_name = 'Laravel Php Framwork';
    //     $category->slug = Str::slug($category->category_name);
    //     $category->save();
    //   }


        // $category->slug = Str::slug($category->category_name);
        // $category->save();

        // $category = New Category();
     //   Category::truncate();
        // $category->category_name = 'Laravel';
        // $category->slug = Str::slug($category->category_name);
        // $category->save();
        // $category = [
        //     [
        //         'category_name' => 'PHP',

        //         ],

        // ];

       // $category->save();
       // Category::create($category);

            // Category::create([
            //     'image' => 'image link',
            //     'name' => 'name',
            // ]);
            // Category::create([
            //     'image' => 'image link',
            //     'name' => 'name',
            // ]);
            // Category::create([
            //     'image' => 'image link',
            //     'name' => 'name',
            // ]);
            // Category::create([
            //     'image' => 'image link',
            //     'name' => 'name',
            // ]);




    // $professions = [


    //     [
    //         'category_name' => 'PHP';
    //         'slug' => 'ddd';
    //     ],

    // ];

    // $category = array([


    //     [
    //         'category_name' => 'PHP',
    //         'image' => 'default.jpg',
    //     ],
    //     [
    //         'category_name' => 'Laravel',
    //         'image' => 'default.jpg',
    //     ],
    //     [
    //         'category_name' => 'Java',
    //         'image' => 'default.jpg',
    //     ]

    // ]);

    // $category =  array(

    //     'PHP' => array(
    //         'image' => 'default.jpg',
    //     ),
    //     'Laravel' => array(
    //         'image' => 'lara.jpg',
    //     ),
    //      'Vue JS' => array(
    //         'image' => 'vue.jpg',
    //     )
    //      );

    // $permissions = [
    //     [ 'PHP','default.jpg'],
    //     [ 'Lara','lara.jpg'],
    // ];
   // return print_r($permissions);

        // for ($i = 0; $i < count($permissions); $i++) {
        //     Category::create([
        //         'category_name' => $permissions,
        //         'slug' => Str::slug($permissions),


        //     ]);
        // }
        $category = [
            'Php','Laravel','Html','Css','Vue jS','Java','Python','Apps','Nuxt JS' ,'
            Asp.Net','C#','React JS'
        ];
    foreach ($category as $value) {

        Category::create([
            'category_name' => $value,
            'slug' => Str::slug($value),
            'image' => 'default.jpg',
            'status' => 0
        ]);
    }
    //    for ($i=0; $i <10 ; $i++) {
    //     Category::create([
    //         'category_name' => 'Laravel',
    //         'slug' => Str::slug('$professions'),
    //     ]);
    //   }

	    	// Category::create([

	        //    [
            //     'category_name' => 'PHP',
	        //     'slug' => 'PHP',
            //    ],
            //    [
            //     'category_name' => 'Laravel',
	        //     'slug' => 'PHP',
            //    ],

	        // ]);


        // $category = New Category();
        // $category->category_name;
        // Category::create([

        //     [
        //     'category_name' => 'PHP',
        //     'slug' => Str::slug($category->category_name),

        //     ],
        //     [
        //     'category_name' => 'Laravel',
        //     'slug' => Str::slug($category->category_name),

        //     ],
        //     [
        //     'category_name' => 'Vue JS',
        //     'slug' => Str::slug($category->category_name),

        //     ],

        // ]);

       // Category::factory(10)->create();
        // Category::factory(10)->create();

        // $this->call("OthersTableSeeder");
    }
}
