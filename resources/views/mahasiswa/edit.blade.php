@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Mahasiswa') }}</div>

                <div class="card-body">
                    <!-- Form Edit Mahasiswa -->
                    <form action="{{ route('mahasiswa.update', $mahasiswa->id) }}" method="POST">
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
                        
                        <!-- Input Prodi -->
                        <div class="form-group mb-3">
                            <label for="prodi">Prodi</label>
                            <input type="text" class="form-control" id="prodi" name="prodi" value="{{ $mahasiswa->prodi }}" placeholder="Masukkan Program Studi" required>
                        </div>

                        <!-- Input Email -->
                        <div class="form-group mb-3">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ $mahasiswa->email }}" placeholder="Masukkan Email" required>
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
</div>
@endsection