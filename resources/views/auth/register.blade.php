@extends('app')

@section('content')
    <div class="row login-form">
        <div class="col-xs-4 col-xs-offset-4">
            <form method="POST" action="/auth/register">
                {!! csrf_field() !!}
                <div>
                    Name
                    <br>
                    <input class="btn-block" type="text" name="name" value="{{ old('name') }}">
                </div>

                <div>
                    Email
                    <br>
                    <input class="btn-block" type="email" name="email" value="{{ old('email') }}">
                </div>

                <div>
                    Password
                    <br>
                    <input class="btn-block" type="password" name="password">
                </div>

                <div>
                    Confirm Password
                    <br>
                    <input class="btn-block" type="password" name="password_confirmation">
                </div>

                <br>
                <br>

                <div>
                    <button class="btn btn-block" type="submit">Register</button>
                </div>
            </form>
        </div>
    </div>
@endsection