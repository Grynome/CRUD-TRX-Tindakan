@extends('Theme/header')
@section('view')
    @include('sweetalert::alert')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-column flex-md-row align-items-center justify-content-between mb-3">
                        <h6 class="card-title">Data Dokter</h6>
                        <button type="button" class="btn btn-primary btn-icon-text" data-bs-toggle="modal"
                            data-bs-target="#add-dokter">
                            Tambah
                            <i class="btn-icon-append" data-feather="plus"></i>
                        </button>
                        <div class="modal fade" id="add-dokter" tabindex="-1"
                            aria-labelledby="varyingModalLabel" aria-hidden="true" data-bs-backdrop="static">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="varyingModalLabel">Tambah Dokter
                                        </h5>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ url('Add/Dokter') }}" method="post" id="str-fm-dr">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label for="Dokter" class="form-label">Nama Dokter
                                                            :</label>
                                                        <input type="text" name="nama_dokter" id="Dokter"
                                                            class="form-control" placeholder="Nama Dokter"
                                                            aria-label="Nama Dokter" aria-describedby="basic-addon2">
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Cancel</button>
                                        <button type="button" class="btn btn-success str-dr">
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
                                    <th>Dokter</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($dokter as $x)
                                    <tr>
                                        <td>{{ $no }}</td>
                                        <td>{{ $x->nama_dokter }}</td>
                                        <td>
                                            <div class="btn-group me-2" role="group" aria-label="First group">
                                                <button type="button" class="btn btn-outline-warning btn-icon"
                                                    data-bs-toggle="modal" data-bs-target="#edt-dokter{{ $no }}">
                                                    <i data-feather="check-square"></i>
                                                </button>
                                                <div class="modal fade bd-example-modal-lg"
                                                    id="edt-dokter{{ $no++ }}" tabindex="-1"
                                                    aria-labelledby="varyingModalLabel" aria-hidden="true"
                                                    data-bs-backdrop="static">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="varyingModalLabel">Edit Dokter
                                                                </h5>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{ url("Edt/Dokter/$x->id") }}" method="post"
                                                                    id="edt-fm-dr{{$no}}">
                                                                    @csrf
                                                                    @method('PATCH')
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="mb-3">
                                                                                <label for="Edit-Dokter"
                                                                                    class="form-label">Nama Dokter
                                                                                    :</label>
                                                                                <input type="text" name="edt_nama"
                                                                                    id="Edit-Dokter" class="form-control"
                                                                                    value="{{ $x->nama_dokter }}"
                                                                                    aria-label="Nama Dokter"
                                                                                    aria-describedby="basic-addon2">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Cancel</button>
                                                                <button type="button" class="btn btn-success edt-dr{{$no}}">
                                                                    Simpan
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                &nbsp;
                                                <form action="{{ url("Dstr/Dokter/$x->id") }}" method="post" id="dstr-fm-dr{{$no}}">
                                                    @csrf
                                                    @method('PATCH')
                                                </form>
                                                <button type="button" class="btn btn-outline-danger btn-icon dstr-dr{{$no}}">
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
