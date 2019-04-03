<table style="width:95% !important;" class="table fpTable lcnp table-striped table-bordered table-hover">
  <thead>
    <tr>
      <!-- <th class="center" width="10">No</th> -->
      <th class="center">No</th>
      <th class="center">Mata Kuliah</th>
      <th class="center">SKS</th>
      <th class="center ">SMT</th>
      <th class="center ">Dosen</th>
      <th class="center ">N.Huruf</th>
      <th class="center ">N.Angka</th>
      <th class="center ">N.Total</th>
    </tr>
  </thead>
  <tbody>
    <?php $no=1; $t_sks=0; $t_nilai=0; foreach ($data as $dt ): ?>
      <tr>
        <td class="center"><?php echo $no++; ?></td>
        <td><?php echo $dt['kd_mk'].' - '.$dt['nama_mk']; ?></td>
        <td class="center"><?php echo $dt['sks']; ?></td>
        <td class="center"><?php echo $dt['smt']; ?></td>
        <td><?php echo $dt['nama_dosen']; ?></td>
        <td class="center"><?php echo $dt['nilai_akhir']; ?></td>
        <td class="center"><?php echo $dt['angka']; ?></td>
        <td class="center"><?php echo $dt['nilai']; ?></td>
      </tr>
      <?php
      $t_sks += $dt['sks'];
      $t_nilai += $dt['nilai'];
       ?>
       <?php endforeach; ?>
      <tr>
        <td class="center" colspan="2">Total SKS</td>
        <td class="center"><?php echo $t_sks; ?></td>
        <td class="center" colspan="4"></td>
        <td class="center"><?php echo $t_nilai; ?></td>
      </tr>
  </tbody>
  <tfoot>
    <tr>
      <td class="center" colspan="5">Indeks Prestasi Kumulatif (IPK)</td>
      <td class="center" colspan="4"><b><?php echo $dt['ip']; ?></b></td>
    </tr>
  </tfoot>
</table>
