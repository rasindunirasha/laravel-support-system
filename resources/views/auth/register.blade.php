@extends('layouts.app')

@section('content')
<div class="text-center mt-5">
    <h1>Sign Up</h1>
    <div class="m-5">

        
        <form class="" action="{{ route('register') }}" method="post">
            {{ csrf_field() }}

            <div class="row justify-content-center">
                <div class="col-lg-6">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="form-group row">
                        <div class="col-md-4 text-md-right">
                            <label for="name">Name</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" name="name" value="{{ old('name') }}" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-4 text-md-right">
                            <label for="email">Email</label>
                        </div>
                        <div class="col-md-8">
                            <input type="email" name="email" value="{{ old('email') }}" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-4 text-md-right">
                            <label for="password">Password</label>
                        </div>
                        <div class="col-md-8">
                            <input type="password" name="password" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-4 text-md-right">
                            <label for="password_confirmation">Confirm Password</label>
                        </div>
                        <div class="col-md-8">
                            <input type="password" name="password_confirmation" class="form-control" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-8 offset-md-4 text-md-right">
                            <input type="submit" value="Register" class="btn btn-success">
                        </div>
                    </div>
                </div>
            </div>
            <p>Already have an account? <a href="{{ route('login') }}">Login here</a></p>
        </form>
        

    </div>
</div>
@endsection