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
             <h6 class="m-0 font-weight-bold text-primary">Batas Waktu Pengajuan Cuti</h6>
         </div>
         <div class="card-body">
            <form action="#">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Batas Waktu Pengajuan Cuti</label>
                    <input type="number" class="form-control" id="exampleFormControlInput1">
                    <small>*Pengajuan cuti yang belum selesai  akan otomatis dibatalkan jika melewati batas waktu</small>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button> 
            </form>                     
         </div>
     </div>
</div>
@endsection
