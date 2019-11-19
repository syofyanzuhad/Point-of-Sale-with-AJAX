<div class="modal" id="modal-produk" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
     
   <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"> &times; </span> </button>
      <h3 class="modal-title">Cari Produk</h3>
   </div>
            
<div class="modal-body">
   <table class="table table-striped tabel-produk">
      <thead>
         <tr>
            <th>Kode Produk</th>
            <th>Nama Produk</th>
            <th>Harga Beli</th>
            <th>Aksi</th>
         </tr>
      </thead>
      <tbody>
         @foreach($produk as $data)
         <tr>
            <th>{{ $data->kode_produk }}</th>
            <th>{{ $data->nama_produk }}</th>
            <th>Rp. {{ format_uang($data->harga_beli) }}</th>
            <th><a onclick="selectItem({{ $data->kode_produk }})" class="btn btn-primary"><i class="fa fa-check-circle"></i> Pilih</a></th>
          </tr>
         @endforeach
      </tbody>
   </table>

</div>
      
         </div>
      </div>
   </div>
