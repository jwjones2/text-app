<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Illuminate\Validation\Rule;
use \App\Group;
use \App\Contact;
use \App\hooks;

class HooksController extends Controller
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
        // list all the groups
        $title = 'Hooks';
        $hooks = hooks::all();
        return view('hooks.index')->with(['title' => $title, 'hooks' => $hooks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Create a single group
        $title = 'Add a Hook';
        return view('hooks.create')->with('title', $title);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'value' => 'required|unique:hooks|max:255',
            'description' => 'required',
            'response' => 'required'
        ]);

        $hook = new hooks();
        $hook->value = request('value');
        $hook->response = request('response');
        $hook->description = request('description');
        $hook->save();

        // redirect to groups page with success message
        return redirect('/hooks')->with(['title' => 'Hooks', 'success' => 'Hook was created!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // show a single group
        $title = 'Hooks';
        $hook = hooks::find($id);
        return view('hooks.show')->with(['title' => $title, 'hook' => $hook]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Edit Hook';
        $hook = hooks::find($id);
        return view('hooks.edit')->with(['title' => $title, 'hook' => $hook]);
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
                'required|unique:hooks|max:255',
                Rule::unique('hooks')->ignore($id),
            ],
            'description' => 'required',
            'response' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('hooks/' . $id . '/edit')
                        ->withErrors($validator)
                        ->withInput();
        }

        $hook = hooks::find($id);
        $hook->value = request('value');
        $hook->response = request('reponse');
        $hook->description = request('description');
        $hook->save();

        // redirect to groups page with success message
        return redirect('/hooks')->with(['title' => 'Hooks', 'success' => 'Hook was edited!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hook = hooks::find($id);
        $hook->delete();

        // redirect to hooks page with success message
        return redirect('/hooks')->with(['title' => 'Hooks', 'success' => 'Hook was deleted.']);
    }

}
