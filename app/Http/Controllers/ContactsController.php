<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Illuminate\Validation\Rule;
use App\Contact;

class ContactsController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // variables to pass to the view
        $title = 'Contacts';
        $contacts = Contact::orderBy('name', 'asc')->paginate(10);

        // display all the contacts
        return view('contacts.index')->with([
            'title' => $title,
            'contacts' => $contacts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            //rules...  'title' => 'required', ...
            'name' => 'required',
            'number' => 'required' // and is number??
        ]);

        // Create Contact
        $contact = new Contact;
        $contact->name = $request->input('name');
        $contact->number = $request->input('number');
        $contact->save();

        return redirect('/contacts')->with('success', 'The contact was created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // display a single contact
        $title = "Contact Page";
        $contact = Contact::find($id);
        return view('contacts.show')->with([
            'title'=>$title,
            'contact'=>$contact
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // display a single contact
        $title = "Contact Page";
        $contact = Contact::find($id);
        return view('contacts.edit')->with([
            'title'=>$title,
            'contact'=>$contact
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => [
                'required|unique:contacts|max:255',
                Rule::unique('contacts')->ignore($id),
            ],
            'number' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('contacts/' . $id . '/edit')
                        ->withErrors($validator)
                        ->withInput();
        }

        $contact = Contact::find($id);
        $contact->name = request('name');
        $contact->number = request('number');
        $contact->save();

        // redirect to groups page with success message
        return redirect('/contacts')->with(['title' => 'Groups', 'success' => 'Contact was edited!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
