@extends('layouts.app')

@section('content')
<div id="messages" class="container">
    <h2 class="header">Praise Alerts</h2>
    <form action="/send" method="post" id="msgForm">
        @csrf
    <table class="table form-group">
        <tr>
            <td class="text-right font-weight-bold font-weight-italic">
                Send a text message
            </td>
            <td>
                <textarea form="msgForm" class="md-textarea form-control" name="message" placeholder="Type message here..."></textarea>
                <button class="btn btn-primary shift-down-sm md-2" type="submit">Send</button>
            </td>
        </tr>
    </table>
    </form>
</div>
@endsection
