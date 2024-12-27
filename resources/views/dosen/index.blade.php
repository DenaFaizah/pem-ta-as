@extends('layouts.app')

<!-- Tambahkan link Font Awesome untuk ikon -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

@section('content')
<div class="container-fluid">
    <div class="row">

        <!-- Main Content -->
        <main class="col-md-9 col-lg-10 px-4">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Data dosen') }}</div>

                        <div class="card-body">
                            <!-- Tombol Tambah Data -->
                            <a href="{{ route('dosen.create') }}" class="btn btn-primary mb-3">Tambah Data</a>

                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nim</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = ($dosens->currentPage() - 1) * $dosens->perPage() + 1;
                                    @endphp
                                    @if($dosens->count())
                                        @foreach($dosens as $dosen)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $dosen->nidn }}</td>
                                            <td>{{ $dosen->nama }}</td>
                                            <td>{{ $dosen->email }}</td>
                                            <td>
                                                <a href="{{ route('dosen.edit', $dosen->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                                <form action="{{ route('dosen.destroy', $dosen->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="6" class="text-center">Data tidak tersedia.</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                            {{ $dosens->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
@endsection