@extends('layouts.app')

@section('content')
<div class="text-center mt-5">
    <h1>Support Ticket</h1>
    <div class="m-5">

        <div class="row justify-content-center">
            <div class="col-lg-6 text-left">

                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <th>Ticket Refererence</th>
                            <td>{{ $ticket->ref }}</td>
                        </tr>
                        <tr>
                            <th>Customer Name</th>
                            <td>{{ $ticket->customer_name }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $ticket->email }}</td>
                        </tr>
                        <tr>
                            <th>Phone</th>
                            <td>{{ $ticket->phone }}</td>
                        </tr>
                        <tr>
                            <th>Description</th>
                            <td>{{ $ticket->description }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>

@if($ticket->comments->isNotEmpty())
<div class="comments">
    @foreach($ticket->comments as $comment)
    <div class="comment mt-5">
        <div class="comment-author text-muted small">
            <strong>
              @if (isset($comment->user->name))
                  {{ $comment->user->name }}
              @else
                  {{ $ticket->customer_name }}
              @endif
            </strong>
            at
            {{ $comment->created_at->format('d M Y h:i a') }}
        </div>
        <div class="comment-content">
            {{ $comment->content }}
        </div>
    </div>
    @endforeach
</div>
@endif
@endsection