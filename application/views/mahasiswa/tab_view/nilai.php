<div class="row">
  <div class="col-sm-12">
      <form class="" name="form_ortu" id="form_ortu" action="" method="post">

        <div class="profile-user-info">

          <div class="profile-info-row">
            <div class="profile-info-name">
              <label for="nama_ayah">Tahun Akademik</label>
            </div>
            <div class="profile-info-value">
              <select class="" name="cari_nilai" id="cari_nilai">
                <option value="">--Pilih--</option>
                <?php foreach ($th_akademik_nilai as $dt): ?>
                  <option value="<?php echo $dt->th_akademik;?>"><?php echo $dt->th_akademik;?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>

        </div>
        <!-- <input type="hidden" name="nim" value="<?php //echo $nim;?>"> -->

      </form>
  </div>
  <div class="">

    <div class="view_nilai" id="view_nilai">
  </div>

  </div>
</div>
<script type="text/javascript">
  $(document).ready(function() {
    $('#cari_nilai').change(function(event) {
      /* Act on the event */
      var thak = $("#cari_nilai").val();
  		var nim = $("#nim").val();

  		var string = "thak="+thak+"&nim="+nim;
      $.ajax({
        type	: 'POST',
  			url		: "<?php echo site_url('mahasiswa/cari_nilai'); ?>",
  			data	: string,
  			cache	: false,
        success:function(data){
          // alert(data);
          $("div.view_nilai").html(data);
        }
      });

    });
  });
</script>
