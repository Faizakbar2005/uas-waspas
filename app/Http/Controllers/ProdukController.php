<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kriteria;
use App\Models\produk;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kriteria = kriteria::orderby('id', 'asc')->get();
        $produk = produk::orderby('created_at', 'desc')->get();
        return view('admin.produk.index', compact('kriteria','produk'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.produk.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'C1' => 'required',
            'C2' => 'required',
            'C3' => 'required',
            'C4' => 'required',
            'C5' => 'required',
        ]);

        $produk = produk::create([
            'nama' => $request->nama,
            'c1' => $request->C1,
            'c2' => $request->C2,
            'c3' => $request->C3,
            'c4' => $request->C4,
            'c5' => $request->C5,
        ]);

        return redirect()->back()->with('success','Data berhasil disimpan');
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
        $produk = produk::findorfail($id);
        return view('admin.produk.edit', compact('produk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'nama' => 'required',
            'C1' => 'required',
            'C2' => 'required',
            'C3' => 'required',
            'C4' => 'required',
            'C5' => 'required',
        ]);

        $produk = [
            'nama' => $request->nama,
            'c1' => $request->C1,
            'c2' => $request->C2,
            'c3' => $request->C3,
            'c4' => $request->C4,
            'c5' => $request->C5,
        ];

        produk::whereId($id)->update($produk);

        return redirect()->route('produk.index')->with('success','Data Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $produk = produk::findorfail($id);
        $produk->delete();

        return redirect()->back()->with('success','Data Berhasil Dihapus');
    }
}
