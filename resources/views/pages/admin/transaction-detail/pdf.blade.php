@extends('layouts.admin')

@section('title')
    Transaksi detail
@endsection

@section('content')

<!-- section content -->
<!DOCTYPE html>
<html>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		<h5>Membuat Laporan PDF Dengan DOMPDF Laravel</h4>
		<h6><a target="_blank" href="https://www.malasngoding.com/membuat-laporan-…n-dompdf-laravel/">www.malasngoding.com</a></h5>
	</center>
 
	<table class='table table-bordered'>
		<thead>
			<tr>
				<th>No</th>
				<th>Transaksi</th>
				<th>Produk</th>
				<th>Harga</th>
                <th>tgl dibuat</th>
				<th>kode d.transaksi</th>
			</tr>
		</thead>
		<tbody>
			@php $i=1 @endphp
			@foreach($$transactiondetail as $p)
			<tr>
				<td>{{ $i++ }}</td>
				<td>{{$t->transactions_id}}</td>
				<td>{{$t->products_id}}</td>
				<td>{{$t->price}}</td>
				<td>{{$t->created_at}}</td>
				<td>{{$t->code}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
 
</body>
</html>

@endsection
