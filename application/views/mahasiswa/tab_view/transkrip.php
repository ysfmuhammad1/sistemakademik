<div class="row">
  <div class="col-sm-12">
      <form class="" name="form_ortu" id="form_ortu" action="" method="post">

        <div class="profile-user-info">

          <div class="view_transkrip" id="view_transkrip">
        </div>
        <!-- <input type="hidden" name="nim" value="<?php //echo $nim;?>"> -->

      </form>
  </div>
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function() {
      /* Act on the event */
      // var thak = $("#cari_nilai").val();
  		var nim = $("#nim").val();

  		var string = "nim="+nim;
      $.ajax({
        type	: 'POST',
  			url		: "<?php echo site_url('mahasiswa/cari_transkrip'); ?>",
  			data	: string,
  			cache	: false,
        success:function(data){
          // alert(data);
          $("div.view_transkrip").html(data);
        }
      });


  });
</script>
