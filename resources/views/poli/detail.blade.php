@extends('layouts.master')
@section('content')
  <div class="main">
    <div class="main-content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="panel">
								<div class="panel-heading">
                  <h3 class="panel-title">Data Poli {{$poli->nama}}</h3>
								</div>

								<div class="panel-body">
									<table class="table">
										<thead>
											<tr>
                        <th class="text-center">Nama Dokter</th>
                          <th class="text-center">Jenis Kelamin</th>
                        <th class="text-center">No Telp</th>
                        <th class="text-center">Alamat</th>
											</tr>
										</thead>
										<tbody>
                        @foreach ($poli->dokter as $dokter)
                          <tr>
                            <th class="text-center">{{$dokter->nama}}</th>
                            <th class="text-center">{{$dokter->jenis_kelamin}}</th>
                            <th class="text-center">{{$dokter->no_telp}}</th>
                            <th class="text-center">{{$dokter->alamat}}</th>
                            <th class="text-center">
                              <a href="/dokter/{{$dokter->id}}/detaildokter"><button class="btn btn-primary btn-sm">View</button></a>
                            </th>
                        @endforeach
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
