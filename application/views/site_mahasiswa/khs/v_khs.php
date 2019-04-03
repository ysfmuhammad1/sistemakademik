<div class="widget-box">
  <div class="widget-header">
      <h4 class="widget-title lighter-smaller"><i class="fa fa-print"> <?php echo "Cetak Data Absen"; ?></i></h4>
  </div>
  <div class="widget-body">
    <div class="widget-main">
      <div class="control-group">
        <form class="form-horizontal" id="form" name="form">
          <div class="form-group">
            <label class="control-label col-sm-2">Tahun Akademik:</label>
            <div class="col-sm-3">
              <select class="form-control" name="th_akademik" id="th_akademik" required>
                <option value="">--Pilih--</option>
                <?php foreach ($data_krs->result() as $rs): ?>
                  <option value="<?php echo $rs->th_akademik?>"><?php echo $rs->th_akademik?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
          <hr>
          <div class="form-group">
            <label class="col-sm-2 control-label">Semester</label>
            <div class="col-sm-1">
              <!-- <select class="form-control" name="smt" id="smt">
                <option value="">--Pilih--</option>

              </select> -->
              <input type="text" class="form-control" readonly name="smt" id="smt" value="">
            </div>
          </div>
          <div class="panel-footer center">
            <!-- <button type="button" class="btn btn-sm btn-danger" name="button"><i class="fa fa-chevron-circle-left bigger-125"></i> Kembali</button> -->
            <!-- <a href="<?php echo site_url('lap_mahasiswa')?>" class="btn btn-sm btn-danger" name=""><i class="fa fa-chevron-circle-left bigger-125"></i> Kembali</a> -->
            <button type="button" class="btn btn-sm btn-success" name="cetak" id="cetak"><i class="fa fa-file-pdf-o bigger-125"></i> Cetak PDF</button>
            <button type="button" class="btn btn-sm btn-info" name="view_data" id="view_data"><i class="fa fa-search-plus bigger-125"></i> Lihat Data</button>
          </div>
        </form>
      </div>
      <?php
        echo  $this->session->flashdata('result_info');
      ?>
      <br>
      <div class="view_detail" id="view_detail"></div>
    </div>
  </div>
  <div class="widget-footer">
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function() {
    $("#th_akademik").change(function(){
      var th_akademik =$("#th_akademik").val();
      var th = $("#th_akademik").val().substr(4,1);

      $.ajax({
        type	: 'POST',
        url		: "<?php echo site_url('site_mahasiswa/krs/cari_smt'); ?>",
        data	: "th_akademik="+th_akademik,
        cache	: false,
        // dataType: "json",
        success	: function(data){
          // $("#semester").val(data.semester);
          $("#smt").val(data);
        }
      });

      /*
      if(th==1){
        $("#smt").val("ganjil");
      }else{
        $("#smt").val("genap");
      }
      */

    });

    $('#view_data').click(function(event) {
      /* Act on the event */
      cari_data();
    });

    $("#cetak").click(function(){

  		var string = $("#form").serialize();

  		//alert(string);

  		if(!$("#th_akademik").val()){
  			$.gritter.add({
  				title: 'Peringatan..!!',
  				text: 'Tahun Akademik tidak boleh kosong',
  				class_name: 'gritter-error'
  			});

  			$("#th_akademik").focus();
  			return false;
  		}


  		if(!$("#smt").val()){
  			$.gritter.add({
  				title: 'Peringatan..!!',
  				text: 'Semester tidak boleh kosong',
  				class_name: 'gritter-error'
  			});

  			$("#smt").focus();
  			return false;
  		}

  		$.ajax({
  			type	: 'POST',
  			url		: "<?php echo site_url('site_mahasiswa/khs/cetak_khs'); ?>",
  			data	: string,
  			cache	: false,
  			success	: function(data){
  				if(data=='Sukses'){
  					window.location.assign("<?php echo site_url('site_mahasiswa/khs/print_khs');?>");
  				}else{
  					$.gritter.add({
  						title: 'Peringatan..!!',
  						text: data,
  						class_name: 'gritter-error'
  					});
  				}
  			}
  		});
  	});

    function cari_data(){
  		var string = $("#form").serialize();

  		if(!$("#th_akademik").val()){
  			$.gritter.add({
  				title: 'Peringatan..!!',
  				text: 'Tahun Akademik tidak boleh kosong',
  				class_name: 'gritter-error'
  			});
  			$("#th_akademik").focus();
  			return false;
  		}

  		if(!$("#smt").val()){
  			$.gritter.add({
  				title: 'Peringatan..!!',
  				text: 'Semester tidak boleh kosong',
  				class_name: 'gritter-error'
  			});
  			$("#smt").focus();
  			return false;
  		}

  		$.ajax({
  			type	: 'POST',
  			url		: "<?php echo site_url('site_mahasiswa/khs/cari_data'); ?>",
  			data	: string,
  			cache	: false,
  			success	: function(data){
  				$("#view_detail").html(data);
  			}
  		});
  	}
  });
</script>
