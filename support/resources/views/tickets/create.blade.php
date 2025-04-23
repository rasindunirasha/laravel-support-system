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
            <h1>Open New Ticket</h1>
            <div class="m-5">

                <!-- FORM START -->
                <form action="{{ route('tickets.store') }}" method="POST">
                    @csrf
                    <div class="row justify-content-center">
                        <div class="col-lg-6">

                            <div class="form-group row">
                                <div class="col-md-4 text-md-right">
                                    <label for="customer_name">Your Name</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="customer_name" value="{{ old('customer_name') }}" class="form-control @error('customer_name') is-invalid @enderror">
                                    @error('customer_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-4 text-md-right">
                                    <label for="email">Email</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror">
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-4 text-md-right">
                                    <label for="phone">Phone</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="phone" value="{{ old('phone') }}" class="form-control @error('phone') is-invalid @enderror">
                                    @error('phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-4 text-md-right">
                                    <label for="description">Description</label>
                                </div>
                                <div class="col-md-8">
                                    <textarea name="description" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-8 offset-md-4 text-md-right">
                                    <input type="submit" value="Submit" class="btn btn-success">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- FORM END -->

            </div>
        </div>
        @endsection

    </body>
</html>
