@extends('Theme/header')
@section('view')
    @include('sweetalert::alert')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-column flex-md-row align-items-center justify-content-between mb-3">
                        <h6 class="card-title">Data Pasien</h6>
                        <button type="button" class="btn btn-primary btn-icon-text" data-bs-toggle="modal"
                            data-bs-target="#add-pasien">
                            Tambah
                            <i class="btn-icon-append" data-feather="plus"></i>
                        </button>
                        <div class="modal fade bd-example-modal-lg" id="add-pasien" tabindex="-1"
                            aria-labelledby="varyingModalLabel" aria-hidden="true" data-bs-backdrop="static">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="varyingModalLabel">Tambah Pasien
                                        </h5>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ url('Add/Pasien') }}" method="post" id="str-fm-ps">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="Pasien" class="form-label">Nama Pasien
                                                            :</label>
                                                        <input type="text" name="nama_pasien" id="Pasien"
                                                            class="form-control" placeholder="Nama Pasien"
                                                            aria-label="Nama Pasien" aria-describedby="basic-addon2">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="NoHp" class="form-label">No HP
                                                            :</label>
                                                        <input class="form-control"
                                                            data-inputmask-alias="(+62) 999-9999-9999" name="no_hp"
                                                            id="NoHp">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="Alamat" class="form-label">Alamat
                                                            :</label>
                                                        <textarea id="Alamat" class="form-control" name="alamat" id="Alamat" rows="4"
                                                            placeholder="Masukan Alamat."></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Cancel</button>
                                        <button type="button" class="btn btn-success str-ps">
                                            Done
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
                                    <th>Pasien</th>
                                    <th>Alamat</th>
                                    <th>No HP</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($pasien as $x)
                                    <tr>
                                        <td>{{ $no }}</td>
                                        <td>{{ $x->nama }}</td>
                                        <td>{{ $x->alamat }}</td>
                                        <td>{{ $x->no_hp }}</td>
                                        <td>
                                            <div class="btn-group me-2" role="group" aria-label="First group">
                                                <button type="button" class="btn btn-outline-warning btn-icon"
                                                    data-bs-toggle="modal" data-bs-target="#edt-pasien{{ $no }}">
                                                    <i data-feather="check-square"></i>
                                                </button>
                                                <div class="modal fade bd-example-modal-lg"
                                                    id="edt-pasien{{ $no++ }}" tabindex="-1"
                                                    aria-labelledby="varyingModalLabel" aria-hidden="true"
                                                    data-bs-backdrop="static">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="varyingModalLabel">Edit Pasien
                                                                </h5>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{ url("Edt/Pasien/$x->id") }}" method="post"
                                                                    id="edt-fm-ps{{$no}}">
                                                                    @csrf
                                                                    @method('PATCH')
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="mb-3">
                                                                                <label for="Edit-Pasien"
                                                                                    class="form-label">Nama Pasien
                                                                                    :</label>
                                                                                <input type="text" name="edt_nama"
                                                                                    id="Edit-Pasien" class="form-control"
                                                                                    value="{{ $x->nama }}"
                                                                                    aria-label="Nama Pasien"
                                                                                    aria-describedby="basic-addon2">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="mb-3">
                                                                                <label for="Edit-NoHP"
                                                                                    class="form-label">No HP
                                                                                    :</label>
                                                                                <input class="form-control"
                                                                                    data-inputmask-alias="(+62) 999-9999-9999"
                                                                                    name="edt_nohp" id="Edit-NoHP"
                                                                                    value="{{ $x->no_hp }}">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="mb-3">
                                                                                <label for="Edit-Alamat"
                                                                                    class="form-label">Alamat
                                                                                    :</label>
                                                                                <textarea id="Alamat" class="form-control" name="edt_alamat" id="Edit-Alamat" rows="4"
                                                                                    placeholder="Masukan Alamat.">{{ $x->alamat }}</textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Cancel</button>
                                                                <button type="button" class="btn btn-success edt-ps{{$no}}">
                                                                    Save
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                &nbsp;
                                                <form action="{{ url("Dstr/Pasien/$x->id") }}" method="post" id="dstr-fm-ps{{$no}}">
                                                    @csrf
                                                    @method('PATCH')
                                                </form>
                                                <button type="button" class="btn btn-outline-danger btn-icon dstr-ps{{$no}}">
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
