@extends('layouts.app')

@section('content')
<a href="javascript:history.back()" class="btn btn-outline-dark">&larr;Go Back</a>
<div class="container">
    <h2 class="header">Edit Question</h2>
    <form action="/hooks/{{$hook->id}}" method="post" id="groupForm">
        @method('PATCH')
        @csrf
        <table class="table form-group">
            <tr>
                <td>
                    <textarea form="groupForm" class="md-textarea form-control" name="description" value="{{$hook->description}}" placeholder="Question..."></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="text" class="form-control" name="value" value="{{$hook->value}}" placeholder="Expected Replies, separated by commas" />
                </td>
            </tr>
            <tr>
                <td>
                    <input type="text" class="form-control" name="response" value="{{$hook->response}}" placeholder="Auto Response to the User" />
                    <button class="btn btn-primary shift-down-sm md-2" type="submit">Edit</button>
                </td>
            </tr>
        </table>
    </form>
</div>
@endsection
