<!DOCTYPE html>
<html>
<head>
	<title>Data Pegawai</title>
</head>
<body>
 
<header>
    <h1>Selamat Datang Di Aplikasi Kasir Toko Tahu Bulat & Sotong Enggal</h1>
        <nav>
			<a href="/home">HOME</a>
			|
			<a href="/transaksi">TRANSAKSI</a>
			|
			<a href="/laporan">LAPORAN</a>
            |
            <a href="/karyawan">KARYAWAN</a>
			|
            <a href="/inventory">INVENTORY</a>
	    </nav>

    </header>
 
	@foreach($transaksi as $l)
	<form action="/laporan/update" method="post">
		{{ csrf_field() }}
		<input type="hidden" name="kd_transaksi" value="{{ $l->kd_transaksi }}"> <br/>
		Tanggal Transaksi<input type="date" required="required" name="tanggal_transaksi" value="{{ $l->tanggal_transaksi }}"> <br/>
		Produk Terjual <input type="text" required="required" name="produk_terjual" value="{{ $l->produk_terjual }}"> <br/>
		Kode Admin <input type="text" required="required" name="kd_admin" value="{{ $l->kd_admin }}"> <br/>
		Kode Produk <input type="text" required="required" name="kd_produk" value="{{ $l->kd_produk }}"> <br/>
		Kode karyawan <input type="text" required="required" name="kd_karyawan" value="{{ $l->kd_karyawan }}"> <br/>
		<input type="submit" value="Simpan Data">
	</form>
	@endforeach
		
    <br/>
	<br/>
	<hr/>
	<footer>
		<p>Toko Enggal Tahu Bulat & Sotong 2018 - 2023</p>
	</footer>
</body>
</html>