@extends('template.master')

@section('content')
    <div class="row">
        @if(isset( $message ))
            <div class="alert alert-dismissible alert-danger">
                <button type="button" class="close" data-dismiss="alert">X</button>
                <strong>Oh snap!</strong>
                {!! $message !!}
            </div>
        @endif
            {!! Form::open(["route" => "url.store", "method" => "post", "class" => "form-horizontal"]) !!}

            <div class="col-lg-6">
                <div class="form-group">
                    <label class="control-label" for="inputDefault">Please paste URL:</label>
                    <input type="text" id="origin_url" name="origin_url" class="form-control" value="{!! isset($old_url) ? $old_url : "" !!}" >
                </div>

                <div class="form-group">
                    <label class="control-label" for="inputDefault">Desired short name (Optional):</label>
                    <input type="text" name="desired_name" class="form-control" value="{!! isset($old_name) ? $old_name : "" !!}" >
                </div>

                <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                        <button type="submit" class="btn btn-info">Submit</button>
                        <button type="reset" class="btn btn-default">Cancel</button>
                    </div>
                </div>
                </div>

        {!! Form::close() !!}
    </div>
@stop
