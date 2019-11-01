<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pasieninap;
use App\Kamar;
use App\Kategorikamar;
use App\Pasien;
use DB;

class PasieninapController extends Controller
{
    function index()
    {
      $kamar = Kamar::all();
      $kategorikamar = Kategorikamar::all();
      $pasieninap = Pasien::where('kamar_id', '!=', null)->get();
      // dd($pasieninap);
      return view('pasieninap.inap', compact('pasieninap', 'kategorikamar', 'kamar'));
    }

    function create(Request $request)
    {
      Pasien::create($request->all());
      return redirect('/pasieninap');
    }

    function edit($id)
    {
      //;
    }

    public function update(Request $request)
    {
      $pasieninap = Pasien::findOrFail($request->id);
      $pasieninap->update($request->all());
      return back();
    }

    function destroy($id)
    {
      $pasieninap = Pasien::find($id);
      $pasieninap->delete();
      return back();
    }


}
