<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SocialShareButtonsController extends Controller
{
    
   public function ShareWidget()
   {
       $shareComponent = \Share::page(
           'https://www.positronx.io/create-autocomplete-search-in-laravel-with-typeahead-js/',
           'Your share text comes here',
       )
       ->facebook()
       ->twitter()
       ->linkedin()
       ->telegram()
       ->whatsapp()        
       ->reddit();

       
       
       return view('frontend.single_post', compact('shareComponent'));
     //  return view('frontend.single_post',compact('post','posts','category','tags','firstrelatedpost','middlerelatedpost','lastrelatedpost','comment'));

   }
   
}
