<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pasien;
use App\Dokter;
use App\Poli;
use App\Tindakan;

use App\Kamar;
use App\Kategorikamar;
use DB;


class PasienController extends Controller
{
  function index()
  {
    $dokter = Dokter::all();
    $poli = Poli::all();
    $pasien = Pasien::where('kamar_id', null)->get();

    return view('pasien.index', compact('pasien', 'poli', 'dokter'));
  }

  function create(Request $request)
  {
    Pasien::create($request->all());
    return redirect('/pasien')->with('sukses', 'Data berhasil ditambahkan');
  }


  function edit($id)
  {
    // $pasien = Pasien::find($id);
    // return view('/pasien/edit', ['pasien' => $pasien]);
  }

  public function update(Request $request)
  {
    $pasien = Pasien::findOrFail($request->id);
    $pasien->update($request->all());
    return back();
  }

  public function destroy($id)
  {
    $pasien = Pasien::find($id);
    $pasien->delete();
    return back();
  }

  function detailpasien($id)
  {
    $tindak = Tindakan::all();
    $pasien = Pasien::find($id);
    return view('pasien.detail', compact('pasien', 'tindak'));
  }

  function tindakan(Request $request, $idpasien)
  {
    $pasien = Pasien::find($idpasien);
    $pasien->tindakan()->attach($request->tindakan, ['tanggal_berkunjung' => $request->tanggal_berkunjung, 'keterangan' => $request->keterangan]);

    return redirect('/pasien/'.$idpasien.'/detailpasien');
  }
}
