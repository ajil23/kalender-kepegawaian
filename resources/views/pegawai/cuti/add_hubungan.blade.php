@extends('pegawai.pegawai_master')
@section('pegawai')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
            <div class="col">
                <h1 class="h3 mb-3 text-gray-800">Form Pengajuan Cuti</h1>
            </div>
            {{-- <div class="text-end mb-2">
            <a href="#"><button type="button" class="btn btn-primary">Tambah Pelaksanaan</button></a>
        </div> --}}
        </div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    <center>Hubungan</center>
                </h6>
            </div>
            <div class="card-body">
                <form method="POST" action="{{route('hubungan.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Atasan</label>
                        <select class="form-control" aria-label="Default select example" name="id_atasan">
                            <option selected>-- Pilih Atasan --</option>
                            @foreach ($atasan as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Hubungkan</button>
                    <button type="button" onclick="history.back()" class="btn btn-danger">Batal</button>
                </form>
            </div>
        </div>
    </div>
@endsection
