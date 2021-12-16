
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
            dd($no)
			@php 
                $no=1 
            @endphp
			@foreach($$cetakbarang as $cb)
			<tr>
				<td>{{ $no++ }}</td>
				<td>{{$cb->users_id->id}}</td>
				<td>{{$cb->total_price->id}}</td>
				<td>{{$cb->created_at}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
 
</body>
</html>


