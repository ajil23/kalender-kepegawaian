@extends('atasan.atasan_master')
@section('atasan')
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
                                Nama : {{ Auth::user()->name }}
                                <br>
                                NIP/NIPPPK : {{ Auth::user()->nip }}
                                <br>
                                Golongan : {{ Auth::user()->golongan }}
                                <br>
                                Jabatan : {{ Auth::user()->jabatan }}
                                <br>
                                Unit Kerja : {{ Auth::user()->unitkerja }}
                            </div>
                        </div>
                    </div>
                    <div class="col-xl col-md-6 mb-4">
                        <div class="col mr-2">
                            <div class="h6 font-weight-bold text-gray-800 mb-1">
                                <center>Identitas Atasan</center>
                            </div>
                            <div class="text-small mb-0 text-gray-800">
                                Nama : {{ Auth::user()->name }}
                                <br>
                                NIP/NIPPPK : {{ Auth::user()->nip }}
                                <br>
                                Golongan : {{ Auth::user()->golongan }}
                                <br>
                                Jabatan : {{ Auth::user()->jabatan }}
                                <br>
                                Unit Kerja : {{ Auth::user()->unitkerja }}
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
            <form method="POST" action="{{ route('atasancuti.store') }}">
                @csrf
                <div class="card-body">
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Jenis Cuti</label>
                        <select class="form-control" aria-label="Default select example" name="jenis">
                            <option selected>-- Pilih Jenis Cuti --</option>
                            <option value="tahunan">Cuti Tahunan</option>
                            <option value="penting">Cuti Penting</option>
                            <option value="besar">Cuti Besar</option>
                            <option value="melahirkan">Cuti Melahirkan</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col">
                                <label for="mulai">Tanggal Mulai</label>
                                <input type="date" class="form-control" name="awal">
                            </div>
                            <div class="col">
                                <label for="akhir">Tanggal Akhir</label>
                                <input type="date" class="form-control" name="akhir">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Keterangan Cuti</label>
                        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Keterangan Cuti"
                            name="keterangan">
                    </div>
                    <button type="submit" class="btn btn-primary">Ajukan</button>
                    <button type="button" onclick="history.back()" class="btn btn-danger">Batal</button>
                </div>
            </form>
        </div>
    </div>
@endsection
