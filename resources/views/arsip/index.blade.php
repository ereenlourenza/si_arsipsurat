@extends('layouts.app')

@section('content')
<h2>Arsip Surat</h2>
<p>Berikut ini adalah surat-surat yang telah terbit dan diarsipkan.<br>
Klik "Lihat" pada kolom aksi untuk menampilkan surat.</p>

<!-- Search -->
<form action="{{ route('arsip.index') }}" method="GET" class="d-flex mb-3">
    <input type="text" name="search" class="form-control me-2" placeholder="Cari surat..."
           value="{{ request('search') }}">
    <button type="submit" class="btn btn-dark">Cari!</button>
</form>

<!-- Pesan Sukses -->
@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<!-- Tabel Arsip -->
<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>Nomor Surat</th>
            <th>Kategori</th>
            <th>Judul</th>
            <th>Waktu Pengarsipan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse($arsip as $row)
        <tr>
            <td>{{ $row->nomor_surat }}</td>
            <td>{{ $row->kategori->nama_kategori }}</td>
            <td>{{ $row->judul }}</td>
            <td>{{ $row->created_at->format('Y-m-d H:i') }}</td>
            <td>
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
                                Apakah Anda yakin ingin menghapus arsip surat ini?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                
                                <!-- Form hapus -->
                                <form action="{{ route('arsip.destroy', $row->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Ya!</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Unduh -->
                <a href="{{ asset('storage/arsip/'.$row->file_pdf) }}" class="btn btn-sm btn-warning" download>Unduh</a>

                <!-- Lihat -->
                <a href="{{ route('arsip.show', $row->id) }}" class="btn btn-sm btn-primary">Lihat >></a>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="5" class="text-center">Belum ada arsip surat.</td>
        </tr>
        @endforelse
    </tbody>
</table>

<!-- Tombol Arsipkan Surat -->
<a href="{{ route('arsip.create') }}" class="btn btn-success">Arsipkan Surat..</a>
@endsection
