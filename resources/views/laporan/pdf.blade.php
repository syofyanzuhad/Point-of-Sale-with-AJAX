<!DOCTYPE html>
<html>
<head>  
  <title>Produk PDF</title>
  <link rel="stylesheet" href="{{ asset('public/adminLTE/bootstrap/css/bootstrap.min.css') }}">
</head>
<body>
 
<h3 class="text-center">Laporan Pendapatan</h3>
<h4 class="text-center">Tanggal  {{ tanggal_indonesia($tanggal_awal) }} s/d {{ tanggal_indonesia($tanggal_akhir) }} </h4>

         
<table class="table table-striped">
<thead>
   <tr>
    <th>No</th>
    <th>Tanggal</th>
    <th>Penjualan</th>
    <th>Pembelian</th>
    <th>Pengeluaran</th>
    <th>Pendapatan</th>
   </tr>

   <tbody>
    @foreach($data as $row)    
    <tr>
    @foreach($row as $col)
     <td>{{ $col }}</td>
    @endforeach
    </tr>
    @endforeach
   </tbody>
</table>

</body>
</html>