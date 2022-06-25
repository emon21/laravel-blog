<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
   


    public function edit(Setting $setting)
    {
        $setting = Setting::first();
        return view('backend.setting.edit',compact('setting'));
    }

    public function update(Request $request)
    {
    // return dd($request->all());
    $this->validate($request,[
       'site_name' => 'required',
       'copy_right' => 'required',
      ]);
      
      $setting = Setting::first();
      // $setting->update($request->all());
       
      //   $setting->update([
      //    'name' => $request->site_name,
      //   ]);

      //Setting Update
      $setting->site_name = $request->site_name; 
      $setting->site_desc = $request->site_desc; 
      $setting->facebook = $request->facebook; 
      $setting->twitter = $request->twitter; 
      $setting->instagram = $request->instagram; 
      $setting->rss = $request->rss;
      $setting->email = $request->email;
      $setting->copy_right = $request->copy_right;
      $setting->phone_no = $request->phone_no;
      $setting->address = $request->address;
        
      if ($setting->site_logo) {

         //File Delete
         if(file_exists($setting->site_logo)){
            unlink($setting->site_logo);
               }
         //File Upload
         $filename = time() . '.' .$request->site_logo->getClientOriginalextension();
         $request->site_logo->move(public_path('backend/setting/'), $filename);
         $setting->site_logo = 'backend/setting/'.$filename;
      }

      //site Favicon
      if($request->hasFile('site_favicon')) {

         //File Delete
         if(file_exists($setting->site_logo)){
            unlink($setting->site_logo);
               }
         //File Upload
         $filename = time() . '.' .$request->site_favicon->getClientOriginalextension();
         $request->site_favicon->move(public_path('backend/setting/'), $filename);
         $setting->site_favicon = 'backend/setting/'.$filename;
      }

      $setting->save();
      return redirect()->back();

    }
}
