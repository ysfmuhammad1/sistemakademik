<div class="row">
  <!-- <div class="container"> -->

    <table style="width:95% !important;" class="table fpTable lcnp table-striped table-bordered table-hover">
      <thead>
        <tr>
          <!-- <th class="center" width="10">No</th> -->
          <th class="center col-sm-1">No</th>
          <th class="center col-sm-2">Nim</th>
          <th class="center ">Nama</th>
          <th class="center col-sm-2">Nilai Akhir</th>
          <!-- <th class="center ">Hari</th>
          <th class="center ">Pukul</th>
          <th class="center ">Ruang</th>
          <th class="center ">Aksi</th> -->
        </tr>
      </thead>
      <tbody>
        <?php $i=1;
        foreach ($dataNilai->result() as $dt):
          $nama_mhs=$this->M_mahasiswa->cari_nama_mhs($dt->nim);
          $nilai=$dt->nilai_akhir;
          ?>
          <tr>
            <td class="center"><?php echo $i; ?></td>
            <td class="center"><?php echo $dt->nim;?>
              <input type="hidden" name="nim_<?php echo $i?>" id="nim_<?php echo $i?>" value="<?php echo $dt->nim;?>">
            </td>
            <td class=""><?php echo $nama_mhs; ?></td>
            <td class="center">
                <select class="form-control" name="nilai_<?php echo $i;?>" id="nilai_<?php echo $i;?>">
                  <?php if (empty($nilai)): ?>
                    <option selected="selected" value="">-</option>
                  <?php endif; ?>
                  <?php $data=$this->M_nilai->nilai(); ?>
                  <?php foreach ($data as $r): ?>
                    <?php if ($r==$nilai): ?>
                      <option value="<?php echo $r?>" selected="selected"><?php echo $r?></option>
                      <?php else: ?>
                      <option value="<?php echo $r;?>"><?php echo $r;?></option>
                    <?php endif; ?>
                  <?php endforeach; ?>
                </select>
            </td>
          </tr>
          <?php $i++; ?>
        <?php endforeach; ?>
      </tbody>
      <input type="hidden" name="jml_data" id="jml_data" value="<?php echo $i-1?>">
    </table>
  <!-- </div> -->

</div>
<script type="text/javascript">
  $(document).ready(function() {


  });
  function hapusData(ID) {
  var id= ID;
  swal({
    title:'Perhatian.!',
    buttons:true,
    dangerMode:true,
    text:'Data Tidak dapat dikembalikan',
    icon:'error',
  }).then((willDelete)=>{
    if(willDelete){
      $.ajax({
        url: '<?php echo site_url('krs/hapus');?>',
        type: 'POST',
        // dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
        data: 'id='+id,
        cache:false,
        success:function(data){
            swal({
              title:'Info.!',
              text:data,
              icon:'success',
            }).then((isConfirm)=>{
              if(isConfirm){
                // location.reload();
              }
            });
        }
      });
    }
  });

}
</script>
