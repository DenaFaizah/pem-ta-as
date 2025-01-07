@extends('layouts.app')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
@section('content')
<div class="container-fluid">
    <div class="row">
        <aside class="col-md-3 col-lg-2 bg-light sidebar py-4 vh-100 d-md-block d-none">
            <div class="list-group">
                <a href="{{ route('home') }}" class="list-group-item list-group-item-action bg-light"><i class="fas fa-home"></i> Home</a>
                <a href="{{ route('dosen.index') }}" class="list-group-item list-group-item-action bg-light"><i class="fas fa-user-tie"></i> Data Dosen</a>
                <a href="{{ route('mahasiswa.index') }}" class="list-group-item list-group-item-action bg-light"><i class="fas fa-user-graduate"></i> Data Mahasiswa</a>
                <a href="{{ route('jurusan.index') }}" class="list-group-item list-group-item-action bg-light"><i class="fas fa-building"></i> Data Jurusan</a>
                <a href="{{ route('tuakir.index') }}" class="list-group-item list-group-item-action bg-light"><i class="fas fa-file-alt"></i> Data Tugas Akhir</a>
            </div>
        </aside>
        <!-- main content -->
        <main class="col-md-9 col-lg-10 px-4">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header">{{ __('Create Data Mahasiswa') }}</div>
                        <!-- Form Tambah Data Mahasiswa -->
                        <div class="card-body">
                            <form action="{{ route('mahasiswa.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="nim">NIM</label>
                                    <input type="text" name="nim" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" name="nama" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label for="no_hp">No HP</label>
                                    <input type="text" name="no_hp" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="jurusan_id">Jurusan</label>
                                    <select name="jurusan_id" class="form-control" required>
                                        <option value="">Pilih Jurusan</option>
                                        @foreach($jurusans as $jurusan)
                                            <option value="{{ $jurusan->id }}">{{ $jurusan->nama }}</option>
                                        @endforeach
                                    </select>
                                </div><br>
                                
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
@endsection