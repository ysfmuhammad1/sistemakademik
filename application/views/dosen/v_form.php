<div class="widget-box">
  <div class="widget-header">
    <h4 class="widget-title lighter smaller">
      <i class="ace-icon fa fa-users"></i>
      <?php echo $sub_judul; ?>
    </h4>

  </div>

  <div class="widget-body">
    <div class="widget-main">
      <div class="container">

        <form class="" action="<?php echo site_url('dosen/view');?>" method="post">
        <div class="form-group">
          <label for="" class="control-label">Pilih Jurusan</label>
          <div class="control">
            <select class="" name="pilih_prodi">
              <?php foreach ($data as $rs): ?>
              <option value="<?php echo $rs->kd_prodi;?>"><?php echo $rs->prodi;?></option>
            <?php endforeach; ?>
            </select>
          </div>
        </div>
        <div class="form-group">
          <button type="submit" name="lanjut" class="btn btn-sm btn-success">
            Lanjut <i class="ace-icon fa fa-arrow-right icon-on-right bigger-110"></i>
          </button>
        </div>

        </form>
        </div>
      </div>

    </div>
  </div>

</div>
