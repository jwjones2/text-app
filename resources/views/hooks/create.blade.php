@extends('layouts.app')

@section('content')
<a href="javascript:history.back()" class="btn btn-outline-dark">&larr;Go Back</a>
<div class="container">
    <h2 class="header">Create Question</h2>
    <form action="/hooks" method="post" id="groupForm">
        @csrf
    <table class="table form-group">
        <tr>
            <td>
                <textarea form="groupForm" class="md-textarea form-control" name="description" placeholder="Question..."></textarea>
            </td>
        </tr>
        <tr>
            <td>
                <input type="text" class="form-control" name="value" placeholder="Expected Reply" />
            </td>
        </tr>
        <tr>
            <td>
                <input type="text" class="form-control" name="response" placeholder="Auto Response to the User" />
                <button class="btn btn-primary shift-down-sm md-2" type="submit">Create</button>
            </td>
        </tr>
    </table>
    </form>
</div>
@endsection
