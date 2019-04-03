								<!-- PAGE CONTENT BEGINS -->
								<div class="row">
									<div class="col-xs-12">
										<div class="table-header">
											<?php echo $sub_judul; ?>
                      <div class="widget-toolbar no-border pull-right">
                        <a href="#modal-table" class="btn btn-small btn-success" role="button" data-toggle="modal" name="tambah" id="tambah">
                          <i class="fa fa-plus-circle bigger-120"></i>
                          Tambah
                        </a>

                      </div>
										</div>

										<!-- div.table-responsive -->

										<!-- div.dataTables_borderWrap -->
										<div id="dynamic-table_wrapper" class="dataTables_wrapper form-inline no-footer">
                      <!-- <table id="dynamic-table" class="table table-striped table-bordered table-hover"> -->
                      <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                        <thead>
                          <tr>
                            <th class="center">No</th>
                            <th class="center">Kode</th>
                            <th class="center">Program Studi</th>
                            <th class="center">Singkat</th>
                            <th class="center">Akreditasi</th>
                            <th class="center">Kaprodi</th>
                            <th class="center">Nip</th>
                            <th class="center">Aksi</th>
                          </tr>

                        </thead>
                        <tbody>
                          <?php
                          $no=1;
                          foreach ($tb_prodi->result() as $rs): ?>
                          <tr>
                            <td class="center span1"><?php echo $no++; ?></td>
                            <td class="center span2"><?php echo $rs->kd_prodi; ?></td>
                            <td class=""><?php echo $rs->prodi; ?></td>
                            <td class="center"><?php echo $rs->singkat; ?></td>
                            <td class="center"><?php echo $rs->akreditasi; ?></td>
                            <td><?php echo $rs->kaprodi; ?></td>
                            <td class="center"><?php echo $rs->nidn; ?></td>
                            <td class="td-actions center">
                              <center>
                                <div class="hidden-phone visible-desktop action-buttons">
                                  <a href="#modal-table" class="green">
                                    <i class="fa fa-pencil bigger-120"></i>
                                  </a>
                                  <a href="" class="red">
                                    <i class="fa fa-trash bigger-120"></i>
                                  </a>
                                </div>
                              </center>
                            </td>
                          </tr>
                        <?php endforeach; ?>
                        </tbody>
                      </table>
										</div>
									</div>
								</div>
                <div id="modal-table" class="modal hide fade" tabindex="-1">

                </div>
								<!-- PAGE CONTENT ENDS -->
    <script type="text/javascript">
      jQuery(function($) {
        //initiate dataTables plugin
        var myTable =
        $('#dynamic-table')
        //.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
        .DataTable( {
          bAutoWidth: false,
          "aoColumns": [
        //    { "bSortable": false },
            null, null,null, null, null, null, null,
            { "bSortable": false }
          ],
          "aaSorting": [],


          //"bProcessing": true,
              //"bServerSide": true,
              //"sAjaxSource": "http://127.0.0.1/table.php"	,

          //,
          //"sScrollY": "200px",
          //"bPaginate": false,

          //"sScrollX": "100%",
          //"sScrollXInner": "120%",
          //"bScrollCollapse": true,
          //Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
          //you may want to wrap the table inside a "div.dataTables_borderWrap" element

          //"iDisplayLength": 50


          select: {
            style: 'multi'
          }
          } );

        /**
        //add horizontal scrollbars to a simple table
        $('#simple-table').css({'width':'2000px', 'max-width': 'none'}).wrap('<div style="width: 1000px;" />').parent().ace_scroll(
          {
          horizontal: true,
          styleClass: 'scroll-top scroll-dark scroll-visible',//show the scrollbars on top(default is bottom)
          size: 2000,
          mouseWheelLock: true
          }
        ).css('padding-top', '12px');
        */


      })
    </script>
