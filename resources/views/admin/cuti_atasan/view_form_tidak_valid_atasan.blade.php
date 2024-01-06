@extends('admin.admin_master')
@section('admin')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
            <div class="col">
                <h1 class="h3 mb-2 text-gray-800">Pengaturan Cuti</h1>
            </div>
        </div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Keterangan</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('tidak_valid.store', $data->id) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">alasan pengajuan tidak valid</label>
                        <textarea name="alasanvalid" id="" class="form-control"></textarea>
                        <small>*masukan Alasan anda ketidakvalidan pengajuan cuti</small>
                    </div>
                    @if ($data->status == 'Diajukan')
                        <button type="submit" class="btn btn-primary">Submit</button>
                    @endif
                </form>
            </div>
        </div>
    </div>
@endsection
