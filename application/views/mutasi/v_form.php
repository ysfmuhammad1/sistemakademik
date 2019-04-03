<!-- PAGE CONTENT BEGINS -->
<div class="row">
  <div class="col-xs-12">
    <div class="table-header">
      <?php echo $sub_judul; ?>
      <div class="widget-toolbar no-border pull-right">
        <a href="<?php echo site_url('mutasimhs/tambah')?>" id="tambah" role="button" class="btn btn-sm btn-success">
          <i class="fa fa-plus-circle bigger-120"></i>
          Tambah
        </a>
        <a href="<?php echo site_url('mutasimhs');?>" id="refresh" role="button" class="btn btn-sm btn-info" data-toggle="modal">
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
            <th class="center">Tanggal</th>
            <th class="center">Nim</th>
            <th class="center">Nama Mahasiswa</th>
            <th class="center">L/P</th>
            <th class="center">Status</th>
            <th class="center col-xs-2">Aksi</th>
          </tr>
        </thead>
        <?php $no=1; foreach ($data_mutasi->result() as $rs): ?>
          <?php //$nama_mhs=$this->M_mahasiswa->cari_nama_mhs($rs->nim) ?>
          <tr>
            <td class="center"><?php echo $no++ ?></td>
            <td class="center"><?php echo $rs->th_akademik ?></td>
            <td><?php echo tgl_str($rs->tgl_mutasi) ?></td>
            <td><?php echo $rs->nim ?></td>
            <td><?php echo $rs->nama_mhs ?></td>
            <td><?php echo $rs->sex ?></td>
            <td><?php echo $rs->status ?></td>
            <td class="center">
              <center>
                <div class="hidden-sm hidden-xs action-buttons">
                <a href="<?php echo site_url("mutasimhs/edit/$rs->id_mutasi")?>" class="green">
                  <i class="fa fa-pencil bigger-130"></i>Edit
                </a>
                <a href="#" onclick="javascript:hapusData('<?php echo $rs->id_mutasi;?>')" class="red">
                  <i class="fa fa-trash bigger-130"></i>Hapus
                </a>
              </div>
              <div class="hidden-md hidden-lg">
                <div class="inline pos-rel">
                  <button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto" aria-expanded="false">
                    <i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
                  </button>

                  <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                    <li>
                      <a href="<?php echo site_url("mutasimhs/edit/$rs->id_mutasi")?>" class="tooltip-success" data-rel="tooltip" title="" data-original-title="Edit">
                        <span class="green">
                          <i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
                        </span>
                      </a>
                    </li>

                    <li>
                      <a href="#" onclick="javascript:hapusData('<?php echo $rs->id_mutasi;?>')" class="tooltip-error" data-rel="tooltip" title="" data-original-title="Delete">
                        <span class="red">
                          <i class="ace-icon fa fa-trash-o bigger-120"></i>
                        </span>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>

              </center>
              <!-- <a href="<?php //echo site_url("krs/view_detail/".$rs->id_jadwal)?>" class="blue"><i class="fa fa-search-plus bigger-130"></i></a> -->
            </td>
          </tr>
        <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<script type="text/javascript">

function hapusData(ID){
  var id =ID;
  swal({
    title:'Yakin ingin menghapus.?',
    text:'Data tidak dapat dikembalikan',
    icon:'error',
    buttons:true,
    dangerMode:true,
  }).then((willDelete)=>{
    if (willDelete) {
      $.ajax({
        url: '<?php echo site_url('mutasimhs/hapus')?>',
        type: 'POST',
        // dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
        data: 'id='+id,
        success:function(result){
          swal({
            title:'Info.!',
            text:result,
            icon:'success',
          }).then((isConfirm)=>{
            if (isConfirm) {
              location.reload();
            }
          });
        }
      });
    }
  });
}

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
null, null,null,null,null,null,null,
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
