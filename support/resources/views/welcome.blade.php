<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name') }}</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
    <body class="antialiased">
    @extends('layouts.app')

    @section('content')

        <div class="text-center mt-5">
            <h1>Support System</h1>
            <div class="mt-5">
                <a href="{{ route('tickets.create') }}" class="btn btn-primary">Open New Ticket</a>
            </div>
        </div>
    @endsection
    </body>
</html>