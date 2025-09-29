<?php

namespace App\Http\Controllers;

use App\Models\ArsipSurat;
use App\Models\KategoriSurat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArsipSuratController extends Controller
{
    // 🔹 Halaman utama / daftar arsip
    public function index(Request $request)
    {
        $query = ArsipSurat::with('kategori');

        // fitur search berdasarkan judul
        if ($request->has('search')) {
            $query->where('judul', 'like', '%' . $request->search . '%');
        }

        $arsip = $query->orderBy('created_at', 'desc')->get();

        return view('arsip.index', compact('arsip'));
    }

    // 🔹 Form tambah arsip
    public function create()
    {
        $kategori = KategoriSurat::all();
        return view('arsip.create', compact('kategori'));
    }

    // 🔹 Simpan arsip baru
    public function store(Request $request)
    {
        $request->validate([
            'nomor_surat' => 'required|unique:arsip_surat',
            'kategori_id' => 'required',
            'judul' => 'required',
            'file_pdf' => 'required|mimes:pdf|max:2048',
        ]);

        // simpan file PDF
        $fileName = time() . '_' . $request->file_pdf->getClientOriginalName();
        $request->file_pdf->storeAs('arsip', $fileName, 'public');

        ArsipSurat::create([
            'nomor_surat' => $request->nomor_surat,
            'kategori_id' => $request->kategori_id,
            'judul'       => $request->judul,
            'file_pdf'    => $fileName,
        ]);

        return redirect()->route('arsip.index')->with('success', 'Data berhasil disimpan!');
    }

    // 🔹 Lihat detail arsip
    public function show($id)
    {
        $arsip = ArsipSurat::with('kategori')->findOrFail($id);
        return view('arsip.show', compact('arsip'));
    }

    // 🔹 Form edit
    public function edit($id)
    {
        $arsip = ArsipSurat::findOrFail($id);
        $kategori = KategoriSurat::all();
        return view('arsip.edit', compact('arsip', 'kategori'));
    }

    // 🔹 Update data
    public function update(Request $request, $id)
    {
        $arsip = ArsipSurat::findOrFail($id);

        $request->validate([
            'nomor_surat' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategori_surat,id',
            'judul'       => 'required|string|max:255',
            'file_pdf'    => 'nullable|mimes:pdf|max:2048',
        ]);

        // Update field teks
        $arsip->nomor_surat = $request->nomor_surat;
        $arsip->kategori_id = $request->kategori_id;
        $arsip->judul       = $request->judul;

        // Jika ada file baru diupload
        if ($request->hasFile('file_pdf')) {
            // Hapus file lama
            if ($arsip->file_pdf && file_exists(storage_path('app/public/arsip/' . $arsip->file_pdf))) {
                unlink(storage_path('app/public/arsip/' . $arsip->file_pdf));
            }

            // Simpan file baru
            $file = $request->file('file_pdf');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('arsip', $filename, 'public');
            $arsip->file_pdf = $filename;
        }

        $arsip->save();

        return redirect()->route('arsip.index')->with('success', 'Arsip surat berhasil diperbarui.');
    }

    // 🔹 Hapus data
    public function destroy($id)
    {
        $arsip = ArsipSurat::findOrFail($id);

        // hapus file PDF
        Storage::disk('public')->delete('arsip/' . $arsip->file_pdf);

        $arsip->delete();

        return redirect()->route('arsip.index')->with('success', 'Data berhasil dihapus!');
    }
}
