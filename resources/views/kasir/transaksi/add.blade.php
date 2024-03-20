@extends('layout.layout')
@section('content')
    <div class="content-body">
        <div class="row page-titles mx-0">
            <div class="col p-md-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">{{ $title }}</a></li>
                </ol>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <form action="/transaksi/store" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <h4 class="card-title">{{ $title }}</h4>
                                </div>
                                <hr>
                                <button type="submit" class="btn btn-sm btn-primary" data-target="#modalCreate" data-toggle="modal"><i class="fa fa-plus"></i> Tambah Data</button>
                                <hr>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>No</th>
                                            <th>Barang</th>
                                            <th>Harga</th>
                                            <th>Qty</th>
                                            <th>Subtotal</th>
                                        </tr>
                                        <tr>
                                            <td>No</td>
                                            <td>Barang</td>
                                            <td>Harga</td>
                                            <td>Qty</td>
                                            <td>Subtotal</td>
                                        </tr>
                                        <tr>
                                            <td colspan="4">Diskon</td>
                                            <td>Diskon</td>
                                        </tr>
                                        <tr>
                                            <td colspan="4">Total Bayar</td>
                                            <td>Total Bayar</td>
                                        </tr>
                                    </table>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">No Transaksi</label>
                                            <input class="form-control" type="text" name="no_transaksi" value="NT-001" id="" readonly required>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Transaksi</label>
                                            <input class="form-control" type="text" name="tgl_transaksi" value="{{ date('d/M/Y') }}" id="" readonly required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Uang Pembeli</label>
                                            <input class="form-control" type="number" name="uang_pembeli" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Kembalian</label>
                                            <input class="form-control" type="number" name="kembalian" readonly required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save changes</button>
                                <a class="btn btn-danger" href="/transaksi"><i class="fa fa-undo"></i>Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create {{ $title }}</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <form method="POST" action="/transaksi/cart">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Jenis Barang</label>
                            <select class="form-control" name="id_barang" id="" required>
                                <option value="" hidden>-- Pilih Nama Barang --</option>
                            </select>
                        </div>
                        <div id="tampil_barang"></div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-undo"></i> Close</button>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

{{--     @foreach ($data_barang as $d)
        <div class="modal fade" id="modalEdit{{ $d->id }}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit {{ $title }}</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="/barang/update/{{ $d->id }}">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="nama_barang">Nama Barang</label>
                                <input type="text" class="form-control" name="nama_barang" value="{{ $d->nama_barang }}" placeholder="Nama Barang ..." required>
                            </div>
                            <div class="form-group">
                                <label for="">Jenis Barang</label>
                                <select class="form-control" name="id_jenis" id="" required>
                                    <option value="{{ $d->nama_barang }}">{{ $d->nama_jenis }}</option>
                                    @foreach ($data_barang as $b)
                                        <option value="{{ $b->id }}">{{ $b->nama_jenis }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-group mb-3">
                                <input type="number" name="stok" value="{{ $d->stok }}" class="form-control" placeholder="Stok ..." required>
                                <div class="input-group-append"><span class="input-group-text">Pcs</span>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend"><span class="input-group-text">Rp</span>
                                </div>
                                <input type="number" name="harga" value="{{ $d->harga }}"class="form-control" placeholder="Harga" required>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-undo"></i> Close</button>
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

    @foreach ($data_barang as $c)
        <div class="modal fade" id="modalHapus{{ $c->id }}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Hapus {{ $title }}</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <form method="GET" action="/barang/destroy/{{ $c->id }}">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <h5>Apakah Anda Ingin Menghapus Data Ini?</h5>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-undo"></i> Close</button>
                                <button type="submit" class="btn btn-primary"><i class="fa fa-trash"></i> Hapus</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach --}}
@endsection
