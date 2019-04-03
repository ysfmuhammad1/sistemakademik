<!-- PAGE CONTENT BEGINS -->
<div class="row">
  <div class="col-xs-12">
    <div class="table-header">
      <?php echo $sub_judul; ?>
      <div class="widget-toolbar no-border pull-right">
      <a href="#modal-simpan" id="tambah" role="button" class="btn btn-sm btn-success" data-toggle="modal">
          <i class="fa fa-plus-circle bigger-120"></i>
          Tambah
        </a>

      </div>
    </div>

    <!-- div.table-responsive -->

    <!-- div.dataTables_borderWrap -->

<style media="screen">

@media(max-width:500px){
.col-xs-6{
  width: 100% !important;

}

.dataTables_filter label input{
width: 100% !important;
margin:  0px !important;
}

  .dataTables_filter label{
width:  100%;
}

.dataTables_filter{
  text-align: left;
width:  100%;
overflow: hidden;
}

.dataTables_length,
  .dataTables_info{display: none !important;}

}

    .row{width:  100%; margin:0px !important}
</style>

    <div style="width:100%;" id="dynamic-table_wrapper" class="dataTables_wrapper form-inline no-footer">
      <!-- <table id="dynamic-table" class="table table-striped table-bordered table-hover"> -->
      <table id="dynamic-table" class="display responsive no-wrap table table-striped table-bordered table-hover">
      <!-- <table id="dynamic-table" class="table table-striped table-bordered table-hover"> -->
        <thead>
          <tr>
            <th class="center">No</th>
            <th class="center">Kode</th>
            <th class="center">Program Studi</th>
            <th class="center">Singkat</th>
            <th class="center">Akreditasi</th>
            <th class="center">Kaprodi</th>
            <th class="center">Nip</th>
            <th class="center">Aksi</th>
          </tr>

        </thead>
        <tbody>
          <?php
          $no=1;

          foreach ($tb_prodi->result() as $rs): ?>
          <tr>
            <td class="center span1"><?php echo $no++; ?></td>
            <td class="center span2"><?php echo $rs->kd_prodi; ?></td>
            <td class=""><?php echo $rs->prodi; ?></td>
            <td class="center"><?php echo $rs->singkat; ?></td>
            <td class="center"><?php echo $rs->akreditasi; ?></td>
            <td><?php echo $rs->kaprodi; ?></td>
            <td class="center"><?php echo $rs->nidn; ?></td>
            <td class="td-actions center">
              <center>
                <div class=" action-buttons">
                  <a href="#modal-simpan" class="green" onclick="javascript:editData('<?php echo $rs->kd_prodi; ?>')" data-toggle="modal">
                    <i class="fa fa-pencil bigger-130"></i>
                  </a>
                  <a href="#" class="red" onclick="javascript:hapusData('<?php echo $rs->kd_prodi;?>')">
                    <i class="fa fa-trash bigger-130"></i>
                  </a>
                </div>
              </center>
            </td>
          </tr>
        <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- <div class="modal fade " id="modal-table" tabindex="-1">
  <div class="modal-header no-padding">
    <div class="table-header">
      <button type="button" class="close" data-dismiss="modal"></button>
      Data jurusan
    </div>
  </div>
</div> -->

<div id="modal-simpan" class="modal fade" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header no-padding">
        <div class="table-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
            <span class="black">&times;</span>
          </button>
          Data Jurusan
        </div>
      </div>

      <div class="modal-body">
        <div class="row-fluid">
          <form class="form-horizontal" name="myForm" id="myForm">
            <div class="form-group">
              <label for="form-filed-1" class="col-sm-3 control-label">Kode Jurusan</label>
              <div class="controls">
                <input class="col-sm-2" type="text" name="kd_prodi" placeholder="Kode Jurusan" id="kd_prodi" value="">
              </div>
            </div>
            <div class="form-group">
              <label for="form-filed-1" class="col-sm-3 control-label">Program Studi</label>
              <div class="controls">
                <input class="col-sm-5" type="text" name="prodi" placeholder="Nama Prodi" id="prodi" value="">
              </div>
            </div>
            <div class="form-group">
              <label for="form-filed-1" class="col-sm-3 control-label">Nama Singkat</label>
              <div class="controls">
                <input class="col-sm-2" type="text" name="singkat" placeholder="Nama singkat" id="singkat" value="">
              </div>
            </div>
            <div class="form-group">
              <label for="form-filed-1" class="col-sm-3 control-label">Akreditasi</label>
              <div class="controls">
                <select class="span2" name="akreditasi" id="akreditasi">
                  <option value="">--Pilih--</option>
                  <option value="A">A</option>
                  <option value="B">B</option>
                  <option value="C">C</option>
                  <option value="Proses Akreditasi">Proses Akreditasi</option>
                </select>
                <!-- <input class="span3" type="text" name="akreditasi" placeholder="Akreditasi" id="akreditasi" value=""> -->
              </div>
            </div>
            <div class="form-group">
              <label for="form-filed-1" class="col-sm-3 control-label">Ketua Prodi</label>
              <div class="controls">
                <input class="col-sm-5" type="text" name="kaprodi" id="kaprodi" placeholder="Ketua Prodi" value="">
              </div>
            </div>
            <div class="form-group">
              <label for="form-filed-1" class="col-sm-3 control-label">Nidn</label>
              <div class="controls">
                <input class="col-sm-2" type="text" name="nidn" id="nidn" placeholder="Nidn" value="">
              </div>
            </div>


          </form>
        </div>
      </div>
      <div class="modal-footer">
        <div class="clearfix form-actions">
          <div class="col-xs-12">
            <button class="btn btn-primary btn-sm pull-right" type="button" name="simpan_prodi" id="simpan_prodi">
              <i class="fa fa-save bigger-130"> Simpan</i>
            </button>
        </div>
      </div>
      </div>

    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>


<script type="text/javascript">
$(document).ready(function($) {
$('#simpan_prodi').click(function() {
  /* Act on the event */
  var isiform=$('#myForm').serialize();
  if ( !$('#kd_prodi').val() || !$('#prodi').val() ||
      !$('#singkat').val() || !$('#akreditasi').val() ||
      !$('#kaprodi').val() || !$('#nidn').val()) {
      $.gritter.add({
        title:'Peringatan..!!!',
        text:'Field Tidak Boleh Kosong..',
        class_name:'gritter-error'
      });
      $('#kd_prodi').focus();
      return false;
  }else {
    $.ajax({
      url: '<?php echo site_url('prodi/simpan');?>',
      type: 'POST',
      data: isiform,
      cache:false,
      success:function(data){
        swal({
            title: "Info..!!!",
            text: data,
            icon: "info"
        })
        .then((isConfirm)=>{
            if (isConfirm) {
              location.reload();
            }
        });

      }
    });
  }
});
$('#tambah').click(function() {
  /* Act on the event */
  $('#kd_prodi').val('');
  $('#kd_prodi').attr('readonly',false);
  $('#prodi').val('');
  $('#singkat').val('');
  $('#akreditasi').val('');
  $('#kaprodi').val('');
  $('#nidn').val('');
});
});

function editData(ID) {
var id =ID;
$.ajax({
  type:'POST',
  url:'<?php echo site_url()?>prodi/edit',
  data:"id="+id,
  dataType:"json",
  success: function(data){
    $('#kd_prodi').val(data.kd_prodi);
    $('#kd_prodi').attr('readonly','true');
    $('#prodi').val(data.prodi);
    $('#singkat').val(data.singkat);
    $('#akreditasi').val(data.akreditasi);
    $('#kaprodi').val(data.kaprodi);
    $('#nidn').val(data.nidn);
  }
});
}
function hapusData(ID) {
var id =ID;
swal({
  title:'Apa anda ingin menghapus.?',
  buttons:true,
  dangerMode:true,
  text:'Data tidak dapat dikembalikan',
  icon:'error',
})
.then((willDelete) =>{
  if (willDelete) {
    $.ajax({
      url: '<?php echo site_url('prodi/hapus');?>',
      type: 'POST',
      data: 'id='+id,
      success:function(data){
        swal({
          title:'Info.!',
          text:data,
          icon:'info'
        })
        .then((isConfirm)=>{
          if (isConfirm) {
            location.reload();
          }
        });
      }
    });
  }
});

}
</script>


<script type="text/javascript">
jQuery(function($) {
//initiate dataTables plugin
var myTable =
$('#dynamic-table')
//.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
.DataTable( {
bAutoWidth: false,
responsive:true,
"aoColumns": [
//    { "bSortable": false },
null, null,null, null, null, null, null,
{ "bSortable": false }
],
"aaSorting": [],


//"bProcessing": true,
//"bServerSide": true,
//"sAjaxSource": "http://127.0.0.1/table.php"	,

//,
//"sScrollY": "200px",
//"bPaginate": false,

//"sScrollX": "100%",
//"sScrollXInner": "120%",
//"bScrollCollapse": true,
//Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
//you may want to wrap the table inside a "div.dataTables_borderWrap" element

//"iDisplayLength": 50


select: {
style: 'multi'
}
} );

/**
//add horizontal scrollbars to a simple table
$('#simple-table').css({'width':'2000px', 'max-width': 'none'}).wrap('<div style="width: 1000px;" />').parent().ace_scroll(
{
horizontal: true,
styleClass: 'scroll-top scroll-dark scroll-visible',//show the scrollbars on top(default is bottom)
size: 2000,
mouseWheelLock: true
}
).css('padding-top', '12px');
*/


})
</script>
