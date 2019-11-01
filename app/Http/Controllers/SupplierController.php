<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supplier;
use App\Obat;

class SupplierController extends Controller
{
    function index()
    {
      $obats = Obat::all();
      $supplier = Supplier::all();
      return view('supplier.index', compact('supplier', 'obat'));
    }

    function create(Request $request)
    {
      Supplier::create($request->all());
      return redirect('/supplier');
    }

    function edit($id)
    {

    }

    function update(Request $request)
    {
      $supplier = Supplier::findOrFail($request->id);
      $supplier -> update($request->all());
      return back();
    }

    function destroy($id)
    {
      $supplier = Supplier::find($id);
      $supplier->delete();
      return back();
    }
}
