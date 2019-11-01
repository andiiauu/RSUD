<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kamar;
use App\Kategorikamar;
use DB;

class KamarController extends Controller
{
  //KategoriKamar

    function kategori()
    {
      $kamar = Kamar::all();
      $kategorikamar = Kategorikamar::all();
      return view('kamar.kategori', compact('kamar', 'kategorikamar'));
    }

    function createkategori(Request $request)
    {
      Kategorikamar::create($request->all());
      return redirect('/kategorikamar');
    }

    function destroykategorikamar($id)
    {
      $kategorikamar = Kategorikamar::find($id);
      $kategorikamar->delete();

      return back();
    }

  //Kamar

  function kamar()
  {
    $kamar = Kamar::all();
    $kategorikamar = Kategorikamar::all();
    return view('kamar.datakamar', compact('kamar', 'kategorikamar'));
  }

  function createkamar(Request $request)
  {
    Kamar::create($request->all());
    return redirect('/kamar');
  }

  // function detailkamar($id)
  // {
  //   $kamar = Kamar::find($id);
  //   return view('kamar.detailkamar', compact('kamar'));
  // }


  public function destroykamar($id)
  {
    $kamar = Kamar::find($id);
    $kamar->delete();
    return back();
  }

  public function getkamar(Request $request)
  {
    $id_kategorikamar = $request->input('id_kategorikamar');
    $getDatakamar = Kamar::where('kategorikamar_id', $id_kategorikamar)->get();
    return response()->json($getDatakamar);
  }
}
