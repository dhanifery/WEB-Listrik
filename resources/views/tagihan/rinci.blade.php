@extends('layout.main')
@section('content')
<section class="content-header">
     <div class="container-fluid">
       <div class="row mb-2">
         <div class="col-sm-6">
           <h1>{{ $laman }}</h1>
         </div>
         <div class="col-sm-6">
           <ol class="breadcrumb float-sm-right">
             <li class="breadcrumb-item"><a href="#">Home</a></li>
             <li class="breadcrumb-item active">{{ $laman }}</li>
           </ol>
         </div>
       </div>
     </div><!-- /.container-fluid -->
   </section>
<div class="invoice p-3 mb-3">
     <!-- title row -->
     <div class="row">
       <div class="col-12">
         <h4>
           <i class="fas fa-globe"></i> Listrik PascaBayar
           <small class="float-right">Date: {{ date('d-m-Y') }}</small>
         </h4>
       </div>
       <!-- /.col -->
     </div>
     <!-- info row --w -->

     <!-- Table row -->
     <div class="row">
       <div class="col-12 table-responsive">
         <table class="table table-striped">
           <thead>
           <tr>
             <th>Pelanggan ID</th>
             <th>Nama Pelanggan</th>
             <th>Beban (VA)</th>
             <th>Tarif (kWh)</th>
             <th>Pemakaian(kWh)</th>
           </tr>
           </thead>
           <tbody>
           <tr>
             <td>{{ $data->tagih['pelanggan_id'] }}</td>
             <td>{{ $data->tagih['nama_pelanggan'] }}</td>
             <td>{{ $data3->beban }} VA</td>
             <td>{{ $data3->formatRupiah('tarif_perkwh') }}</td>
             <td>{{ $data->pemakaian }}kWh</td>
           </tr>
           </tbody>
         </table>
       </div>
       <!-- /.col -->
     </div>
     <!-- /.row -->

     <div class="row">
          <!-- accepted payments column -->
          <div class="col-6">
            
          </div>
          <!-- /.col -->
          <div class="col-6">
            <p class="lead">Admin, {{ date('d-m-Y') }}</p>

            <div class="table-responsive">
              <table class="table">
                <tr>
                  <th>Total Tagihan/Bulan:</th>
                  <td>{{$data->formatRupiah('bulan_tagihan')}}</td>
                </tr>
                <tr>
                    <th>Total Tagihan/Tahun:</th>
                    <td>{{$data->formatRupiah('tahun_tagihan')}}</td>
                  </tr>
              </table>
            </div>
          </div>
          <!-- /.col -->
        </div>
     <!-- /.row -->

     <!-- this row will not appear when printing -->
   </div>
@endsection