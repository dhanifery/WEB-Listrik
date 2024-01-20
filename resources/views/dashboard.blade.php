@extends('layout.main')
@section('content')
<!-- Content Header (Page header) -->
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
      <div class="col-12">
        <div class="callout">
          <h5><i class="fas fa-user"></i> SELAMAT DATANG</h5>
          Ini adalah Laman Dashboard Aplikasi Pembayaran Listrik Pascabayar
        </div>
    </div>
  </div>
@endsection