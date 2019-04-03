<table  class="table fpTable lcnp table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th class="center" width="10">No</th>
            <th class="center" width="80" >Prodi</th>
            <th class="center" width="90">Kode</th>
            <th class="center" width="80">NIDN</th>
            <th class="center">Nama Dosen</th>
            <th class="center" width="10">L/P</th>
            <th class="center span2">HP</th>
            <th class="center">Pendidikan</th>
            <th class="center span1">Status</th>
        </tr>
    </thead>
    <tbody>
    	<?php
		$i=1;
		foreach($data->result() as $dt){
			$prodi = $this->M_data->nama_prodi($dt->kd_prodi);
		?>
        <tr>
        	<td class="center"><?php echo $i++?></td>
            <td class=""><?php echo $prodi;?></td>
            <td class="center"><?php echo $dt->kd_dosen;?></td>
            <td class="center"><?php echo $dt->nidn;?></td>
            <td ><?php echo $dt->nama_dosen;?></td>
            <td class="center"><?php echo $dt->sex;?></td>
            <td class="center"><?php echo $dt->hp;?></td>
            <td class=""><?php echo $dt->pendidikan.' - '.$dt->prodi_dosen;?></td>
            <td class="center"><?php echo $dt->status_dosen;?></td>
        </tr>
		<?php } ?>
    </tbody>
</table>
