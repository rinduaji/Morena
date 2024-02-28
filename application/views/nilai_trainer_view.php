
      <!-- End Navbar -->
      <div class="panel-header panel-header-sm">
      </div>
      <div class="content">
        <div class="row">
          <div class="col-md-12">
          <form id="form" action="<?=site_url('NilaiTrainer/ajax_add')?>" method="post" enctype="multipart/form-data">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Data Penilaian Trainer</h4>
                <?php
                            if($this->session->flashdata('status')){
                              echo $this->session->flashdata('status');
                            }
                            ?>  
              </div>
              <div class="card-body">
                <input type="hidden" name="upd" class="form-control" value="<?=$this->session->userdata('username')?>" readonly> 
                            <div class="form-body">
                                  <div class="form-group row">
                                    <label class="col-md-2">Nama Kandidat Trainer</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                <select name="id_trainer" id="id_trainer" class="form-control">
                                                    <option value="">--Select Nama Kandidat Trainer--</option>
                                                    <?php
                                                    foreach($trainer->result() as $value){
                                                    ?>
                                                        <option value="<?=$value->id;?>"><?php echo $value->nama;?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2">Batch</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                  <input type="text" name="batch" class="form-control" placeholder="Batch" readonly> 
                                                  <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2">Tanggal mulai Batch</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                  <input type="text" name="tgl_mulai_batch" class="form-control" placeholder="Tanggal Mulai Batch" readonly> 
                                                  <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2">Tanggal Akhir Batch</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" name="tgl_akhir_batch" class="form-control" placeholder="Tanggal Akhir Batch" readonly> 
                                                  <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
              </div>
            </div>
            <div class="card">
              <?php
              $angka = 0;
                foreach($kategori_nilai_trainer->result() as $value){
              ?>
              <div class="card-header">
                <h6 class="card-title"><?php echo $value->kategori_trainer;?></h6>
                <?php
                            if($this->session->flashdata('status')){
                              echo $this->session->flashdata('status');
                            }
                            ?>  
              </div>
              <div class="card-body">
                              <div class="form-body">
                                <?php
                                  $no = 1;
                                  foreach($item_nilai_trainer->result() as $value1){
                                    if($value1->id_kategori_trainer == $value->id) {
                                ?>
                                    <div class="form-group row">
                                      <label class="col-md-6"><?=$no?>. <?=$value1->item?></label>
                                      <input type="hidden" name="id_item[<?=$angka?>]" id="id_item[<?=$angka?>]" class="form-control" value="<?=$value1->id_item_trainer?>" readonly> 
                                      <div class="col-md-6">
                                          <div class="row">
                                              <div class="col-md-12">
                                                  <div class="form-group">
                                                    <?php if($value1->item == "Kehadiran dan Active Participant") {
                                                        if($value1->id_kategori_trainer == '1' OR $value1->id_kategori_trainer == '2') { ?>
                                                            <label class="col-md-12"><?=$value->kategori_trainer.' Day 1'?></label>
                                                            <select name="nilai_huruf[<?=$angka?>][0]" id="nilai_huruf[<?=$angka?>][0]" class="form-control">
                                                                <option value="">--Select Absensi--</option>
                                                                <option value="Hadir">Hadir</option>
                                                                <option value="Tidak Hadir">Tidak Hadir</option>
                                                            </select>
                                                            <label class="col-md-12"><?=$value->kategori_trainer.' Day 2'?></label>
                                                            <select name="nilai_huruf[<?=$angka?>][1]" id="nilai_huruf[<?=$angka?>][1]" class="form-control">
                                                                <option value="">--Select Absensi--</option>
                                                                <option value="Hadir">Hadir</option>
                                                                <option value="Tidak Hadir">Tidak Hadir</option>
                                                            </select>
                                                        <?php
                                                        }
                                                        else { 
                                                        ?>
                                                            <label class="col-md-12"><?=$value->kategori_trainer.' Day 1'?></label>
                                                            <select name="nilai_huruf[<?=$angka?>]" id="nilai_huruf[<?=$angka?>]" class="form-control">
                                                                <option value="">--Select Absensi--</option>
                                                                <option value="Hadir">Hadir</option>
                                                                <option value="Tidak Hadir">Tidak Hadir</option>
                                                            </select>
                                                        <?php }
                                                    } else { ?>
                                                    <input type="text" name="nilai_huruf[<?=$angka?>]" id="nilai_huruf[<?=$angka?>]" class="form-control" placeholder="Masukkan Nilai">
                                                    <?php } ?>
                                                    <input type="hidden" name="bobot[<?=$angka?>]" id="bobot[<?=$angka?>]" class="form-control" value="<?=$value1->bobot?>" readonly>
                                                    <input type="hidden" name="hasil_nilai_huruf[<?=$angka?>]" id="hasil_nilai_huruf[<?=$angka?>]" class="form-control" placeholder="Nilai Item" value="0" readonly>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                    </div>
                                <?php
                                      $no++;
                                      $angka++;
                                    }
                                  }
                                ?>
                              </div>
              </div>
              <?php
                }
              ?>
              <input type="hidden" name="angka" id="angka" class="form-control" value="<?=$angka?>" readonly>
              <center><input type="button" value="Selesai" onclick="total_nilai_trainer()" class="btn btn-primary"></center>
              <br><br><br>                               
            </div>
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Data Kandidat Penilaian Trainer</h4>
                <?php
                            if($this->session->flashdata('status')){
                              echo $this->session->flashdata('status');
                            }
                            ?>  
              </div>
              <div class="card-body">
                <input type="hidden" name="id_status_interview_hr" class="form-control" /> 
                            <div class="form-body">
                                <div class="form-group row">
                                    <label class="col-md-2">Nilai Akhir</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                  <input type="text" name="nilai" id="nilai" class="form-control" placeholder="Nilai Akhir" readonly> 
                                                  <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2">Status Nilai</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                  <input type="text" name="status_nilai" id="status_nilai" class="form-control" placeholder="Status Nilai" readonly> 
                                                  <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2">Masuk Ke Agent Existing</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                <select name="masuk_existing" id="masuk_existing" class="form-control">
                                                    <option value="">--Select Masuk Ke Agent Existing--</option>
                                                    <option value="Ya">Ya</option>
                                                    <option value="Tidak">Tidak</option>
                                                </select>
                                                <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <center><input type="submit" value="Simpan" class="btn btn-primary"></center>
                                <br><br><br>                               
                            </div>
                          </div>
                        </div>
                       </div>
                    </form>
          </div>
          <div class="card">
              <div class="card-header">
                <h4 class="card-title">Note :</h4>
              </div>
              <div class="card-body">
                <p>* Sangat Baik (Nilai : 90 - 100)</p>
                <p>* Baik (Baik : 80 - 89)</p>
                <p>* Kurang Baik (Cukup : 70 - 79)</p>
                <p>* Tidak Baik (Kurang : 0 - 69)</p>
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
  
  <script type="text/javascript">
 
  var save_method; //for save method string
  var table;
  var base_url = '<?php echo base_url();?>';
  var total_nilai = [];

  function total_nilai_trainer() {
      var sum = 0;
      var hasil_akhir_trainer;

      total_nilai[0] = document.getElementById("hasil_nilai_huruf[0]").value;
      total_nilai[1] = document.getElementById("hasil_nilai_huruf[1]").value;
      total_nilai[2] = document.getElementById("hasil_nilai_huruf[2]").value;
      total_nilai[3] = document.getElementById("hasil_nilai_huruf[3]").value;
      total_nilai[4] = document.getElementById("hasil_nilai_huruf[4]").value;
      total_nilai[5] = document.getElementById("hasil_nilai_huruf[5]").value;
      total_nilai[6] = document.getElementById("hasil_nilai_huruf[6]").value;
      total_nilai[7] = document.getElementById("hasil_nilai_huruf[7]").value;
      total_nilai[8] = document.getElementById("hasil_nilai_huruf[8]").value;
      total_nilai[9] = document.getElementById("hasil_nilai_huruf[9]").value;
      total_nilai[10] = document.getElementById("hasil_nilai_huruf[10]").value;
      total_nilai[11] = document.getElementById("hasil_nilai_huruf[11]").value;
      total_nilai[12] = document.getElementById("hasil_nilai_huruf[12]").value;
      total_nilai[13] = document.getElementById("hasil_nilai_huruf[13]").value;

      for (var i = 0; i < total_nilai.length; i++) {
          if(total_nilai[i] == undefined){
            total_nilai[i] = 0;
          }
          sum += parseFloat(total_nilai[i]);
      }
      
      if(sum >= 90) {
        hasil_akhir_trainer = 'Sangat Baik';
      }
      else if(sum < 90 && sum >= 80) {
        hasil_akhir_trainer = 'Baik';
      }
      else if(sum < 80 && sum >= 70) {
        hasil_akhir_trainer = 'Kurang Baik';
      }
      else if(sum < 70) {
        hasil_akhir_trainer = 'Tidak Baik';
      }

      document.getElementById("nilai").value = parseFloat(sum);
      document.getElementById("status_nilai").value = hasil_akhir_trainer;
    }

  $(document).ready(function() {


      $('select[name="id_trainer"]').on('change', function() {
        edit_nilai_trainer(this.value);
      }); 

      function edit_nilai_trainer(id)
    {
        save_method = 'update';
        // $('#form')[0].reset(); // reset form on modals
        // $('.form-group').removeClass('has-error'); // clear error class
        // $('.help-block').empty(); // clear error string
        // alert(id);
    
        //Ajax Load data from ajax
        $.ajax({
            url : "<?php echo site_url('NilaiTrainer/ajax_edit')?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {
                $('[name="batch"]').val(data[0]['nama_batch']);
                $('[name="tgl_mulai_batch"]').val(data[0]['tgl_mulai_batch']);
                $('[name="tgl_akhir_batch"]').val(data[0]['tgl_akhir_batch']);

                $('[name="nilai_huruf[0]"]').val(data[0]['jawaban']);
                $('[name="hasil_nilai_huruf[0]"]').val(data[0]['nilai']);

                $('[name="nilai_huruf[1]"]').val(data[1]['jawaban']);
                $('[name="hasil_nilai_huruf[1]"]').val(data[1]['nilai']);

                $('[name="nilai_huruf[2][0]"]').val(data[2]['absen1']);
                $('[name="nilai_huruf[2][1]"]').val(data[2]['absen2']);
                $('[name="hasil_nilai_huruf[2]"]').val(data[2]['nilai']);

                $('[name="nilai_huruf[3]"]').val(data[3]['jawaban']);
                $('[name="hasil_nilai_huruf[3]"]').val(data[3]['nilai']);

                $('[name="nilai_huruf[4]"]').val(data[4]['jawaban']);
                $('[name="hasil_nilai_huruf[4]"]').val(data[4]['nilai']);
                
                $('[name="nilai_huruf[5][0]"]').val(data[5]['absen1']);
                $('[name="nilai_huruf[5][1]"]').val(data[5]['absen2']);
                $('[name="hasil_nilai_huruf[5]"]').val(data[5]['nilai']);

                $('[name="nilai_huruf[6]"]').val(data[6]['jawaban']);
                $('[name="hasil_nilai_huruf[6]"]').val(data[6]['nilai']);

                $('[name="nilai_huruf[7]"]').val(data[7]['jawaban']);
                $('[name="hasil_nilai_huruf[7]"]').val(data[7]['nilai']);

                $('[name="nilai_huruf[8]"]').val(data[8]['absen1']);
                $('[name="hasil_nilai_huruf[8]"]').val(data[8]['nilai']);

                $('[name="nilai_huruf[9]"]').val(data[9]['jawaban']);
                $('[name="hasil_nilai_huruf[9]"]').val(data[9]['nilai']);

                $('[name="nilai_huruf[10]"]').val(data[10]['jawaban']);
                $('[name="hasil_nilai_huruf[10]"]').val(data[10]['nilai']);
                
                $('[name="nilai_huruf[11]"]').val(data[11]['absen1']);
                $('[name="hasil_nilai_huruf[11]"]').val(data[11]['nilai']);

                $('[name="nilai_huruf[12]"]').val(data[12]['jawaban']);
                $('[name="hasil_nilai_huruf[12]"]').val(data[12]['nilai']);
                
                $('[name="nilai_huruf[13]"]').val(data[13]['jawaban']);
                $('[name="hasil_nilai_huruf[13]"]').val(data[13]['nilai']);

                $('[name="nilai"]').val(data[0]['total_all']);
                $('[name="status_nilai"]').val(data[0]['status_total_all']);
                console.log(data);
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }
        });
    }

    function save()
    {
        var url;
        
        url = "<?php echo site_url('NilaiTrainer/ajax_add')?>";
    
        // ajax adding data to database
    
        var formData = new FormData($('#form')[0]);
        $.ajax({
            url : url,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            dataType: "JSON",
            success: function(data)
            {
                if(data.status) //if success close modal and reload ajax table
                {
                  Swal.fire(
                      'Success',
                      'Data Sudah Tersimpan',
                      'success'
                  )
                }
    
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error Simpan data');
    
            }
        });
    }  

      $('input[name="nilai_huruf[0]"]').on('keyup', function() {
        var nilai = this.value * (document.getElementById("bobot[0]").value / 100);
        document.getElementById("hasil_nilai_huruf[0]").value = nilai;
        total_nilai[0] = nilai;
      });

      $('input[name="nilai_huruf[1]"]').on('keyup', function() {
        var nilai = this.value * (document.getElementById("bobot[1]").value / 100);
        document.getElementById("hasil_nilai_huruf[1]").value = nilai;
        total_nilai[1] = nilai;
      });

      $('select[name="nilai_huruf[2][0]"]').on('change', function() {
        var status1 = document.getElementById("nilai_huruf[2][0]").value;
        var status2 = document.getElementById("nilai_huruf[2][1]").value;
        var nilai = 0;

        if((status1 == 'Hadir') && (status2 == 'Hadir')) {
            nilai = 100 * (document.getElementById("bobot[2]").value / 100);
        }
        else if(status1 == 'Hadir' && (status2 == 'Tidak Hadir' || status2 == '')){
            nilai = 50 * (document.getElementById("bobot[2]").value / 100);
        }
        else if(status2 == 'Hadir' && (status1 == 'Tidak Hadir' || status1 == '')){
            nilai = 50 * (document.getElementById("bobot[2]").value / 100);
        }
        else{
            nilai = 0 * (document.getElementById("bobot[2]").value / 100);
        }
        document.getElementById("hasil_nilai_huruf[2]").value = nilai;
        total_nilai[2] = nilai;
      });

      $('select[name="nilai_huruf[2][1]"]').on('change', function() {
        var status1 = document.getElementById("nilai_huruf[2][0]").value;
        var status2 = document.getElementById("nilai_huruf[2][1]").value;
        var nilai = 0;

        if((status1 == 'Hadir') && (status2 == 'Hadir')) {
            nilai = 100 * (document.getElementById("bobot[2]").value / 100);
        }
        else if(status1 == 'Hadir' && (status2 == 'Tidak Hadir' || status2 == '')){
            nilai = 50 * (document.getElementById("bobot[2]").value / 100);
        }
        else if(status2 == 'Hadir' && (status1 == 'Tidak Hadir' || status1 == '')){
            nilai = 50 * (document.getElementById("bobot[2]").value / 100);
        }
        else{
            nilai = 0 * (document.getElementById("bobot[2]").value / 100);
        }
        document.getElementById("hasil_nilai_huruf[2]").value = nilai;
        total_nilai[2] = nilai;
      });

      $('input[name="nilai_huruf[3]"]').on('keyup', function() {
        var nilai = this.value * (document.getElementById("bobot[3]").value / 100);
        document.getElementById("hasil_nilai_huruf[3]").value = nilai;
        total_nilai[3] = nilai;
      });

      $('input[name="nilai_huruf[4]"]').on('keyup', function() {
        var nilai = this.value * (document.getElementById("bobot[4]").value / 100);
        document.getElementById("hasil_nilai_huruf[4]").value = nilai;
        total_nilai[4] = nilai;
      });

      $('select[name="nilai_huruf[5][0]"]').on('change', function() {
        var status1 = document.getElementById("nilai_huruf[5][0]").value;
        var status2 = document.getElementById("nilai_huruf[5][1]").value;
        var nilai = 0;

        if((status1 == 'Hadir') && (status2 == 'Hadir')) {
            nilai = 100 * (document.getElementById("bobot[5]").value / 100);
        }
        else if(status1 == 'Hadir' && (status2 == 'Tidak Hadir' || status2 == '')){
            nilai = 50 * (document.getElementById("bobot[5]").value / 100);
        }
        else if(status2 == 'Hadir' && (status1 == 'Tidak Hadir' || status1 == '')){
            nilai = 50 * (document.getElementById("bobot[5]").value / 100);
        }
        else{
            nilai = 0 * (document.getElementById("bobot[5]").value / 100);
        }
        document.getElementById("hasil_nilai_huruf[5]").value = nilai;
        total_nilai[5] = nilai;
      });

      $('select[name="nilai_huruf[5][1]"]').on('change', function() {
        var status1 = document.getElementById("nilai_huruf[5][0]").value;
        var status2 = document.getElementById("nilai_huruf[5][1]").value;
        var nilai = 0;

        if((status1 == 'Hadir') && (status2 == 'Hadir')) {
            nilai = 100 * (document.getElementById("bobot[5]").value / 100);
        }
        else if(status1 == 'Hadir' && (status2 == 'Tidak Hadir' || status2 == '')){
            nilai = 50 * (document.getElementById("bobot[5]").value / 100);
        }
        else if(status2 == 'Hadir' && (status1 == 'Tidak Hadir' || status1 == '')){
            nilai = 50 * (document.getElementById("bobot[5]").value / 100);
        }
        else{
            nilai = 0 * (document.getElementById("bobot[5]").value / 100);
        }
        document.getElementById("hasil_nilai_huruf[5]").value = nilai;
        total_nilai[5] = nilai;
      });

      $('input[name="nilai_huruf[6]"]').on('keyup', function() {
        var nilai = this.value * (document.getElementById("bobot[6]").value / 100);
        document.getElementById("hasil_nilai_huruf[6]").value = nilai;
        total_nilai[6] = nilai;
      });

      $('input[name="nilai_huruf[7]"]').on('keyup', function() {
        var nilai = this.value * (document.getElementById("bobot[7]").value / 100);
        document.getElementById("hasil_nilai_huruf[7]").value = nilai;
        total_nilai[7] = nilai;
      });

      $('select[name="nilai_huruf[8]"]').on('change', function() {
        var status1 = document.getElementById("nilai_huruf[8]").value;
        var nilai = 0;

        if((status1 == 'Hadir')) {
            nilai = 100 * (document.getElementById("bobot[8]").value / 100);
        }
        else{
            nilai = 0 * (document.getElementById("bobot[8]").value / 100);
        }
        document.getElementById("hasil_nilai_huruf[8]").value = nilai;
        total_nilai[8] = nilai;
      });

      $('input[name="nilai_huruf[9]"]').on('keyup', function() {
        var nilai = this.value * (document.getElementById("bobot[9]").value / 100);
        document.getElementById("hasil_nilai_huruf[9]").value = nilai;
        total_nilai[9] = nilai;
      });

      $('input[name="nilai_huruf[10]"]').on('keyup', function() {
        var nilai = this.value * (document.getElementById("bobot[10]").value / 100);
        document.getElementById("hasil_nilai_huruf[10]").value = nilai;
        total_nilai[10] = nilai ;
      });

      $('select[name="nilai_huruf[11]"]').on('change', function() {
        var status1 = document.getElementById("nilai_huruf[11]").value;
        var nilai = 0;

        if((status1 == 'Hadir')) {
            nilai = 100 * (document.getElementById("bobot[11]").value / 100);
        }
        else{
            nilai = 0 * (document.getElementById("bobot[11]").value / 100);
        }
        document.getElementById("hasil_nilai_huruf[11]").value = nilai;
        total_nilai[11] = nilai;
      });

      $('input[name="nilai_huruf[12]"]').on('keyup', function() {
        var nilai = this.value * (document.getElementById("bobot[12]").value / 100);
        document.getElementById("hasil_nilai_huruf[12]").value = nilai;
        total_nilai[12] = nilai ;
      });

      $('input[name="nilai_huruf[13]"]').on('keyup', function() {
          var nilai = 0;
          if(this.value < 6) {
            nilai = (document.getElementById("bobot[13]").value / 6) * this.value;
          }
          else {
            nilai = 40;
          }
        document.getElementById("hasil_nilai_huruf[13]").value = nilai;
        total_nilai[13] = nilai ;
      });

      
  });
  </script>
</body>
</html>
 
