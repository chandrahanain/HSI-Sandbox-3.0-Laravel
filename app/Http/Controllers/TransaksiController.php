<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        $data = array(
            'title' =>  ' Data Transaksi',
            'data_transaksi' =>  Transaksi::all()
        );

        return view('kasir.transaksi.list', $data);
    }

    public function create()
    {
        $data = array(
            'title' =>  ' Create Data Transaksi',
        );

        return view('kasir.transaksi.add', $data);
    }




    public function store(Request $request)
    {
        Transaksi::create([
            'nama_jenis'      =>  $request->nama_jenis,
        ]);

        return redirect('/jenisbarang')->with('success', 'Data Berhasil Disimpan');
    }

    public function update(Request $request, $id)
    {
        Transaksi::where('id', $id)->update([
            'nama_jenis'      =>  $request->nama_jenis,
        ]);

        return redirect('/jenisbarang')->with('success', 'Data Berhasil Di Ubah');
    }

    public function destroy($id)
    {
        Transaksi::where('id', $id)->delete();
        return redirect('/jenisbarang')->with('success', 'Data Berhasil Dihapus');
    }
}
