@extends('layouts.app')

@section('content')
<h1>Pricing</h1>

    <h3 class="center">
        <a href="<?= $_SERVER['PHP_SELF'];?>?month={{$month-1}}&year={{$year}}">&larr;Last Month</a>
        &nbsp;&nbsp;&nbsp;&nbsp;
        <a href="<?= $_SERVER['PHP_SELF'];?>?month={{$month+1}}&year={{$year}}">Next Month&rarr;</a>
    </h1>

    <h1 class='center underline'><?=$title_date?></h1>

    @foreach ($usage_records as $record) 
        <h1 class="center">Cost: {{$record->price}}</h1>
    @endforeach

    @foreach ($sms_records as $record) 
        <h1 class="center">Number of SMS sent: {{$record->count}}</h1>
    @endforeach
@endsection
