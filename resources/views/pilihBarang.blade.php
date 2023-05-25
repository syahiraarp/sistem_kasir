@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Pilih Produk | Toko Tahu Bulat & Sotong Enggal</title>
	<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<body>
<form action="/transaksi" method='post'>
    @csrf
    <p>Pilih Barang</p>
    
    @foreach ($barang as $br)
    <input type="radio"  name="kd_produk" value="{{$br->kd_produk}}">
    <label for="html">{{$br->nama_produk}} {{$br->deskripsi}}</label><br><br>
    @endforeach
    <input type="submit" value="Submit">
</form>
</body>
</html>
@endsection