<div class="row">
  <div class="col-xs-12">
    <div class="table-header">
      <?php echo $sub_judul; ?> <strong> <?php echo $nama_prodi;?></strong>
      <div class="widget-toolbar no-border pull-right">
        <a href="<?php echo site_url('dosen');?>" class="btn btn-danger btn-sm">
          <i class="fa fa-chevron-circle-left"></i>
          Kembali
        </a>
        <a href="#modal-tambah" class="btn btn-success btn-sm" data-toggle="modal" id="tambah">
          <i class="fa fa-plus-circle"></i>
          Tambah
        </a>
        <a href="<?php echo site_url('dosen/view');?>" class="btn btn-info btn-sm" data-toggle="modal" id="tambah">
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
              <th class="center">No</th>
              <th class="center">Kode Dosen</th>
              <th class="center">Kode Prodi</th>
              <th class="center">NIDN</th>
              <th class="center">Nama Dosen</th>
              <th class="center">Jenis Kelamin</th>
              <th class="center">Pendidikan</th>
              <th class="center">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $no=1; foreach ($tb_dosen->result() as $rs): ?>

            <tr>
              <td class="center"><?php echo $no++ ?></td>
              <td class="center"><?php echo $rs->kd_dosen; ?></td>
              <td class="center"><?php echo $rs->kd_prodi; ?></td>
              <td class="center"><?php echo $rs->nidn; ?></td>
              <td><?php echo $rs->nama_dosen; ?></td>
              <td><?php echo $rs->sex; ?></td>
              <td><?php echo $rs->pendidikan.'-'.$rs->prodi_dosen; ?></td>
              <td class="">
                <center>
                  <div class="hidden-sm hidden-xs action-buttons">
                  <a href="#modal-tambah" onclick="javascript:editData('<?php echo $rs->kd_dosen;?>')" class="green" data-toggle="modal">
                    <i class="fa fa-pencil bigger-130"></i>Edit
                  </a>
                  <a href="#" class="red" onclick="javascript:hapusData('<?php echo $rs->kd_dosen;?>')">
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
                        <a href="#modal-tambah" onclick="javascript:editData('<?php echo $rs->kd_dosen;?>')" class="tooltip-success" data-toggle="modal" data-rel="tooltip" title="" data-original-title="Edit">
                          <span class="green">
                            <i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
                          </span>
                        </a>
                      </li>

                      <li>
                        <a href="#" class="tooltip-error" onclick="javascript:hapusData('<?php echo $rs->kd_dosen;?>')" data-rel="tooltip" title="" data-original-title="Delete">
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
          Data Dosen
        </div>
      </div>
      <div class="modal-body">
        <div class="row">
          <form class="form-horizontal" name="myForm" id="myForm">

            <div class="form-group">
              <label for="kd_dosen" class="control-label col-sm-4">Kode Dosen</label>
              <div class="controls">
                <input type="text" name="kd_dosen" id="kd_dosen" placeholder="Kode Dosan"  class="col-sm-2" value="">
              </div>
            </div>

            <div class="form-group">
              <label for="" class="control-label col-sm-4">Kode Prodi</label>
              <div class="controls">
                <input type="text" name="kd_prodi" id="kd_prodi" placeholder="Kode Prodi" readonly=""  class="col-sm-2" value="">
              </div>
            </div>

            <div class="form-group">
              <label for="" class="control-label col-sm-4">NIDN</label>
              <div class="controls">
                <input type="text" name="nidn" id="nidn" placeholder="NIDN" class="col-sm-2" value="">
              </div>
            </div>

            <div class="form-group">
              <label for="" class="control-label col-sm-4">Nama</label>
              <div class="controls">
                <input type="text" name="nama_dosen" id="nama_dosen" placeholder="Nama Dosan" class="col-sm-6" value="">
              </div>
            </div>

            <div class="form-group">
              <label for="" class="control-label col-sm-4">Jenis Kelamin</label>
              <div class="controls">
                <select class="" name="sex" id="sex">
                  <option value="">--Pilih--</option>
                  <option value="L">Laki-laki</option>
                  <option value="P">Perempuan</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label for="" class="control-label col-sm-4">Tempat Lahir</label>
              <div class="controls">
                <input type="text" name="tempat_lahir" id="tempat_lahir" placeholder="Tempat lahir" class="" value="">
              </div>
            </div>

            <div class="form-group">
              <label for="" class="control-label col-sm-4">Tanggal lahir</label>
              <div class="controls">
                <div class="">
                  <div class="input-group col-sm-3">
                    <input type="text" name="tgl_lahir" id="tgl_lahir" class="form-control date-picker" placeholder="dd-mm-yyyy" data-date-format="dd-mm-yyyy" value="">
                    <span class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="" class="control-label col-sm-4">Alamat</label>
              <div class="controls">
                <input type="text" name="alamat" id="alamat" placeholder="Alamat" class="" value="">
              </div>
            </div>

            <div class="form-group">
              <label for="" class="control-label col-sm-4">No. Telp</label>
              <div class="controls">
                <input type="text" name="hp" id="hp" placeholder="No. Telp" class="" value="">
              </div>
            </div>

            <div class="form-group">
              <label for="" class="control-label col-sm-4">Jenjang Pendidikan</label>
              <div class="controls">
                <select class="" name="pendidikan" id="pendidikan">
                  <option value="">--Pilih--</option>
                  <?php foreach ($jenjang_pendidikan as $dt): ?>

                  <option value="<?php echo $dt;?>"><?php echo $dt; ?></option>
                  <?php endforeach; ?>
                  <!-- <option value="D3">D3</option>
                  <option value="S1">S1</option>
                  <option value="S2">S2</option>
                  <option value="S3">S3</option> -->
                </select>
              </div>
            </div>

            <div class="form-group">
              <label for="" class="control-label col-sm-4">Program Studi</label>
              <div class="controls">
                <input type="text" name="prodi_dosen" id="prodi_dosen" placeholder="Program Studi" class="" value="">
              </div>
            </div>

            <div class="form-group">
              <label for="" class="control-label col-sm-4">Status</label>
              <div class="controls">
                <select class="" name="status_dosen" id="status_dosen">
                  <option value="">--Pilih--</option>
                  <option value="Aktif">Aktif</option>
                  <option value="Keluar">Keluar</option>
                </select>
              </div>
            </div>

          </form>

        </div>
      </div>
      <div class="modal-footer">
				<button class="btn btn-sm btn-danger" data-dismiss="modal">
					<i class="ace-icon fa fa-times"></i>
					Batal
				</button>

        <button class="btn btn-sm btn-info" name="tambah_dosen" id="tambah_dosen">
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
  $(document).ready(function() {
    $('#simpan').click(function(event) {
      var isiform=$('#myForm').serialize();
      /* Act on the event */
      if (!$('#kd_dosen').val() || !$('#kd_prodi').val() ||
          !$('#nidn').val() || !$('#nama_dosen').val() ||
          !$('#sex').val() || !$('#kd_dosen').val()||
          !$('#tempat_lahir').val() || !$('#tgl_lahir').val() ||
          !$('#alamat').val() || !$('#hp').val() ||
          !$('#pendidikan').val() || !$('#prodi_dosen').val() ||
          !$('#status_dosen').val()){
            $.gritter.add({
              title:'Peringatan..!!',
              text:'Field Tidak boleh kosong',
              class_name:'gritter-error'
            });
          $('#nidn').focus();
          return false;
      }else {
        $.ajax({
          url: '<?php echo site_url('dosen/simpan');?>',
          type: 'POST',
          data: isiform,
          cache:false,
          success:function(data){
            swal({
              title:'Info..!!',
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

    function create_kd_dosen() {
      $.ajax({
        url: '<?php echo site_url('dosen/create_kd');?>',
        type: 'GET',
        dataType: 'json',
        success:function(data){
          $('#kd_dosen').val(data.kode);
          $('#kd_dosen').attr('readonly', true);
        }
      });

    }



    $('#tambah').click(function(event) {
      /* Act on the event */
      create_kd_dosen();
      $('#kd_prodi').val('<?php echo $this->session->sess_kd_prodi; ?>');
      $('#nidn').val('');
      $('#nama_dosen').val('');
      $('#sex').val('');
      $('#tempat_lahir').val('');
      $('#tgl_lahir').val('');
      $('#alamat').val('');
      $('#hp').val('');
      $('#pendidikan').val('');
      $('#prodi_dosen').val('');
      $('#status_dosen').val('');
      $('#nidn').focus();
    });

    $('#tambah_dosen').click(function(event) {
      /* Act on the event */
      var isiform=$('#myForm').serialize();
      /* Act on the event */
      if (!$('#kd_dosen').val() || !$('#kd_prodi').val() ||
          !$('#nidn').val() || !$('#nama_dosen').val() ||
          !$('#sex').val() || !$('#kd_dosen').val()||
          !$('#tempat_lahir').val() || !$('#tgl_lahir').val() ||
          !$('#alamat').val() || !$('#hp').val() ||
          !$('#pendidikan').val() || !$('#prodi_dosen').val() ||
          !$('#status_dosen').val()){
            $.gritter.add({
              title:'Peringatan..!!',
              text:'Field Tidak boleh kosong',
              class_name:'gritter-error'
            });
          $('#nidn').focus();
          return false;
      }else {
        $.ajax({
          url: '<?php echo site_url('dosen/simpan');?>',
          type: 'POST',
          data: isiform,
          cache:false,
          success:function(){
            create_kd_dosen();
            $('#kd_prodi').val('<?php echo $this->session->sess_kd_prodi; ?>');
            $('#nidn').val('');
            $('#nama_dosen').val('');
            $('#sex').val('');
            $('#tempat_lahir').val('');
            $('#tgl_lahir').val('');
            $('#alamat').val('');
            $('#hp').val('');
            $('#pendidikan').val('');
            $('#prodi_dosen').val('');
            $('#status_dosen').val('');
            $('#nidn').focus();
          }
        });
      }

    });
  });

  function editData(ID) {
    var id =ID;
    $.ajax({
      url: '<?php echo site_url('dosen/edit')?>',
      type: 'POST',
      data:"id="+id,
      dataType:'json',
      success:function(data){
        $('#kd_dosen').val(data.kd_dosen);
        $('#kd_dosen').attr('readonly', true);
        $('#kd_prodi').val(data.kd_prodi);
        $('#nidn').val(data.nidn);
        $('#nama_dosen').val(data.nama_dosen);
        $('#sex').val(data.sex);
        $('#tempat_lahir').val(data.tempat_lahir);
        $('#tgl_lahir').val(data.tgl_lahir);
        $('#alamat').val(data.alamat);
        $('#hp').val(data.hp);
        $('#pendidikan').val(data.pendidikan);
        $('#prodi_dosen').val(data.prodi_dosen);
        $('#status_dosen').val(data.status_dosen);
        $('#nidn').focus();

      }
    });

  }

  function hapusData(ID) {
    var id=ID;

    swal({
      title:'Anda yakin ingin menghapus..?',
      text:'data tidak dapat dikembalikan',
      buttons:true,
      dangerMode:true,
      icon:'warning',
    }).then((willDelete) =>{
      if (willDelete) {
        $.ajax({
          url: '<?php echo site_url('dosen/hapus')?>',
          type: 'POST',
          data: 'id='+id,
          cache:false,
          success:function(data){
              swal({
                title:'Info.!',
                text:data,
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





</script>

<script type="text/javascript">
  $(document).ready(function() {
    $('.date-picker').datepicker({
      autoclose:true
    }).next().on(ace.click_event,function(){
      $(this).prev().focus();
    });

    var myTable =
    $('#dynamic-table')
    //.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
    .DataTable( {
    bAutoWidth: false,
    responsive:true,
    "aoColumns": [
       // { "bSortable": false },
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

  });
</script>
