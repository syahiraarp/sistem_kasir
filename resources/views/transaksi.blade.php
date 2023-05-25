@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html>
<head>
	<title>Transaksi | Toko Tahu Bulat & Sotong Enggal</title>
	<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<body>
<div class="container">
<div class="card">
<div class="card-body">
<header>
    <h1>Transaksi</h1>
    <nav class="navbar navbar-expand-md navbar-light bg-info shadow-sm">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/home">Home</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="/transaksi">Transaksi</a></li>
            <li><a class="dropdown-item" href="/laporan">Laporan</a></li>
            <li><a class="dropdown-item" href="/inventory">Inventory</a></li>
            <li><a class="dropdown-item" href="/karyawan">Karyawan</a></li>
          </ul>
        </li>
      </ul>
      <form class="d-flex" role="search">
      </form>
    </div>
  </div>
</nav>

</header>
	
	<br/>
	<br/>
	<div class="form-group">
					
</div>
	
<div class="row justify-content-center">
  <div class="col-md-4 mb-4">
    <div class="card">
			<form action="/transaksi/store" method="post" class="form-inline">
				{{ csrf_field() }}  
				<!-- Kode Produk<input type="text" class="form-control" name="kd_produk" required="required"> <br/>
				Harga Produk <input type="text" class="form-control" name="harga_produk" required="required"></text> <br/>
				Jumlah <input type="text" class="form-control" name="jumlah_beli" required="required"> -->
        Kode Produk<input type="text" class="form-control" name="kd_produk" value="{{$kodeBarang}}"> <br/>
        Nama Produk<input type="text" class="form-control" name="nama_produk" value="{{$namaBarang}}"> <br/>
				Harga Produk <input type="text" class="form-control" name="harga_produk" value="{{$hargaBarang}}"></text> <br/>
				Jumlah <input type="text" class="form-control" name="jumlah_beli" required="required">
        
        <div class="input-group col-sm-10">

          <input type="hidden" class="form-control" name="harga_total" required="required"
                  value="{{
                            $detail_transaksi->sum(function ($dt){
                                $dt->harga_produk * $dt->jumlah_beli;
                            })
                          }}"
                         >
        </div>	
					<input type="submit" class="btn btn-primary float-right" value="Simpan Data">
			</form>
    </div>
  </div>
        
	<br/>
	<br/>
	<hr/>
  
	<footer>
		<p>Toko Enggal Tahu Bulat & Sotong 2018 - 2023</p>
	</footer>
	</div>
</div>
</div>
</body>
</html>
@endsection