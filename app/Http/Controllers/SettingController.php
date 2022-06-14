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
      $setting->update($request->all());
       
      //   $setting->update([
      //    'name' => $request->site_name,
      //   ]);
        
        
        if($request->hasFile('site_logo')) {
         $filename = time() . '.' .$request->site_logo->getClientOriginalextension();
         $request->site_logo->move(public_path('backend/setting/'), $filename);
         $setting->site_logo = 'backend/setting/'.$filename;
         $setting->save();
      }
      return redirect()->back();

    }
}
