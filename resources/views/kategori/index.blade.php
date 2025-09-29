@extends('layouts.app')

@section('content')
<h2>Kategori Surat</h2>
<p>Berikut ini adalah kategori yang bisa digunakan untuk melabeli surat.</p>

<!-- Search -->
<form action="{{ route('kategori.index') }}" method="GET" class="d-flex mb-3">
    <input type="text" name="search" class="form-control me-2" placeholder="Cari surat..."
           value="{{ request('search') }}">
    <button type="submit" class="btn btn-dark">Cari!</button>
</form>

<!-- Pesan Sukses -->
@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>ID Kategori</th>
            <th>Nama Kategori</th>
            <th>Keterangan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse($kategori as $row)
        <tr>
            <td>{{ $row->id }}</td>
            <td>{{ $row->nama_kategori }}</td>
            <td>{{ $row->keterangan }}</td>
            <td>
                {{-- <form action="{{ route('kategori.destroy', $row->id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</button>
                </form> --}}
                <!-- Tombol Hapus (trigger modal) -->
                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#hapusModal{{ $row->id }}">
                    Hapus
                </button>

                <!-- Modal Konfirmasi -->
                <div class="modal fade" id="hapusModal{{ $row->id }}" tabindex="-1" aria-labelledby="hapusModalLabel{{ $row->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered"> <!-- modal-dialog-centered bikin modal muncul di tengah -->
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="hapusModalLabel{{ $row->id }}">Alert</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                            </div>
                            <div class="modal-body">
                                Apakah Anda yakin ingin menghapus kategori surat ini?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                
                                <!-- Form hapus -->
                                <form action="{{ route('kategori.destroy', $row->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Ya!</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <a href="{{ route('kategori.edit', $row->id) }}" class="btn btn-primary btn-sm">Edit</a>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="5" class="text-center">Belum ada arsip surat.</td>
        </tr>
        @endforelse
    </tbody>
</table>

<a href="{{ route('kategori.create') }}" class="btn btn-success mb-3">[ + ] Tambah Kategori Baru</a>
@endsection
