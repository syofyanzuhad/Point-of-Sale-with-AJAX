<!DOCTYPE html>
<html>
<head>
   <title>Nota PDF</title>
   <style type="text/css">
      table td{font: arial 12px;}
      table.data td,
      table.data th{
         border: 1px solid #ccc;
         padding: 5px;
      }
      table.data th{
         text-align: center;
      }
      table.data{ border-collapse: collapse }
   </style>
</head>
<body>

<table width="100%">
  <tr>
     <td rowspan="3" width="60%"><img src="../public/images/{{$setting->logo}}" width="150"><br>
     {{ $setting->alamat }}<br><br>
     </td>
     <td>Tanggal</td>
     <td>: {{ tanggal_indonesia(date('Y-m-d')) }}</td>
  </tr>     
  <tr>
     <td>Kode Member</td>
     <td>: {{ $penjualan->kode_member }}</td>
  </tr>
</table>
         
<table width="100%" class="data">
<thead>
   <tr>
    <th>No</th>
    <th>Kode Produk</th>
    <th>Nama Produk</th>
    <th>Harga Satuan</th>
    <th>Jumlah</th>
    <th>Diskon</th>
    <th>Subtotal</th>
   </tr>

   <tbody>
    @foreach($detail as $data)
      
    <tr>
       <td>{{ ++$no }}</td>
       <td>{{ $data->kode_produk }}</td>
       <td>{{ $data->nama_produk }}</td>
       <td align="right">{{ format_uang($data->harga_jual) }}</td>
       <td>{{ $data->jumlah }}</td>
       <td align="right">{{ format_uang($data->diskon) }}%</td>
       <td align="right">{{ format_uang($data->sub_total) }}</td>
    </tr>
    @endforeach
   
   </tbody>
   <tfoot>
    <tr><td colspan="6" align="right"><b>Total Harga</b></td><td align="right"><b>{{ format_uang($penjualan->total_harga) }}</b></td></tr>
    <tr><td colspan="6" align="right"><b>Diskon</b></td><td align="right"><b>{{ format_uang($penjualan->diskon) }}%</b></td></tr>
    <tr><td colspan="6" align="right"><b>Total Bayar</b></td><td align="right"><b>{{ format_uang($penjualan->bayar) }}</b></td></tr>
    <tr><td colspan="6" align="right"><b>Diterima</b></td><td align="right"><b>{{ format_uang($penjualan->diterima) }}</b></td></tr>
    <tr><td colspan="6" align="right"><b>Kembali</b></td><td align="right"><b>{{ format_uang($penjualan->diterima - $penjualan->bayar) }}</b></td></tr>
   </tfoot>
</table>

<table width="100%">
  <tr>
    <td>
      <b>Terimakasih telah berbelanja dan sampai jumpa</b>
    </td>
    <td align="center">
      Kasir<br><br><br> {{Auth::user()->name}}
    </td>
  </tr>
</table>
</body>
</html>