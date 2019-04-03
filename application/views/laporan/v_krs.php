<div class="widget-box">
  <div class="widget-header">
      <h4 class="widget-title lighter-smaller"><i class="fa fa-print"> <?php echo "Cetak Data Absen"; ?></i></h4>
  </div>
  <div class="widget-body">
    <div class="widget-main">
      <div class="control-group">
        <form class="form-horizontal" id="form" name="form" method="post" action="<?php echo site_url('lap_absensi/cetak')?>">
          <div class="form-group">
            <label class="control-label col-sm-2">Tahun Akademik:</label>
            <div class="col-sm-3">
              <select class="form-control" name="th_akademik" id="th_akademik" required>
                <option value="">--Pilih--</option>
              </select>
            </div>
          </div>
          <hr>
          <div class="form-group">
            <label class="col-sm-2 control-label">Tahun Angkatan</label>
            <div class="col-sm-3">
              <select class="form-control" name="status" id="status">
                <option value="">--Pilih--</option>

              </select>
            </div>(*Th Akademik masuk mahasiswa
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2">Program Studi:</label>
            <div class="col-sm-3">
              <select class="form-control" name="kd_prodi" id="kd_prodi">
                <option value="">--Pilih--</option>
                <?php foreach ($dataprodi as $rs): ?>
                  <option value="<?php echo $rs->kd_prodi?>"><?php echo $rs->prodi?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
          <div class="panel-footer center">
            <!-- <button type="button" class="btn btn-sm btn-danger" name="button"><i class="fa fa-chevron-circle-left bigger-125"></i> Kembali</button> -->
            <!-- <a href="<?php echo site_url('lap_mahasiswa')?>" class="btn btn-sm btn-danger" name=""><i class="fa fa-chevron-circle-left bigger-125"></i> Kembali</a> -->
            <button type="submit" class="btn btn-sm btn-success" name="cetak" id="cetak"><i class="fa fa-file-pdf-o bigger-125"></i> Cetak PDF</button>
            <button type="button" class="btn btn-sm btn-info" name="view_data" id="view_data"><i class="fa fa-search-plus bigger-125"></i> Lihat Data</button>
          </div>
        </form>
      </div>
      <br>
      <div class="view_detail" id="view_detail"></div>
    </div>
  </div>
  <div class="widget-footer">
  </div>
</div>
