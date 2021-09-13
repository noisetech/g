@extends('layouts.admin')

@section('title', 'Jurusan')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Perhitungan</h1>
    </div>



    <div class="card shadow">
        <div class="card-body">
            <form action="" method="POST">
                @csrf

                <div class="form-group">

                </div>

                <button class="btn btn-sm btn-primary" type="submit">
                    Tambah
                </button>
            </form>
        </div>
    </div>




</div>
@endsection
