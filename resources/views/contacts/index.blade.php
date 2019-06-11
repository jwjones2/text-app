@extends('layouts.app')

@section('content')

    @if(count($contacts) > 0)
        <div class="card" style="">
            <div class="card-header mb-2 bg-info text-white font-weight-bold">
                Contacts
            </div>

            @foreach($contacts as $contact)
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><a href="/contacts/{{$contact->id}}">{{$contact->name}} ({{$contact->number}})</a></li>
                </ul>
            @endforeach
        
        </div>
        {{$contacts->links()}}
    @else
        <h3>There are no contacts.</h3>
    @endif
    
@endsection