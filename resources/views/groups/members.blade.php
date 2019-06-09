@extends('layouts.app')

@section('content')
<div class="container form-group">
    <h1 class="header">Add Members to &quot;{{ $group->name }}&quot;</h1>
    <form action="/groups/addmember/{{$group->id}}">
        @foreach($members as $member)
        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="member" name="member[{{$member->id}}]" /> 
            <label for="member" class="form-check-label">{{ $member->name }}</label>
        </div>
        @endforeach
        <button class="btn btn-primary shift-down-sm md-2" type="submit">Add</button>
    </form>
</div>

<p>
    <a class="btn btn-primary" data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Toggle first element</a>
    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#multiCollapseExample2" aria-expanded="false" aria-controls="multiCollapseExample2">Toggle second element</button>
    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target=".multi-collapse" aria-expanded="false" aria-controls="multiCollapseExample1 multiCollapseExample2">Toggle both elements</button>
  </p>
  <div class="row">
    <div class="col">
      <div class=" multi-collapse" id="multiCollapseExample1">
        <div class="card card-body">
          Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
        </div>
      </div>
    </div>
    <div class="col">
      <div class="collapse multi-collapse" id="multiCollapseExample2">
        <div class="card card-body">
          Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
        </div>
      </div>
    </div>
  </div>

  <p id="highlight">Stuff</p>
  <button onclick="highlight()">Act</button>
  <script>
function highlight(){
    $('#multiCollapseExample1').css('background-color', 'yellow');
    $('#multiCollapseExample1').collapse();
}
      </script>
@endsection
