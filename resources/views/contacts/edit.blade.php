@extends('layouts.app')

@section('content')
    <a href="javascript:history.back()" class="btn btn-outline-dark">&larr;Go Back</a>

    <h2 class="header">Edit Contact</h2>
    <form action="/contacts/{{$contact->id}}" method="post" id="groupForm">
        @method('PATCH')
        @csrf
    <table class="table form-group">
        <tr>
            <td>
                <input type="text" class="form-control" name="name" value="{{ $contact->name }}" />
            </td>
        </tr>
        <tr>
            <td>
                <input type="text" class="form-control" name="number" value="{{ $contact->number }}" />
                <button class="btn btn-primary shift-down-sm md-2" type="submit">Edit</button>
            </td>
        </tr>
    </table>
    </form>
@endsection