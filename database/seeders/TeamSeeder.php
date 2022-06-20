<?php

namespace Database\Seeders;

use App\Models\Team;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $categories = [
         'Hasib','Alex','Jone','Mark','Raj','Ear'
     ];

     $id = rand(30, 600);
     $image = 'https://picsum.photos/id/' . $id . '/700/600';

     foreach ($categories as $category) {

      $category = Team::create([
         'team_name' => $category,
         'team_img' => $image,
         'team_desc' => 'about_site',
         'team_facebook_link' => 'facebook',
         'team_twitter_link' => 'twitter',
         'team_linkdin_link' => 'instagram',
        ]);
      
        $category->save();
   }
    
    }
}
