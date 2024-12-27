@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Mahasiswa Create') }}</div>
                <div class="card-body">
                    <form action="{{ route('mahasiswa.store') }}" method="POST">
                        @csrf
                        <!-- Input NIM -->
                        <div class="form-group">
                            <label for="nim">NIM</label>
                            <input type="text" class="form-control" id="nim" name="nim" placeholder="Masukkan NIM" required>
                        </div>

                        <!-- Input Nama -->
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama" required>
                        </div>
                        
                        <!-- Input email -->
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email" name="email" placeholder="Masukkan Email" required>
                        </div>

                        <!-- Input Email -->
                        <div class="form-group">
                            <label for="no_hp">No Hp</label>
                            <input type="no_hp" class="form-control" id="no_hp" name="no_hp" placeholder="Masukkan No Hp" required>
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
</div>
@endsection