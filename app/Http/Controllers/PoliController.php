<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Poli;
use App\Dokter;
use App\Pasien;
use DB;

class PoliController extends Controller
{
  function index()
  {
    $dokter = Dokter::all();
    $poli = Poli::all();
    return view('poli.poli', compact('poli', 'dokter'));
  }

  function create(Request $request)
  {
    Poli::create($request->all());
    return redirect('/poli')->with('sukses', 'Data berhasil ditambahkan');
  }

  function edit($id)
  {

  }

  public function update(Request $request)
  {
    $poli = Poli::findOrFail($request->id);
    $poli->update($request->all());
    return back();
  }

  public function destroy($id)
  {
    $poli = Poli::find($id);
    $poli->delete();

    return back();
  }

  function detailpoli($id)
  {
    $dokter = Dokter::all();
    $poli = Poli::find($id);
    return view('poli.detail', compact('poli', 'dokter'));
  }

}
