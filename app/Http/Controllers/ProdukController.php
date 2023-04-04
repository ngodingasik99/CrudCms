<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kategori;
use Illuminate\Support\Facades\Storage;
use App\Models\produk;
use Illuminate\Validation\Rules\File;

class ProdukController extends Controller
{
    public function index()
    {
        $data['kategori'] = kategori::all();
        $data['produk'] = produk::all();
        return view('produk.index', $data);;
    }

    public function store(Request $request)
    {
        $validasi = $request->validate([
            'namaproduk' => 'required|min:2',
            'harga' => 'required',
            'deskripsi' => 'required|min:2',
            'fotoproduk' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'id_kategori' => '',
        ]);

        if ($request->file('fotoproduk')) {
                $validasi['fotoproduk'] = $request->file('fotoproduk')->store('gambar');
        }
        produk::create($validasi);
        return redirect('/produk');
    }

    public function action($id, Request $request)
    {
        $validasi = $request->validate([
            'namaproduk' => 'required|min:2',
            'harga' => 'required',
            'deskripsi' => 'required',
            'fotoproduk' => [File::types(['jpg', 'jpeg', 'png', 'gif'])->max(2 * 1024)],
            'id_kategori' => ''
        ]);
        
        $validasi = produk::find($id);
        $validasi->namaproduk = $request->namaproduk;
        $validasi->harga = $request->harga;
        $validasi->deskripsi = $request->deskripsi;
        if ($request->file('fotoproduk')) {
            Storage::delete($validasi->fotoproduk);
            $validasi->fotoproduk = Storage::putFile('gambar', $request->file('fotoproduk'));
        }
        $validasi->save();
        return redirect('/produk');
    }

    public function distroy($id)
    {
        produk::hapus($id);
        return redirect('/produk');
    }
}
