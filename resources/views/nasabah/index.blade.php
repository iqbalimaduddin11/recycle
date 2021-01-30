@extends('layouts.main')

@section('content')
@if( session('status') )
<div class="alert alert-success">
    {{ session('status') }}
</div>
@endif
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="my-2">Nasabah</h4>
                    <div class="table-responsive m-b-40">
                          <table class="table table-borderless table-data3">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Name</th>
                                                    <th>Avatar</th>
                                                    <th>Email</th>
                                                    <th>Nomer</th>
                                                    <th>Alamat</th>
                                                    <th class="center">Action</th>
                                                </tr>
                                            </thead>
                                @foreach ($nasabah as $key => $nasabah)
                                <tbody>
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $nasabah->name}}</td>
                                        <td>{{ $nasabah->avatar}}</td>
                                        <td>{{ $nasabah->email}}</td>
                                        <td>{{ $nasabah->nomer}}</td>
                                        <td>{{ $nasabah->alamat}}</td>
                                        <td class="center">
                                            <a href="/nasabah/{{ $nasabah->id }}/edit" >
                                                <button><i class="fa fa-lg fa-pencil-square-o mr-1"></i></button>
                                            </a>
                                            <form action="/nasabah/{{ $nasabah->id }}" style="display: inline-block;"
                                                method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" onclick="return confirm('Anda Yakin ???');">
                                                    <i class="fa fa-lg fa-trash ml-1"></i>
                                                </button>
                                            </form>
                                        </td>
                                </tbody>
                                @endforeach
                            </table>
                        </div>
                </div>
            </div>
            <a href="/nasabah/create" class="btn btn-success">Add Nasabah</a>
    </div>
</div>
@endsection
