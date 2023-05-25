<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class DetailTransaksiController extends Controller
{
    
	public function viewBarang(){
		$view = DB::table('gudang')->get();
		return view('pilihBarang',['barang' => $view]);
	}

    //method mengambil data pada db
    public function detail_transaksi(Request $request)
    {
		$query = DB::table('gudang')->where('kd_produk','=',$request->kd_produk)->first();	
		$namaBarang = $query->nama_produk;
		$kodeBarang = $query->kd_produk;
		$hargaBarang = $query->harga_produk;


    	// mengambil data dari table 
    	$detail_transaksi = DB::table('detail_transaksi')->get();
 
    	// mengirim data ke view 
    	// return view('transaksi',['detail_transaksi' => $detail_transaksi]);
		return view('transaksi',compact('namaBarang','kodeBarang','hargaBarang','detail_transaksi'));
 
    }

	// method untuk insert data ke table transaksi
	public function store(Request $request)
	{
		$hariIni = Carbon::now();
		// insert data ke table transaksi
		DB::table('detail_transaksi')->insert([
			'tanggal_transaksi' => $hariIni,
			'kd_produk' => $request->kd_produk,
			'nama_produk' => $request->nama_produk,
			'harga_produk' => $request->harga_produk,
			'jumlah_beli' => $request->jumlah_beli,
            'harga_total' => $request->harga_total
		]);
		
		DB::table('laporan')->insert([
			'tanggal_transaksi' => $hariIni,
			'jumlah_beli' => $request->jumlah_beli,
			'harga_produk' => $request->harga_produk,
			'harga_total' => $request->harga_total

		]);
		// alihkan halaman ke halaman transaksi
		return redirect('/laporanTransaksi');

	}

	    //method mengambil data pada db
	public function laporan_transaksi()
	{
		// mengambil data dari table  
		$detail_transaksi = DB::table('detail_transaksi')->get();
	 
		// mengirim data ke view 
		return view('laporanTransaksi',['detail_transaksi' => $detail_transaksi]);
	 
	}

		// method untuk hapus data pegawai
		public function hapus($kd_detail_transaksi)
		{
			// menghapus data pegawai berdasarkan id yang dipilih
			DB::table('detail_transaksi')->where('kd_detail_transaksi',$kd_detail_transaksi)->delete();	
			
			// alihkan halaman ke halaman pegawai
			return redirect('/laporanTransaksi');
		}
}