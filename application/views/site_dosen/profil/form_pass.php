<script type="text/javascript">
  $(document).ready(function() {
    $('#simpan_pass').click(function(event) {
      /* Act on the event */
      var isiform =$('#form-pass').serialize();
      if ((!$('#old_pass').val()) || !$('#pass1').val() || !$('#pass2').val()) {
        $.gritter.add({
          title:'Peringatan',
          text:'Field Tidak boleh kosong',
          class_name:'gritter-error'
        });
        $('#old_pass').focus();
        return false;
      }
      if ($('#pass1').val() != $('#pass2').val()) {
        $.gritter.add({
          title:'Peringatan..!!!',
          text:'Password tidak sesuai',
          class_name:'gritter-error'
        });
        $('#pass1').focus();
        return false;
      }else {

        $.ajax({
          url: '<?php echo site_url('site_dosen/profil/simpan_pass');?>',
          type: 'POST',
          data: isiform,
          cache:false,
          success:function(data){
            $.gritter.add({
              title:'Info',
              text:data,
              class_name:'gritter-info'
            });
          }
        });
      }


    });
  });
</script>
<div class="row-fluid">
  <div class="span12">
    <form id="form-pass" name="form-pass">
      <fieldset>
        <div class="profile-user-info">
          <div class="profile-info-row">
            <div class="profile-info-name">Password Lama</div>
            <div class="profile-info-value">
              <input class="col-sm-5" type="password" name="old_pass" id="old_pass" value="">
            </div>
          </div>
          <div class="profile-info-row">
            <div class="profile-info-name">Password Baru</div>
            <div class="profile-info-value">
              <input class="col-sm-5" type="password" name="pass1" id="pass1" value="">
            </div>
          </div>
          <div class="profile-info-row">
            <div class="profile-info-name">Konfirmasi Password</div>
            <div class="profile-info-value">
              <input class="col-sm-5" type="password" name="pass2" id="pass2" value="">
            </div>
          </div>
        </div>
      </fieldset>
      <div class="form-action center">
        <button type="button" name="simpan_pass" id="simpan_pass" class="btn btn-mini btn-primary"><i class="fa fa-save bigger-120"></i>Simpan</button>
      </div>
    </form>
  </div>
</div>
