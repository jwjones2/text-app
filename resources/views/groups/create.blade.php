@extends('layouts.app')

@section('content')
<a href="javascript:history.back()" class="btn btn-outline-dark">&larr;Go Back</a>
<div class="container">
    <h2 class="header">Add a Group</h2>
    <form action="{{ action('GroupsController@store') }}" method="post" id="groupForm">
        @csrf
    <table class="table form-group">
        <tr>
            <td>
                <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Group Name" />
            </td>
        </tr>
        <tr>
            <td>
                <textarea form="groupForm" class="md-textarea form-control" name="description" placeholder="Group description...">{{ old('description') }}</textarea>
                <button class="btn btn-primary shift-down-sm md-2" type="submit">Create</button>
            </td>
        </tr>
    </table>
    </form>
</div>
@endsection
