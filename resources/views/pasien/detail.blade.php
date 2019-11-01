@extends('layouts.master')
@section('content')
  <div class="main">
    <div class="main-content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">

  <div class="panel panel-profile">
  	<div class="clearfix">
  		<!-- LEFT COLUMN -->
  		<div class="profile-left">

  			<!-- PROFILE HEADER -->
  			<div class="profile-header">
  				<div class="overlay"></div>
  				<div class="profile-main">
  					<h1 class="name">{{$pasien->nama_pasien}}</h1>
  				</div>
  			</div>
  			<!-- END PROFILE HEADER -->

  			<!-- PROFILE DETAIL -->
  			<div class="profile-detail">
  				<div class="profile-info">
  					<h4 class="heading">Informasi Pasien</h4>
  					<ul class="list-unstyled list-justify">
              <li>ID<span>{{$pasien->id}}</span></li>
  						<li>Nama Wali<span>{{$pasien->nama_wali}}</span></li>
  						<li>No telpon<span>{{$pasien->no_telp}}</span></li>
  						<li>Umur <span>{{$pasien->umur}}</span></li>
  						<li>Golongan Darah <span>{{$pasien->gl_darah}}</span></li>
  					</ul>
  				</div>



  			</div>
  			<!-- END PROFILE DETAIL -->
  		</div>
  		<!-- END LEFT COLUMN -->

  		<!-- RIGHT COLUMN -->
  		<div class="profile-right">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Tambah Data
        </button>

        <!-- TABBED CONTENT -->
        <div class="panel">
  				<div class="panel-heading">
  					<h3 class="panel-title">Riwayat Pasien</h3>
  				</div>
  				<div class="panel-body">
  					<table class="table table-striped">
  						<thead>
  							<tr>
                  <th class="text-center">Tipe Pemeriksaan</th>
                  {{-- <th class="text-center">Keterangan</th> --}}
                  <th class="text-center">Tanggal Berkunjung</th>
                  <th class="text-center">Tarif</th>
                  <th class="text-center">Status</th>
                  <th class="text-center">Action</th>
                </tr>
  						</thead>

  						<tbody>
                @foreach ($pasien->tindakan as $tindakan)
                  <tr>
                    <th class="text-center">{{$tindakan->tindakan}}</th>
                    {{-- <th class="text-center">{{$tindakan->pivot->keterangan}}</th> --}}
                    <th class="text-center">{{$tindakan->pivot->tanggal_berkunjung}}</th>
                    <th class="text-center">RP {{$tindakan->tarif}}</th>
                    <th class="text-center">Lunas</th>
                    <th class="text-center"> <button class="btn btn-success btn-xs">Cetak Invoice</button></th>
                  </tr>
                @endforeach

  						</tbody>
  					</table>
  				</div>
  			</div>
        <!-- END TABBED CONTENT -->
  		</div>
  		<!-- END RIGHT COLUMN -->
  	</div>
  </div>
</div>
</div>
</div>
</div>
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/pasien/{{$pasien->id}}/tindakan" method="post">
          {{csrf_field()}}
              <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12">
                      <form id="formadd" accept-charset="utf-8">
                          <div class="row row-eq">
                              <div class="col-lg-8 col-md-8 col-sm-8">
                                  <div class="row ptt10">

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Tipe Pemeriksaan</label><small class="req"></small>
                                            <select class="form-control" name="tindakan">
                                              <option value="">--PILIH--</option>
                                              @foreach ($tindak as $tindakpasien)
                                                <option value="{{$tindakpasien->id}}">{{$tindakpasien->tindakan}}</option>
                                              @endforeach
                                            </select>
                                            </div>
                                          </div>

                                          <div class="col-sm-10">
                                              <div class="form-group">
                                                  <label for="">Keterangan</label>
                                                  <textarea id="keterangan" name="keterangan" rows="3" class="form-control"></textarea>
                                              </div>
                                          </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Tanggal Berkunjung</label>
                                            <small class="req"></small>
                                            <input  name="tanggal_berkunjung" placeholder="" type="date" class="form-control date" />
                                            <span class="text-danger"></span>
                                        </div>
                                      </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </div>
</div>
@endsection
