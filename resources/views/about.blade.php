@extends('layouts.app')

@section('content')
<div class="container">
    <h2>About</h2>
    <div class="row mt-4">
        {{-- Foto kamu --}}
        <div class="col-md-3 text-center">
            <img src="{{ asset('storage/images/foto-saya.jpg') }}" 
                 alt="Foto Profil" class="img-fluid rounded mb-6" 
                 style="max-width: 180px;">
        </div>

        {{-- Data diri --}}
        <div class="col-md-9">
            <p><strong>Aplikasi ini dibuat oleh:</strong></p>
            <table class="table table-borderless">
                <tr>
                    <td>Nama</td>
                    <td>: Ereen Lourenza Natalia Mamahi</td>
                </tr>
                <tr>
                    <td>NIM</td>
                    <td>: 2141762044</td>
                </tr>
                <tr>
                    <td>Tanggal</td>
                    <td>: 29 September 2025</td>
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection
