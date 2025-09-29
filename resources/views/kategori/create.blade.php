@extends('layouts.app')

@section('content')
<h2>Kategori Surat >> Tambah</h2>
<p>Tambahkan data kategori. Jika sudah selesai, jangan lupa untuk mengklik tombol "Simpan"</p>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('kategori.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label for="id">ID (Auto Increment)</label>
        <input type="text" class="form-control" value="(Auto Increment)" disabled>
    </div>
    
    <div class="mb-3">
        <label for="nama_kategori" class="form-label">Nama Kategori</label>
        <input type="text" name="nama_kategori" id="nama_kategori" 
               class="form-control" value="{{ old('nama_kategori') }}" required>
    </div>

    <div class="mb-3">
        <label for="keterangan" class="form-label">Keterangan</label>
        <textarea name="keterangan" id="keterangan" class="form-control">{{ old('keterangan') }}</textarea>
    </div>
    
    <a href="{{ route('kategori.index') }}" class="btn btn-secondary"><< Kembali</a>
    <button type="submit" class="btn btn-success">Simpan</button>
</form>
@endsection
