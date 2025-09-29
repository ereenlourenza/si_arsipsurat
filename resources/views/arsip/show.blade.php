@extends('layouts.app')

@section('content')
<h2>Arsip Surat >> Lihat</h2>

<div class="card mb-3">
    <div class="card-body">
        <p><strong>Nomor Surat:</strong> {{ $arsip->nomor_surat }}</p>
        <p><strong>Kategori:</strong> {{ $arsip->kategori->nama_kategori }}</p>
        <p><strong>Judul:</strong> {{ $arsip->judul }}</p>
        <p><strong>Waktu Unggah:</strong> {{ $arsip->created_at->format('d-m-Y H:i') }}</p>
    </div>
</div>

<div class="mb-3">
    <h5>File Surat (PDF):</h5>
    <iframe src="{{ asset('storage/arsip/'.$arsip->file_pdf) }}" width="100%" height="600px"></iframe>
</div>

<div class="mt-3">
    <a href="{{ route('arsip.index') }}" class="btn btn-secondary"> << Kembali</a>
    <a href="{{ asset('storage/arsip/'.$arsip->file_pdf) }}" class="btn btn-primary" download>Unduh</a>
    <a href="{{ route('arsip.edit', $arsip->id) }}" class="btn btn-warning">Edit/Ganti File</a>
</div>
@endsection
