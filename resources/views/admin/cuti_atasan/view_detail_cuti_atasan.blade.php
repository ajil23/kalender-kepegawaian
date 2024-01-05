@extends('admin.admin_master')
@section('admin')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
            <div class="col">
                <h1 class="h3 mb-2 text-gray-800">Form Validasi</h1>
            </div>
            {{-- <div class="text-end mb-2">
            <a href="#"><button type="button" class="btn btn-primary">Tambah Pelaksanaan</button></a>
        </div> --}}
        </div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    <center>Informasi Pegawai</center>
                </h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-xl col-md-6 mb-4">
                        <div class="col mr-2">
                            <div class="h6 font-weight-bold text-gray-800 mb-1">
                                <center>Identitas Pegawai</center>
                            </div>
                            <div class="text-small mb-0 text-gray-800">
                                Nama : {{ $data->user->name }}
                                <br>
                                NIP/NIPPPK : {{ $data->user->nip }}
                                <br>
                                Golongan : {{ $data->user->golongan }}
                                <br>
                                Jabatan : {{ $data->user->jabatan }}
                                <br>
                                Unit Kerja : {{ $data->user->unitkerja }}
                            </div>
                        </div>
                    </div>
                    <div class="col-xl col-md-6 mb-4">
                        <div class="col mr-2">
                            <div class="h6 font-weight-bold text-gray-800 mb-1">
                                <center>Identitas Atasan</center>
                            </div>
                            <div class="text-small mb-0 text-gray-800">
                                Nama : {{ $data->user->name }}
                                <br>
                                NIP/NIPPPK : {{ $data->user->nip }}
                                <br>
                                Golongan : {{ $data->user->golongan }}
                                <br>
                                Jabatan : {{ $data->user->jabatan }}
                                <br>
                                Unit Kerja : {{ $data->user->unitkerja }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    <center>Informasi Cuti</center>
                </h6>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="formGroupExampleInput" class="form-label">Jenis Cuti</label>
                    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Jenis Cuti"
                        value="{{ $data->jenis }}" disabled>
                </div>
                <div class="mb-3">
                    <div class="row">
                        <div class="col">
                            <label for="mulai">Tanggal Mulai</label>
                            <input type="date" class="form-control" value="{{ $data->awal }}" disabled>
                        </div>
                        <div class="col">
                            <label for="akhir">Tanggal Akhir</label>
                            <input type="date" class="form-control" value="{{ $data->akhir }}" disabled>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="row">
                        <div class="col">
                            <label for="status">Status</label>
                            <input type="text" class="form-control" value="{{ $data->status }}" disabled>
                        </div>
                        <div class="col">
                            <label for="Jumlah">Jumlah Hari Cuti</label>
                            <input type="number" class="form-control" disabled>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="formGroupExampleInput" class="form-label">Keterangan Cuti</label>
                    <input type="text" class="form-control" id="formGroupExampleInput" value="{{ $data->keterangan }}"
                        placeholder="Keterangan Cuti" disabled>
                </div>

                <div class="d-flex">
                    <form action="{{ route('validAtasan.store', $data->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary">Valid</button>
                    </form>
                    <a href="#"  class="mx-2"><button type="button" class="  btn btn-danger">Tidak Valid</button></a>
                </div>
            </div>
        </div>
    </div>
@endsection
