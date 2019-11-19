@extends('layouts.app')

@section('title')
  Daftar Member
@endsection

@section('breadcrumb')
   @parent
   <li>member</li>
@endsection

@section('content')     
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <a onclick="addForm()" class="btn btn-success"><i class="fa fa-plus-circle"></i> Tambah</a>
        <a onclick="printCard()" class="btn btn-info"><i class="fa fa-credit-card"></i> Cetak Kartu</a>
      </div>
      <div class="box-body"> 

<form method="post" id="form-member">
{{ csrf_field() }}
<table class="table table-striped">
<thead>
   <tr>
      <th width="20"><input type="checkbox" value="1" id="select-all"></th>
      <th width="20">No</th>
      <th>Kode Member</th>
      <th>Nama Member</th>
      <th>Alamat</th>
      <th>Telpon</th>
      <th width="100">Aksi</th>
   </tr>
</thead>
<tbody></tbody>
</table>
</form>

      </div>
    </div>
  </div>
</div>

@include('member.form')
@endsection

@section('script')
<script type="text/javascript">
var table, save_method;
$(function(){
   table = $('.table').DataTable({
     "processing" : true,
     "ajax" : {
       "url" : "{{ route('member.data') }}",
       "type" : "GET"
     },
     'columnDefs': [{
         'targets': 0,
         'searchable': false,
         'orderable': false
      }],
      'order': [1, 'asc']
   }); 

   $('#select-all').click(function(){
      $('input[type="checkbox"]').prop('checked', this.checked);
   });
   
   $('#modal-form form').validator().on('submit', function(e){
      if(!e.isDefaultPrevented()){
         var id = $('#id').val();
         if(save_method == "add") url = "{{ route('member.store') }}";
         else url = "member/"+id;
         
         $.ajax({
           url : url,
           type : "POST",
           data : $('#modal-form form').serialize(),
           dataType: 'JSON',
           success : function(data){
            if(data.msg=="error"){
              alert('Kode member sudah digunakan!');
              $('#kode').focus().select();
            }else{
              $('#modal-form').modal('hide');
              table.ajax.reload();
            }
           },
           error : function(){
             alert("Tidak dapat menyimpan data!");
           }   
         });
         return false;
     }
   });
});

function addForm(){
   save_method = "add";
   $('input[name=_method]').val('POST');
   $('#modal-form').modal('show');
   $('#modal-form form')[0].reset();            
   $('.modal-title').text('Tambah Member');
   $('#kode').attr('readonly', false);
}

function editForm(id){
   save_method = "edit";
   $('input[name=_method]').val('PATCH');
   $('#modal-form form')[0].reset();
   $.ajax({
     url : "member/"+id+"/edit",
     type : "GET",
     dataType : "JSON",
     success : function(data){
       $('#modal-form').modal('show');
       $('.modal-title').text('Edit Member');
       
       $('#id').val(data.id_member);
       $('#kode').val(data.kode_member).attr('readonly', true);
       $('#nama').val(data.nama);
       $('#alamat').val(data.alamat);
       $('#telpon').val(data.telpon);
       
     },
     error : function(){
       alert("Tidak dapat menampilkan data!");
     }
   });
}

function deleteData(id){
   if(confirm("Apakah yakin data akan dihapus?")){
     $.ajax({
       url : "member/"+id,
       type : "POST",
       data : {'_method' : 'DELETE', '_token' : $('meta[name=csrf-token]').attr('content')},
       success : function(data){
         table.ajax.reload();
       },
       error : function(){
         alert("Tidak dapat menghapus data!");
       }
     });
   }
}

function printCard(){
  if($('input:checked').length < 1){
    alert('Pilih data yang akan dicetak!');
  }else{
    $('#form-member').attr('target', '_blank').attr('action', "member/cetak").submit();
  }
}
</script>
@endsection