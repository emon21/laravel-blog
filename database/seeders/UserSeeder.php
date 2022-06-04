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
        $user = New User();
        $user->name = 'User';
        $user->email = 'user@user.com';
        $user->email_verified_at = Carbon::now();
        $user->password = bcrypt('12345678');
        $user->save();
    }
}
