@extends('layouts.app')

@section('content')
<div id="messages" class="container">
    <h2 class="header">Praise Alerts</h2>
    <table class="table form-group">
        <tr>
            <td class="text-right font-weight-bold font-weight-italic">
                Send a text message
            </td>
            <td>
                <textarea class="md-textarea form-control" id="message"></textarea>
                <a href="/send" class="btn btn-primary shift-down-sm">Send</a>
            </td>
        </tr>
    </table>
</div>
@endsection
