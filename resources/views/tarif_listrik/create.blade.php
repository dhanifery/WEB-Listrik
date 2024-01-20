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
          <form action="{{ route('admin.tarif.store') }}" method="POST" >
               @csrf
               <div class="row">
              <!-- left column -->
              <div class="col">
                <!-- general form elements -->
                <!-- /.card -->
                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Form Tambah Tarif</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form>
                    <div class="card-body">
                      <div class="form-group">
                        <label for="exampleInputKodeTarif1">Kode Tarif</label>
                        <input type="text" name="kdTarif" class="form-control" id=exampleInputKodeTarif1"" value="{{ old('kdTarif')}}" placeholder="Enter Kode Tarif">
                        @error('kdTarif')
                         <small>{{ $message }}</small>   
                        @enderror
                      </div>
                      <div class="form-group">
                         <label for="exampleInputBeban1">Beban</label>
                         <input type="number" name="beban" class="form-control" id="exampleInputBeban1" value="{{ old('beban')}}" placeholder="Enter Beban">
                         @error('beban')
                         <small>{{ $message }}</small>   
                        @enderror
                       </div>
                      <div class="form-group">
                        <label for="exampleInputTarifPerKwh1">Tarif per kWh</label>
                        <input type="number" name="tarif_perkwh" class="form-control" id="exampleInputTarifPerKwh1" value="{{ old('tarif_perkwh')}}"  placeholder="Tarif Per kWh">
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