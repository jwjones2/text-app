@extends('layouts.app')

@section('content')
<div id="messages" class="container">
    <h2 class="header">Praise Alerts</h2>
    <form action="/send" method="post" id="msgForm" onsubmit="return confirm('Review Message:\n\n' + $('#message').val() )">
        @csrf
    <table class="table form-group">
        <tr>
            <td class="text-right font-weight-bold font-weight-italic">
                <!-- Show the groups to send to -->
                <div class="form-group">
                    <label for="messageGroup">Send a message: </label>
                    <select name="send_to" id="messageGroup" class="form-control" form="msgForm">
                        <option value="0">to All Contacts</option>
                        @foreach($groups as $group)
                            <option value="{{$group->id}}">to {{$group->name}}</option>
                        @endforeach
                    </select>
                </div>
            </td>
            <td>
                <textarea form="msgForm" class="md-textarea form-control" id="message" name="message" placeholder="Type message here..."></textarea>
                <button class="btn btn-primary shift-down-sm md-2" type="submit">Send</button>
            </td>
        </tr>
    </table>
    </form>
</div>
@endsection
