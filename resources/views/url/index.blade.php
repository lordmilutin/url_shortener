@extends('template.master')

@section('content')
    <div class="row">
        <div class="col-lg-12">

            <table class="table table-striped table-hover ">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Original URL</th>
                    <th>Short URL</th>
                    <th>Created</th>
                    <th>Expires</th>
                </tr>
                </thead>
                <tbody>
                @foreach($urls as $url)
                    <tr>
                        <td>{{ $url->id }}</td>
                        <td>{{ $url->origin_url }}</td>
                        <td>{{ route("url.short", $url->short_url) }}</td>
                        <td>{{ $url->created_at }}</td>
                        <td>{{ $url->created_at->addDays(15) }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>
@stop