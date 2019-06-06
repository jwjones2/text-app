@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="header">Add Members to &quote;{{ $group->name }}&quote;</h1>
    <form action="/groups/members">
        @foreach($members as $member)
            <input type="checkbox" name="member[{{$member->id}}]" /> 
            {{ $member->name }}
        @endforeach
        <button class="btn btn-primary shift-down-sm md-2" type="submit">Send</button>
    </form>
</div>
@endsection
