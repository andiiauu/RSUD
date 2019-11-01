@extends('layouts.master')
@section('content')
<div class="main">
  <div class="main-content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="panel">
              <div class="panel-heading">
                <h3 class="panel-title">Data Kategori {{$kategoriobat->nama_kategori}}</h3>
              </div>

              <div class="panel-body">
                <table class="table table-hover table-bordered table-striped">
                  <thead>
                    <tr>
                      <th class="text-center">No</th>
                      <th class="text-center">Kode Obat</th>
                      <th class="text-center">Nama</th>
                      <th class="text-center">Harga Satuan</th>
                      <th class="text-center">Stok</th>
                    </tr>
                  </thead>

                  <tbody>
                    @foreach ($kategoriobat->obat as $key => $obats)
                      <tr>
                        <th class="text-center">{{++$key}}</th>
                        <th class="text-center">{{$obats->kode_obat}}</th>
                        <th class="text-center">{{$obats->name}}</th>
                        <th class="text-center">RP {{$obats->harga_obat}}</th>
                        <th class="text-center">{{$obats->stok}}</th>
                    @endforeach
                  </tbody>
                </table>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>




@endsection
