<table style="width:95% !important;" class="table fpTable lcnp table-striped table-bordered table-hover">
  <thead>
    <tr>
      <!-- <th class="center" width="10">No</th> -->
      <th class="center col-xs-2">Th. Akademik</th>
      <th class="center col-xs-2">NIM</th>
      <th class="center col-xs-4">Nama Mahasiswa</th>
      <th class="center" width="10">L/P</th>
      <th class="center col-xs-3">Program Studi</th>
    </tr>
  </thead>
  <tbody>
    <?php //foreach ($data as $dt): ?>
    <tr>
      <td class="center"><?php echo $data->th_akademik; ?></td>
      <td class="center">
        <a href="<?php echo site_url("mahasiswa/edit/".$data->nim)?>"  class="tooltip-success">
          <?php echo $data->nim; ?></td>
        </a>
      <td class=""><?php echo $data->nama_mhs; ?></td>
      <td class="center"><?php echo $data->sex; ?></td>
      <td class="center"><?php echo $nama_prodi; ?></td>
    </tr>
  <?php //endforeach; ?>
  </tbody>
</table>
<script type="text/javascript">
  $(document).ready(function() {

  });
  function editData(ID) {
  var id= ID;
  $.ajax({
    url: '<?php echo site_url('mahasiswa/edit');?>',
    type: 'POST',
    // dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
    data: 'id='+id,
    cache:false,
    success:function(data){
        alert(data);
    }
  });

}
</script>
