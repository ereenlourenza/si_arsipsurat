@extends('layouts.app')

@section('content')
<h2>Edit Arsip Surat</h2>

<div class="card">
    <div class="card-body">
        <form action="{{ route('arsip.update', $arsip->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nomor_surat" class="form-label">Nomor Surat</label>
                <input type="text" class="form-control" id="nomor_surat" name="nomor_surat" 
                       value="{{ old('nomor_surat', $arsip->nomor_surat) }}" required>
            </div>

            <div class="mb-3">
                <label for="kategori_id" class="form-label">Kategori</label>
                <select class="form-select" id="kategori_id" name="kategori_id" required>
                    <option value="">-- Pilih Kategori --</option>
                    @foreach($kategori as $k)
                        <option value="{{ $k->id }}" {{ $arsip->kategori_id == $k->id ? 'selected' : '' }}>
                            {{ $k->nama_kategori }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="judul" class="form-label">Judul Surat</label>
                <input type="text" class="form-control" id="judul" name="judul" 
                       value="{{ old('judul', $arsip->judul) }}" required>
            </div>

            <div class="mb-3">
                <label for="file_pdf" class="form-label">File Surat (PDF)</label>
                <input type="file" class="form-control" id="file_pdf" name="file_pdf" accept="application/pdf">
                <small class="text-muted">Kosongkan jika tidak ingin mengganti file</small>
            </div>

            <button type="submit" class="btn btn-success">Update</button>
            <a href="{{ route('arsip.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection
