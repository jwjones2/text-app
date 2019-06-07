@extends('layouts.app')

@section('content')
<div class="container form-group">
    <h1 class="header">Add Members to &quot;{{ $group->name }}&quot;</h1>
    <form action="/groups/addmember/{{$group->id}}">
        @foreach($members as $member)
        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="member" name="member[{{$member->id}}]" /> 
            <label for="member" class="form-check-label">{{ $member->name }}</label>
        </div>
        @endforeach
        <button class="btn btn-primary shift-down-sm md-2" type="submit">Add</button>
    </form>
</div>
@endsection
