@extends('layouts.master')
@section('content')
<div class="main">
  <div class="main-content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="panel">
				<div class="panel-heading">
					<h3 class="panel-title">Data Dokter</h3>
          <div class="right">
            <button type="button" class="lnr lnr-plus-circle" data-toggle="modal" data-target="#exampleModal">
              Tambah Data
            </button>
          </div>
				</div>
				<div class="panel-body">
					<table class="table table-hover table-striped table-bordered">
						<thead>
              <tr>
                <th class="text-center">No</th>
                <th class="text-center">Nama Dokter</th>
                <th class="text-center">Poliklinik</th>
                <th class="text-center">Action</th>
              </tr>
            </thead>

						<tbody>
              @foreach ($dokter as $key => $dokter)
                <tr>

                  <th class="text-center">{{++$key}}</th>
                  <th class="text-center">{{$dokter->nama}}</th>
                  <th class="text-center"{{$dokter->poli_id}}>{{$dokter->poli->nama}}</th>
                  <th class="text-center">
                    <a href="/dokter/{{$dokter->id}}/detaildokter"><button class="btn btn-primary btn-sm">View</button>
                    <a href="#"><button class="btn btn-warning btn-sm"

                      data-dokter_id = "{{$dokter->id}}"
                      data-nama_dokter = "{{$dokter->nama}}"
                      data-jenis_kelamin = "{{$dokter->jenis_kelamin}}"
                      data-no_telp = "{{$dokter->no_telp}}"
                      data-umur = "{{$dokter->umur}}"
                      data-alamat = "{{$dokter->alamat}}"

                      data-toggle="modal" data-target="#editdokter">Edit</button></a>

                      <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete">Delete</button>
                  </th>

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





    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content modal-media-content">
      <div class="modal-header modal-media-header">
        <h4 class="modal-title" id="exampleModalLabel">Add Data</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body pt0 pb0">
        <form action="/dokter/create" method="post">
          {{csrf_field()}}
              <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12">
                      <form id="formadd" accept-charset="utf-8">
                          <div class="row row-eq">
                              <div class="col-lg-8 col-md-8 col-sm-8">
                                  <div class="row ptt10">

                                      <div class="col-md-6">
                                          <div class="form-group">
                                              <label>Poli</label><small class="req"></small>
                                              <select class="form-control" name="poli_id">
                                                @foreach ($poli as $poli)
                                                  <option value="{{$poli->id}}">{{$poli->nama}}</option>
                                                @endforeach
                                              </select>
                                              <span class="text-danger"></span>
                                          </div>
                                      </div>

                                      <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Nama Dokter</label>
                                                <input type="text" name="nama" value="" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Jenis Kelamin</label>
                                                <select class="form-control" name="jenis_kelamin">
                                                    <option value="">Select</option>
                                                    <option value="Laki-laki">Laki-Laki</option>
                                                    <option value="Perempuan">Perempuan</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>No telp</label>
                                                <input type="number" name="no_telp" value="" class="form-control">
                                            </div>
                                        </div>


                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>Umur</label>
                                                <input type="number" name="umur" value="" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-sm-10">
                                            <div class="form-group">
                                                <label for="">alamat</label>
                                                <textarea name="alamat" rows="4" class="form-control"></textarea>
                                            </div>
                                        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
      </div>
    </div>
  </div>
</div>
</div>
</div>
</div>
</div>
</div>

<div class="modal fade" id="editdokter" tabindex="-1" role="dialog" aria-labelledby="editdokterLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content modal-media-content">
  <div class="modal-header modal-media-header">
    <h4 class="modal-title" id="editdokterLabel">Add Data</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>

  <div class="modal-body pt0 pb0">
    <form action="{{route('dokter.update', $dokter)}}" method="post">
      {{method_field('patch')}}
      {{csrf_field()}}
      <input type="hidden" name="id" id="dokter_id" value="">
          <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12">
                  <form id="formadd" accept-charset="utf-8">
                      <div class="row row-eq">
                          <div class="col-lg-8 col-md-8 col-sm-8">
                              <div class="row ptt10">

                                  {{-- <div class="col-md-6">
                                      <div class="form-group">
                                          <label>Poli</label><small class="req"></small>
                                          <select class="form-control" name="poli_id">
                                            @foreach ($poli as $poli)
                                              <option value="{{$poli->id}}">{{$poli->nama}}</option>
                                            @endforeach
                                          </select>
                                          <span class="text-danger"></span>
                                      </div>
                                  </div> --}}

                                  <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Nama Dokter</label>
                                            <input type="text" id="namadokter" name="nama" value="" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Jenis Kelamin</label>
                                            <select class="form-control" id="jeniskelamin" name="jenis_kelamin">
                                                <option value="">Select</option>
                                                <option value="Laki-laki">Laki-Laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>No telp</label>
                                            <input type="number" id="notelp" name="no_telp" value="" class="form-control">
                                        </div>
                                    </div>


                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Umur</label>
                                            <input type="number" name="umur" id="umur" value="" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-sm-10">
                                        <div class="form-group">
                                            <label for="">alamat</label>
                                            <textarea name="alamat" rows="4" id="alamat" class="form-control"></textarea>
                                        </div>
                                    </div>
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
  </div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

<div class="modal modal-danger fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampdeletepasien" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content modal-media-content">
            <div class="modal-header modal-media-header">
                <h4 class="modal-title" id="deletepasienLabel">Delete</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{route('dokter.destroy', $dokter->id)}}" method="post">
              {{method_field('delete')}}
              {{csrf_field()}}

            <div class="modal-body pt0 pb0">
              <p class="text-center">
                Yakin Menghapus Data Ini?
              </p>

            <div class="modal-footer">
            <button type="button" class="btn btn-success" data-dismiss="modal">No, Cancel</button>
            <button type="submit" class="btn btn-danger">Yes, Delete</button>

<script type="text/javascript">

$('#editdokter').on('show.bs.modal', function (event){

  console.log('Modal Opened');
    var button = $(event.relatedTarget)

    var dokter_id = button.data('dokter_id')
    var nama_dokter = button.data('nama_dokter')
    var jenis_kelamin = button.data('jenis_kelamin')
    var no_telp = button.data('no_telp')
    var umur = button.data('umur')
    var alamat = button.data('alamat')
    var modal = $(this)

    modal.find('.modal-body #dokter_id').val(dokter_id)
    modal.find('.modal-body #namadokter').val(nama_dokter)
    modal.find('.modal-body #jeniskelamin').val(jenis_kelamin)
    modal.find('.modal-body #notelp').val(no_telp)
    modal.find('.modal-body #umur').val(umur)
    modal.find('.modal-body #alamat').val(alamat)

  })
</script>



<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script> --}}
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

@stop
