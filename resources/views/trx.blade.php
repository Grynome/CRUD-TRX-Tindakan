@extends('Theme/header')
@section('view')
    @include('sweetalert::alert')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="d-flex flex-column flex-md-row align-items-center justify-content-between px-4 py-3">
                        <h6 class="card-title">Data Transaksi</h6>
                        <a href="{{ url('Form/Transaksi') }}">
                            <button type="button" class="btn btn-primary btn-icon-text">
                                Tambah
                                <i class="btn-icon-append" data-feather="plus"></i>
                            </button>
                        </a>
                    </div>
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Pasien</th>
                                    <th>Dokter</th>
                                    <th>Tanggal Transaksi</th>
                                    <th>Total</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($transaksiData as $tx)
                                    <tr>
                                        <td>{{ $no }}</td>
                                        <td>{{ $tx->get_ps->nama }}</td>
                                        <td>{{ $tx->get_dr->nama_dokter }}</td>
                                        <td>{{ $tx->tgl_transaksi }}</td>
                                        <td>{{ $totals[$tx->id_trx] }}</td>
                                        <td>
                                            <div class="btn-group me-2" role="group" aria-label="First group">
                                                <button type="button" class="btn btn-outline-primary btn-icon"
                                                    data-bs-toggle="modal" data-bs-target="#dt-trx{{ $no }}">
                                                    <i data-feather="search"></i>
                                                </button>
                                                <div class="modal fade bd-example-modal-xl" id="dt-trx{{ $no }}" tabindex="-1"
                                                    aria-labelledby="Detail Transaksi" aria-hidden="true">
                                                    <div class="modal-dialog modal-xl">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">
                                                                    Detail Transaksi
                                                                </h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="btn-close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="table-responsive">
                                                                    <table id="display" class="table">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>No</th>
                                                                                <th>Tindakan</th>
                                                                                <th>Harga</th>
                                                                                <th>QTY</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @php
                                                                                $noDtrx = 1;
                                                                                $dt_trx = \App\Models\dtTRX::where('id_trx', $tx->id_trx)->get();
                                                                            @endphp
                                                                            @foreach ($dt_trx as $dtrx)
                                                                                <tr>
                                                                                    <td>{{ $noDtrx }}</td>
                                                                                    <td>{{ $dtrx->get_td->nama_tindakan }}</td>
                                                                                    <td>{{ $dtrx->get_td->harga }}</td>
                                                                                    <td>{{ $dtrx->qty }}</td>
                                                                                </tr>
                                                                                @php
                                                                                    $noDtrx++;
                                                                                @endphp
                                                                            @endforeach
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Cancel</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                &nbsp;
                                                <a href="{{ url("Form=edit/$tx->id_trx/Transaksi") }}">
                                                    <button type="button" class="btn btn-outline-warning btn-icon">
                                                        <i data-feather="check-square"></i>
                                                    </button>
                                                </a>
                                                &nbsp;
                                                <form action="{{url("Delete/$tx->id/Transaksi")}}" method="post" id="fm-dstr-trx{{ $no }}">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                                <button type="button" class="btn btn-outline-danger btn-icon dstr-trx{{ $no }}">
                                                    <i data-feather="x"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    @php
                                        $no++;
                                    @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
