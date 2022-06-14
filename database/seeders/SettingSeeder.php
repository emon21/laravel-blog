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
         'name' => 'blog',
         'site_logo' => 'backend/setting/logo.png',
         'about_site' => 'about_site',
         'facebook' => 'facebook',
         'twitter' => 'twitter',
         'instragrm' => 'instragrm',
         'rss' => 'rss',
         'email' => 'email',
         'copy_right' => 'Copyright © 2022 All rights reserved',
        ]);
        $setting->save();
    }
}
