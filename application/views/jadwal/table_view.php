<div class="row">
  <div class="container">

    <table style="width:95% !important;" class="table fpTable lcnp table-striped table-bordered table-hover">
      <thead>
        <tr>
          <!-- <th class="center" width="10">No</th> -->
          <th class="center ">No</th>
          <th class="center ">Hari</th>
          <th class="center ">Pukul</th>
          <th class="center ">Ruangan</th>
          <th class="center ">Mata Kuliah</th>
          <th class="center ">Dosen</th>
          <th class="center ">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php $no=1; foreach ($data->result() as $dt): ?>
          <tr>
            <td class="center"><?php echo $no++; ?></td>
            <td class="center"><?php echo $dt->hari; ?></td>
            <td class=""><?php echo $dt->pukul; ?></td>
            <td class="center"><?php echo $dt->ruang; ?></td>
            <td class="center"><?php echo $dt->kd_mk."-".$dt->nama_mk; ?></td>
            <td class="center"><?php echo $dt->kd_dosen."-".$dt->nama_dosen; ?></td>
            <td class="center">
              <a href="#" onclick="javascript:hapusData('<?php echo $dt->id_jadwal;?>')" class="tooltip-success">
                <i class="fa fa-trash bigger-130 red"></i>
              </a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>

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
        url: '<?php echo site_url('jadwal/hapus');?>',
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
                location.reload();
              }
            });
        }
      });
    }
  });

}
</script>
