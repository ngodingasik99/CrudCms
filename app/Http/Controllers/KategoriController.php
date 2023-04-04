<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kategori;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\File;


class KategoriController extends Controller
{
    public function index()
    {
        $data = Kategori::orderBy('updated_at', 'desc')->get();
        return view('kategori.index', compact('data'));
    }

    public function store(Request $request)
    {   
        $validasi = $request->validate([
            'namakategori' => 'required|min:2',
            'fotokategori' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->file('fotokategori')) {
                $validasi['fotokategori'] = $request->file('fotokategori')->store('gambar');
        }
        Kategori::create($validasi);
        return redirect('/kategori');
    }

    public function action($id, Request $request)
    {
        $request->validate([
            'namakategori' => 'required|min:2',
            'fotokategori' => [File::types(['jpg', 'jpeg', 'png', 'gif'])->max(2 * 1024)],
        ]);

        $data = kategori::find($id);

        $data->namakategori = $request->namakategori;
        if ($request->file('fotokategori')) {
            Storage::delete($data->fotokategori);
            $data->fotokategori = Storage::putFile('gambar', $request->file('fotokategori'));
        }
        $data->save();
        return redirect('/kategori');
    }

    public function distroy($id)
    {
        $data = kategori::find($id);
        $data->delete();
        return redirect('/kategori');
    }
}
