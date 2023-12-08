@extends('Theme/header')
@section('view')
    <div class="row mb-3">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-baseline sv-tc">
                        <h6 class="card-title mb-0">
                            <span class="input-group-text">
                                {{ empty($get_trx) ? "Tambah Transaksi" : "Edit Transaksi" }}
                            </span>
                        </h6>
                        <a class="cta str-trx" href="javascript:;">
                            <span>Save</span>
                            <span>
                                <svg width="33px" height="18px" viewBox="0 0 66 43" version="1.1"
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <g id="arrow" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <path class="one"
                                            d="M40.1543933,3.89485454 L43.9763149,0.139296592 C44.1708311,-0.0518420739 44.4826329,-0.0518571125 44.6771675,0.139262789 L65.6916134,20.7848311 C66.0855801,21.1718824 66.0911863,21.8050225 65.704135,22.1989893 C65.7000188,22.2031791 65.6958657,22.2073326 65.6916762,22.2114492 L44.677098,42.8607841 C44.4825957,43.0519059 44.1708242,43.0519358 43.9762853,42.8608513 L40.1545186,39.1069479 C39.9575152,38.9134427 39.9546793,38.5968729 40.1481845,38.3998695 C40.1502893,38.3977268 40.1524132,38.395603 40.1545562,38.3934985 L56.9937789,21.8567812 C57.1908028,21.6632968 57.193672,21.3467273 57.0001876,21.1497035 C56.9980647,21.1475418 56.9959223,21.1453995 56.9937605,21.1432767 L40.1545208,4.60825197 C39.9574869,4.41477773 39.9546013,4.09820839 40.1480756,3.90117456 C40.1501626,3.89904911 40.1522686,3.89694235 40.1543933,3.89485454 Z"
                                            fill="#FFFFFF"></path>
                                        <path class="two"
                                            d="M20.1543933,3.89485454 L23.9763149,0.139296592 C24.1708311,-0.0518420739 24.4826329,-0.0518571125 24.6771675,0.139262789 L45.6916134,20.7848311 C46.0855801,21.1718824 46.0911863,21.8050225 45.704135,22.1989893 C45.7000188,22.2031791 45.6958657,22.2073326 45.6916762,22.2114492 L24.677098,42.8607841 C24.4825957,43.0519059 24.1708242,43.0519358 23.9762853,42.8608513 L20.1545186,39.1069479 C19.9575152,38.9134427 19.9546793,38.5968729 20.1481845,38.3998695 C20.1502893,38.3977268 20.1524132,38.395603 20.1545562,38.3934985 L36.9937789,21.8567812 C37.1908028,21.6632968 37.193672,21.3467273 37.0001876,21.1497035 C36.9980647,21.1475418 36.9959223,21.1453995 36.9937605,21.1432767 L20.1545208,4.60825197 C19.9574869,4.41477773 19.9546013,4.09820839 20.1480756,3.90117456 C20.1501626,3.89904911 20.1522686,3.89694235 20.1543933,3.89485454 Z"
                                            fill="#FFFFFF"></path>
                                        <path class="three"
                                            d="M0.154393339,3.89485454 L3.97631488,0.139296592 C4.17083111,-0.0518420739 4.48263286,-0.0518571125 4.67716753,0.139262789 L25.6916134,20.7848311 C26.0855801,21.1718824 26.0911863,21.8050225 25.704135,22.1989893 C25.7000188,22.2031791 25.6958657,22.2073326 25.6916762,22.2114492 L4.67709797,42.8607841 C4.48259567,43.0519059 4.17082418,43.0519358 3.97628526,42.8608513 L0.154518591,39.1069479 C-0.0424848215,38.9134427 -0.0453206733,38.5968729 0.148184538,38.3998695 C0.150289256,38.3977268 0.152413239,38.395603 0.154556228,38.3934985 L16.9937789,21.8567812 C17.1908028,21.6632968 17.193672,21.3467273 17.0001876,21.1497035 C16.9980647,21.1475418 16.9959223,21.1453995 16.9937605,21.1432767 L0.15452076,4.60825197 C-0.0425130651,4.41477773 -0.0453986756,4.09820839 0.148075568,3.90117456 C0.150162624,3.89904911 0.152268631,3.89694235 0.154393339,3.89485454 Z"
                                            fill="#FFFFFF"></path>
                                    </g>
                                </svg>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <form action="{{ empty($get_trx) ? url('Tambah/Transaksi') : url("Update/$id/Transaksi") }}" method="post" id="str-fm-trx">
        @csrf
        {{ empty($get_trx) ? '' : method_field('PATCH') }}
        <div class="row mb-3">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="col-md-12">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Pasien</label>
                                    <div class="input-group">
                                        <input type="text" name="val_idPS" id="id-ps" value="{{@$get_trx->get_ps->id_pasien}}" style="display: none;">
                                        <input type="text" class="form-control" id="nama-ps" value="{{@$get_trx->get_ps->nama}}" placeholder="Pilih Pasien"
                                            disabled>
                                        <div class="input-group-button">
                                            <button class="btn btn-inverse-primary" type="button" data-bs-toggle="modal"
                                                data-bs-target="#list-pasien"><i class="btn-icon-append icon-lg"
                                                    data-feather="search"></i></button>
                                            <button class="btn btn-inverse-primary clear-ps" type="button"><i
                                                    class="btn-icon-append icon-lg" data-feather="x"></i></button>
                                            <div class="modal fade bd-example-modal-xl" id="list-pasien" tabindex="-1"
                                                aria-labelledby="List Pasien" aria-hidden="true">
                                                <div class="modal-dialog modal-xl">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">
                                                                List Pasien
                                                            </h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="btn-close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="table-responsive">
                                                                <table id="display" class="table">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>No</th>
                                                                            <th>ID Pasien</th>
                                                                            <th>Pasien</th>
                                                                            <th>Alamat</th>
                                                                            <th>No HP</th>
                                                                            <th>Option</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @php
                                                                            $noP = 1;
                                                                        @endphp
                                                                        @foreach ($pasien as $p)
                                                                            <tr>
                                                                                <td>{{ $noP }}</td>
                                                                                <td>{{ $p->id_pasien }}</td>
                                                                                <td>{{ $p->nama }}</td>
                                                                                <td>{{ $p->alamat }}</td>
                                                                                <td>{{ $p->no_hp }}</td>
                                                                                <td>
                                                                                    <button type="button"
                                                                                        class="btn btn-outline-primary btn-icon select-ps">
                                                                                        <i data-feather="mouse-pointer"></i>
                                                                                    </button>
                                                                                </td>
                                                                            </tr>
                                                                            @php
                                                                                $noP++;
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
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Dokter</label>
                                    <div class="input-group">
                                        <input type="text" name="val_idDR" id="id-dr" value="{{@$get_trx->get_dr->id_dokter}}" style="display: none;">
                                        <input type="text" class="form-control" id="nama-dr" value="{{@$get_trx->get_dr->nama_dokter}}" placeholder="Pilih Dokter"
                                            disabled>
                                        <div class="input-group-button">
                                            <button class="btn btn-inverse-primary" type="button" data-bs-toggle="modal"
                                                data-bs-target="#list-dokter"><i class="btn-icon-append icon-lg"
                                                    data-feather="search"></i></button>
                                            <button class="btn btn-inverse-primary clear-dr" type="button"><i
                                                    class="btn-icon-append icon-lg" data-feather="x"></i></button>
                                            <div class="modal fade" id="list-dokter" tabindex="-1"
                                                aria-labelledby="List Dokter" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">
                                                                List Dokter
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
                                                                            <th>ID Dokter</th>
                                                                            <th>Dokter</th>
                                                                            <th>Option
                                                                            </th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @php
                                                                            $noD = 1;
                                                                        @endphp
                                                                        @foreach ($dokter as $d)
                                                                            <tr>
                                                                                <td>{{ $noD }}</td>
                                                                                <td>{{ $d->id_dokter }}</td>
                                                                                <td>{{ $d->nama_dokter }}</td>
                                                                                <td>
                                                                                    <button type="button"
                                                                                        class="btn btn-outline-primary btn-icon select-dr">
                                                                                        <i
                                                                                            data-feather="mouse-pointer"></i>
                                                                                    </button>
                                                                                </td>
                                                                            </tr>
                                                                            @php
                                                                                $noD++;
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
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table tbl-tindakan">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>ID Tindakan</th>
                                        <th>Tindakan</th>
                                        <th>Harga</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $noT = 1;
                                    @endphp
                                    @foreach ($tindakan as $t)
                                        <tr>
                                            <td>{{ $noT }}</td>
                                            <td>{{ $t->id_tindakan }}</td>
                                            <td>{{ $t->nama_tindakan }}</td>
                                            <td>{{ $t->harga }}</td>
                                            <td>
                                                <div class="group-input">
                                                    @if(empty($get_trx))
                                                        <input type="checkbox" id="check-tindakan" name="selected_ids[]" value="{{ $t->id_tindakan }}">
                                                        <input class="form-control-sm" id="qty-tindakan" name="qty[{{ $t->id_tindakan }}]"
                                                            type="number" min="1" placeholder="Masukan QTY">
                                                    @else
                                                        <input type="checkbox" id="check-tindakan" name="selected_ids[{{ $t->id_tindakan }}]" value="{{ $t->id_tindakan }}" @if($dt_trx->contains('id_tindakan', $t->id_tindakan)) checked @endif>
                                                        <input class="form-control-sm" id="qty-tindakan" name="qty[{{ $t->id_tindakan }}]" type="number" min="1" value="{{ $dt_trx->firstWhere('id_tindakan', $t->id_tindakan)->qty ?? '' }}">
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                        @php
                                            $noT++;
                                        @endphp
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
