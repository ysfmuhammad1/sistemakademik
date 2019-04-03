<script type="text/javascript">
  $(document).ready(function() {
    $('#simpan_profil').click(function() {
      /* Act on the event */
      var string =$('#form-profil').serialize();
//      var nama_lengkap=$('#nama_lengkap').val();

      if (!$('#nama_lengkap').val()) {
          $.gritter.add({
            title:'Perigantan..!!',
            text:'Nama tidak boleh kosong',
            class_name:'gritter-error'
          });
          $('#nama_lengkap').focus();
          return false;
      }else {
        $.ajax({
          type: 'POST',
          url: '<?php echo site_url('profil/simpan_profil')?>',
          data: string,
          cache:false,
          success:function(data) {
            $.gritter.add({
              title:'Sukses..!',
              text:data,
              class_name:'gritter-success'
            });
          }
        });
      }
    });
  });
</script>
<div class="row-fluid">
  <div class="span12">
    <form id="form-profil" name="form-profil">
      <fieldset>
        <div class="profile-user-info">
          <div class="profile-info-row">
            <div class="profile-info-name">Nama Lengkap</div>
            <div class="profile-info-value">
              <input type="text" name="nama_lengkap" id="nama_lengkap" value="<?php echo $nama_lengkap; ?>">
            </div>
          </div>
        </div>
      </fieldset>
      <div class="form-action center">
        <button type="button" name="simpan_profil" id="simpan_profil" class="btn btn-mini btn-primary"><i class="fa fa-save bigger-120"></i>Simpan</button>
      </div>
    </form>
  </div>
</div>
