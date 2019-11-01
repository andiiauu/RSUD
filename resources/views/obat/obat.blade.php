@extends('layouts.master')
@section('content')
<div class="main">
  <div class="main-content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="panel">
				<div class="panel-heading">
					<h3 class="panel-title">Data Obat</h3>
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
                <th class="text-center">Kode Obat</th>
                <th class="text-center">Nama</th>
                <th class="text-center">Supplier</th>
                <th class="text-center">Harga</th>
                <th class="text-center">Action</th>
              </tr>
            </thead>

						<tbody>
              @foreach ($obats as $key => $obats)
                <tr>
                  <th class="text-center">{{++$key}}</th>
                  <th class="text-center">{{$obats->kode_obat}}</th>
                  <th class="text-center">{{$obats->name}}</th>
                  <th class="text-center">{{$obats->supplier}}</th>
                  <th class="text-center">{{formatRp($obats->harga_obat)}}</th>



                  {{-- <th class="text-center"{{$obats->poli_id}}>{{$dokter->poli->nama}}</th> --}}

                  <th class="text-center">

                    <a href="{{route('obat.show', $obats->id)}}">
                      <button class="btn btn-info btn-xs"><i class="fa fa-info-circle"></i></button>
                    </a>
                    <button class="btn btn-warning btn-xs"

                    data-obat_id = "{{$obats->id}}"
                    data-kategoriobat = "{{$obats->kategoriobat_id}}"
                    data-name = "{{$obats->name}}"
                    data-kode_obat = "{{$obats->kode_obat}}"
                    data-supplier = "{{$obats->supplier}}"
                    data-harga_modal = "{{$obats->harga_modal}}"
                    data-harga_obat = "{{$obats->harga_obat}}"
                    data-stok = "{{$obats->stok}}"

                    data-toggle="modal" data-target="#edit"><i class="fa fa-pencil"></i></button>
                    <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete"><i class="fa fa-trash-o"></i></button>
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

        <form action="/obat/create" method="post">
          {{csrf_field()}}
              <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12">
                      <form id="formadd" accept-charset="utf-8">
                          <div class="row row-eq">
                              <div class="col-lg-8 col-md-8 col-sm-8">
                                  <div class="row ptt10">

                                      <div class="col-md-6">
                                          <div class="form-group">
                                              <label>Kategori Obat</label><small class="req"></small>
                                              <select class="form-control" name="kategoriobat_id">
                                                <option value="">--Pilih Kategori--</option>
                                                @foreach ($kategoriobat as $katobat)
                                                  <option value="{{$katobat->id}}">{{$katobat->nama_kategori}}</option>
                                                @endforeach
                                              </select>
                                              <span class="text-danger"></span>
                                          </div>
                                      </div>

                                      <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Nama Obat</label>
                                                <input type="text" name="name" value="" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                              <div class="form-group">
                                                  <label>Kode Obat</label>
                                                  <input type="text" name="kode_obat" value="" class="form-control">
                                              </div>
                                          </div>

                                          <div class="col-md-6">
                                              <div class="form-group">
                                                  <label>Supplier</label><small class="req"></small>
                                                  <select class="form-control" name="supplier">
                                                    <option value="">--Pilih Supplier--</option>
                                                    @foreach ($supplier as $supp)
                                                      <option value="{{$supp->name}}">{{$supp->name}}</option>
                                                    @endforeach
                                                  </select>
                                                  <span class="text-danger"></span>
                                              </div>
                                          </div>

                                          <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Harga Beli</label>
                                                    <div class="input-group">
                                                      <span class="input-group-addon">RP</span>
                                                    <input type="number" name="harga_modal" value="" class="form-control">
                                                </div>
                                            </div>
                                          </div>

                                        <div class="col-sm-6">
                                              <div class="form-group">
                                                  <label>Harga Jual</label>
                                                  <div class="input-group">
                                                    <span class="input-group-addon">RP</span>
                                                  <input type="number" name="harga_obat" value="" class="form-control">
                                              </div>
                                          </div>
                                        </div>

                                          <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Stok</label>
                                                    <input type="number" name="stok" value="" class="form-control">
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

<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content modal-media-content">
  <div class="modal-header modal-media-header">
    <h4 class="modal-title" id="edit">Add Data</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>

  <div class="modal-body pt0 pb0">
    <form action="{{route('obat.update', $obats)}}" method="post">
      {{method_field('patch')}}
      {{csrf_field()}}
      <input type="hidden" name="id" id="obat_id" value="">
          <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12">
                  <form id="formadd" accept-charset="utf-8">
                      <div class="row row-eq">
                          <div class="col-lg-8 col-md-8 col-sm-8">
                              <div class="row ptt10">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Kategori Obat</label><small class="req"></small>
                                        <select class="form-control"  id="kategoriobat" name="kategoriobat_id">
                                          <option value="">--Pilih Kategori--</option>
                                          @foreach ($kategoriobat as $katobat)
                                            <option value="{{$katobat->id}}">{{$katobat->nama_kategori}}</option>
                                          @endforeach
                                        </select>
                                        <span class="text-danger"></span>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                      <div class="form-group">
                                          <label>Nama Obat</label>
                                          <input type="text" name="name" id="name" value="" class="form-control">
                                      </div>
                                  </div>
                                  <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Kode Obat</label>
                                            <input type="text" id="kode_obat" name="kode_obat" value="" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Supplier</label><small class="req"></small>
                                            <select class="form-control" name="supplier" id="supplier">
                                              <option value="">--Pilih Supplier--</option>
                                              @foreach ($supplier as $supp)
                                                <option value="{{$supp->name}}">{{$supp->name}}</option>
                                              @endforeach
                                            </select>
                                            <span class="text-danger"></span>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                          <div class="form-group">
                                              <label>Harga Beli</label>
                                              <div class="input-group">
                                                <span class="input-group-addon">RP</span>
                                              <input type="number" id="harga_modal" name="harga_modal" value="" class="form-control">
                                          </div>
                                      </div>
                                    </div>

                                    <div class="col-sm-6">
                                          <div class="form-group">
                                              <label>Harga Jual</label>
                                              <div class="input-group">
                                                <span class="input-group-addon">RP</span>
                                              <input type="number" id="harga_obat" name="harga_obat" value="" class="form-control">
                                          </div>
                                      </div>
                                    </div>

                                    <div class="col-sm-6">
                                          <div class="form-group">
                                              <label>Stok</label>
                                              <input type="number" id="stok" name="stok" value="" class="form-control">
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

            <form action="{{route('obat.destroy', $obats->id)}}" method="post">
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
            $('#edit').on('show.bs.modal', function(event){
              console.log('Modal Opened');
                var button = $(event.relatedTarget)

                var obat_id = button.data('obat_id')
                var kategoriobat_id = button.data('kategoriobat')
                var name = button.data('name')
                var kode_obat = button.data('kode_obat')
                var supplier = button.data('supplier')
                var harga_modal = button.data('harga_modal')
                var harga_obat = button.data('harga_obat')
                var stok = button.data('stok')
                var modal = $(this)

                modal.find('.modal-body #obat_id').val(obat_id)
                modal.find('.modal-body #kategoriobat').val(kategoriobat_id)
                modal.find('.modal-body #name').val(name)
                modal.find('.modal-body #kode_obat').val(kode_obat)
                modal.find('.modal-body #supplier').val(supplier)
                modal.find('.modal-body #harga_modal').val(harga_modal)
                modal.find('.modal-body #harga_obat').val(harga_obat)
                modal.find('.modal-body #stok').val(stok)

            })

            </script>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script> --}}
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

@stop
