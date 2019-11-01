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
          <a href="penjualan/create" class="btn-index btn btn-primary">Add</a>
          </div>
				</div>
				<div class="panel-body">
					<table class="table table-hover table-striped table-bordered">
						<thead>
              <tr>
                <th class="text-center">ID</th>
                <th class="text-center">No Nota</th>
                <th class="text-center">Tanggal</th>
                <th class="text-center">Total</th>
                <th class="text-center">Actions</th>
              </tr>
            </thead>

						<tbody>
              @foreach ($data as $key => $data)
                <tr>
                  <th class="text-center">{{++$key}}</th>
                  <th class="text-center">{{$data->no_nota}}</th>
                  <th class="text-center">{{formatDate($data->tanggal)}}</th>
                  <th class="text-center">{{formatRp($data->total)}}</th>
                  <th class="text-center"></th>
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

  {{-- <script src="https://cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
  <script>
      $('.dataTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: 'penjualan/datatable',
        columns: [
          {data: 'id', name: 'id'},
                  {data: 'no_nota', name: 'no_nota'},
          {data: 'tanggal', name: 'tanggal'},
                  {data: 'total', name: 'total'},
          {data: 'action', name: 'action', orderable: false, searchable: false}
        ],
        responsive: true
      });

    </script> --}}

@stop
