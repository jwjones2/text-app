@extends('layouts.app')

@section('content')
<div id="messages" class="container">
    <h2 class="header">Questions</h2>

    <a href="/hooks/create" class="btn btn-primary shift-up-md">Edit Questions</a>
    
    @foreach($hooks as $hook)
    <div class="card" style="width: 18rem; top: 10px;">
        <div class="card-header mb-2 bg-info text-white font-weight-bold">
            {{$hook->description}}
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Expected Response:  {{$hook->value}}</li>
            <li class="list-group-item">Automatic Reply:  {{$hook->response}}</li>
        </ul>
    </div>
    @endforeach

</div>
@endsection
