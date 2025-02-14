@extends('layouts.app')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
@section('content')
<div class="container-fluid">
    <div class="row">
        <aside class="col-md-3 col-lg-2 bg-light sidebar py-4 vh-100 d-md-block d-none">
            <div class="list-group">
                <a href="{{ route('home') }}" class="list-group-item list-group-item-action bg-light"><i class="fas fa-home"></i> Home</a>
                <a href="{{ route('admin.dosen.index') }}" class="list-group-item list-group-item-action bg-light"><i class="fas fa-user-tie"></i> Data Dosen</a>
                <a href="{{ route('admin.mahasiswa.index') }}" class="list-group-item list-group-item-action bg-light"><i class="fas fa-user-graduate"></i> Data Mahasiswa</a>
                <a href="{{ route('admin.jurusan.index') }}" class="list-group-item list-group-item-action bg-light"><i class="fas fa-building"></i> Data Jurusan</a>
                <a href="{{ route('admin.tuakir.index') }}" class="list-group-item list-group-item-action bg-light"><i class="fas fa-file-alt"></i> Data Tugas Akhir</a>

                <form action="{{ route('logout') }}" method="POST" class="list-group-item list-group-item-action bg-light">
                    @csrf
                    <button type="submit" class="btn btn-link text-decoration-none p-0">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </button>
                </form>
            </div>
        </aside>
        <!-- main content -->
        <main class="col-md-9 col-lg-10 px-4">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header">{{ __('Create Data Jurusan') }}</div>

                        <div class="card-body">
                            <form action="{{ route('admin.jurusan.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control" id="nama" name="nama" required>
                                </div>

                                <br>
                                <!-- Tombol Submit -->
                                        <button type="submit" class="btn btn-primary" onclick="return confirm('Data Berhasil ditambhkan')">
                                            {{ __('Save') }}
                                        </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>@endsection
