@extends('template.master')

@section('content')
    <div class="row">
        <div class="col-lg-6">
            <h2><a href="{!! route("url.short", $url->short_url) !!}" target="_blank">{!!  route("url.short", $url->short_url) !!}</a></h2>
            <p>Your link is above, you can share it now!</p>
        </div>
    </div>
@stop