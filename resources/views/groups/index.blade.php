@extends('layouts.app')

@section('content')
<div class="container table-fluid">
    <h2 class="header">Groups</h2>
    <a href="/groups/create" class="btn btn-primary float-right shift-up-md">Add a Group</a>
    <small>Click on the group name to view.</small>
    <table class="table table-striped">
        <tr>
            <th class="font-weight-bold font-weight-italic">
                Group Name
            </th>
            <th>
                Description
            </th>
        </tr>
        @foreach($groups as $group)
        <tr>
            <td>
                <a href="/groups/{{$group->id}}">{{ $group->name }}</a>
            </td>
            <td>
                {{ $group->description }}
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
