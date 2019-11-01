@extends('layouts.master')
@section('content')
<div class="main">
  <div class="main-content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="panel">
				<div class="panel-heading">
					<h3 class="panel-title">Data Poli</h3>
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
                <th class="text-center">Poliklinik</th>
                <th class="text-center">Action</th>
              </tr>
            </thead>

						<tbody>
              @foreach ($poli as $poli)
                <tr>
                  <th class="text-center">{{$poli->id}}</th>
                  <th class="text-center">{{$poli->nama}}</th>
                  <th class="text-center">
                    <a href="/poli/{{$poli->id}}/detailpoli"><button class="btn btn-primary btn-sm">View</button>
                    <a href="#"><button class="btn btn-warning btn-sm"

                      data-poli_id = "{{$poli->id}}"
                      data-nama_poli = "{{$poli->nama}}"

                      data-toggle="modal" data-target="#edit">Edit</button></a>
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
        <form action="/poli/create" method="post">
          {{csrf_field()}}
              <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12">
                      <form id="formadd" accept-charset="utf-8">
                          <div class="row row-eq">
                              <div class="col-lg-8 col-md-8 col-sm-8">
                                  <div class="row ptt10">

                                      <div class="col-md-6">
                                          <div class="form-group">
                                              <label>Nama</label><small class="req"></small>
                                              <input name="nama" placeholder="" type="text" class="form-control"  value="" />
                                              <span class="text-danger"></span>
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
    <h4 class="modal-title" id="edit">edit</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>

  <div class="modal-body pt0 pb0">
    <form action="{{route('poli.update', $poli)}}" method="post">
      {{method_field('patch')}}
      {{csrf_field()}}
      <input type="hidden" name="id" id="poli_id" value="">
          <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12">
                  <form id="formadd" accept-charset="utf-8">
                      <div class="row row-eq">
                          <div class="col-lg-8 col-md-8 col-sm-8">
                              <div class="row ptt10">

                                  <div class="col-md-6">
                                      <div class="form-group" >
                                          <label>Nama</label><small class="req"></small>
                                          <input name="nama" id="namapoli" placeholder="" type="text" class="form-control"  value="" />
                                          <span class="text-danger"></span>
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

            <form action="{{route('poli.destroy', $poli->id)}}" method="post">
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

    var poli_id = button.data('poli_id')
    var nama_poli = button.data('nama_poli')
    var modal = $(this)

    modal.find('.modal-body #poli_id').val(poli_id)
    modal.find('.modal-body #namapoli').val(nama_poli)
})

</script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script> --}}
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

@stop
