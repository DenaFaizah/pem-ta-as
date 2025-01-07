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
                        <div class="card-header">{{ __('Data Mahasiswa') }}</div>

                        <div class="card-body">
                            <!-- Tombol Tambah Data -->
                            <a href="{{ route('mahasiswa.create') }}" class="btn btn-primary mb-3">Tambah Data</a>

                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NIM</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Jurusan</th>
                                        <th>No HP</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = ($mahasiswas->currentPage() - 1) * $mahasiswas->perPage() + 1;
                                    @endphp
                                    @if($mahasiswas->count())
                                        @foreach($mahasiswas as $mahasiswa)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $mahasiswa->nim }}</td>
                                            <td>{{ $mahasiswa->nama }}</td>
                                            <td>{{ $mahasiswa->email }}</td>
                                            <td>{{ $mahasiswa->jurusan->nama ?? 'Tidak ada jurusan' }}</td>
                                            <td>{{ $mahasiswa->no_hp }}</td>
                                            <td>
                                                <a href="{{ route('mahasiswa.show', $mahasiswa->id) }}" class="btn btn-info btn-sm" title="Detail">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="{{ route('mahasiswa.edit', $mahasiswa->id) }}" class="btn btn-warning btn-sm">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('mahasiswa.destroy', $mahasiswa->id) }}" method="POST" style="display:inline;">
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
                                            <td colspan="7" class="text-center">Data tidak tersedia.</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                            {{ $mahasiswas->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
@endsection