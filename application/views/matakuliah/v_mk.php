<div class="row">
  <div class="col-xs-12">
    <div class="table-header">
      <?php echo $sub_judul;?> &nbsp;<strong><?php echo  $nama_jurusan; ?></strong>
      <div class="widget-toolbar no-border pull-right">
        <a href="<?php echo site_url('matakuliah');?>" class="btn btn-danger btn-sm">
          <i class="fa fa-chevron-circle-left"></i>
          Kembali
        </a>
        <a href="#modal-tambah" class="btn btn-success btn-sm" data-toggle="modal" id="tambah">
          <i class="fa fa-plus-circle"></i>
          Tambah
        </a>
        <a href="<?php echo site_url('matakuliah/view')?>" class="btn btn-info btn-sm">
          <i class="fa fa-refresh"></i>
          Refresh
        </a>
      </div>
    </div>

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
            <th class="center">Kode Prodi</th>
            <th class="center">Kode Mata Kuliah</th>
            <th class="center">Mata Kuliah</th>
            <th class="center">SKS</th>
            <th class="center">Semester</th>
            <th class="center">Status</th>
            <th class="center">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php  $no=1; foreach ($tb_mata_kuliah->result() as $rs):?>
          <tr>
            <td class="center"><?php echo $no++ ?></td>
            <td class="center"><?php echo $rs->kd_prodi ?></td>
            <td class="center"><?php echo $rs->kd_mk ?></td>
            <td><?php echo $rs->nama_mk ?></td>
            <td class="center"><?php echo $rs->sks ?></td>
            <td class="center"><?php echo $rs->smt ?></td>
            <td class="center"><?php echo $rs->aktif ?></td>
            <td>

              <center>
                <div class="hidden-sm hidden-xs action-buttons">
                <a href="#modal-tambah" onclick="javascript:editData('<?php echo $rs->kd_mk;?>')" class="green" data-toggle="modal">
                  <i class="fa fa-pencil bigger-130"></i>Edit
                </a>
                <a href="#" class="red" onclick="javascript:hapusData('<?php echo $rs->kd_mk;?>')">
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
  										<a href="#modal-tambah" onclick="javascript:editData('<?php echo $rs->kd_mk;?>')" class="tooltip-success" data-toggle="modal" data-rel="tooltip" title="" data-original-title="Edit">
  											<span class="green">
  												<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
  											</span>
  										</a>
  									</li>

  									<li>
  										<a href="#" class="tooltip-error" onclick="javascript:hapusData('<?php echo $rs->kd_mk;?>')" data-rel="tooltip" title="" data-original-title="Delete">
  											<span class="red">
  												<i class="ace-icon fa fa-trash-o bigger-120"></i>
  											</span>
  										</a>
  									</li>
  								</ul>
  							</div>
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
</div>

<div id="modal-tambah" class="modal fade" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header no-padding">
        <div class="table-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
            <span class="black">&times;</span>
          </button>
          Data Mata Kuliah
        </div>
      </div>

      <div class="modal-body">
        <div class="row">
          <!-- <div class="col-xs-12 col-sm-7"> -->

          <form class="form-horizontal" name="myForm" id="myForm">

            <div class="form-group">
              <label for="" class="control-label col-sm-4">Kode Prodi</label>
              <div class="controls">
                <input type="text" name="kd_prodi" value="<?php echo $this->session->userdata('sess_kd_prodi');?>" id="kd_prodi" class="col-sm-3" placeholder="Kode Prodi" readonly="">
              </div>
            </div>

            <div class="form-group">
              <label for="" class="control-label col-sm-4">Kode Mata Kuliah</label>
              <div class="controls">
                <input type="text" name="kd_mk" value="" id="kd_mk" class="col-sm-3" placeholder="Kode Mata Kuliah">
              </div>
            </div>

            <div class="form-group">
              <label for="" class="control-label col-sm-4">Mata Kuliah</label>
              <div class="controls">
                <input type="text" name="nama_mk" id="nama_mk" placeholder="Mata Kuliah" class="col-sm-5" value="">
              </div>
            </div>

            <div class="form-group">
              <label for="" class="control-label col-sm-4">Semester</label>
              <div class="controls">
                <select class="" name="smt" id="smt">
                  <option value="">--Pilih--</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label for="" class="control-label col-sm-4">SKS</label>
              <div class="controls">
                <select class="" name="sks" id="sks">
                  <option value="">--Pilih--</option>
                  <option value="0">0</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label for="" class="control-label col-sm-4">Status Aktif</label>
              <div class="controls">
                <select class="" name="aktif" id="aktif">
                  <option value="">--Pilih--</option>
                  <option value="Ya">Ya</option>
                  <option value="Tidak">Tidak</option>
                </select>
              </div>
            </div>
          </form>

        <!-- </div> -->
        </div>
      </div>

      <div class="modal-footer">
				<button class="btn btn-sm btn-danger" data-dismiss="modal">
					<i class="ace-icon fa fa-times"></i>
					Batal
				</button>

        <button class="btn btn-sm btn-info" name="tambah_mk" id="tambah_mk">
          <i class="ace-icon fa fa-plus-circle"></i>
          Tambah
        </button>

				<button class="btn btn-sm btn-success" name="simpan" id="simpan">
					<i class="ace-icon fa fa-check"></i>
					Simpan
				</button>
			</div>

    </div>

  </div>
</div>


<script type="text/javascript">
$(document).ready(function($) {
  $('#simpan').click(function() {
  /* Act on the event */
  var isiform=$('#myForm').serialize();
  if ( !$('#kd_prodi').val() || !$('#kd_mk').val() ||
      !$('#nama_mk').val() || !$('#smt').val() ||
      !$('#sks').val() || !$('#aktif').val()) {
      $.gritter.add({
        title:'Peringatan..!!!',
        text:'Field Tidak Boleh Kosong..',
        class_name:'gritter-error'
      });
      $('#kd_prodi').focus();
      return false;
  }else {
    $.ajax({
      url: '<?php echo site_url('matakuliah/simpan');?>',
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

$('#tambah_mk').click(function() {
/* Act on the event */
var isiform=$('#myForm').serialize();
if ( !$('#kd_prodi').val() || !$('#kd_mk').val() ||
    !$('#nama_mk').val() || !$('#smt').val() ||
    !$('#sks').val() || !$('#aktif').val()) {
    $.gritter.add({
      title:'Peringatan..!!!',
      text:'Field Tidak Boleh Kosong..',
      class_name:'gritter-error'
    });
    $('#kd_prodi').focus();
    return false;
}else {
  $.ajax({
    url: '<?php echo site_url('matakuliah/simpan');?>',
    type: 'POST',
    data: isiform,
    cache:false,
    success:function(data){
      $('#kd_mk').val('');
      // $('#kd_prodi').attr('readonly','false');
      $('#nama_mk').val('');
      $('#smt').val('');
      $('#aktif').val('');
      $('#sks').val('');
      $('#kd_mk').focus();

    }
  });
}
});

  $('#tambah').click(function() {
    /* Act on the event */
    $('#kd_mk').val('');
      $('#kd_mk').attr('readonly',false);
      $('#nama_mk').val('');
      $('#smt').val('');
      $('#aktif').val('');
      $('#sks').val('');
      $('#kd_mk').focus();
    });
  });

  function editData(ID) {
  var id =ID;
  $.ajax({
    type:'POST',
    url:'<?php echo site_url()?>matakuliah/edit',
    data:"id="+id,
    dataType:"json",
    success: function(data){
      // $('#kd_prodi').val(data.kd_prodi);
      // $('#kd_prodi').attr('readonly','true');
      $('#kd_mk').attr('readonly',true);
      $('#kd_mk').val(data.kd_mk);
      $('#nama_mk').val(data.nama_mk);
      $('#smt').val(data.smt);
      $('#sks').val(data.sks);
      $('#aktif').val(data.aktif);
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
  icon:'warning',
})
.then((willDelete) =>{
  if (willDelete) {
    $.ajax({
      url: '<?php echo site_url('matakuliah/hapus');?>',
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


<!-- <script type="text/javascript">
  $(document).ready(function() {
    // $.fn.dataTableExt.oApi.fnPagingInfo=function(oSettings){
    //   return {
    //                 "iStart": oSettings._iDisplayStart,
    //                 "iEnd": oSettings.fnDisplayEnd(),
    //                 "iLength": oSettings._iDisplayLength,
    //                 "iTotal": oSettings.fnRecordsTotal(),
    //                 "iFilteredTotal": oSettings.fnRecordsDisplay(),
    //                 "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
    //                 "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
    //             };
    // };

    // var dataset =
    var myTable =$('#dynamic-table').DataTable( {
      // pencarian dengan fungsi enter
      // initComplete:function(){
      //   var api =this.api();
      //   $('#dynamic-table_filter input')
      //         .off('.DT')
      //         .on('keyup.DT',function(e) {
      //           if (e.keyCode == 13) {
      //               api.search(this.value).draw();
      //           }
      //         });
      // },
      oLanguage:{
        sProcessing:"Loading...."
      },

      "bProcessing": true,
      "bServerSide": true,
      ajax: {"url": "<?php echo site_url('matakuliah/json');?>", "type": "POST"},
          columns:[
             {"data" : "no"},
            {"data" : "prodi"},
            {"data" : "kd_mk"},
            {"data" : "nama_mk"},
            {"data" : "sks"},
            {"data" : "smt"},
            {"data" : "aktif"},
            {"data" : "aksi"}
            // { "bSortable": false }
          ],
          order:[]
       // order:[[1,'asc']],
      // rowCallback:function(row,data,iDisplayIndex){
      //   var info =this.fnPagingInfo();
      //   var page =info.iPage;
      //   var length =info.iLength;
      //   var index = page * length + (iDisplayIndex + 1);
      //   $('td:eq(0)', row).html();
      //
      // }
  });


  // simpan data
  $('#simpan').click(function(event) {
    /* Act on the event */
    if (!$('#')) {

    }
  });
});
</script> -->
