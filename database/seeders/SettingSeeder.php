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
         'site_desc' => 'about_site',
         'facebook' => 'facebook',
         'twitter' => 'twitter',
         'instagram' => 'instagram',
         'rss' => 'rss',
         'email' => 'email',
         'copy_right' => 'Copyright © 2022 All rights reserved',
        ]);
        $setting->save();
    }
}
