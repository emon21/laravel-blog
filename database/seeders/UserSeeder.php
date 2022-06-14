<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

       
     User::insert([
          
         [
            //User
            'name' => 'User',
            'email' => 'user@mail.com',
            'email_verified_at' => Carbon::now(),
            'password' => bcrypt('12345678'),
            'user_type' => '0',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur sed ipsum voluptatum autem eveniet? Maiores deserunt quidem dicta obcaecati, omnis necessitatibus animi adipisci eum excepturi, dolore officia facilis ea recusandae.'
        ],
         [
            //Admin
            'name' => 'Admin',
            'email' => 'admin@mail.com',
            'email_verified_at' => Carbon::now(),
            'password' => bcrypt('12345678'),
            'user_type' => '1',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur sed ipsum voluptatum autem eveniet? Maiores deserunt quidem dicta obcaecati, omnis necessitatibus animi adipisci eum excepturi, dolore officia facilis ea recusandae.'
         ]
          
       ]);
     
    }
}
