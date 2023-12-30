@extends('admin.admin_master')
@section('admin')

<div class="container-fluid">
     <!-- Page Heading -->
     <div class="row">
        <div class="col">
            <h1 class="h3 mb-2 text-gray-800">Pelaksanaan</h1>
        </div>
    </div>

     <!-- DataTales Example -->
     <div class="card shadow mb-4">
         <div class="card-header py-3">
             <h6 class="m-0 font-weight-bold text-primary">Edit Data Pelaksanaan</h6>
         </div>
         <div class="card-body">
            <form method="POST" action="{{route('pelaksanaan.update', $editPelaksanaan->id)}}" enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="kegiatan">Kegiatan</label>
                      <input type="text" class="form-control" name="kegiatan" value="{{$editPelaksanaan->perencanaan->kegiatan}}" disabled>
                      </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="kegiatan">Progres</label>
                        <select id="inputSumberDana" class="form-control" name="progres">
                          <option selected>{{$editPelaksanaan->progres}}</option>
                          <option>Selesai Pembayaran</option>
                          <option>Selesai Pembayaran Sebagian</option>
                          <option>Kontrak</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="Pagu">Realisasi</label>
                        <input type="number" class="form-control" placeholder="Pagu" name="realisasi" value="{{$editPelaksanaan->realisasi}}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="formGroupExampleInput">Upload File Laporan</label>
                        <input type="file" class="form-control" id="laporan">
                    </div>
                    <div class="form-group col-md-6">
                        <input type="hidden" class="form-control" name="userid" value="{{$editPelaksanaan->user_id}}">
                    </div>
                </div>
                <button type="button" onclick="history.back()" class="btn btn-danger">Batal</button>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
         </div>
     </div>
</div>
@endsection
