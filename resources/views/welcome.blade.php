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
            <div class="mt-5">
                <p>
                    Check the status of your ticket:
                </p>
                <div class="container">
                    <form class="" action="{{ route('tickets.search') }}" method="get">
                        <div class="row">
                            <div class="col-8">
                                <input type="text" name="reference" value="" class="form-control" placeholder="Enter ticket reference">
                            </div>
                            <div class="col-4">
                                <button type="submit" name="view" class="btn btn-success w-100">View Ticket</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endsection
    </body>
</html>