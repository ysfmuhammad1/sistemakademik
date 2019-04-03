<div class="tabbable">

	<ul id="myTab" class="nav nav-tabs">
		<li class="active">
			<a href="#profil" data-toggle="tab">
				<i class="fa fa-user bigger-120">Profil</i>
			</a>
		</li>
		<li>
			<a href="#foto" data-toggle="tab"><i class="fa fa-camera bigger-120">Foto</i></a>
		</li>
		<li>
			<a href="#password" data-toggle="tab"><i class="fa fa-key bigger-120">Password</i></a>
		</li>
	</ul>

	<div class="tab-content">
		<div class="tab-pane in active" id="profil">
			<?php $this->load->view('profil/form_profil'); ?>
		</div>
		<div class="tab-pane" id="foto">
			<?php $this->load->view('profil/form_foto'); ?>
		</div>
		<div class="tab-pane" id="password">
			<?php $this->load->view('profil/form_pass'); ?>
		</div>
	</div>
<?php echo $this->session->flashdata('result_info'); ?>
</div>
