@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Dosen') }}</div>

                <div class="card-body">
                    <!-- Form Edit dosen -->
                    <form action="{{ route('dosen.update', $dosen->id) }}" method="POST">
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
</div>
@endsection