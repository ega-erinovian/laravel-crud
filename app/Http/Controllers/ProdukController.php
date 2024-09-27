<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Menampilkan semua data dari tabel
        $produk = Produk::all();

        // Menampikan view dari file views/produk/index.blade.php
        // compact() berfungsi untuk membuat array dari nama variabel
        return view('produk.index', compact('produk')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('produk.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Melakukan validasi data
        $request->validate(
            [
                'nama' => 'required|max:45',
                'jenis' => 'required|max:45',
                'harga_jual' => 'required|numeric',
                'harga_beli' => 'required|numeric',
                'foto' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ],
            [
                'nama.required' => 'Nama wajib diisi',
                'nama.max' => 'Nama maksimal 45 karakter',
                'jenis.required' => 'Jenis wajib diisi',
                'jenis.max' => 'Jenis maksimal 45 karakter',
                'foto.max' => 'Foto maksimal 2 MB',
                'foto.mimes' => 'File ekstensi hanya bisa jpg,png,jpeg,gif,svg',
                'foto.image' => 'File harus berbentuk image',
            ],
        );

        // Jika file foto ada yang terupload
        if (!empty($request->foto)) {
            $filename = 'foto-'.uniqid().'.'.$request->foto->extension();
            // Setelah foto sudah masuk maka ditempatkan dipublic
            $request->foto->move(public_path('assets/img/uploaded'), $filename);
        } else {
            $filename = 'error-404-monochrome.svg';
        }

        // Tambah data
        DB::table('produks')->insert([
            'nama' => $request->nama,
            'jenis' => $request->jenis,
            'harga_jual' => $request->harga_jual,
            'harga_beli' => $request->harga_beli,
            'deskripsi' => $request->deskripsi,
            'foto' => $filename,
        ]);

        return redirect()->route('index.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
