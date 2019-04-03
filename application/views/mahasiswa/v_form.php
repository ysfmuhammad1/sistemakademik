<div class="widget-box">
  <div class="widget-header">
    <h4 class="widget-title lighter-smaller">
      <i class="fa fa-graduation-cap"></i>
      Mahasiswa</h4>
  </div>
  <div class="widget-body">
    <div class="widget-main">
      <div class="container">
        <form class="" action="<?php echo site_url('mahasiswa/view');?>" method="post">
          <div class="form-group">
            <label for="" class="control-label">Pilih Jurusan</label>
            <div class="control">
              <select class="" name="pilih_prodi">
                <?php foreach ($data as $rs): ?>
                <option value="<?php echo $rs->kd_prodi;?>"><?php echo $rs->prodi ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <button type="submit" name="lanjut" class="btn btn-success btn-sm">
              Lanjut <i class="ace-icon fa fa-arrow-right icon-on-right bigger-110"></i>
            </button>
          </div>
        </form>
        <div class="row">
          <div class="col-xs-3">
            <label for="cari_nim">Pencarian Mahasiswa</label>
            <select class="chosen-select form-control" data-placeholder="Cari Nim..." name="cari_nim" id="cari_nim">
              <option value="">Cari NIM..</option>

              <?php foreach ($all_mhs->result() as $rs): ?>
              <option value="<?php echo $rs->nim;?>"><?php echo $rs->nim;?></option>
              <?php endforeach; ?>

            </select>
          </div>
        </div>
        <div class="">

          <div class="info_mhs"></div>
        </div>
      </div>

    </div>
  </div>
</div>
<script type="text/javascript">
  jQuery(function($) {
    $('.chosen-select').chosen();

    $('#cari_nim').change(function() {
      /* Act on the event */
      var nim=$('#cari_nim').val();
      // alert(nim);
      $.ajax({
  			type	: 'POST',
        url		: "<?php echo site_url(); ?>/mahasiswa/cari/",
  			data	: "nim="+nim,
  			cache	: false,
  			success	: function(data){
  				$("div.info_mhs").html(data);
          // alert(data);
  			}
  		});

    });
  });
</script>
