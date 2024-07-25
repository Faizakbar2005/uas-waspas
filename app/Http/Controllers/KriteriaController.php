<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kriteria;

class KriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $kriteria = kriteria::orderby('kode', 'asc')->get();
        return view('admin.kriteria.index', compact('kriteria'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.kriteria.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required',
            'nama' => 'required',
            'bobot' => 'required',
        ]);

        $totalKriteria = Kriteria::count();
        
        if ($totalKriteria >= 5) {
            return redirect()->back()->withErrors(['Kriteria sudah mencapai batas maksimum (5)'])->withInput();
        }

        Kriteria::create([
            'kode' => $request->kode,
            'nama' => $request->nama,
            'bobot' => $request->bobot,
        ]);

        return redirect()->back()->with('success', 'Data berhasil disimpan');
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
        $kriteria = kriteria::findorfail($id);
        return view('admin.kriteria.edit', compact('kriteria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'kode' => 'required',
            'nama' => 'required',
            'bobot' => 'required',
            ]);
            $kriteria = [
                'kode' => $request->kode,
                'nama' => $request->nama,
                'bobot' => $request->bobot,
                ];
                Kriteria::where('id', $id)->update($kriteria);
                return redirect()->route('kriteria.index')->with('success', 'Data berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kriteria = kriteria::findorfail($id);
        $kriteria->delete();

        return redirect()->back()->with('success','Data Berhasil Dihapus');
    }
}
