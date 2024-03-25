@extends('m_user/template')
@extends('adminlte::page')
@section('content')
<div class="row mt-5 mb-5">
    <div class="col-lg-12 margin-tb bg-dark rounded-2">
        <div class="float-left">
            <h2 class="text-light">CRUD user</h2>
        </div>
        <div class="float-right m-2">
            <a href="{{route('m_user.create') }}" class="btn btn-success">Input User</a>
        </div>
    </div>
</div>
@if ($message = Session::get('success'))
<div class="alert alert-success">
<p>{{ $message }}</p>
</div>
@endif
<table class="table table-bordered">
<tr>
<th width="20px" class="text-center ">User id</th>
<th width="150px" class="text-center ">Level id</th>
<th width="200px"class="text-center ">Username</th>
<th width="200px"class="text-center ">Nama</th>
<th width="150px"class="text-center ">Password</th>
</tr>
@foreach ($useri as $m_user)
<tr>
<td>{{ $m_user->user_id }}</td>
<td>{{ $m_user->level_id }}</td>
<td>{{ $m_user->username }}</td>
<td>{{ $m_user->nama }}</td>
<td>{{ $m_user->password }}</td>
<td class="text-center">
<form class="d-flex" action="{{ route('m_user.destroy', $m_user->user_id) }}"method="POST">
<a class="btn btn-info btn-sm mr-2 m-1" href="{{ route('m_user.show',$m_user->user_id) }}">Show</a>
<a class="btn btn-primary btn-sm mr-2 m-1" href="{{
route('m_user.edit',$m_user->user_id) }}">Edit</a>
@csrf
@method('DELETE')
<button type="submit" class="btn btn-danger btn-sm mr-2 m-1" onclick="return
confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
</form>
</td>
</tr>
@endforeach
</table>
@endsection
