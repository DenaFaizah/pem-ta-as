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
                        <div class="card-header">{{ __('Data Jurusan') }}</div>

                        <div class="card-body">
                            <!-- Tombol Tambah Data -->
                            <a href="{{ route('jurusan.create') }}" class="btn btn-primary mb-3">Tambah Data</a>

                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Option</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = ($jurusans->currentPage() - 1) * $jurusans->perPage() + 1; // Use $jurusans
                                    @endphp
                                    @if($jurusans->count())
                                        @foreach($jurusans as $j) 
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $j->nama }}</td> 
                                            <td>
                                                <a href="{{ route('jurusan.show', $j->id) }}" class="btn btn-info btn-sm" title="Detail">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="{{ route('jurusan.edit', $j->id) }}" class="btn btn-warning btn-sm">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('jurusan.destroy', $j->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="3" class="text-center">Data tidak tersedia.</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                            <!-- Pagination Links -->
                            {{ $jurusans->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
@endsection