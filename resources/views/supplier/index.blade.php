@extends('layouts.master')
@section('content')
<div class="main">
  <div class="main-content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="panel">
				<div class="panel-heading">
					<h3 class="panel-title">Data Supplier</h3>
          <div class="right">
            <button type="button" class="lnr lnr-plus-circle" data-toggle="modal" data-target="#exampleModal">
              Tambah Data
            </button>
          </div>
				</div>
				<div class="panel-body">
					<table class="table  table-bordered table-striped table-hover">
						<thead>
              <tr>
                <th class="text-center">No</th>
                <th class="text-center">Nama Supplier</th>
                <th class="text-center">Contact Person</th>
                <th class="text-center">No Telfon</th>
                <th class="text-center">Alamat</th>
                <th class="text-center">Action</th>
              </tr>
            </thead>

						<tbody>
              @foreach ($supplier as $key => $item)
                <tr>
                  <td class="text-center">{{++$key}}</td>
                  <td class="text-center">{{$item->name}}</td>
                  <td class="text-center">{{$item->cp_name}}</td>
                  <td class="text-center">{{$item->no_telp}}</td>
                  <td class="text-center">{{$item->alamat}}</td>
                  <th class="text-center">
                    <a href="#"><button class="btn btn-warning btn-xs"

                      data-supplier_id = "{{$item->id}}"
                      data-name = "{{$item->name}}"
                      data-cp_name = "{{$item->cp_name}}"
                      data-no_telp = "{{$item->no_telp}}"
                      data-alamat = "{{$item->alamat}}"

                      data-toggle="modal" data-target="#editsupplier"><i class="fa fa-pencil"></i></button></a>
                    <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete"><i class="fa fa-trash"></i></button>
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
        <form action="/supplier/create" method="post">
          {{csrf_field()}}
              <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12">
                      <form id="formadd" accept-charset="utf-8">
                          <div class="row row-eq">
                              <div class="col-lg-8 col-md-8 col-sm-8">
                                  <div class="row ptt10">

                                    <div class="col-sm-6">
                                          <div class="form-group">
                                              <label>Nama Supplier</label>
                                              <input type="text" name="name" value="" class="form-control">
                                          </div>
                                      </div>

                                      <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Nama Contact Person</label>
                                                <input type="text" name="cp_name" value="" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>No telp</label>
                                                <input type="number" name="no_telp" value="" class="form-control">
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

<div class="modal fade" id="editsupplier" tabindex="-1" role="dialog" aria-labelledby="editsupplierLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content modal-media-content">
  <div class="modal-header modal-media-header">
    <h4 class="modal-title" id="editsupplierLabel">Add Data</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>

<div class="modal-body pt0 pb0">
  <form action="{{route('supplier.update', $item)}}" method="post">
    {{method_field('patch')}}
    {{csrf_field()}}
    <input type="hidden" name="id" id="supplier_id" value="">
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
                                          <label>Nama Supplier</label>
                                          <input type="text" id="name" name="name" value="" class="form-control">
                                      </div>
                                  </div>

                                  <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Nama Contact Person</label>
                                            <input type="text" id="cp_name" name="cp_name" value="" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>No telp</label>
                                            <input type="number" id="no_telp" name="no_telp" value="" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-sm-10">
                                        <div class="form-group">
                                            <label for="">alamat</label>
                                            <textarea  id="alamat" name="alamat" rows="4" class="form-control"></textarea>
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

            <form action="{{route('supplier.destroy', $item->id)}}" method="post">
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

            $('#editsupplier').on('show.bs.modal', function (event){

              console.log('Modal Opened');
                var button = $(event.relatedTarget)

                var supplier_id = button.data('supplier_id')
                var name = button.data('name')
                var cp_name = button.data('cp_name')
                var no_telp = button.data('no_telp')
                var alamat = button.data('alamat')
                var modal = $(this)

                modal.find('.modal-body #supplier_id').val(supplier_id)
                modal.find('.modal-body #name').val(name)
                modal.find('.modal-body #cp_name').val(cp_name)
                modal.find('.modal-body #no_telp').val(no_telp)
                modal.find('.modal-body #alamat').val(alamat)

              })
            </script>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script> --}}
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

@stop
