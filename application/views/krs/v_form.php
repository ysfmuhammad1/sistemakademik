<!-- PAGE CONTENT BEGINS -->
<div class="row">
  <div class="col-xs-12">
    <div class="table-header">
      <?php echo $sub_judul; ?>
      <div class="widget-toolbar no-border pull-right">
        <a href="<?php echo site_url('krs/tambah')?>" id="tambah" role="button" class="btn btn-sm btn-success">
          <i class="fa fa-plus-circle bigger-120"></i>
          Tambah
        </a>
        <a href="<?php echo site_url('krs');?>" id="tambah" role="button" class="btn btn-sm btn-info" data-toggle="modal">
            <i class="fa fa-refresh bigger-120"></i>
            Refresh
          </a>
      </div>
    </div>

    <!-- div.table-responsive -->

    <!-- div.dataTables_borderWrap -->

<!-- <style media="screen">

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
</style> -->

    <div style="width:100%;" id="dynamic-table_wrapper" class="dataTables_wrapper form-inline no-footer">
      <!-- <table id="dynamic-table" class="table table-striped table-bordered table-hover"> -->
      <table id="dynamic-table" class="display responsive no-wrap table table-striped table-bordered table-hover">
      <!-- <table id="dynamic-table" class="table table-striped table-bordered table-hover"> -->
        <thead>
          <tr>
            <th class="center col-xs-1">No</th>
            <th class="center">Th. Akademik</th>
            <!-- <th class="center">Semester</th> -->
            <th class="center">Program Studi</th>
            <th class="center col-xs-2">Jumlah Mahasiswa</th>
          </tr>
        </thead>
        <tbody>
          <?php $no=1;
          foreach ($data_krs->result() as $rs):
            $jml=$this->M_krs->getJum_Mhs_by($rs->kd_prodi, $rs->th_akademik,$rs->semester);
            ?>
          <tr>
            <td class="center"><?php echo $no++ ?></td>
            <td class="center"><?php echo $rs->th_akademik ?></td>
            <td><?php echo $rs->kd_prodi."-".$rs->prodi ?></td>
            <td class="center">
              <span class="badge badge-danger"><?php echo $jml ?></span>&nbsp;
              <a href="<?php echo site_url("krs/view_detail/".$rs->id_jadwal)?>" class="blue"><i class="fa fa-search-plus bigger-130"></i></a>
            </td>
          </tr>
        <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
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
var tb =ID;
swal({
  title:'Apa anda ingin menghapus.?',
  buttons:true,
  dangerMode:true,
  text:'Data tidak dapat dikembalikan',
  icon:'warning',
})
.then((willDelete) =>{
  if (willDelete) {
    $.ajax({
      url: '<?php echo site_url('jadwal/empty');?>',
      type: 'POST',
      data: 'tb='+tb,
      success:function(data){
        swal({
          title:'Info.!',
          text:data,
          icon:'success'
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
null, null,null,
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
