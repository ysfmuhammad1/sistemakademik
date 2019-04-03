<div class="alert alert-block alert-warning">
<blockquote>
	<strong>Informasi !!!</strong>
    <p>Perhatian. Pengisian <strong>KRS</strong> akan <strong>TUTUP</strong>. Pada hari <strong><?php echo hari_ini(date('w')).", ".tgl_indo($tgl_close);?></strong>.</p>

    <small>
        Bagian Akademik.
    </small>
</blockquote>
</div>
<div class="widget-box">
  <div class="widget-header">
      <h4 class="widget-title lighter-smaller"><i class="fa fa-print"> <?php echo "Isi KRS"; ?></i></h4>
  </div>
  <div class="widget-body">
    <div class="widget-main">
      <div class="control-group">
        <form class="form-horizontal" id="form" name="form" >
          <div class="form-group">
            <label class="control-label col-sm-2">Tahun Akademik:</label>
            <div class="col-sm-3">
              <input type="text" class="form-control" readonly name="th_akademik" id="th_akademik" value="<?php echo $th_akademik;?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Semester</label>
            <div class="col-sm-1">
              <!-- <select class="form-control" name="smt" id="smt">
                <option value="">--Pilih--</option>

              </select> -->
              <input type="text" class="form-control" readonly name="smt" id="smt" value="<?php echo $smt?>">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2">IPK smt lalu:</label>
            <div class="col-xs-1" >
              <input type="text"  class="form-control" readonly name="ipk_lalu" id="ipk_lalu" value="<?php echo $ipk_lalu?>">
            </div>
            <label class="control-label col-xs-1" >Max:</label>
            <tr>
              <td>
                <div class="col-xs-1">
                    <input type="text" class="form-control" readonly name="maxsks" id="maxsks" value="<?php echo $max_sks?>">
                </div>
              </td>
              <td><label class="control-label">SKS</label> </td>
            </tr>


            <!-- <label class="control-label col-xs-1">SKS</label> -->
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2">NIM:</label>
            <div class="col-sm-2">
              <input type="text" class="form-control" readonly name="nim" id="nim" value="<?php echo $nim?>">
            </div>
            <div class="col-sm-4">
              <input type="text" readonly class="form-control" name="nama_mhs" id="nama_mhs" value="<?php echo $nama_mhs?>">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2">Program Studi:</label>
            <div class="col-sm-2">
              <input type="text" class="form-control" readonly name="kd_prodi" id="kd_prodi" value="<?php echo $kd_prodi?>">
            </div>
            <div class="col-sm-3">
              <input type="text" class="form-control" readonly name="prodi" id="prodi" value="<?php echo $prodi?>">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2">Mata Kuliah:</label>
            <div class="col-sm-9">
              <select class="form-control" name="id_jadwal" id="id_jadwal">
                <option value="">--Pilih--</option>
              </select>
            </div>
          </div>
          <div class="panel-footer center">
            <!-- <button type="button" class="btn btn-sm btn-danger" name="button"><i class="fa fa-chevron-circle-left bigger-125"></i> Kembali</button> -->
            <!-- <a href="<?php echo site_url('lap_mahasiswa')?>" class="btn btn-sm btn-danger" name=""><i class="fa fa-chevron-circle-left bigger-125"></i> Kembali</a> -->
						<button type="button" class="btn btn-sm btn-info" name="simpan_mk" id="simpan_mk"><i class="fa fa-edit bigger-125"></i> Ambil Matakuliah</button>
            <!-- <button type="button" class="btn btn-sm btn-success" name="cetak" id="cetak"><i class="fa fa-download bigger-125"></i> Download KRS</button> -->
          </div>
        </form>
      </div>
      <br>
      <div class="view_detail" id="view_detail"></div>
    </div>
  </div>
  <div class="widget-footer">
  </div>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		cari_mata_kuliah();
		cari_data();

		$("#simpan_mk").click(function(){
			var string = $("form").serialize();


			if(!$("#id_jadwal").val()){
				$.gritter.add({
					title: 'Peringatan..!!',
					text: 'Mata Kuliah tidak boleh kosong',
					class_name: 'gritter-error'
				});

				$("#id_jadwal").focus();
				return false();
			}

			//alert(string);

			$.ajax({
					type	: 'POST',
					url		: "<?php echo site_url('site_mahasiswa/isi_krs/simpan'); ?>",
					data	: string,
					cache	: false,
					success	: function(data){
						$.gritter.add({
							title: 'Info..!!',
							text: data,
							class_name: 'gritter-info'
						});
						// alert(data);
						cari_data();
					}
				});

		});

		function cari_mata_kuliah(){
			var th_ak = $("#th_akademik").val();
			var kd_prodi = $("#kd_prodi").val();
			// var smt = $("#semester").val();

			//alert(th_ak.'-'.kd_prodi.'-'.smt);
			var string = $("#form").serialize();
			//alert(string);

			$.ajax({
				type	: 'POST',
				url		: "<?php echo site_url('site_mahasiswa/isi_krs/cari_mata_kuliah'); ?>",
				data	: string, //"kd_prodi="+kd_prodi+"&smt="+smt+"&th_ak="+th_ak,
				cache	: false,
				success	: function(data){
					$("#id_jadwal").html(data);
				}
			});
		}

		function cari_data(){
			var th_ak = $("#th_akademik").val();
			var kd_prodi = $("#kd_prodi").val();
			// var smt = $("#semester").val();

			//alert(th_ak.'-'.kd_prodi.'-'.smt);
			var string = $("#form").serialize();
			//alert(string);

			$.ajax({
				type	: 'POST',
				url		: "<?php echo site_url('site_mahasiswa/isi_krs/cari_data'); ?>",
				data	: string, //"kd_prodi="+kd_prodi+"&smt="+smt+"&th_ak="+th_ak,
				cache	: false,
				success	: function(data){
					$("#view_detail").html(data);
				}
			});
		}

	});
</script>
