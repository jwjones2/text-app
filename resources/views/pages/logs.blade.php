@extends('layouts.app')

@section('content')
<div id="contacts" class="container">
        <h1 class="center"><a href="/clear_logs" class="btn btn-danger">Clear Logs</a></h1>
		<?= file_get_contents('log.txt'); ?>
    </div>
@endsection
