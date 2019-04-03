<div class="row">
  <div class="col-xs-12">
    <div class="table-header">
      <?php echo $sub_judul; ?> <strong><?php echo $nama_prodi ?></strong>
      <div class="widget-toolbar no-border pull-right">
        <a href="<?php echo site_url('mahasiswa');?>" class="btn btn-danger btn-sm">
          <i class="fa fa-chevron-circle-left"></i>
          Kembali
        </a>
        <a href="<?php echo site_url('mahasiswa/tambah');?>" class="btn btn-sm btn-success">
          <i class="fa fa-plus-circle"></i>
          Tambah
        </a>
        <a href="<?php echo site_url('mahasiswa/view')?>" class="btn btn-sm btn-info">
          <i class="fa fa-refresh"></i>
          Refresh
        </a>
      </div>
    </div>

    <div class="table-body">
      <div id="dynamic-table_wrapper" class="dataTables_wrapper">
        <table id="dynamic-table" class="table table-striped table-bordered table-hover">
          <thead>
            <tr>
              <th class="center" width="50">No</th>
              <th class="center" width="100">Th Akademik</th>
              <th class="center" width="100">Prodi</th>
              <th class="center" width="150">NIM</th>
              <th class="center">Nama</th>
              <th class="center" width="50">L/P</th>
              <th class="center" width="200">HP</th>
              <th class="center" width="70">Status</th>
              <th class="center" width="130">Aksi</th>
            </tr>
          </thead>
          <tbody>

          </tbody>
          <!-- <tbody>
            <?php $no=1; foreach ($tb_mahasiswa->result() as $rs): ?>
              <tr>
                <td class="center"><?php echo $no++; ?></td>
                <td class="center"><?php echo $rs->th_akademik; ?></td>
                <td class="center"><?php echo $rs->kd_prodi; ?></td>
                <td class="center"><?php echo $rs->nim; ?></td>
                <td class=""><?php echo $rs->nama_mhs; ?></td>
                <td class="center"><?php echo $rs->sex; ?></td>
                <td class="center"><?php echo $rs->hp; ?></td>
                <td class="center"><?php echo $rs->status; ?></td>
                <td class="center">
                  <center>
                  <div class="hidden-sm hidden-xs action-buttons">
                    <a href="<?php echo site_url();?>mahasiswa/edit/<?php echo $rs->nim;?>" class="green" >
                      <i class="fa fa-pencil bigger-130"></i>Edit
                    </a>
                    <a href="#" class="red" onclick="javascript:hapusData('<?php echo $rs->nim;?>')">
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
                          <a href="<?php echo site_url();?>mahasiswa/edit/<?php echo $rs->nim;?>" class="tooltip-success"  data-rel="tooltip" title="" data-original-title="Edit">
                            <span class="green">
                              <i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
                            </span>
                          </a>
                        </li>

                        <li>
                          <a href="#" class="tooltip-error" onclick="javascript:hapusData('<?php echo $rs->nim;?>')" data-rel="tooltip" title="" data-original-title="Delete">
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
          </tbody> -->
        </table>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  function editData(ID) {
  var id =ID;
  $.ajax({
    url: '<?php echo site_url('mahasiswa/edit');?>',
    type: 'POST',
    dataType: 'json',
    data: 'id='+id,
    cache:false,
    success:function(data){
      alert(data.alamat);
    }
  });

  }

  function hapusData(ID) {
    var id=ID;
    swal({
      title:'Perhatian',
      buttons:true,
      text:'Data tidak dapat dikembalikan',
      icon:'error',
      dangerMode:true,
    }).then((willDelete)=>{
      if (willDelete) {
        $.ajax({
          url: '<?php echo site_url('mahasiswa/hapus')?>',
          type: 'POST',
          data: 'id='+id,
          cache:false,
          success:function(data){
            swal({
              title:'Sukses.!',
              text:'Data Sukses Terhapus..',
              icon:'success',
            }).then((isConfirm)=>{
              if (isConfirm) {
                location.reload();
              }
            })
          }
        });
      }
    });
  }
</script>
<script type="text/javascript">
  $(document).ready(function() {
    $('.date-picker').datepicker({
      autoclose:true
    }).next().on(ace.click_event,function(){
      $(this).prev().focus();
    });

    var myTable= $('#dynamic-table').DataTable({

      responsive:true,
      bAutoWidth: false,
      "processing": true, //Feature control the processing indicator.
      "serverSide": true, //Feature control DataTables' server-side processing mode.
      "order": [], //Initial no order.

      // Load data for the table's content from an Ajax source
      "ajax": {
          "url": "<?php echo site_url('mahasiswa/ajax_serverside')?>",
          "type": "POST"
      },

      //Set column definition initialisation properties.
      "columnDefs": [
      {
          "targets": [ 0 ], //first column / numbering column
          "orderable": false, //set not orderable
          "targets": [8], //first column / numbering column
      },
      ],
      // "sAjaxSource":
    });
    // var myTable =
    // $('#dynamic-table')
    // //.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
    // .DataTable( {
    // bAutoWidth: false,
    // responsive:true,
    // "aoColumns": [
    //    // { "bSortable": false },
    // null, null,null, null, null, null, null, null,
    // { "bSortable": false }
    // ],
    // "aaSorting": [],
    //
    //
    // //"bProcessing": true,
    // //"bServerSide": true,
    // //"sAjaxSource": "http://127.0.0.1/table.php"	,
    //
    // //,
    // //"sScrollY": "200px",
    // //"bPaginate": false,
    //
    // //"sScrollX": "100%",
    // //"sScrollXInner": "120%",
    // //"bScrollCollapse": true,
    // //Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
    // //you may want to wrap the table inside a "div.dataTables_borderWrap" element
    //
    // //"iDisplayLength": 50
    //
    //
    // select: {
    // style: 'multi'
    // }
    // } );
    //
    // /**
    // //add horizontal scrollbars to a simple table
    // $('#simple-table').css({'width':'2000px', 'max-width': 'none'}).wrap('<div style="width: 1000px;" />').parent().ace_scroll(
    // {
    // horizontal: true,
    // styleClass: 'scroll-top scroll-dark scroll-visible',//show the scrollbars on top(default is bottom)
    // size: 2000,
    // mouseWheelLock: true
    // }
    // ).css('padding-top', '12px');
    // */

  });
</script>
