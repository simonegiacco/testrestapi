@extends('layouts.default')

@section('content')

    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            @include('errors.list')

            <form method="POST" action="{{ url('login') }}">
                {!! csrf_field() !!}

                <div class="form-group">
                    <label for="username">Username or Email</label>
                    <input type="text" name="username" value="{{ old('username') }}" placeholder="Username or E-mail Address" autofocus="autofocus" class="form-control">
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="Password" class="form-control">
                </div>

                <div class="form-group">
                    <label>
                        <input type="checkbox" name="remember"> Remember Me
                    </label>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
            </form>
        </div>
    </div>
@stop