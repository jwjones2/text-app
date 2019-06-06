@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="header">Edit Group</h2>
    <form action="/groups/{{$group->id}}" method="post" id="groupForm">
        @method('PATCH')
        @csrf
    <table class="table form-group">
        <tr>
            <td>
                <input type="text" class="form-control" name="name" value="{{ $group->name }}" placeholder="Group Name" />
            </td>
        </tr>
        <tr>
            <td>
                <textarea form="groupForm" class="md-textarea form-control" name="description" placeholder="Group description...">{{ $group->description }}</textarea>
                <button class="btn btn-primary shift-down-sm md-2" type="submit">Send</button>
            </td>
        </tr>
    </table>
    </form>
</div>
@endsection
