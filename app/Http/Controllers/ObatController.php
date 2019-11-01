<?php

namespace App\Http\Controllers;

use App\Obat;
use App\Kategoriobat;
use App\Supplier;
use Illuminate\Http\Request;

use DataTables;



class ObatController extends Controller
{
  function obat()
  {
    $supplier = Supplier::all();
    $obats = Obat::all();
    $kategoriobat = Kategoriobat::all();
    return view('obat.obat', compact('obats', 'kategoriobat', 'supplier'));
  }

  function kategori()
  {
    $obats = Obat::all();
    $kategoriobat = Kategoriobat::all();
    return view('obat.kategori', compact('obats', 'kategoriobat'));
  }

  function createobat(Request $request)
  {
    Obat::create($request->all());
    return redirect('/obat');
  }

  function createkategori(Request $request)
  {
    Kategoriobat::create($request->all());
    return redirect('/kategoriobat');
  }

  function edit($id)
  {

  }

  function updateobat(Request $request)
  {
    $obats = Obat::findOrFail($request->id);
    $obats->update($request->all());
    return back();
  }

  function detailobat($id)
  {
    $obats = Obat::find($id);
    return view('obat.detail', compact('obats'));
  }

  function detailkategori($id)
  {
    $kategoriobat = Kategoriobat::find($id);
    return view('obat.detailkategori', compact( 'kategoriobat'));
  }

  function destroyobat($id)
  {
    $obats = Obat::find($id);
    $obats->delete();

    return back();
  }

  function destroykategoriobat($id)
  {
    $kategoriobat = Kategoriobat::find($id);
    $kategoriobat->delete();

    return back();
  }



}
