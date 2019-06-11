@extends('layouts.app')

@section('content')
<a href="javascript:history.back()" class="btn btn-outline-dark">&larr;Go Back</a>

    <div class="card" style="width: 18rem; top: 10px;">
        <div class="card-header mb-2 bg-info text-white font-weight-bold">
            {{$contact->name}}
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">{{$contact->number}}</li>
        </ul>
    </div>

    <hr>

    <a href="/contacts/{{$contact->id}}/edit" class="btn btn-primary">Edit</a>
@endsection