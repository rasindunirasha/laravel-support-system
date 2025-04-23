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
<div class="container mt-5">
    <h3>Comments</h3>
    <div class="comments-list">
        @foreach($ticket->comments as $comment)
        <div class="card mb-3">
            <div class="card-header">
                <strong>
                    @if($comment->user_id)
                        {{ $comment->user->name ?? 'System User' }}
                    @else
                        {{ $ticket->customer_name }} (Customer)
                    @endif
                </strong>
                <span class="text-muted small float-right">
                    {{ $comment->created_at->format('d M Y h:i a') }}
                </span>
            </div>
            <div class="card-body">
                <p class="card-text">{{ $comment->content }}</p>
                @if($comment->user_id && $comment->user_id === auth()->id())
                    <small class="text-muted">(Your comment)</small>
                @endif
            </div>
        </div>
        @endforeach
    </div>
</div>
@endif
@endsection