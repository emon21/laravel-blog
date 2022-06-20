<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $setting = Setting::create([
         'site_name' => 'blog',
         'site_logo' => 'backend/setting/logo.png',
         'site_favicon' => 'backend/setting/logo.png',
         'site_desc' => 'about_site',
         'facebook' => 'facebook',
         'twitter' => 'twitter',
         'instagram' => 'instagram',
         'rss' => 'rss',
         'email' => 'devhasib21@gmail.com',
         'copy_right' => 'Copyright © 2022 All rights reserved',
         'phone_no' => '+880 1811 2872 56',
         'address' => '203 Fake St. Mountain View, San Francisco, California, USA',
        ]);
        $setting->save();
    }
}
