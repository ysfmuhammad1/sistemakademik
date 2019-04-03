<!--PAGE CONTENT BEGINS-->
<p>
  <a href="<?php echo site_url('jurusan/tambah');?>" class="btn btn-primary btn-small">Tambah Data</a>
</p>
<div class="row-fluid">
  <table id="sample-table-2" class="table table-striped table-bordered table-hover">
    <thead>
      <tr>
        <th>No</th>
        <th>Kode</th>
        <th>Jurusan</th>
        <th>Singkatan</th>
        <th>Ketua Prodi</th>
        <th>NIDN</th>
        <th>Akreditasi</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
  <?php
      $no=1;
      foreach ($data->result() as $rs): ?>
      <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $rs->kd_prodi; ?></td>
        <td><?php echo $rs->prodi; ?></td>
        <td><?php echo $rs->singkat; ?></td>
        <td><?php echo $rs->kaprodi; ?></td>
        <td><?php echo $rs->nidn; ?></td>
        <td><?php echo $rs->akreditasi; ?></td>
        <td>
          <a href="<?php echo site_url();?>jurusan/hapus/<?php echo $rs->kd_prodi;?>" onclick="return confirm('Yakin Ingin Menghapus data');"><i class="">Hapus</i></a>
          <a href="<?php echo site_url();?>jurusan/edit/<?php echo $rs->kd_prodi;?>">Edit</a>
        </td>
      </tr>
    <?php
  //    $no++;
      endforeach;
      ?>
    </tbody>
  </table>
</div>

<!--PAGE CONTENT ENDS-->


<!--page specific plugin scripts-->

<script src="<?php echo base_url();?>assets/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery.dataTables.bootstrap.js"></script>

<script type="text/javascript">
	$(function() {
		var oTable1 = $('#sample-table-2').dataTable( {
		"aoColumns": [
	     // { "bSortable": false },
	      null, null,null, null, null,null,null,
		  { "bSortable": false }
		] } );
	})
</script>
