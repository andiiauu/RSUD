<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Obat;
use App\Supplier;
use App\Stok;
use DB;

class StokController extends Controller
{
  public function index()
  {
    $supplier = Supplier::all();
    $stok = Obat::select('name', 'kode_obat', 'supplier', 'harga_obat', 'stok')->get();
    return view('stok/index', compact('stok', 'supplier'));
  }

  public function supplier(Request $request)
  {
    if($request->supplier == null)
    {
      $stok = Obat::select('name', 'kode_obat', 'supplier', 'harga_obat', 'stok')->get();
      return view('stok/index', compact('stok'));
    }
    else
    {

      $stok = Obat::select('name', 'kode_obat', 'supplier', 'harga_obat', 'stok')->where('supplier', $request->supplier)->get();
      return view('stok/index', compact('stok'));
    }
  }

  public function kartuStok(Request $request)
  {
    $obat = Obat::all();
    $reqobat = $request->obat;
      $stok = Stok::orderBy('created_at', 'desc')->get();
      return view('stok/kartustok', compact('obat', 'stok'));
    }

  }
