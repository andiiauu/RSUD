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
                        </div>
                        {!! Form::open(['route' => 'penjualan.store', 'method' => 'POST']) !!}
                        <div class="panel-body">

                            <div class="col-md-6 form-group">
                                <label for="">Pilih Obat</label>
                                {!! Form::select('id_obat', App\Obat::pluck('name', 'id'),null, ['class' => 'form-control', 'id' => 'id_obat']) !!}
                            </div>

                            <div class="col-md-6 form-group">
                                <label for="">QTY</label>
                                {!! Form::number('jumlah', 'jumlah', ['class' => 'form-control', 'id' => 'jumlah']) !!}
                            </div>

                            <div class="col-md-6 form-group">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{!! route('penjualan.update') !!}" class="btn btn-success">Selesai</a>
                                {!! Form::close() !!}
                            </div>


                            <div class="col-md-12">
                                <div class="form-group">
                                    <table class="table table-bordered">
                                        <tr class="success">
                                            <th colspan="6">Detail Transaksi</th>
                                        </tr>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Tiket</th>
                                            <th>Qty</th>
                                            <th>Harga Tiket</th>
                                            <th>Subtotal</th>
                                            <th>Cancel</th>
                                        </tr>
                                        @php
                                          $no=1; $total=0;
                                        @endphp
                                        @foreach ($detail as $value)
                                        <tr>
                                            <td>{{$no}}</td>
                                            <td>{{$value->obats->name}}</td>
                                            <td>{{$value->jumlah}}</td>
                                            <td >{{formatRp($value->obats->harga_obat)}}</td>
                                            <td>{{formatRp($value->obats->harga_obat * $value->jumlah)}}</td>
                                            <td><button type="submit" class="btn btn-danger">Cancel</button></td>
                                        </tr>
                                        @php
                                          $no++;
                                          $total=$total+($value->obats->harga_obat * $value->jumlah)
                                        @endphp
                                      @endforeach
                                        <tr>
                                            <td colspan="5">
                                                <p align="right">Total</p>
                                            </td>
                                            <td>{{formatRp($total)}}</td>
                                        </tr>
                                    </table>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @stop
