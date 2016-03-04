@extends('template.master')

@section('content')
        <!-- resources/views/auth/login.blade.php -->

{!! Form::open(["route" => "register", "method" => "post", "class" => "form-horizontal"]) !!}
<div class="form-group">
    <div class="col-md-4 col-md-offset-4">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="form-group">
            <label class="control-label">Name:</label>
            <input type="text" name="name" class="form-control"  value="{{ old('name') }}">
        </div>


        <div class="form-group">
            <label class="control-label">Email:</label>
            <input type="email" name="email" class="form-control"  value="{{ old('email') }}">
        </div>

        <div class="form-group">
            <label class="control-label">Password:</label>
            <input type="password" name="password" class="form-control">
        </div>

        <div class="form-group">
            <label class="control-label">Password:</label>
            <input type="password" name="password_confirmation" class="form-control">
        </div>

        <div class="form-group">
            <div class="col-lg-10 col-lg-offset-2">
                <button type="submit" class="btn btn-info">Register</button>
                <button type="reset" class="btn btn-default">Cancel</button>
            </div>
        </div>
    </div>
</div>
{!! Form::close() !!}

@stop