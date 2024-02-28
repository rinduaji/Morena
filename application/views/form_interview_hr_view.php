
      <!-- End Navbar -->
      <div class="panel-header panel-header-sm">
      </div>
      <div class="content">
        <div class="row">
          <div class="col-md-12">
          <form id="form" action="<?=site_url('FormInterviewHr/ajax_add')?>" method="post" enctype="multipart/form-data">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Data Kandidat Interview HR</h4>
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
                                    <label class="col-md-2">Nama Kandidat</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                <select name="id_kandidat" id="id_kandidat" class="form-control">
                                                    <option value="">--Select Nama Kandidat--</option>
                                                    <?php
                                                    foreach($kandidat->result() as $value){
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
                                    <label class="col-md-2">Pendidikan Terakhir</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                  <input type="text" name="pendidikan" class="form-control" placeholder="Pendidikan Terkahir" readonly> 
                                                  <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2">Rencana Posisi</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                  <input type="text" name="rencana_posisi" class="form-control" placeholder="Rencana Posisi" readonly> 
                                                  <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2">Pengalaman Kerja</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                  <textarea name="pengalaman_kerja" class="form-control" placeholder="Pengalaman Kerja" readonly></textarea>
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
                foreach($interview_kategori_hr->result() as $value){
              ?>
              <div class="card-header">
                <h6 class="card-title"><?php echo $value->kategori;?></h6>
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
                                  foreach($interview_item_hr->result() as $value1){
                                    if($value1->id_kategori_hr == $value->id) {
                                ?>
                                    <div class="form-group row">
                                      <label class="col-md-6"><?=$no?>. <?=$value1->nama_item?></label>
                                      <input type="hidden" name="id_item[<?=$angka?>]" id="id_item[<?=$angka?>]" class="form-control" value="<?=$value1->id_item?>" readonly> 
                                      <div class="col-md-2">
                                          <div class="row">
                                              <div class="col-md-12">
                                                  <div class="form-group">
                                                  <select name="nilai_huruf[<?=$angka?>]" id="nilai_huruf[<?=$angka?>]" class="form-control">
                                                      <option value="">--Select Nilai--</option>
                                                      <option value="Tinggi">Tinggi</option>
                                                      <option value="Baik">Baik</option>
                                                      <option value="Cukup">Cukup</option>
                                                      <option value="Kurang">Kurang</option>
                                                  </select>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="col-md-4">
                                          <div class="row">
                                              <div class="col-md-12">
                                                  <div class="form-group">
                                                    <textarea name="deskripsi[<?=$angka?>]" id="deskripsi[<?=$angka?>]" class="form-control"placeholder="Deskripsi"></textarea>
                                                    <input type="hidden" name="hasil_nilai_huruf[<?=$angka?>]" id="hasil_nilai_huruf[<?=$angka?>]" class="form-control" placeholder="Nilai Item" value="0" readonly>
                                                    <input type="hidden" name="bobot[<?=$angka?>]" id="bobot[<?=$angka?>]" class="form-control" value="<?=$value1->bobot?>" readonly>
                                                    <input type="hidden" name="nilai_item[<?=$angka?>]" id="nilai_item[<?=$angka?>]" class="form-control" placeholder="Nilai Item" value="0" readonly> 
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
              <center><input type="button" value="Selesai" onclick="total_nilai_interview()" class="btn btn-primary"></center>
              <br><br><br>                               
            </div>
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Data Kandidat Interview HR</h4>
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
                                    <label class="col-md-2">Saran Posisi</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                  <input type="text" name="saran_posisi" class="form-control" placeholder="Saran Posisi" />
                                                  <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2">Hasil Wawancara</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                <select name="hasil_wawancara" id="hasil_wawancara" class="form-control">
                                                    <option value="">--Select Hasil Wawancara--</option>
                                                    <option value="Diterima">Diterima</option>
                                                    <option value="Ditolak">Ditolak</option>
                                                </select>
                                                <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2">Pengawakan User Interview</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                <select name="user_interview" id="user_interview" class="form-control">
                                                    
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

  function total_nilai_interview() {
      var sum = 0;
      var hasil_akhir_interview;

      for (var i = 0; i < total_nilai.length; i++) {
          if(total_nilai[i] == undefined){
            total_nilai[i] = 0;
          }
          sum += parseFloat(total_nilai[i]);
      }
      
      if(sum >= 90) {
        hasil_akhir_interview = 'Tinggi';
      }
      else if(sum < 90 && sum >= 80) {
        hasil_akhir_interview = 'Baik';
      }
      else if(sum < 80 && sum >= 70) {
        hasil_akhir_interview = 'Cukup';
      }
      else if(sum < 70) {
        hasil_akhir_interview = 'Kurang';
      }
      document.getElementById("nilai").value = sum;
      document.getElementById("status_nilai").value = hasil_akhir_interview;
    }

  $(document).ready(function() {
      $('select[name="id_kandidat"]').on('change', function() {
        edit_form_interview_hr(this.value);
      }); 

      function edit_form_interview_hr(id)
    {
        save_method = 'update';
        // $('#form')[0].reset(); // reset form on modals
        // $('.form-group').removeClass('has-error'); // clear error class
        // $('.help-block').empty(); // clear error string
        // alert(id);
    
        //Ajax Load data from ajax
        $.ajax({
            url : "<?php echo site_url('FormInterviewHr/ajax_edit')?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {
                $('[name="pendidikan"]').val(data.pendidikan);
                $('[name="rencana_posisi"]').val(data.rencana_posisi);
                $('[name="pengalaman_kerja"]').val(data.pengalaman_kerja);
                $.ajax({
                    url : "<?php echo site_url('FormInterviewHr/ajax_edit_pengawakan')?>",
                    method : "POST",
                    data : {area: data.area, layanan: data.layanan},
                    async : true,
                    dataType : 'json',
                    success: function(data1)
                    {
                        var html = '';
                        var i;
                        if(data1.length > 0) {
                          html += "<option value=''>-- Pilih Pengawakan User Interview --</option>";
                          for(i=0; i<data1.length; i++){
                              html += '<option value="' + String(data1[i].nama) + '">'+data1[i].nama+' | ' + data1[i].area + ' | ' + data1[i].layanan + '</option>';
                          }
                        }
                        else{
                          html += "<option value=''>-- Pilih Pengawakan User Interview --</option>";
                        }
                        $('#user_interview').html(html);
                        console.log(html);
                    },
                    error: function (jqXHR, textStatus, errorThrown)
                    {
                        alert('Error get data from ajax');
                    }
                });
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
        
        url = "<?php echo site_url('FormInterviewHR/ajax_add')?>";
    
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

      $('select[name="nilai_huruf[0]"]').on('change', function() {
        var nilai = 0;
        if(this.value == "Tinggi") {
          nilai = 1;
        }
        else if(this.value == "Baik") {
          nilai = 0.75;
        }
        else if(this.value == "Cukup") {
          nilai = 0.5;
        }
        else if(this.value == "Kurang") {
          nilai = 0;
        }
        document.getElementById("hasil_nilai_huruf[0]").value = nilai;
        document.getElementById("nilai_item[0]").value = document.getElementById("hasil_nilai_huruf[0]").value * document.getElementById("bobot[0]").value;
        total_nilai[0] = document.getElementById("nilai_item[0]").value ;
      });

      $('select[name="nilai_huruf[1]"]').on('change', function() {
        var nilai = 0;
        if(this.value == "Tinggi") {
          nilai = 1;
        }
        else if(this.value == "Baik") {
          nilai = 0.75;
        }
        else if(this.value == "Cukup") {
          nilai = 0.5;
        }
        else if(this.value == "Kurang") {
          nilai = 0;
        }
        document.getElementById("hasil_nilai_huruf[1]").value = nilai;
        document.getElementById("nilai_item[1]").value = document.getElementById("hasil_nilai_huruf[1]").value * document.getElementById("bobot[1]").value;
        total_nilai[1] = document.getElementById("nilai_item[1]").value ;
      });

      $('select[name="nilai_huruf[2]"]').on('change', function() {
        var nilai = 0;
        if(this.value == "Tinggi") {
          nilai = 1;
        }
        else if(this.value == "Baik") {
          nilai = 0.75;
        }
        else if(this.value == "Cukup") {
          nilai = 0.5;
        }
        else if(this.value == "Kurang") {
          nilai = 0;
        }
        document.getElementById("hasil_nilai_huruf[2]").value = nilai;
        document.getElementById("nilai_item[2]").value = document.getElementById("hasil_nilai_huruf[2]").value * document.getElementById("bobot[2]").value;
        total_nilai[2] = document.getElementById("nilai_item[2]").value ;
      });

      $('select[name="nilai_huruf[3]"]').on('change', function() {
        var nilai = 0;
        if(this.value == "Tinggi") {
          nilai = 1;
        }
        else if(this.value == "Baik") {
          nilai = 0.75;
        }
        else if(this.value == "Cukup") {
          nilai = 0.5;
        }
        else if(this.value == "Kurang") {
          nilai = 0;
        }
        document.getElementById("hasil_nilai_huruf[3]").value = nilai;
        document.getElementById("nilai_item[3]").value = document.getElementById("hasil_nilai_huruf[3]").value * document.getElementById("bobot[3]").value;
        total_nilai[3] = document.getElementById("nilai_item[3]").value ;
      });

      $('select[name="nilai_huruf[4]"]').on('change', function() {
        var nilai = 0;
        if(this.value == "Tinggi") {
          nilai = 1;
        }
        else if(this.value == "Baik") {
          nilai = 0.75;
        }
        else if(this.value == "Cukup") {
          nilai = 0.5;
        }
        else if(this.value == "Kurang") {
          nilai = 0;
        }
        document.getElementById("hasil_nilai_huruf[4]").value = nilai;
        document.getElementById("nilai_item[4]").value = document.getElementById("hasil_nilai_huruf[4]").value * document.getElementById("bobot[4]").value;
        total_nilai[4] = document.getElementById("nilai_item[4]").value ;
      });

      $('select[name="nilai_huruf[5]"]').on('change', function() {
        var nilai = 0;
        if(this.value == "Tinggi") {
          nilai = 1;
        }
        else if(this.value == "Baik") {
          nilai = 0.75;
        }
        else if(this.value == "Cukup") {
          nilai = 0.5;
        }
        else if(this.value == "Kurang") {
          nilai = 0;
        }
        document.getElementById("hasil_nilai_huruf[5]").value = nilai;
        document.getElementById("nilai_item[5]").value = document.getElementById("hasil_nilai_huruf[5]").value * document.getElementById("bobot[5]").value;
        total_nilai[5] = document.getElementById("nilai_item[5]").value ;
      });

      $('select[name="nilai_huruf[6]"]').on('change', function() {
        var nilai = 0;
        if(this.value == "Tinggi") {
          nilai = 1;
        }
        else if(this.value == "Baik") {
          nilai = 0.75;
        }
        else if(this.value == "Cukup") {
          nilai = 0.5;
        }
        else if(this.value == "Kurang") {
          nilai = 0;
        }
        document.getElementById("hasil_nilai_huruf[6]").value = nilai;
        document.getElementById("nilai_item[6]").value = document.getElementById("hasil_nilai_huruf[6]").value * document.getElementById("bobot[6]").value;
        total_nilai[6] = document.getElementById("nilai_item[6]").value ;
      });

      $('select[name="nilai_huruf[7]"]').on('change', function() {
        var nilai = 0;
        if(this.value == "Tinggi") {
          nilai = 1;
        }
        else if(this.value == "Baik") {
          nilai = 0.75;
        }
        else if(this.value == "Cukup") {
          nilai = 0.5;
        }
        else if(this.value == "Kurang") {
          nilai = 0;
        }
        document.getElementById("hasil_nilai_huruf[7]").value = nilai;
        document.getElementById("nilai_item[7]").value = document.getElementById("hasil_nilai_huruf[7]").value * document.getElementById("bobot[7]").value;
        total_nilai[7] = document.getElementById("nilai_item[7]").value ;
      });

      $('select[name="nilai_huruf[8]"]').on('change', function() {
        var nilai = 0;
        if(this.value == "Tinggi") {
          nilai = 1;
        }
        else if(this.value == "Baik") {
          nilai = 0.75;
        }
        else if(this.value == "Cukup") {
          nilai = 0.5;
        }
        else if(this.value == "Kurang") {
          nilai = 0;
        }
        document.getElementById("hasil_nilai_huruf[8]").value = nilai;
        document.getElementById("nilai_item[8]").value = document.getElementById("hasil_nilai_huruf[8]").value * document.getElementById("bobot[8]").value;
        total_nilai[8] = document.getElementById("nilai_item[8]").value ;
      });

      $('select[name="nilai_huruf[9]"]').on('change', function() {
        var nilai = 0;
        if(this.value == "Tinggi") {
          nilai = 1;
        }
        else if(this.value == "Baik") {
          nilai = 0.75;
        }
        else if(this.value == "Cukup") {
          nilai = 0.5;
        }
        else if(this.value == "Kurang") {
          nilai = 0;
        }
        document.getElementById("hasil_nilai_huruf[9]").value = nilai;
        document.getElementById("nilai_item[9]").value = document.getElementById("hasil_nilai_huruf[9]").value * document.getElementById("bobot[9]").value;
        total_nilai[9] = document.getElementById("nilai_item[9]").value ;
      });

      $('select[name="nilai_huruf[10]"]').on('change', function() {
        var nilai = 0;
        if(this.value == "Tinggi") {
          nilai = 1;
        }
        else if(this.value == "Baik") {
          nilai = 0.75;
        }
        else if(this.value == "Cukup") {
          nilai = 0.5;
        }
        else if(this.value == "Kurang") {
          nilai = 0;
        }
        document.getElementById("hasil_nilai_huruf[10]").value = nilai;
        document.getElementById("nilai_item[10]").value = document.getElementById("hasil_nilai_huruf[10]").value * document.getElementById("bobot[10]").value;
        total_nilai[10] = document.getElementById("nilai_item[10]").value;
      });

      $('select[name="nilai_huruf[11]"]').on('change', function() {
        var nilai = 0;
        if(this.value == "Tinggi") {
          nilai = 1;
        }
        else if(this.value == "Baik") {
          nilai = 0.75;
        }
        else if(this.value == "Cukup") {
          nilai = 0.5;
        }
        else if(this.value == "Kurang") {
          nilai = 0;
        }
        document.getElementById("hasil_nilai_huruf[11]").value = nilai;
        document.getElementById("nilai_item[11]").value = document.getElementById("hasil_nilai_huruf[11]").value * document.getElementById("bobot[11]").value;
        total_nilai[11] = document.getElementById("nilai_item[11]").value;
      });

      $('select[name="nilai_huruf[12]"]').on('change', function() {
        var nilai = 0;
        if(this.value == "Tinggi") {
          nilai = 1;
        }
        else if(this.value == "Baik") {
          nilai = 0.75;
        }
        else if(this.value == "Cukup") {
          nilai = 0.5;
        }
        else if(this.value == "Kurang") {
          nilai = 0;
        }
        document.getElementById("hasil_nilai_huruf[12]").value = nilai;
        document.getElementById("nilai_item[12]").value = document.getElementById("hasil_nilai_huruf[12]").value * document.getElementById("bobot[12]").value;
        total_nilai[12] = document.getElementById("nilai_item[12]").value;
      });

      $('select[name="nilai_huruf[13]"]').on('change', function() {
        var nilai = 0;
        if(this.value == "Tinggi") {
          nilai = 1;
        }
        else if(this.value == "Baik") {
          nilai = 0.75;
        }
        else if(this.value == "Cukup") {
          nilai = 0.5;
        }
        else if(this.value == "Kurang") {
          nilai = 0;
        }
        document.getElementById("hasil_nilai_huruf[13]").value = nilai;
        document.getElementById("nilai_item[13]").value = document.getElementById("hasil_nilai_huruf[13]").value * document.getElementById("bobot[13]").value;
        total_nilai[13] = document.getElementById("nilai_item[13]").value;
      });

      $('select[name="nilai_huruf[14]"]').on('change', function() {
        var nilai = 0;
        if(this.value == "Tinggi") {
          nilai = 1;
        }
        else if(this.value == "Baik") {
          nilai = 0.75;
        }
        else if(this.value == "Cukup") {
          nilai = 0.5;
        }
        else if(this.value == "Kurang") {
          nilai = 0;
        }
        document.getElementById("hasil_nilai_huruf[14]").value = nilai;
        document.getElementById("nilai_item[14]").value = document.getElementById("hasil_nilai_huruf[14]").value * document.getElementById("bobot[14]").value;
        total_nilai[14] = document.getElementById("nilai_item[14]").value;
      });

      $('select[name="nilai_huruf[15]"]').on('change', function() {
        var nilai = 0;
        if(this.value == "Tinggi") {
          nilai = 1;
        }
        else if(this.value == "Baik") {
          nilai = 0.75;
        }
        else if(this.value == "Cukup") {
          nilai = 0.5;
        }
        else if(this.value == "Kurang") {
          nilai = 0;
        }
        document.getElementById("hasil_nilai_huruf[15]").value = nilai;
        document.getElementById("nilai_item[15]").value = document.getElementById("hasil_nilai_huruf[15]").value * document.getElementById("bobot[15]").value;
        total_nilai[15] = document.getElementById("nilai_item[15]").value;
      });

      $('select[name="nilai_huruf[16]"]').on('change', function() {
        var nilai = 0;
        if(this.value == "Tinggi") {
          nilai = 1;
        }
        else if(this.value == "Baik") {
          nilai = 0.75;
        }
        else if(this.value == "Cukup") {
          nilai = 0.5;
        }
        else if(this.value == "Kurang") {
          nilai = 0;
        }
        document.getElementById("hasil_nilai_huruf[16]").value = nilai;
        document.getElementById("nilai_item[16]").value = document.getElementById("hasil_nilai_huruf[16]").value * document.getElementById("bobot[16]").value;
        total_nilai[16] = document.getElementById("nilai_item[16]").value;
      });

      $('select[name="nilai_huruf[17]"]').on('change', function() {
        var nilai = 0;
        if(this.value == "Tinggi") {
          nilai = 1;
        }
        else if(this.value == "Baik") {
          nilai = 0.75;
        }
        else if(this.value == "Cukup") {
          nilai = 0.5;
        }
        else if(this.value == "Kurang") {
          nilai = 0;
        }
        document.getElementById("hasil_nilai_huruf[17]").value = nilai;
        document.getElementById("nilai_item[17]").value = document.getElementById("hasil_nilai_huruf[17]").value * document.getElementById("bobot[17]").value;
        total_nilai[17] = document.getElementById("nilai_item[17]").value;
      });

      $('select[name="nilai_huruf[18]"]').on('change', function() {
        var nilai = 0;
        if(this.value == "Tinggi") {
          nilai = 1;
        }
        else if(this.value == "Baik") {
          nilai = 0.75;
        }
        else if(this.value == "Cukup") {
          nilai = 0.5;
        }
        else if(this.value == "Kurang") {
          nilai = 0;
        }
        document.getElementById("hasil_nilai_huruf[18]").value = nilai;
        document.getElementById("nilai_item[18]").value = document.getElementById("hasil_nilai_huruf[18]").value * document.getElementById("bobot[18]").value;
        total_nilai[18] = document.getElementById("nilai_item[18]").value;
      });

      $('select[name="nilai_huruf[19]"]').on('change', function() {
        var nilai = 0;
        if(this.value == "Tinggi") {
          nilai = 1;
        }
        else if(this.value == "Baik") {
          nilai = 0.75;
        }
        else if(this.value == "Cukup") {
          nilai = 0.5;
        }
        else if(this.value == "Kurang") {
          nilai = 0;
        }
        document.getElementById("hasil_nilai_huruf[19]").value = nilai;
        document.getElementById("nilai_item[19]").value = document.getElementById("hasil_nilai_huruf[19]").value * document.getElementById("bobot[19]").value;
        total_nilai[19] = document.getElementById("nilai_item[19]").value;
      });

      $('select[name="nilai_huruf[20]"]').on('change', function() {
        var nilai = 0;
        if(this.value == "Tinggi") {
          nilai = 1;
        }
        else if(this.value == "Baik") {
          nilai = 0.75;
        }
        else if(this.value == "Cukup") {
          nilai = 0.5;
        }
        else if(this.value == "Kurang") {
          nilai = 0;
        }
        document.getElementById("hasil_nilai_huruf[20]").value = nilai;
        document.getElementById("nilai_item[20]").value = document.getElementById("hasil_nilai_huruf[20]").value * document.getElementById("bobot[20]").value;
        total_nilai[20] = document.getElementById("nilai_item[20]").value;
      });
  });
  </script>
</body>
</html>
 
