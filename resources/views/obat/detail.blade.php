@extends('layouts.master')
@section('content')
<div class="main">
  <div class="main-content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-8">
          <div class="panel">
            <div class="panel-heading">
              <h3 class="panel-title">Bordered Table</h3>
            </div>
            <div class="panel-body">
              <table class="table table-bordered table-striped">
                <tbody>
                  <tr>
                    <td>Kategori Obat</td>
                    <td>{{$obats->kategoriobat->nama_kategori}}</td>
                  </tr>

                  <tr>
                    <td>Nama Obat</td>
                    <td>{{$obats->name}}</td>
                  </tr>

                  <tr>
                    <td>Kode Obat</td>
                    <td>{{$obats->kode_obat}}</td>
                  </tr>

                  <tr>
                    <td>Supplier</td>
                    <td>{{$obats->supplier}}</td>
                  </tr>

                  <tr>
                    <td>Harga Beli / unit</td>
                    <td>RP {{$obats->harga_modal}}</td>
                  </tr>

                  <tr>
                    <td>Harga Jual / unit</td>
                    <td>RP {{$obats->harga_obat}}</td>
                  </tr>

                  <tr>
                    <td>Profit / unit</td>
                    <td>RP {{$obats->harga_obat - $obats->harga_modal}}</td>
                  </tr>

                  <tr>
                    <td>Stok</td>
                    <td>{{$obats->stok}}</td>
                  </tr>

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
