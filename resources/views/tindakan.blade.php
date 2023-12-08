@extends('Theme/header')
@section('view')
    @include('sweetalert::alert')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-column flex-md-row align-items-center justify-content-between mb-3">
                        <h6 class="card-title">Data Tindakan</h6>
                        <button type="button" class="btn btn-primary btn-icon-text" data-bs-toggle="modal"
                            data-bs-target="#add-tindakan">
                            Tambah
                            <i class="btn-icon-append" data-feather="plus"></i>
                        </button>
                        <div class="modal fade bd-example-modal-lg" id="add-tindakan" tabindex="-1"
                            aria-labelledby="varyingModalLabel" aria-hidden="true" data-bs-backdrop="static">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="varyingModalLabel">Tambah Tindakan
                                        </h5>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ url('Add/Tindakan') }}" method="post" id="str-fm-td">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="Tindakan" class="form-label">Nama Tindakan
                                                            :</label>
                                                        <input type="text" name="nama_tindakan" id="Tindakan"
                                                            class="form-control" placeholder="Nama Tindakan"
                                                            aria-label="Nama Tindakan" aria-describedby="basic-addon2">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="Tindakan" class="form-label">Harga
                                                            :</label>
                                                        <input name="harga" id="Harga" class="form-control mb-4 mb-md-0" data-inputmask="'alias': 'currency', 'prefix':'Rp'"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Cancel</button>
                                        <button type="button" class="btn btn-success str-td">
                                            Simpan
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tindakan</th>
                                    <th>Harga</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($tindakan as $x)
                                    <tr>
                                        <td>{{ $no }}</td>
                                        <td>{{ $x->nama_tindakan }}</td>
                                        <td>{{ $x->harga }}</td>
                                        <td>
                                            <div class="btn-group me-2" role="group" aria-label="First group">
                                                <button type="button" class="btn btn-outline-warning btn-icon"
                                                    data-bs-toggle="modal" data-bs-target="#edt-tindakan{{ $no }}">
                                                    <i data-feather="check-square"></i>
                                                </button>
                                                <div class="modal fade bd-example-modal-lg"
                                                    id="edt-tindakan{{ $no++ }}" tabindex="-1"
                                                    aria-labelledby="varyingModalLabel" aria-hidden="true"
                                                    data-bs-backdrop="static">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="varyingModalLabel">Edit Tindakan
                                                                </h5>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{ url("Edt/Tindakan/$x->id") }}" method="post"
                                                                    id="edt-fm-td{{$no}}">
                                                                    @csrf
                                                                    @method('PATCH')
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="mb-3">
                                                                                <label for="Edit-Tindakan"
                                                                                    class="form-label">Nama Tindakan
                                                                                    :</label>
                                                                                <input type="text" name="edt_nama"
                                                                                    id="Edit-Tindakan" class="form-control"
                                                                                    value="{{ $x->nama_tindakan }}"
                                                                                    aria-label="Nama Tindakan"
                                                                                    aria-describedby="basic-addon2">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="mb-3">
                                                                                <label for="Edit-Harga"
                                                                                    class="form-label">Harga
                                                                                    :</label>
                                                                                <input name="edt_harga" id="Edit-Harga" value="{{ $x->harga }}" class="form-control mb-4 mb-md-0" data-inputmask="'alias': 'currency', 'prefix':'Rp'"/>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Cancel</button>
                                                                <button type="button" class="btn btn-success edt-td{{$no}}">
                                                                    Simpan
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                &nbsp;
                                                <form action="{{ url("Dstr/Tindakan/$x->id") }}" method="post" id="dstr-fm-td{{$no}}">
                                                    @csrf
                                                    @method('PATCH')
                                                </form>
                                                <button type="button" class="btn btn-outline-danger btn-icon dstr-td{{$no}}">
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
