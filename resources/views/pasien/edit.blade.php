<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
      <h1>Edit Data</h1>
      @if (session('sukses'))
        <div class="alert alert-success" role="alert">
          {{session('sukses')}}
        </div>
      @endif

      <div class="row">

        <form action="/pasien/{{$pasien->id}}/update" method="post">
          {{csrf_field()}}
            <div class="row row-eq">
                <div class="col-lg-8 col-md-8 col-sm-8">
                    <div class="row ptt10">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Name</label><small class="req"> *</small>
                                <input name="nama_pasien" placeholder="" type="text" class="form-control" value="{{$pasien->nama_pasien}}" />
                                <span class="text-danger"></span>
                            </div>
                        </div>

                        <div class="col-sm-6">
                              <div class="form-group">
                                  <label>Nama Wali</label>
                                  <input type="text" name="nama_wali" value="{{$pasien->nama_wali}}" class="form-control">
                              </div>
                          </div>

                          <div class="col-sm-6">
                                <div class="form-group">
                                    <label>No telp</label>
                                    <input type="number" name="no_telp" value="{{$pasien->no_telp}}" class="form-control">
                                </div>
                            </div>

                          <div class="col-sm-6">
                              <div class="form-group">
                                  <label>Jenis Kelamin</label>
                                  <select class="form-control" name="jenis_kelamin">
                                      <option value="">Select</option>
                                              <option value="Laki-laki" @if($pasien->jenis_kelamin == 'Laki-laki') selected @endif >Laki-Laki</option>
                                              <option value="Perempuan"  @if($pasien->jenis_kelamin == 'Perempuan') selected @endif >Perempuan</option>
                                      </select>
                              </div>
                          </div>

                          <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Umur</label>
                                    <input type="number" name="umur" value="{{$pasien->umur}}" class="form-control">
                                </div>
                            </div>

                            <div class="col-sm-5">
                              <div class="form-group">
                                  <label>Golongan Darah</label>
                                  <select name="gl_darah"  class="form-control" >
                                      <option value="">Select</option>
                                              <option value="O+" @if($pasien->gl_darah == 'O+') selected @endif>O+</option>
                                              <option value="A+" @if($pasien->gl_darah == 'A+') selected @endif>A+</option>
                                              <option value="B+" @if($pasien->gl_darah == 'B+') selected @endif >B+</option>
                                              <option value="AB+" @if($pasien->gl_darah == 'AB+') selected @endif>AB+</option>
                                              <option value="O-" @if($pasien->gl_darah == 'O-') selected @endif>O-</option>
                                              <option value="A-" @if($pasien->gl_darah == 'A-') selected @endif>A-</option>
                                              <option value="B-" @if($pasien->gl_darah == 'B-') selected @endif>B-</option>
                                              <option value="AB-" @if($pasien->gl_darah == 'AB-') selected @endif>AB-</option>
                                      </select>
                              </div>
                          </div>

                            <div class="col-sm-5">
                              <div class="form-group">
                                  <label>Tanggal Masuk</label>
                                  <small class="req"> *</small>
                                  <input  name="tgl_masuk" placeholder="" value="{{$pasien->tgl_masuk}}"type="date" class="form-control datetime" />
                                  <span class="text-danger"></span>
                              </div>
                            </div>

                          <div class="col-sm-10">
                              <div class="form-group">
                                  <label for="pwd">Note</label>
                                  <textarea name="note" rows="4" class="form-control" >{{$pasien->note}}</textarea>
                              </div>
                          </div>


                              <div class="col-sm-6">
                              <div class="form-group">
                                  <label for="pwd">Tagihan (RP) <small class="req"> *</small></label>
                                  <input name="tagihan" type="number" class="form-control" value="{{$pasien->tagihan}}" />
                              </div>
                          <button type="submit" class="btn btn-warning">update</button>
                        </form>
                        </div>
                        </div>
                      </div>
                  </div>




    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>



  </body>
</html>
