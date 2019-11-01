@extends('layouts.master')
@section('content')
<div class="main">
  <div class="main-content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="panel">
            <div class="panel-heading">
              <h3 class="panel-title">Data Stok Obat</h3>
            </div>


            <div class="panel-body">
              <table class="table table-striped table-sm table-bordered ">
                <thead>
                      <tr>
                          <th>No</th>
                          <th>Kode Obat</th>
                          <th>Nama Obat</th>
                          {{-- <th>Supplier</th> --}}
                          <th>Stok</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($stok as $key => $item)
                        <tr>
                            <td>{{++$key}}</td>
                            <td>{{$item->kode_obat}}</td>
                            <td>{{$item->name}}</td>
                            {{-- <td>{{$item->supplier}}</td> --}}
                            @if($item->stok <= 50)
                            <td><span class="label label-danger">Sisa stok {{$item->stok}}</span></td>
                            @else
                            <td><span class="label label-success">Sisa stok {{$item->stok}}</span></td>
                            @endif
                        </tr>
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
