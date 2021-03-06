<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Illuminate\Validation\Rule;
use \App\Group;
use \App\Contact;

class GroupsController extends Controller
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
        $title = 'Groups';
        $groups = Group::all();
        return view('groups.index')->with(['title' => $title, 'groups' => $groups]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Create a single group
        $title = 'Add a Group';
        return view('groups.create')->with('title', $title);
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
            'name' => 'required|unique:groups|max:255',
            'description' => 'required'
        ]);

        $group = new Group();
        $group->name = request('name');
        $group->description = request('description');
        $group->save();

        // redirect to groups page with success message
        return redirect('/groups')->with(['title' => 'Groups', 'success' => 'Group was created!']);
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
        $title = 'Groups';
        $group = Group::find($id);
        return view('groups.show')->with(['title' => $title, 'group' => $group]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Edit Group';
        $group = Group::find($id);
        return view('groups.edit')->with(['title' => $title, 'group' => $group]);
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
                'required|unique:groups|max:255',
                Rule::unique('groups')->ignore($id),
            ],
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('groups/' . $id . '/edit')
                        ->withErrors($validator)
                        ->withInput();
        }

        $group = Group::find($id);
        $group->name = request('name');
        $group->description = request('description');
        $group->save();

        // redirect to groups page with success message
        return redirect('/groups')->with(['title' => 'Groups', 'success' => 'Group was edited!']);
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

    public function view_members ( $id ) {
        // return members and group to the view
        $group = Group::find($id);
        $members = Contact::all();
        $title = 'Add Group Members';

        // return contacts ids that are already a member of the group
        $member_ids = $group->get_member_ids();
        
        return view('groups.members')->with([
            'title' => $title,
            'group' => $group,
            'members' => $members,
            'member_ids' => $member_ids
        ]);
    }
    
    public function members (Request $request, $id ) {
        $members = $request->get('member');

        $group = Group::find($id);

        // loop over ids and add members to the group
        if ( count($members) > 0 ) {
            foreach( array_keys($members) as $member_id ) {
                // get the Model for contact then save
                $contact = Contact::find($member_id);
                $group->members()->attach($contact);
            }
        }
        
        // redirect to groups page with success message
        return redirect('groups/' . $id)->with(['title' => 'Group', 'success' => 'Group members were added!', 'group' => $group]);
    }

    public function remove_member ( $group_id, $contact_id ) {
        $group = Group::find($group_id);
        $group->members()->detach($contact_id);

        // redirect to groups page with success message
        return redirect('groups/' . $group_id)->with(['title' => 'Group', 'success' => 'Group member was removed!', 'group' => $group]);
    }
}
