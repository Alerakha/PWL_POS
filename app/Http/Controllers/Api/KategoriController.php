<?php

namespace App\Http\Controllers\Api;

use App\DataTables\KategoriDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use Illuminate\Http\RedirectResponse;
use App\Models\KategoriModel;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class KategoriController extends Controller
{
    public function index(KategoriDataTable $dataTable)
    {
        return $dataTable->render('kategori.index');
    }

    public function create()
    {
        return view('kategori.create');
    }

    public function store(StorePostRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        KategoriModel::create([
            'kategori_kode' => $request->kategori_kode,
            'kategori_nama' => $request->kategori_nama,
        ]);

        return redirect('/kategori')->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function edit($id): Response
    {
        $kategori = KategoriModel::find($id);
        return response()->view('kategori.edit', compact('kategori'));
    }

    public function update($id, StorePostRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $kategori = KategoriModel::find($id);
        if (!$kategori) {
            return redirect()->back()->with('error', 'Kategori tidak ditemukan.');
        }

        $kategori->kategori_kode = $request->kategori_kode;
        $kategori->kategori_nama = $request->kategori_nama;
        $kategori->save();

        return redirect('/kategori')->with('success', 'Kategori berhasil diperbarui.');
    }


    public function destroy($id)
    {
        KategoriModel::destroy($id);


        return redirect('/kategori')->with('success', 'Kategori berhasil dihapus.');
    }
}
