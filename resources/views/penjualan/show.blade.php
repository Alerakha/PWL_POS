@extends('layouts.template')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ $page->title }}</h3>
        <div class="card-tools"></div>
    </div>
    <div class="card-body">
        @empty($penjualan)
            <div class="alert alert-danger alert-dismissible">
                <h5><i class="icon fas fa-ban"></i> Kesalahan!</h5>
                Data yang Anda cari tidak ditemukan.
            </div>
        @else
            <table class="table table-bordered table-striped table-hover table-sm">
                <tr>
                    <th>ID</th>
                    <td>{{ $penjualan->penjualan_id }}</td>
                </tr>
                <tr>
                    <th>Kode</th>
                    <td>{{ $penjualan->penjualan_kode }}</td>
                </tr>
                <tr>
                    <th>Nama Pembeli</th>
                    <td>{{ $penjualan->pembeli }}</td>
                </tr>
                <tr>
                    <th>Staff</th>
                    <td>{{ $penjualan->user->nama }}</td>
                </tr>
                <tr>
                    <th>Tanggal</th>
                    <td>{{ $penjualan->penjualan_tanggal }}</td>
                </tr>
                <tr>
                    <th>Barang</th>
                    <td>
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Produk</th>
                                    <th>Harga</th>
                                    <th>QTY</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $total=0;
                                @endphp
                                @foreach ($penjualan->detail as $detail)
                                <tr>
                                    <td>{{ $detail->barang->barang_nama }}</td>
                                    <td>{{ $detail->harga }}</td>
                                    <td>{{ $detail->jumlah }}</td>
                                    <td>{{ $detail->harga * $detail->jumlah }}</td>
                                    @php
                                    $total += $detail->harga * $detail->jumlah;
                                    @endphp
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="3" class="text-center bg-warning"><strong>Total</strong></td>
                                    <td class="bg-warning"><strong>{{ $total }}</strong></td>
                                </tr>
                            </tfoot>
                        </table>
                    </td>
                    
                </tr>
            </table>
        @endempty
        <a href="{{ url('penjualan') }}" class="btn btn-sm btn-primary mt-2 float-right">Kembali</a>
    </div>
</div>
@endsection