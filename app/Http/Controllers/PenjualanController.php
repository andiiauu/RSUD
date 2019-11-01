<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\PenjualanH;
use App\PenjualanD;
use App\Obat;
use App\Stok;

use DataTables;
use DB;

class PenjualanController extends Controller
{
    function index()
    {
      $detail = PenjualanD::where('status', '0')->get();

      return view('obat.penjualan.create', compact('detail'));
    }

    public function create()
    {
      $detail = PenjualanD::where('status', '0')->get();
      return view ('obat.penjualan.create', compact('detail'));
    }

    public function store(Request $request)
    {
      PenjualanD::create($request->all());

      return back();

    }

    public function update(Request $request)
    {

      $detail = PenjualanD::where('status', '0');
      $detail->update(['status' => '1']);


      DB::table('obats')->where('id', $detail->id_obat)->decrement('stok', $detail->jumlah);

      return back();
    }
}
