<?php

namespace App\Http\Controllers;

use App\Models\BarangModel;
use App\Models\DetailTransaksiModel;
use App\Models\TransaksiModel;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class TransaksiController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Daftar Transaksi',
            'list' => ['Home', 'Transaksi Penjualan']
        ];

        $page = (object) [
            'title' => 'Daftar Transaksi Penjualan dalam sistem'
        ];

        $activeMenu = 'transaksi';

        $user = UserModel::all();
        return view('transaksi.index', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'user' => $user,
            'activeMenu' => $activeMenu
        ]);
    }
    public function list(Request $request)
    {
        $transaksi = TransaksiModel::select('penjualan_id', 'penjualan_kode', 'penjualan_tanggal', 'user_id', 'pembeli')
            ->with('user');

        if ($request->user_id) {
            $transaksi->where('user_id', $request->user_id);
        }

        return DataTables::of($transaksi)
            ->addIndexColumn()
            ->addColumn('aksi', function ($transaksi) {
                $btn = '<a href="' . url('/penjualan/' . $transaksi->penjualan_id) . '" class="btn btn-primary" style="width: 40px; height: 40px; margin-right: 5px;"><i class="fas fa-eye"></i></a>';
                $btn .= '<form class="d-inline-block" method="POST" action="' . url('/penjualan/' . $transaksi->penjualan_id) . '">'
                    . csrf_field() . method_field('DELETE') . '<button type="submit" class="btn btn-danger" style="width: 40px; height: 40px;" onclick="return confirm(\'Apakah Anda Yakin Menghapus Data Ini ? \');"><i class="fas fa-trash-alt"></i></button></form>';
                return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function create()
    {
        $breadcrumb = (object) [
            'title' => 'Tambah Transaksi',
            'list' => ['Home', 'Transaksi', 'Tambah']
        ];

        $page = (object) [
            'title' => 'Tambah Transaksi'
        ];

        $users = UserModel::all();
        $barang = BarangModel::all();
        $activeMenu = 'transaksi';

        return view('transaksi.create', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'users' => $users,
            'barang' => $barang,
            'activeMenu' => $activeMenu
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'penjualan_kode' => 'required|string|max:100',
            'pembeli' => 'required|string|max:100',
            'tanggal' => 'required|date',
            'user' => 'required|exists:m_user,user_id',
            'barang' => 'required|array',
            'barang.*.id' => 'exists:m_barang,barang_id',
            'barang.*.jumlah' => 'nullable|integer|min:1',
        ]);

        $penjualan = new TransaksiModel();
        $penjualan->penjualan_kode = $validatedData['penjualan_kode'];
        $penjualan->pembeli = $validatedData['pembeli'];
        $penjualan->penjualan_tanggal = $validatedData['tanggal'];
        $penjualan->user_id = $validatedData['user'];
        $penjualan->save();

        foreach ($validatedData['barang'] as $item) {
            // Cek apakah barang dipilih tanpa jumlah tertentu
            if (!empty($item['id'])) {
                $barang = BarangModel::find($item['id']);
                $detailPenjualan = new DetailTransaksiModel();
                $detailPenjualan->penjualan_id = $penjualan->penjualan_id;
                $detailPenjualan->barang_id = $item['id'];
                // Periksa apakah jumlah barang telah diisi, jika tidak, maka dianggap 0
                $detailPenjualan->jumlah = isset($item['jumlah']) ? $item['jumlah'] : 0;
                $detailPenjualan->harga = $barang->harga_jual;
                $detailPenjualan->save();
            }
        }

        return redirect('/transaksi')->with('success', 'Transaksi berhasil disimpan.');
    }

    public function show(string $id)
    {
        $transaksi = TransaksiModel::with(['detail', 'user'])->find($id);

        $breadcrumb = (object) [
            'title' => 'Detail Transaksi Penjualan ',
            'list' => ['Home', 'Transaksi Penjualan ', 'Detail']
        ];

        $page = (object) [
            'title' => 'Detail Transaksi Penjualan '
        ];

        $activeMenu = 'transaksi';

        return view('transaksi.show', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'transaksi' => $transaksi,
            'activeMenu' => $activeMenu
        ]);
    }


    public function destroy(string $id)
    {
        $transaksi = TransaksiModel::find($id);
        if (!$transaksi) {
            return redirect('/transaksi')->with('error', 'Data Transaksi tidak ditemukan');
        }
        try {
            $transaksi->detail()->delete(); // Delete related details
            $transaksi->delete(); // Delete the main record

            return redirect('/transaksi')->with('success', 'Data Transaksi berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/transaksi')->with('error', 'Data gagal dihapus ');
        }
    }
}
