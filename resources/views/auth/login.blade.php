@extends('app')

@section('content')
    <div class="row login-form">
        <div class="col-xs-4 col-xs-offset-4">
            <form method="POST" action="/auth/login">
                {!! csrf_field() !!}
                <div>
                    Email
                    <br>
                    <input class="btn-block" type="email" name="email">
                </div>

                <div>
                    Password
                    <br>
                    <input class="btn-block" type="password" name="password" id="password">
                </div>

                <div class="pull-right">
                    <input type="checkbox" name="remember"> Remember me
                </div>

                <br>
                <br>

                <div>
                    <button class="btn btn-block" type="submit">Login</button>
                </div>
            </form>
        </div>
    </div>
@endsection