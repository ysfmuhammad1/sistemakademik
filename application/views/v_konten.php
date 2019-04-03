
<div class="alert alert-block alert-success">
	<button type="button" class="close" data-dismiss="alert">
		<i class="ace-icon fa fa-times"></i>
	</button>

	<i class="ace-icon fa fa-check green"></i>

	Selamat Datang di
	<strong class="green">
		Website <?php echo $this->config->item('nama_aplikasi'); ?>
		<small></small>
	</strong>.<?php echo $this->config->item('nama_instansi'); ?>
</div>

<div class="row">
	<div class="space-6"></div>

	<div class="col-sm-12 infobox-container">
		<div class="infobox infobox-blue">
			<div class="infobox-icon">
				<i class="ace-icon fa fa-user"></i>
			</div>

			<div class="infobox-data">
				<span class="infobox-data-number"><?php echo $jum_admin; ?> Data</span>
				<div class="infobox-content">Pengguna</div>
			</div>
		</div>

		<div class="infobox infobox-red">
			<div class="infobox-icon">
				<i class="ace-icon fa fa-book"></i>
			</div>

			<div class="infobox-data">
				<span class="infobox-data-number"><?php echo $jum_mk; ?> Data</span>
				<div class="infobox-content">Mata Kuliah</div>
			</div>
		</div>

		<div class="infobox infobox-grey">
			<div class="infobox-icon">
				<i class="ace-icon fa fa-users"></i>
			</div>

			<div class="infobox-data">
				<span class="infobox-data-number"><?php echo $jum_dosen; ?> Data</span>
				<div class="infobox-content">Dosen</div>
			</div>
		</div>

		<div class="infobox infobox-purple">
			<div class="infobox-icon">
				<i class="ace-icon fa fa-graduation-cap"></i>
			</div>

			<div class="infobox-data">
				<span class="infobox-data-number"><?php echo $jum_mhs; ?> Data</span>
				<div class="infobox-content">Mahasiswa</div>
			</div>
		</div>

		<div class="infobox infobox-orange2">
			<div class="infobox-icon">
				<i class="ace-icon fa fa-calendar"></i>
			</div>

			<div class="infobox-data">
				<span class="infobox-data-number"><?php echo $jum_jadwal; ?> Data</span>
				<div class="infobox-content">Jadwal</div>
			</div>
		</div>

		<div class="infobox infobox-pink">
			<div class="infobox-icon">
				<i class="ace-icon fa fa-edit"></i>
			</div>

			<div class="infobox-data">
				<span class="infobox-data-number"><?php echo $jum_krs; ?> Data</span>
				<div class="infobox-content">Kartu Rencana Studi</div>
			</div>
		</div>

		<div class="infobox infobox-black">
			<div class="infobox-icon">
				<i class="ace-icon fa fa-exchange"></i>
			</div>

			<div class="infobox-data">
				<span class="infobox-data-number"><?php echo $jum_mutasi_mhs; ?> Data</span>
				<div class="infobox-content">Mutasi Mahasiswa</div>
			</div>
		</div>

		<div class="infobox infobox-green">
			<div class="infobox-icon">
				<i class="ace-icon fa fa-university"></i>
			</div>

			<div class="infobox-data">
				<span class="infobox-data-number"><?php echo $jum_prodi; ?> Data</span>
				<div class="infobox-content">Program Studi</div>
			</div>
		</div>

		<div class="space-6"></div>

	</div>
</div><!-- /.row -->


<script type="text/javascript">
	$(document).ready(function() {
		$('.date-picker').datepicker({
			autoclose:true
		}).next().on(ace.click_event,function(){
			$(this).prev().focus();
		});

		$('#simpan_krs').click(function() {
			/* Act on the event */
			var tgl_krs=$('#isi_krs').val();
			if (!tgl_krs) {
				$.gritter.add({
					title:'Perigantan!',
					text:'Batas Pengisian tidak boleh kosong',
					class_name: 'gritter-error'
				});
				$('#isi_krs').focus();
				return false;
			}
			$.ajax({
				url: '<?php echo site_url();?>home/update_krs',
				type: 'POST',
				data: 'tgl_krs='+tgl_krs,
				cache:false,
				success:function(data) {
					$.gritter.add({
						title:'Sukses!',
						text: data,
						class_name: 'gritter-success'
					});
				}
			});
		});

		$('#simpan_wisuda').click(function() {
			/* Act on the event */
			var tgl_krs=$('#isi_wisuda').val();
			if (!tgl_krs) {
				$.gritter.add({
					title:'Perigantan!',
					text:'Tanggal Pendaftaran tidak boleh kosong',
					class_name: 'gritter-error'
				});
				$('#isi_wisuda').focus();
				return false;
			}
			$.ajax({
				url: '<?php echo site_url();?>home/update_wisuda',
				type: 'POST',
				data: 'tgl_wisuda='+tgl_krs,
				cache:false,
				success:function(data) {
					$.gritter.add({
						title:'Sukses!',
						text: data,
						class_name: 'gritter-success'
					});
				}
			});
		});

	});
</script>
<div class="row-fluid">
	<div class="span12">

		<div class="col-sm-12">
			<div class="widget-box">
				<div class="widget-header">
					<h4 class="widget-title lighter smaller">
						<i class="ace-icon fa fa-info-circle red"></i>
						Perhatian !!! <small>Batas Waktu pengisian</small>
					</h4>
				</div>

				<div class="widget-body">
					<div class="widget-main">

						<div class="row-fluid">

							<form class="form-horizontal" id="my-form" name="my-form">
								<div class="form-group">
									<label class="control-label col-sm-2">Pengisian KRS</label>
									<div class="controls">

									<div class="col-sm-2">
										<div class="input-group">
											<input type="text" name="isi_krs" id="isi_krs" class="form-control date-picker" data-date-format="dd-mm-yyyy" value="<?php echo $tgl_krs;?>">
											<span class="input-group-addon">
												<i class="fa fa-calendar"></i>
											</span>
										</div>
										<br>
										<button type="button" name="simpan_krs" id="simpan_krs" class="btn btn-mini btn-info"><i class="ace-icon fa fa-save bigger-160"></i> Simpan</button>
									</div>
								</div>
									</div>
								</form>
								</div>

								<!-- <div class="row-fluid">
									<form class="form-horizontal" id="my-form" name="my-form">
										<div class="form-group">
											<label class="control-label col-sm-2">Pendaftaran Wisuda</label>
											<div class="controls">

											<div class="col-sm-2">
												<div class="input-group">
													<input type="text" name="isi_wisuda" id="isi_wisuda" class="form-control date-picker" data-date-format="dd-mm-yyyy" value="<?php echo $tgl_wisuda;?>">
													<span class="input-group-addon">
														<i class="fa fa-calendar"></i>
													</span>
												</div>
												<br>
												<button type="button" name="simpan_wisuda" id="simpan_wisuda" class="btn btn-mini btn-info"><i class="ace-icon fa fa-save bigger-160"></i> Simpan</button>
											</div>
										</div>
											</div>
										</form>
										</div> -->

						</div>
					</div><!-- /.widget-main -->
				</div><!-- /.widget-body -->
			</div><!-- /.widget-box -->
		</div><!-- /.col -->
	</div>

	<div class="hr hr25 hr-dotted"></div>

</div>
