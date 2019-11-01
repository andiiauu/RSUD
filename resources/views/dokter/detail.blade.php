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
  					<h1 class="name">{{$dokter->nama}}</h1>
  				</div>
  			</div>
  			<!-- END PROFILE HEADER -->

  			<!-- PROFILE DETAIL -->
  			<div class="profile-detail">
  				<div class="profile-info">
  					<h4 class="heading">Informasi Dokter</h4>
  					<ul class="list-unstyled list-justify">
              <li>ID<span>{{$dokter->id}}</span></li>
  						<li>Jenis Kelamin<span>{{$dokter->jenis_kelamin}}</span></li>
  						<li>No telpon<span>{{$dokter->no_telp}}</span></li>
  						<li>Umur <span>{{$dokter->umur}}</span></li>
  						<li>Alamat <span>{{$dokter->alamat}}</span></li>
              <li>Poliklinik/Spesialis <span>{{$dokter->poli->nama}}</span></li>
  					</ul>
  				</div>



  			</div>
  			<!-- END PROFILE DETAIL -->
  		</div>
  		<!-- END LEFT COLUMN -->

  		<!-- RIGHT COLUMN -->
  		<div class="profile-right">

        <!-- TABBED CONTENT -->
        <div class="panel">
  				<div class="panel-heading">
  					<h3 class="panel-title">Data Pasien {{$dokter->nama}}</h3>
  				</div>
  				<div class="panel-body">
  					<table class="table table-striped">
  						<thead>
  							<tr>
                  <th class="text-center">Nama Pasien</th>
                  <th class="text-center">Jenis Kelamin</th>
                  <th class="text-center">Umur</th>
                  <th class="text-center">Golongan Darah</th>
                </tr>
  						</thead>

  						<tbody>
                @foreach ($dokter->pasien as $pasien)
                  <tr>
                    <th class="text-center">{{$pasien->nama_pasien}}</th>
                    <th class="text-center">{{$pasien->jenis_kelamin}}</th>
                    <th class="text-center">{{$pasien->umur}}</th>
                    <th class="text-center">{{$pasien->gl_darah}}</th>
                    <th class="text-center">
                      <a href="/pasien/{{$pasien->id}}/detailpasien"><button class="btn btn-primary btn-sm">View</button></a>
                    </th>
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


@endsection
