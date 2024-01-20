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
   <section class="content">
     <div class="container-fluid">
          <form action="{{ route('admin.pelanggan.store') }}" method="POST" >
               @csrf
               <div class="row">
              <!-- left column -->
              <div class="col">
                <!-- general form elements -->
                <!-- /.card -->
                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Form Tambah Pelanggan</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form>
                    <div class="card-body">
                      <div class="form-group">
                        <label for="exampleInputKodePelanggan1">Pelanggan ID</label>
                        <input type="text" name="pelanggan_id" class="form-control" readonly id="exampleInputKodePelanggan1" value="{{ $id_pelanggan }}">
                        @error('pelanggan_id')
                         <small>{{ $message }}</small>   
                        @enderror
                      </div>
                      <div class="form-group">
                         <label for="exampleInputNamaPelanggan1">Nama Pelanggan</label>
                         <input type="text" name="nama_pelanggan" class="form-control" id="exampleInputNamaPelanggan1" value="{{old('nama_pelanggan')}}"  placeholder="Enter Nama Pelanggan">
                         @error('nama_pelanggan')
                         <small>{{ $message }}</small>   
                        @enderror
                       </div>
                       <div class="form-group">
                        <label for="exampleSelectBorder">Kode Tarif</label>
                        <select class="custom-select" name="tarifListrik_id"  form-control" id="exampleSelectBorder">
                          <option value="">Pilih Kode Tarif</option>
                          @foreach ($tarif as $t)
                                <option value="{{ $t->id }}" {{ old('tarifListrik_id') == $t->id ? 'selected'  : null}}>{{$t->kdTarif}}: {{ $t->beban }} VA</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                         <label for="exampleInputAlamat1">Nama Pelanggan</label>
                         <input type="text" name="alamat" class="form-control" id="exampleInputAlamat1"  value="{{old('alamat')}}" placeholder="Enter alamat">
                         @error('alamat')
                         <small>{{ $message }}</small>   
                        @enderror
                       </div>
                      </div>
                    </div>
                    <!-- /.card-body -->
    
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                  </form>
                </div>
    
              </div>
               </div>
          </form>
       <!-- /.row -->
     </div><!-- /.container-fluid -->
   </section>
@endsection