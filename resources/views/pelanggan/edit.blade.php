@extends('layout.main')
@section('content')
     <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0">User</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">{{ $laman }}</li>
                </ol>
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <section class="content">
          <div class="container-fluid">
               <form action="{{ route('admin.pelanggan.update',['id' => $data->id]) }}" method="POST" >
                    @csrf
                    @method('PUT')
                    <div class="row">
                   <!-- left column -->
                   <div class="col">
                     <!-- general form elements -->
                     <!-- /.card -->
                     <div class="card card-primary">
                       <div class="card-header">
                         <h3 class="card-title">Form Edit Pelanggan</h3>
                       </div>
                       <!-- /.card-header -->
                       <!-- form start -->
                       <form>
                         <div class="card-body">
                           <div class="form-group">
                             <label for="exampleInputpelanggan_id1">Pelanggan ID</label>
                             <input type="text" name="pelanggan_id" class="form-control" readonly id="exampleInputpelanggan_id1" value="{{ $data->pelanggan_id }}" placeholder="Enter Pelanggan ID" >
                             @error('pelanggan_id')
                              <small>{{ $message }}</small>   
                             @enderror
                           </div>
                           <div class="form-group">
                              <label for="exampleInputnama_pelanggan1">Nama Pelanggan</label>
                              <input type="text" name="nama_pelanggan" class="form-control" id="exampleInputnama_pelanggan1" value="{{ $data->nama_pelanggan }}" placeholder="Enter Nama Pelanggan">
                              @error('nama_pelanggan')
                              <small>{{ $message }}</small>   
                             @enderror
                            </div>
                            <div class="form-group">
                              <label for="exampleSelectBorder">Kode Tarif</label>
                              <select class="custom-select" name="tarifListrik_id"  form-control" id="exampleSelectBorder">
                                @foreach ($tarif as $t)
                                      <option value="{{ $t->id }}" {{ ($t->id == $data->tarifListrik_id) ? 'selected' : ''}}>{{$t->kdTarif}}: {{ $t->beban }} VA</option>
                                @endforeach
                              </select>
                            </div>
                            <div class="form-group">
                              <label for="exampleInputalamat1">Alamat</label>
                              <input type="text" name="alamat" class="form-control" id="exampleInputalamat1" value="{{ $data->alamat }}" placeholder="Enter Alamat">
                              @error('alamat')
                              <small>{{ $message }}</small>   
                             @enderror
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