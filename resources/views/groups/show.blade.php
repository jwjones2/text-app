@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="header">{{ $group->name }}</h1>
    <a href="/groups/{{$group->id}}/edit" class="btn btn-warning float-right shift-up-md">Edit Group</a>

    <blockquote class="text-center">{{ $group->description }}</blockquote>

    <!-- List the Group Members -->

    <br />
    <hr />
    
    <h2 class="header">Members</h2>
    <a href="/groups/{{$group->id}}/members" class="btn btn-info center-block">Add Members</a>
</div>
@endsection
