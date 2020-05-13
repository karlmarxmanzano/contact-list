<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;
use App\Mail\NewContactNotification;
use Mail;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $contacts = Contact::paginate(10);

      return view('contacts.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request, [
          'first_name' => 'required',
          'last_name' => 'required',
          // 'email' => 'required|unique:contacts',
          'contact_number' => 'required',
      ]);

      $contact = Contact::create([
          'first_name' => $request->first_name,
          'last_name' => $request->last_name,
          'email' => $request->email,
          'contact_number' => $request->contact_number,
      ]);

      Mail::to($request->email)->send(new NewContactNotification);

      return redirect()->route('contacts.index')->with('status', 'Contact created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        return view('contacts.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        return view('contacts.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
      $contact->update([
        'first_name' => $request->first_name,
        'last_name' => $request->last_name,
        'email' => $request->email,
        'contact_number' => $request->contact_number,
      ]);

    return redirect()->route('contacts.index')->with('status', 'Contact updated successfuly.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
      $contact->delete();

      return redirect()->route('contacts.index')->with('status', 'Contact deleted successfully.');
    }
}
