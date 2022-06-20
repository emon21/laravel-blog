<?php

namespace Database\Seeders;

use App\Models\Subscribe;
use Illuminate\Database\Seeder;

class SubscribeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subscribe = New Subscribe();
        $subscribe->email = 'emonraj@mail.com';
        $subscribe->save();
    }
}
