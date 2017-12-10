@extends('layouts.master')
@section('title')
    Welcome!fgfjhf
@endsection

@section('content')
    <div class="row">

        <div class="col-md-5">
            <h3 class="text-danger">New user?Please</h3>
            <h1>Sign Up</h1><hr>
            <form action="/users" method="post">

                {{csrf_field()}}

                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                    <label for="email">Your Mail</label>
                    <input class="form-control" type="text" name="email" id="email" value="{{Request::old('email')}}" required>
                </div>


                <div class="form-group {{ $errors->has('first_name') ? 'has-error' : '' }}">
                    <label for="first_name">Your First name</label>
                    <input class="form-control" type="text" name="first_name" id="first_name" value="{{Request::old('first_name')}}" required>
                </div>

                <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                    <label for="password">Password</label>
                    <input class="form-control" type="text" name="password" id="password" value="{{Request::old('password')}}" required>
                </div>

                <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                    <label for="password_confirmation">Password Confirmation:</label>
                    <input type="text" id="password_confirmation" name="password_confirmation" class="form-control" value="{{Request::old('password_confirmation')}}" required>
                </div>

                <button type="submit" class="btn btn-primary">
                    Submit
                </button>
            </form>


            @include('partials.errors')

        </div>



        {{-- Login form --}}



        <div class="col-md-5 col-md-offset-2">
            <h3 class="text-danger">Already have an account?</h3>
            <h1>Login</h1><hr>
            <form action="/users/loginuser" method="post">
                {{csrf_field()}}

                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                    <label for="email">Your Mail</label>
                    <input class="form-control" type="text" name="email" id="email" value="{{Request::old('email')}}">
                </div>


                <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                    <label for="password">pass</label>
                    <input class="form-control" type="text" name="password" id="password">
                </div>

                <button type="submit" class="btn btn-success">
                    Login
                </button>

            </form>

            @include('partials.errors')

        </div>


        {{-- --}}

    </div>
@endsection

