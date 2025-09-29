@extends('layouts.app')

@section('content')
<h2>Arsip Surat >> Unggah</h2>
<p>Unggah surat yang telah terbit pada form ini untuk diarsipkan berdasarkan kategori.<br>
Catatan: Gunakan file berformat PDF.</p>

<!-- Pesan Error -->
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Oops!</strong> Ada kesalahan:<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<!-- Form -->
<form action="{{ route('arsip.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <label for="nomor_surat" class="form-label">Nomor Surat</label>
        <input type="text" name="nomor_surat" class="form-control" placeholder="Masukkan nomor surat" required>
    </div>

    <div class="mb-3">
        <label for="kategori_id" class="form-label">Kategori</label>
        <select name="kategori_id" class="form-select" required>
            <option value="">-- Pilih Kategori --</option>
            @foreach($kategori as $kat)
                <option value="{{ $kat->id }}">{{ $kat->nama_kategori }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="judul" class="form-label">Judul</label>
        <input type="text" name="judul" class="form-control" placeholder="Masukkan judul surat" required>
    </div>

    <div class="mb-3">
        <label for="file_pdf" class="form-label">File Surat (PDF)</label>
        <input type="file" name="file_pdf" class="form-control" accept="application/pdf" required>
    </div>
    
    <a href="{{ route('arsip.index') }}" class="btn btn-secondary"> << Kembali</a>
    <button type="submit" class="btn btn-success">Simpan</button>
</form>
@endsection
