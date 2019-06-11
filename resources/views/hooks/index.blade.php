@extends('layouts.app')

@section('content')
<h1>Questions</h1>
<a href="/hooks/create" class="btn btn-primary">Add a Question</a>
    @if(count($hooks) > 0)
    <div class="card-group">
        @foreach($hooks as $hook)
        <div class="card" style="">
            <div class="card-header mb-2 bg-info text-white font-weight-bold">
                {{$hook->description}}
            </div>

            <ul class="list-group list-group-flush">
                <li class="list-group-item">Expected Response: {{$hook->value}}</li>
                <li class="list-group-item">Auto Reply:  {{$hook->response}}</li>
                <li class="list-group-item">
                    <a href="/hooks/{{$hook->id}}/edit"><button class="btn btn-warning">Edit</button></a>
                    <form action="/hooks/{{$hook->id}}" method="post" onsubmit="return confirm('Are you sure you want to remove this question?')" style="float: right">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger">Delete</button>
                    </form>
                </li>
            </ul>
        </div>
        @endforeach
    </div>
    @else
        <h3>There are no questions.</h3>
    @endif
    
@endsection