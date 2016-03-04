@extends('template.master')

@section('content')
<!-- resources/views/auth/login.blade.php -->

{!! Form::open(["route" => "login", "method" => "post", "class" => "form-horizontal"]) !!}
<div class="form-group">
    <div class="col-md-4 col-md-offset-4">
        <div class="alert alert-dismissible alert-info">
            <strong>Please login or register to proceed</strong>
        </div>
        <div class="form-group">
            <label class="control-label">Email:</label>
            <input type="email" name="email" class="form-control"  value="{{ old('email') }}">
        </div>

        <div class="form-group">
            <label class="control-label" for="inputDefault">Password:</label>
            <input type="password" name="password" class="form-control">
        </div>
        <input type="checkbox" name="remember"> Remember Me

        <div class="form-group">
            <div class="col-lg-10 col-lg-offset-2">
                <button type="submit" class="btn btn-info">Login</button>
                <button type="reset" class="btn btn-default">Cancel</button>
            </div>
        </div>
    </div>
</div>
{!! Form::close() !!}

@stop