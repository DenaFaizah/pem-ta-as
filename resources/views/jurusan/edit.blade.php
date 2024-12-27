@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Jurusan') }}</div>

                <div class="card-body">
                    <!-- Form Edit Student -->
                    <form action="{{ route('jurusan.update', $jurusan->id) }}" method="POST">
                        @csrf
                        @method('PUT') 

                        <!-- Input Nama -->
                        <div class="form-group mb-3">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="{{ $jurusan->nama }}" required>
                        </div>
                        
                        <!-- Tombol Submit -->
                        <button type="submit" class="btn btn-primary" onclick="return confirm('Data Berhasil diedit')">
                            {{ __('Update') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
