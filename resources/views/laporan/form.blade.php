<div class="modal" id="modal-form" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
     
   <form class="form-horizontal" data-toggle="validator" method="POST" action="laporan">
   {{ csrf_field() }}
   
   <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"> &times; </span> </button>
      <h3 class="modal-title">Periode Laporan</h3>
   </div>
            
<div class="modal-body">
   
   <div class="form-group">
      <label for="awal" class="col-md-3 control-label">Tanggal Awal</label>
      <div class="col-md-6">
         <input id="awal" type="text" class="form-control" name="awal" autofocus required>
         <span class="help-block with-errors"></span>
      </div>
   </div>

   <div class="form-group">
      <label for="akhir" class="col-md-3 control-label">Tanggal Akhir</label>
      <div class="col-md-6">
         <input id="akhir" type="text" class="form-control" name="akhir" autofocus required>
         <span class="help-block with-errors"></span>
      </div>
   </div>
   
</div>
   
   <div class="modal-footer">
      <button type="submit" class="btn btn-primary btn-save"><i class="fa fa-floppy-o"></i> Simpan </button>
      <button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fa fa-arrow-circle-left"></i> Batal</button>
   </div>
      
   </form>

         </div>
      </div>
   </div>
