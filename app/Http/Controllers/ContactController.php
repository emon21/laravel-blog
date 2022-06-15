<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $contact = Contact::latest()->get();
        return view('backend.contact.index',compact('contact'));
    }

   
    public function create()
    {
        
    }

   
    public function store(Request $request)
    {
        
    }

   
    public function show(Contact $contact,$id)
    {
      $contact = Contact::find($id);
      if($contact){
         return view('backend.contact.show',compact('contact'));
      }
      else{
        return redirect('message')->with('error','Contact Message Not Found.');
      }
     
    }

    
    public function edit(Contact $contact)
    {
        
    }

    
    public function update(Request $request, Contact $contact)
    {
        
    }

    
    public function destroy(Contact $contact,$id)
    {
      $contact = Contact::find($id);

      if($contact){
         $contact->delete();
        return redirect()->route('message')->with('error','Contact Message Delete Successfully.');

      }
      else{
         abort(404);
      }
    }
}
