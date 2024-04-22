@extends('adminlte::page')

@section('title', config('adminlte.title') . (isset($subtitle) ? ' | ' . $subtitle : ''))

@vite('resources/js/app.js')

@section('content_header')
    @isset($content_header_title)
        <h1 class="text-muted">
            {{ $content_header_title }}
            @isset($content_header_subtitle)
                <small class="text-dark">
                    <i class="fas fa-xs fa-angle-right text-muted"></i>
                    {{ $content_header_subtitle }}
                </small>
            @endisset
        </h1>
    @endisset
@stop


@section('content')
    @yield('content_body')
@stop

@section('footer')
    <div class="float-right">
        Version: {{ config('app.version', '1.0.0') }}
    </div>
    <strong>
        <a href="{{ config('app.company_url', '#') }}">
            {{ config('app.company_name', 'My company') }}
        </a>
    </strong>
@stop

@push('js')
    <script src="https://cdn.datatables.net/2.0.2/js/dataTables.js"></script>
@endpush

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.2/css/dataTables.dataTables.css">
    <style>
        /* You can add AdminLTE customizations here */
        /*
        .card-header {
            border-bottom: none;
        }
        .card-title {
            font-weight: 600;
        }
        */
    </style>
@endpush
