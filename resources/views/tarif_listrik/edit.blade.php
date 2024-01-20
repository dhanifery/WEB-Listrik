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
               <form action="{{ route('admin.tarif.update',['id' => $data->id]) }}" method="POST" >
                    @csrf
                    @method('PUT')
                    <div class="row">
                   <!-- left column -->
                   <div class="col">
                     <!-- general form elements -->
                     <!-- /.card -->
                     <div class="card card-primary">
                       <div class="card-header">
                         <h3 class="card-title">Form Edit Tarif</h3>
                       </div>
                       <!-- /.card-header -->
                       <!-- form start -->
                       <form>
                         <div class="card-body">
                           <div class="form-group">
                             <label for="exampleInputkdTarif1">Kode Tarif</label>
                             <input type="text" name="kdTarif" class="form-control" id="exampleInputkdTarif1" value="{{ $data->kdTarif }}" placeholder="Enter Kode Tarif" >
                             @error('kdTarif')
                              <small>{{ $message }}</small>   
                             @enderror
                           </div>
                           <div class="form-group">
                              <label for="exampleInputBeban1">Beban</label>
                              <input type="number" name="beban" class="form-control" id="exampleInputBeban1" value="{{ $data->beban }}" placeholder="Enter beban">
                              @error('beban')
                              <small>{{ $message }}</small>   
                             @enderror
                            </div>
                            <div class="form-group">
                              <label for="exampleInputTarif1">Tarif Per kWh</label>
                              <input type="number" name="tarif_perkwh" class="form-control" id="exampleInputTarif1" value="{{ $data->tarif_perkwh }}" placeholder="Tarif Per kWh">
                              @error('tarif_perkwh')
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