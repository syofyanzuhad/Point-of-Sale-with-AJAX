<div class="modal" id="modal-supplier" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
     
   <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"> &times; </span> </button>
      <h3 class="modal-title">Pilih Supplier</h3>
   </div>
            
<div class="modal-body">
   <table class="table table-striped tabel-supplier">
      <thead>
         <tr>
            <th>Nama Supplier</th>
            <th>Alamat</th>
            <th>Telpon</th>
            <th>Aksi</th>
         </tr>
      </thead>
      <tbody>
         @foreach($supplier as $data)
         <tr>
            <th>{{ $data->nama }}</th>
            <th>{{ $data->alamat }}</th>
            <th>{{ $data->telpon }}</th>
            <th><a href="pembelian/{{ $data->id_supplier }}/tambah" class="btn btn-primary"><i class="fa fa-check-circle"></i> Pilih</a></th>
          </tr>
         @endforeach
      </tbody>
   </table>

</div>
      
         </div>
      </div>
   </div>
