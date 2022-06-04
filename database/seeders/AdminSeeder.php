<?php

namespace Database\Seeders;

use App\Models\Admin;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new Admin();
        $admin->name = 'Admin';
        $admin->email = 'admin@admin.com';
        $admin->email_verified_at = Carbon::now();
        $admin->password = bcrypt('12345678');
        $admin->save();
    }
}
