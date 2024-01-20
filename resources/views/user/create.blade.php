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
          <form action="{{ route('admin.user.store') }}" method="POST" >
               @csrf
               <div class="row">
              <!-- left column -->
              <div class="col">
                <!-- general form elements -->
                <!-- /.card -->
                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Form Tambah User</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form>
                    <div class="card-body">
                      <div class="form-group">
                        <label for="exampleInputName1">Name</label>
                        <input type="text" name="name" class="form-control" id="exampleInputName1" value="{{ old('name')}}" placeholder="Enter name">
                        @error('name')
                         <small>{{ $message }}</small>   
                        @enderror
                      </div>
                      <div class="form-group">
                         <label for="exampleInputEmail1">Email</label>
                         <input type="email" name="email" class="form-control" id="exampleInputEmail1" value="{{ old('email')}}" placeholder="Enter email">
                         @error('email')
                         <small>{{ $message }}</small>   
                        @enderror
                       </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                        @error('password')
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