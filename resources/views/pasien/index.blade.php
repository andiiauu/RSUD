@extends('layouts.master')
@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Pasien Rawat Jalan</h3>
                            <div class="right">
                                <button type="button" class="lnr lnr-plus-circle" data-toggle="modal" data-target="#exampleModal">
                                    Tambah Data
                                </button>
                            </div>
                        </div>
                        <div class="panel-body">
                            <table class="table table-hover table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Nama pasien</th>
                                        <th class="text-center">Jenis Kelamin</th>
                                        <th class="text-center">Poli Tujuan</th>
                                        <th class="text-center">Tanggal Masuk</th>
                                        <th class="text-center">Action</th>

                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($pasien as $key => $pasien)
                                    <tr class="">
                                        <th class="text-center">{{++$key}}</th>
                                        <th class="text-center">{{$pasien->nama_pasien}}</th>
                                        <th class="text-center">{{$pasien->jenis_kelamin}}</th>
                                        <th class="text-center">{{$pasien->dokter->poli->nama}}</th>
                                        <th class="text-center">{{formatDate($pasien->tgl_masuk)}}</th>
                                        <th class="text-center">
                                          <a href="/pasien/{{$pasien->id}}/detailpasien"><button class="btn btn-primary btn-sm">View</button></a>
                                          <a href="#"><button class="btn btn-warning btn-sm"

                                            data-pasien_id="{{$pasien->id}}"
                                            data-nama_pasien="{{$pasien->nama_pasien}}"
                                            data-nama_wali="{{$pasien->nama_wali}}"
                                            data-jenis_kelamin="{{$pasien->jenis_kelamin}}"
                                            data-no_telp="{{$pasien->no_telp}}"
                                            data-umur="{{$pasien->umur}}"
                                            data-gl_darah="{{$pasien->gl_darah}}"
                                            data-tgl_masuk="{{$pasien->tgl_masuk}}"
                                            data-alamat="{{$pasien->alamat}}"

                                            data-toggle="modal" data-target="#editpasien">Edit</button></a>

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
                <form action="/pasien/create" method="post">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <form id="formadd" accept-charset="utf-8">
                                <div class="row row-eq">
                                    <div class="col-lg-8 col-md-8 col-sm-8">
                                        <div class="row ptt10">

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Name</label><small class="req"> *</small>
                                                    <input  id="namapasien" name="nama_pasien" placeholder="" type="text" class="form-control" value="" />
                                                    <span class="text-danger"></span>
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Nama Wali</label>
                                                    <input id="namawali" type="text" name="nama_wali" value="" class="form-control">
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
                                                    <input type="number" id="umur" name="umur" value="" class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-sm-5">
                                                <div class="form-group">
                                                    <label>Golongan Darah</label>
                                                    <select name="gl_darah" id="gldarah" class="form-control">
                                                        <option value="">Select</option>
                                                        <option value="O+">O+</option>
                                                        <option value="A+">A+</option>
                                                        <option value="B+">B+</option>
                                                        <option value="AB+">AB+</option>
                                                        <option value="O-">O-</option>
                                                        <option value="A-">A-</option>
                                                        <option value="B-">B-</option>
                                                        <option value="AB-">AB-</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-sm-5">
                                                <div class="form-group">
                                                    <label>Tanggal Masuk</label>
                                                    <small class="req"></small>
                                                    <input id="tglmasuk" name="tgl_masuk" placeholder="" type="date" class="form-control datetime" />
                                                    <span class="text-danger"></span>
                                                </div>
                                            </div>

                                            <div class="col-sm-10">
                                                <div class="form-group">
                                                    <label for="">alamat</label>
                                                    <textarea id="alamat" name="alamat" rows="4" class="form-control"></textarea>
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Poli Tujuan </label><small class="req"></small>
                                                    <select class="form-control" name="" id="poli_id">
                                                      <option value="">--Poli Tujuan--</option>
                                                        @foreach ($poli as $poli)
                                                        <option value="{{$poli->id}}">{{$poli->nama}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>


                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label>Dokter</label><small class="req"></small>
                                                    <select class="form-control" name="dokter_id" id="dokter">
                                                        <option value=""></option>
                                                    </select>
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

{{-- EDIT DATA PASIEN BELOM FIX --}}

      <div class="modal fade" id="editpasien" tabindex="-1" role="dialog" aria-labelledby="exampeditpasien" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content modal-media-content">
                  <div class="modal-header modal-media-header">
                      <h4 class="modal-title" id="editpasienLabel">Add Data</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>

                  <div class="modal-body pt0 pb0">
                      <form action="{{route('pasien.update', $pasien)}}" method="post">
                        {{method_field('patch')}}
                          {{csrf_field()}}
                          <input type="hidden" name="id" id="pasien_id" value="">
                          <div class="row">
                              <div class="col-lg-12 col-md-12 col-sm-12">
                                  <form id="formadd" accept-charset="utf-8">
                                      <div class="row row-eq">
                                          <div class="col-lg-8 col-md-8 col-sm-8">
                                              <div class="row ptt10">

                                                  <div class="col-md-6">
                                                      <div class="form-group">
                                                          <label>Name</label><small class="req"></small>
                                                          <input name="nama_pasien" id="namapasien" placeholder="" type="text" class="form-control" value="" />
                                                          <span class="text-danger"></span>
                                                      </div>
                                                  </div>

                                                  <div class="col-sm-6">
                                                      <div class="form-group">
                                                          <label>Nama Wali</label>
                                                          <input type="text" id="namawali" name="nama_wali" value="" class="form-control">
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
                                                          <input type="number" id="umur" name="umur" value="" class="form-control">
                                                      </div>
                                                  </div>

                                                  <div class="col-sm-5">
                                                      <div class="form-group">
                                                          <label>Golongan Darah</label>
                                                          <select id="gldarah" name="gl_darah" class="form-control">
                                                              <option value="">Select</option>
                                                              <option value="O+">O+</option>
                                                              <option value="A+">A+</option>
                                                              <option value="B+">B+</option>
                                                              <option value="AB+">AB+</option>
                                                              <option value="O-">O-</option>
                                                              <option value="A-">A-</option>
                                                              <option value="B-">B-</option>
                                                              <option value="AB-">AB-</option>
                                                          </select>
                                                      </div>
                                                  </div>

                                                  <div class="col-sm-5">
                                                      <div class="form-group">
                                                          <label>Tanggal Masuk</label>
                                                          <small class="req"></small>
                                                          <input id="tglmasuk" name="tgl_masuk" placeholder="" type="date" class="form-control datetime" />
                                                          <span class="text-danger"></span>
                                                      </div>
                                                  </div>

                                                  <div class="col-sm-10">
                                                      <div class="form-group">
                                                          <label for="">alamat</label>
                                                          <textarea id="alamat" name="alamat" rows="4" class="form-control"></textarea>
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

{{-- delete --}}

            <div class="modal modal-danger fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampdeletepasien" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content modal-media-content">
                        <div class="modal-header modal-media-header">
                            <h4 class="modal-title" id="deletepasienLabel">Delete</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <form action="{{route('pasien.destroy', $pasien->id)}}" method="post">
                          {{method_field('delete')}}
                          {{csrf_field()}}

                        <div class="modal-body pt0 pb0">
                          <p class="text-center">
                            Yakin Menghapus Data Ini?
                          </p>

                        <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-dismiss="modal">No, Cancel</button>
                        <button type="submit" class="btn btn-danger">Yes, Delete</button>

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

                    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
                    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script> --}}
                    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


                    <script type="text/javascript">
                        $(function() {
                            $("#poli_id").change(function() {
                                var dokter = $("#dokter").val();
                                $("#dokter").find(".optdokter").remove();
                                var id_poli = $("#poli_id").val();

                                $.ajax({
                                        url: '/pasien/dokterByPoli',
                                        type: 'POST',
                                        dataType: 'JSON',
                                        data: {
                                            "_token": "{{ csrf_token() }}",
                                            id_poli: id_poli
                                        },
                                    })
                                    .done(function(response) {
                                        var html = '';
                                        $.each(response, function(i, item) {
                                            html += '<option value="' + item.id + '">' + item.nama + '</option>';
                                        });

                                        $('#dokter').html(html);
                                    })
                                    .fail(function() {
                                        console.log("error");
                                    })
                                    .always(function() {
                                        console.log("complete");
                                    });
                            });
                        });
                    </script>

                    <script type="text/javascript">
                      $('#editpasien').on('show.bs.modal', function (event){

                        console.log('Modal Opened');
                          var button = $(event.relatedTarget)

                          var pasien_id = button.data('pasien_id')
                          var nama_pasien = button.data('nama_pasien')
                          var nama_wali = button.data('nama_wali')
                          var jenis_kelamin = button.data('jenis_kelamin')
                          var no_telp = button.data('no_telp')
                          var umur = button.data('umur')
                          var gl_darah = button.data('gl_darah')
                          var tgl_masuk = button.data('tgl_masuk')
                          var alamat = button.data('alamat')
                          var modal = $(this)

                          modal.find('.modal-body #pasien_id').val(pasien_id)
                          modal.find('.modal-body #namapasien').val(nama_pasien)
                          modal.find('.modal-body #namawali').val(nama_wali)
                          modal.find('.modal-body #jeniskelamin').val(jenis_kelamin)
                          modal.find('.modal-body #notelp').val(no_telp)
                          modal.find('.modal-body #umur').val(umur)
                          modal.find('.modal-body #gldarah').val(gl_darah)
                          modal.find('.modal-body #tglmasuk').val(tgl_masuk)
                          modal.find('.modal-body #alamat').val(alamat)

                      })
                    </script>

                    @stop
