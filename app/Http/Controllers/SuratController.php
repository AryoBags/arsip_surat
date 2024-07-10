<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSuratRequest;
use App\Http\Requests\UpdateSuratRequest;
use App\Models\kategoriSurat;
use App\Models\Surat;
use Illuminate\Http\Request;

class SuratController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Surat::query();
        if($request->has('search')){
            $search = $request -> input('search');
            $query->where('nomor_surat', 'like', "%$search%")
            ->orWhere('judul', 'like', "%$search%")
            ->orWherehas('kategori_surat',function($q)use($search){
                $q->where('nama_kategori', 'like', "%$search%");
            });
        }
        $surat = $query->paginate(10);
        return view('home',compact('surat'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori = kategoriSurat::all();
        return view('create-surat', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSuratRequest $request)
    {
        if($request->hasFile('file')){
            $file = $request->file('file');
            $filepath = $file->store('uploads','public');
        }
        $Surat = Surat::create([
            'nomor_surat' => $request->nomor_surat,
            'judul' => $request->judul,
            'file' => $filepath,
            'kategori_surat_id' => $request->kategori_surat_id,

        ]);
        return redirect()->route('Surat.index')->with('success','Data Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $surat = Surat::with('kategori_surat')->find($id);
        return view('detail', compact('surat'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kategori = kategoriSurat::all();
        $surat = Surat::find($id);
        return view('edit-surat', compact('surat','kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSuratRequest $request, string $id)
    {
        $surat = Surat::find($id);
        if($request->hasFile('file')){
            $file = $request->file('file');
            $filepath = $file->store('uploads','public');
            $surat->file = $filepath;
            }
            $surat->nomor_surat = $request->nomor_surat;
            $surat->judul = $request->judul;
            $surat->kategori_surat_id = $request->kategori_surat_id;
            $surat->save();
            return redirect()->route('Surat.index')->with('success','Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $surat = Surat::findOrFail($id);
            $surat->delete();

            if (request()->expectsJson()) {
                return response()->json(['success' => true, 'message' => 'Surat deleted successfully.']);
            }

            return redirect()->route('surats.index')
                ->with('success', 'Surat deleted successfully.');
        } catch (Exception $e) {
            if (request()->expectsJson()) {
                return response()->json(['success' => false, 'message' => 'An error occurred while deleting the Surat.'], 500);
            }

            return redirect()->route('surats.index')
                ->with('error', 'An error occurred while deleting the Surat.');
        }
    }

}
