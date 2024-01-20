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
     <div class="container-fluid">
          <div class="card">
               <div class="card-header">
                    <h3 class="card-title">Data Pelanggan</h3>
               </div>
               <!-- /.card-header -->
               <div class="card-body">
                 <table id="example1" class="table table-bordered table-striped">
                   <thead>
                   <tr>
                     <th width="20">No.</th>
                     <th>Nama Pelanggan</th>
                     <th>Pelanggan ID</th>
                     <th>Tagihan/Tahun</th>
                     <th>Tagihan/Bulan</th>
                     <th>Pemakaian</th>
                     <th width="70">Action</th>
                   </tr>
                   </thead>
                   <tbody>
                    @foreach ($data as $d)
                         <tr>
                              <td>{{ $loop->iteration }}</td>
                              <td>{{ $d->tagih['nama_pelanggan']}}</td>
                              <td>{{ $d->tagih['pelanggan_id'] }}</td>
                              <td>{{ $d->formatRupiah('tahun_tagihan') }}</td>
                              <td>{{ $d->formatRupiah('bulan_tagihan') }}</td>
                              <td>{{ $d->pemakaian }}kWh/bulan</td>
                              <td>
                                   <a href="{{ route('admin.tagihan.rinci',['id'=>$d->id]) }}" class="btn btn-primary"><i class="fas fa-eye"></i> Detail</a>
                                   {{-- <a data-toggle="modal" data-target="#modal-hapus{{$d->id}}" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Delete</a> --}}
                              </td>
                         </tr>
                         <div class="modal fade" id="modal-hapus{{$d->id}}">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h4 class="modal-title">Konfirmasi Hapus Data</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <p>Apakah anda yakin ingin menghapus Pelanggan: <b>{{ $d->tagih['nama_pelanggan'] }}</b></p>
                                  </div>
                                  <div class="modal-footer justify-content-between">
                                   <form action="{{ route('admin.tagihan.delete',['id'=> $d->id ])}}" method="POST">
                                     @csrf
                                     @method('DELETE') 
                                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                     <button type="submit" class="btn btn-primary">Ya, Hapus</button>
                                   </form>
                                  </div>
                                </div>
                                <!-- /.modal-content -->
                              </div>
                              <!-- /.modal-dialog -->
                            </div>
                    @endforeach
                   </tfoot>
                 </table>
               </div>
               <!-- /.card-body -->
             </div>
     </div>

@endsection