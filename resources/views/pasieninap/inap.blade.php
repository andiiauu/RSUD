@extends('layouts.master')
@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Pasien Rawat Inap</h3>
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
                                        <th class="text-center">Nama Kamar</th>
                                        <th class="text-center">Nomor Kamar</th>
                                        <th class="text-center">Tanggal Masuk</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($pasieninap as $key => $pasieninaps)
                                    <tr class="">
                                        <th class="text-center">{{++$key}}</th>
                                        <th class="text-center">{{$pasieninaps->nama_pasien}}</th>
                                        <th class="text-center">{{$pasieninaps->jenis_kelamin}}</th>
                                        <th class="text-center">{{$pasieninaps->kamar->kategorikamar->nama_kamar}}</th>
                                        <th class="text-center">{{$pasieninaps->kamar->nomor_kamar}}</th>
                                        <th class="text-center">{{formatDate($pasieninaps->tgl_masuk)}}</th>
                                        <th class="text-center">
                                          <a href="/pasieninap/{{$pasieninaps->id}}/detail"><button class="btn btn-primary btn-sm">View</button></a>
                                          <a href="#"><button class="btn btn-warning btn-sm"

                                            data-pasieninap_id="{{$pasieninaps->id}}"
                                            data-nama_pasien="{{$pasieninaps->nama_pasien}}"
                                            data-nama_wali="{{$pasieninaps->nama_wali}}"
                                            data-jenis_kelamin="{{$pasieninaps->jenis_kelamin}}"
                                            data-no_telp="{{$pasieninaps->no_telp}}"
                                            data-umur="{{$pasieninaps->umur}}"
                                            data-gl_darah="{{$pasieninaps->gl_darah}}"
                                            data-tgl_masuk="{{$pasieninaps->tgl_masuk}}"
                                            data-alamat="{{$pasieninaps->alamat}}"

                                            data-toggle="modal" data-target="#editpasieninap">Edit</button></a>

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
                <form action="/pasieninap/create" method="post">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <form id="formadd" accept-charset="utf-8">
                                <div class="row row-eq">
                                    <div class="col-lg-8 col-md-8 col-sm-8">
                                        <div class="row ptt10">

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Name</label><small class="req"></small>
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

                                            {{-- <div class="col-sm-5">
                                                <div class="form-group">
                                                    <label>Tanggal Keluar</label>
                                                    <small class="req"></small>
                                                    <input id="tglkeluar" name="tgl_keluar" placeholder="" type="date" class="form-control datetime" />
                                                    <span class="text-danger"></span>
                                                </div>
                                            </div> --}}

                                            <div class="col-sm-10">
                                                <div class="form-group">
                                                    <label for="">alamat</label>
                                                    <textarea id="alamat" name="alamat" rows="4" class="form-control"></textarea>
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Kategori Kamar</label><small class=""></small>
                                                    <select class="form-control" name="" id="kategorikamar_id">
                                                      <option value="">--PILIH--</option>
                                                        @foreach ($kategorikamar as $kategorikamar)
                                                        <option value="{{$kategorikamar->id}}">{{$kategorikamar->nama_kamar}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>


                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label>No Kamar</label><small class="req"></small>
                                                    <select class="form-control" name="kamar_id" id="kamar">
                                                        <option value="" hidden>Silahkan Pilih</option>
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



      <div class="modal fade" id="editpasieninap" tabindex="-1" role="dialog" aria-labelledby="exampeditpasieninap" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content modal-media-content">
                  <div class="modal-header modal-media-header">
                      <h4 class="modal-title" id="editpasieninapLabel">Add Data</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>

                  <div class="modal-body pt0 pb0">
                    <form>


                      {{-- <form action="{{route('pasieninap.update', $pasieninap)}}" method="post"> --}}
                        {{method_field('PATCH')}}
                          {{csrf_field()}}
                          <input type="hidden" name="id" id="pasieninap_id" value="">
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

                                                  {{-- <div class="col-sm-5">
                                                      <div class="form-group">
                                                          <label>Tanggal Keluar</label>
                                                          <small class="req"></small>
                                                          <input id="tglkeluar" name="tgl_keluar" placeholder="" type="date" class="form-control datetime" />
                                                          <span class="text-danger"></span>
                                                      </div>
                                                  </div> --}}


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

<form>

                        {{-- <form action="{{route('pasieninap.destroy', $pasieninap->id)}}" method="post"> --}}
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


                    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
                    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script> --}}
                    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


                    <script type="text/javascript">
                        $(function() {
                            $("#kategorikamar_id").change(function() {
                                var kamar = $("#kamar").val();
                                $("#kamar").find(".optkamar").remove();
                                var id_kategorikamar = $("#kategorikamar_id").val();

                                $.ajax({
                                        url: '/pasieninap/kamarByKategori',
                                        type: 'POST',
                                        dataType: 'JSON',
                                        data: {
                                            "_token": "{{ csrf_token() }}",
                                            id_kategorikamar: id_kategorikamar
                                        },
                                    })
                                    .done(function(response) {
                                        var html = '';
                                        $.each(response, function(i, item) {
                                            html += '<option value="' + item.id + '">' + item.nomor_kamar + '</option>';
                                        });

                                        $('#kamar').html(html);
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
                      $('#editpasieninap').on('show.bs.modal', function (event){

                        console.log('Modal Opened');
                          var button = $(event.relatedTarget)

                          var pasieninap_id = button.data('pasieninap_id')
                          var nama_pasien = button.data('nama_pasien')
                          var nama_wali = button.data('nama_wali')
                          var jenis_kelamin = button.data('jenis_kelamin')
                          var no_telp = button.data('no_telp')
                          var umur = button.data('umur')
                          var gl_darah = button.data('gl_darah')
                          var tgl_masuk = button.data('tgl_masuk')
                          var alamat = button.data('alamat')
                          var modal = $(this)

                          modal.find('.modal-body #pasieninap_id').val(pasieninap_id)
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
