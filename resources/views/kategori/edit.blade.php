@extends('layouts.app')

@section('content')
<h2>Kategori Surat >> Edit</h2>
<p>Edit data kategori. Jika sudah selesai, jangan lupa untuk mengklik tombol "Simpan"</p>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('kategori.update', $kategori->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="id">ID (Auto Increment)</label>
        <input type="text" class="form-control" value="{{ $kategori->id }}" readonly>
    </div>

    <div class="mb-3">
        <label for="nama_kategori" class="form-label">Nama Kategori</label>
        <input type="text" name="nama_kategori" id="nama_kategori" 
               class="form-control" value="{{ old('nama_kategori', $kategori->nama_kategori) }}" required>
    </div>

    <div class="mb-3">
        <label for="keterangan" class="form-label">Keterangan</label>
        <textarea name="keterangan" id="keterangan" class="form-control">{{ old('keterangan', $kategori->keterangan) }}</textarea>
    </div>

    <a href="{{ route('kategori.index') }}" class="btn btn-secondary"><< Kembali</a>
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
@endsection
