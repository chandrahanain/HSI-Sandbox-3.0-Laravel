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
                        @foreach ($data_profile as $d)
                            <form action="/profile/update/{{ $d->id }}" method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <h4 class="card-title">{{ $title }}</h4>
                                    </div>
                                    <hr>
                                    <input type="hidden" name="role" value="{{ $d->role }}" required>

                                    <div class="form-group">
                                        <label for="">Nama Lengkap</label>
                                        <input type="text" name="name" id="" class="form-control" value="{{ $d->name }}" placeholder="Nama Lengkap ..." required>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Email</label>
                                                <input type="text" name="email" id="" class="form-control" value="{{ $d->email }}" placeholder="Email ..." required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Password</label>
                                                <input type="password" name="password" id="" class="form-control" placeholder="Password ..." required>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save Changes</button>
                                </div>
                            </form>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
