@extends('layouts.app')

{{-- Customize layout section --}}

@section('subtitle','Kategori')
@section('content_header_title','Home')
@section('content_header_subtitle','Kategori')

@section('content')
<div class="containet">
    <div class="card">
        <div class="card-header">Manage Kategori</div>
        <div class="card-body">
            {{$dataTable->table() }}
            <a href="kategori/create" class="btn btn-primary mt-3">Add</a>
        </div>
    </div>
</div>
@endsection

@push('scripts')
{{$dataTable->scripts() }}
@endpush