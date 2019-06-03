@extends('layouts.app')

@section('content')
    <a href="/contacts" class="btn btn-dark">Go Back</a>
    <h1>{{$contact->name}}</h1>
    <h1>{{$contact->number}}</h1>

    <hr>

    <a href="/contacts/{{$contact->id}}/edit" class="btn btn-primary">Edit</a>
@endsection