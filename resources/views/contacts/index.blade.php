@extends('layouts.app')

@section('content')
    <h1>Contacts</h1>

    @if(count($contacts) > 0)
        <div class="list-group">
        @foreach($contacts as $contact)
            <a href="/contacts/{{$contact->id}}" class="list-group-item list-group-item-info list-group-item-action">{{$contact->name}} -- {{$contact->number}}</a>
        @endforeach
        </div>

        {{$contacts->links()}}
    @else
        <h3>There are no contacts.</h3>
    @endif
@endsection