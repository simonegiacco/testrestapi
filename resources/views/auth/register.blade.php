@extends('layouts.default')

@section('content')

    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            @include('errors.list')

            <form method="POST" action="{{ url('register') }}">
                {!! csrf_field() !!}

                <div class="form-group">
                    <label for="first_name">First Name</label>
                    <input type="text" name="first_name" value="{{ old('first_name') }}" placeholder="First Name" class="form-control">
                </div>

                <div class="form-group">
                    <label for="last_name">Last Name</label>
                    <input type="text" name="last_name" value="{{ old('last_name') }}" placeholder="Last Name" class="form-control">
                </div>

                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" value="{{ old('username') }}" placeholder="Username" class="form-control">
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" placeholder="E-mail Address" class="form-control">
                </div>

                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="text" name="phone" value="{{ old('phone') }}" placeholder="Phone Number" class="form-control">
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" placeholder="Password" class="form-control">
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" name="password_confirmation" placeholder="Confirm Password" class="form-control">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Register</button>
                </div>
            </form>
        </div>
    </div>

@stop