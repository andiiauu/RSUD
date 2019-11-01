<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dokter;
use App\Poli;
use App\Pasien;
use DB;

class DokterController extends Controller
{
    function index()
    {
      $pasien = Pasien::all();
      $poli = Poli::all();
      $dokter = Dokter::all();
      return view('dokter.dokter', compact('dokter', 'poli', 'pasien'));
    }

    function create(Request $request)
    {
      Dokter::create($request->all());
      return redirect('/dokter')->with('sukses', 'Data berhasil ditambahkan');
    }


    function edit($id)
    {
      // $pasien = Pasien::find($id);
      // return view('/pasien/edit', ['pasien' => $pasien]);
    }

    public function update(Request $request)
    {

      $dokter = Dokter::findOrFail($request->id);
      $dokter->update($request->all());
      return back();
    }

    public function destroy($id)
    {
      $dokter = Dokter::find($id);
      $dokter->delete();
      return back();
    }


    function detaildokter($id)
    {
      $pasien = Pasien::all();
      $dokter = Dokter::find($id);
      return view('dokter.detail', compact('pasien', 'dokter'));
    }

    function getdokter(Request $request)
    {
      $id_poli = $request->input('id_poli');
      $getDatadokter = Dokter::where('poli_id', $id_poli)->get();
      return response()->json($getDatadokter);
    }
}
