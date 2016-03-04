@extends('template.master')

@section('content')
    <div class="row">
        {!! Form::model($url, ["route" => ["url.update", $url->id], "method" => "put", "class" => "form-horizontal"]) !!}
        <div class="col-lg-6">
            <div class="form-group">
                <label class="control-label" for="inputDefault">Saved URL:</label>
                {!! Form::text("origin_url", null, ["class" => "form-control"]) !!}
            </div>

            <div class="form-group">
                <label class="control-label" for="inputDefault">Short URL:</label>
                {!! Form::text("short_url", null, ["class" => "form-control"]) !!}
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