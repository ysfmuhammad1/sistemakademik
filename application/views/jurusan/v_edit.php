<?php foreach ($data as $rs): ?>

<form class="form-horizontal" method="POST" action="<?php echo base_url();?>jurusan/act_edit">

  <div class="control-group">
    <label class="control-label">Kode Prodi</label>
      <div class="controls">
        <input type="text" name="kd_prodi" id="kd_prodi" class="span1" required="" value="<?php echo $rs->kd_prodi ;?>">
      </div>
  </div>

  <div class="control-group">
    <label class="control-label">Program Studi</label>
      <div class="controls">
        <input type="text" name="prodi" id="prodi" class="span4" required="" value="<?php echo $rs->prodi ;?>">
      </div>
    </div>

  <div class="control-group">
    <label class="control-label">Singkatan</label>
      <div class="controls">
        <input type="text" name="singkat" id="singkat" class="span1" required="" value="<?php echo $rs->singkat ;?>">
      </div>
  </div>

  <div class="control-group">
    <label class="control-label">Ketua Prodi</label>
      <div class="controls">
        <input type="text" name="kaprodi" id="kaprodi" class="span4" required="" value="<?php echo $rs->kaprodi ;?>">
      </div>
  </div>


  <div class="control-group">
    <label class="control-label">NIDN</label>
      <div class="controls">
        <input type="text" name="nidn" id="nidn" class="span3" required="" value="<?php echo $rs->nidn ;?>">
      </div>
  </div>

  <div class="control-group">
    <label class="control-label">Akreditasi</label>
      <div class="controls">
        <select class="span2" name="akreditasi" id="akreditasi" required="">
          <option value="<?php echo $rs->akreditasi ;?>"><?php echo $rs->akreditasi ;?></option>
          <option value="A">A</option>
          <option value="B">B</option>
          <option value="C">C</option>
          <option value="Proses Akreditasi">Proses Akreditasi</option>
        </select>
      </div>
  </div>

  <div class="control-group">
    <div class="controls">
      <input type="submit" name="simpan" value="Simpan" class="btn btn-primary btn-small" style="width:7%;">
      <a href="<?php echo site_url('jurusan')?>" class="btn btn-danger btn-small" style="width:7%;">Batal</a>
    <!--<button type="submit" class="btn btn-primary btn-small" name="simpan">Simpan</button>-->
    </div>
  </div>

</form>
<?php endforeach; ?>
