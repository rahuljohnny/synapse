@extends('layouts.master')
@section('title')
    Welcome!
@endsection

@section('content')
    <div class="row">

        <div class="col-md-5">
            <h1>Sign Up</h1>
            <form action="#" method="post">
                <div class="form-group">
                    <label for="email">Your Mail</label>
                    <input class="form-control" type="text" name="email" id="email">
                </div>

                <div class="form-group">
                    <label for="first_name">Your First name</label>
                    <input class="form-control" type="text" name="first_name" id="first_name">
                </div>

                <div class="form-group">
                    <label for="password">Your Mail</label>
                    <input class="form-control" type="text" name="password" id="password">
                </div>

                <button type="submit" class="btn btn-success">
                    Submit
                </button>

            </form>
        </div>



        <div class="col-md-5 col-md-offset-2">
            <h1>Login</h1>
            <form action="#" method="post">
                <div class="form-group">
                    <label for="email">Your Mail</label>
                    <input class="form-control" type="text" name="email" id="email">
                </div>


                <div class="form-group">
                    <label for="password">Your Mail</label>
                    <input class="form-control" type="text" name="password" id="password">
                </div>

                <button type="submit" class="btn btn-success">
                    Login
                </button>

            </form>
        </div>

    </div>
@endsection

