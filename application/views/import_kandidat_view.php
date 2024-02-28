
      <!-- End Navbar -->
      <div class="panel-header panel-header-sm">
      </div>
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Form Import Kandidat</h4>
                <?php
                            if($this->session->flashdata('status')){
                              echo $this->session->flashdata('status');
                            }
                            ?>  
              </div>
              <div class="card-body">
              <form action="<?=base_url('index.php/ImportKandidat/import_excel')?>" method="post" enctype="multipart/form-data">
                            <div class="form-body">
                                  <div class="form-group row">
                                    <label class="col-md-2">Template File Excel Kandidat</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <a href="<?=base_url('uploads/file_upload/template_upload_kandidat.xlsx')?>" class="btn btn-warning">Download Template Tapping Survey</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2">File Excel Kandidat</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                <label for="file-upload" class="custom-file-upload">
                                                    <i class="fa fa-cloud-upload"></i> Upload File Excel
                                                </label>
                                                  <input type="file" name="fileExcel" id="file-upload" class="form-control" placeholder="File Excel"> 
                                                  <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="text-left">
                                    <button type="submit" name="upload" class="btn btn-info" value="1">Submit</button>
                                    <button type="reset" class="btn btn-dark">Reset</button>
                                </div>
                            </div>
                        </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="footer">
        <div class=" container-fluid ">
          <div class="copyright" id="copyright">
            Morena &copy; <script>
              document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
            </script>, Designed by IT Infomedia Malang
          </div>
        </div>
      </footer>
    </div>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="<?=base_url()?>assets/admin/js/plugins/perfect-scrollbar.jquery.min.js"></script>
   <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="<?=base_url()?>assets/admin/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="<?=base_url()?>assets/admin/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?=base_url()?>assets/admin/js/now-ui-dashboard.min.js?v=1.5.0" type="text/javascript"></script>
  <script src="<?=base_url()?>assets/admin/demo/demo.js"></script>

  <script src="<?=base_url()?>assets/datatable/jquery.dataTables.min.js"></script>
  <script src="<?=base_url()?>assets/datatable/dataTables.bootstrap4.min.js"></script>
  <script src="<?php echo base_url('assets/crud/bootstrap-datepicker/js/bootstrap-datepicker.min.js')?>"></script>
  <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>

  <script src="<?=base_url()?>assets/datatable/dataTables.buttons.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script src="<?=base_url()?>assets/datatable/buttons.html5.min.js"></script>
  <script src="<?=base_url()?>assets/datatable/buttons.print.min.js"></script>

  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>
</html>
 
