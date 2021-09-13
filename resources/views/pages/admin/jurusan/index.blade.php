@extends('layouts.admin')

@section('title', 'Jurusan')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Jurusan</h1>
        <a href="{{ route('jurusan.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-plus-circle fa-sm text-white-50"></i> Tambah Data</a>
    </div>

    <div class="card shadow">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table text-center table-bordered table-hover" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Juruan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($items as $key => $item)
                            <tr>
                               <td>{{ $items->firstItem() + $key }}</td>
                                <td>{{ $item->nama_jurusan }}</td>
                                <td>
                                    <a href="{{ route('jurusan.create', $item->id) }}" class="btn btn-sm btn-warning">
                                        <i class="fas fa-sm fa-edit"></i>
                                    </a>

                                    <form action="{{ route('jurusan.edit', $item->id) }}" method="POST" style="display: inline-block">
                                        @csrf
                                        @method('delete')

                                        <button class="btn btn-sm btn-danger" type="submit">
                                            <i class="fas fa-sm fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $items->links() }}
        </div>
    </div>




</div>
@endsection
