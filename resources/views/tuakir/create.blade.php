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
                        <div class="card-header">{{ __('Show Data Tugas Akhir') }}</div>

                        <div class="card-body">
                            <form action="{{ route('tuakir.store') }}" method="POST">
                                @csrf
                                <!-- Input ko_ta -->
                                <div class="form-group">
                                    <label for="ko_ta">Kode Ta</label>
                                    <input type="text" class="form-control" id="ko_ta" name="ko_ta" placeholder="Masukkan Kode" required>
                                </div>

                                <!-- Input judul_ta -->
                                <div class="form-group">
                                    <label for="judul_ta">Judul</label>
                                    <input type="text" class="form-control" id="judul_ta" name="judul_ta" placeholder="Masukkan Judul" required>
                                </div>

                                <br><br>
                                <!-- Submit Button -->
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Save') }}
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