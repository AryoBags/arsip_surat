<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreKategoriSuratRequest;
use App\Http\Requests\UpdateKategoriSuratRequest;
use App\Models\kategoriSurat;
use Exception;
use Illuminate\Http\Request;

class KategoriSuratController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = kategoriSurat::query();
        if($request->has('search')){
            $search = $request -> input('search');
            $query->where('nama_kategori', 'like', "%$search%")
            ->orWhere('keterangan', 'like', "%$search%");
        }
        $kategoriSurat = $query->paginate(10);
        return view('kategori',compact('kategoriSurat'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $nextid = kategoriSurat::max('id')+1;
        return view ('create-kategori',compact('nextid'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreKategoriSuratRequest $request)
    {
        kategoriSurat::create($request -> validated());
        return redirect()->route('kategoriSurat.index')-> with('sucsess','berhasil upload');
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
        $kategoriSurat = kategoriSurat::find($id);

        return view ('edit-kategori',compact('kategoriSurat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKategoriSuratRequest $request, string $id)
    {
        $kategoriSurat = kategoriSurat::find($id);
        $kategoriSurat->update($request->validated());
        return redirect()->route('kategoriSurat.index')-> with('sucsess','berhasil update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
{
    try {
        $surat = kategoriSurat::findOrFail($id);
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
