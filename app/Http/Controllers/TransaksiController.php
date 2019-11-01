<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaksi;
use App\Obat;

class TransaksiController extends Controller
{

  public function index()
  {
    $transaksi = Transaksi::where('status', '0')->get();
    return view('transaksi.index', compact('transaksi'));
  }


  public function store(Request $request)
  {
    Transaksi::create($request->all());

    return redirect()->route('transaksi.index');
  }

  public function destroy($id)
  {
    $transaksi = Transaksi::findOrFail($id);
    if (!$transaksi) {
      return back();
    }

    $transaksi->delete();
    return redirect()->route('transaksi.index');
  }

  public function selesai(Request $request)
  {
    $transaksi = Transaksi::where('status', '0');
    $transaksi->update(['status' => '1']);

    return back();
  }


}
