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
            </div>
        </aside>
        <!-- main content -->
        <main class="col-md-9 col-lg-10 px-4">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header">{{ __('Edit Data Dosen') }}</div>

                        <div class="card-body">
                            <!-- Form Edit dosen -->
                            <form action="{{ route('admin.dosen.update', $dosen->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <!-- Input nidn -->
                                <div class="form-group mb-3">
                                    <label for="nidn">NIDN</label>
                                    <input type="text" class="form-control" id="nidn" name="nidn" value="{{ $dosen->nidn }}" placeholder="Masukkan nidn" required>
                                </div>

                                <!-- Input Nama -->
                                <div class="form-group mb-3">
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control" id="nama" name="nama" value="{{ $dosen->nama }}" placeholder="Masukkan Nama" required>
                                </div>

                                <!-- Input Email -->
                                <div class="form-group mb-3">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{ $dosen->email }}" placeholder="Masukkan Email" required>
                                </div>

                                <!-- Submit Button -->
                                <button type="submit" class="btn btn-primary" onclick="return confirm('Apakah Anda yakin ingin mengedit data ini?')">
                                    {{ __('Update') }}
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
@endsection