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
                        <div class="card-header">{{ __('Jurusan') }}</div>

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
                                        @foreach($jurusans as $j) <!-- Use $j for each item -->
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $j->nama }}</td> <!-- Use $j instead of $jurusan -->
                                            <td>
                                                <a href="{{ route('jurusan.edit', $j->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                                <form action="{{ route('jurusan.destroy', $j->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
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