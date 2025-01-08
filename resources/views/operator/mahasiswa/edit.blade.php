@extends('layouts.app')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
@section('content')
<div class="container-fluid">
    <div class="row">
        <aside class="col-md-3 col-lg-2 bg-light sidebar py-4 vh-100 d-md-block d-none">
            <div class="list-group">
                <a href="{{ route('home') }}" class="list-group-item list-group-item-action bg-light"><i class="fas fa-home"></i> Home</a>
                <a href="{{ route('operator.mahasiswa.index') }}" class="list-group-item list-group-item-action bg-light"><i class="fas fa-user-graduate"></i> Data Mahasiswa</a>
                <a href="{{ route('operator.tuakir.index') }}" class="list-group-item list-group-item-action bg-light"><i class="fas fa-file-alt"></i> Data Tugas Akhir</a>
                
                <!-- Form Logout -->
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
                        <div class="card-header">{{ __('Edit Data Mahasiswa') }}</div>

                        <div class="card-body">
                        <!-- Form Edit Mahasiswa -->
                        <form action="{{ route('operator.mahasiswa.update', $mahasiswa->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <!-- Input NIM -->
                            <div class="form-group mb-3">
                                <label for="nim">NIM</label>
                                <input type="text" class="form-control" id="nim" name="nim" value="{{ $mahasiswa->nim }}" placeholder="Masukkan NIM" required>
                            </div>

                            <!-- Input Nama -->
                            <div class="form-group mb-3">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama" value="{{ $mahasiswa->nama }}" placeholder="Masukkan Nama" required>
                            </div>
                            
                            <!-- Input Email -->
                            <div class="form-group mb-3">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ $mahasiswa->email }}" placeholder="Masukkan Email" required>
                            </div>

                            <!-- Input No Hp -->
                            <div class="form-group mb-3">
                                <label for="no_hp">No Hp</label>
                                <input type="text" class="form-control" id="no_hp" name="no_hp" value="{{ $mahasiswa->no_hp }}" placeholder="Masukkan No Hp" required>
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

                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-primary" onclick="return confirm('Apakah Anda yakin ingin mengedit data ini?')">
                                {{ __('Update') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
@endsection