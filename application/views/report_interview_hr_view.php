
      <!-- End Navbar -->
      <div class="panel-header panel-header-sm">
      </div>
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Tabel Report Interview HR</h4>
              </div>
              <div class="card-body">
                <!-- <button class="btn btn-success" onclick="add_interview_hr()"><i class="glyphicon glyphicon-plus"></i> Add InterviewHr</button>
                <button class="btn btn-default" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i> Reload</button>
                <br />
                <br /> -->
                <div class="table-responsive">
                  <table id="table" class="table">
                    <thead class="text-primary">
                            <th style="font-weight:bold; font-size:14px;">NO</th>
                            <th style="font-weight:bold; font-size:14px;">Nama</th>
                            <th style="font-weight:bold; font-size:14px;">Area</th>
                            <th style="font-weight:bold; font-size:14px;">Treg</th>
                            <th style="font-weight:bold; font-size:14px;">Alamat</th>
                            <th style="font-weight:bold; font-size:14px;">Kelurahan</th>
                            <th style="font-weight:bold; font-size:14px;">Kecamatan</th>
                            <th style="font-weight:bold; font-size:14px;">Kota</th>
                            <th style="font-weight:bold; font-size:14px;">Provinsi</th>
                            <th style="font-weight:bold; font-size:14px;">Project</th>
                            <th style="font-weight:bold; font-size:14px;">Layanan</th>
                            <th style="font-weight:bold; font-size:14px;">Loker</th>
                            <th style="font-weight:bold; font-size:14px;">Kota Lahir</th>
                            <th style="font-weight:bold; font-size:14px;">Tanggal Lahir</th>
                            <th style="font-weight:bold; font-size:14px;">No HP</th>
                            <th style="font-weight:bold; font-size:14px;">No HP Darurat</th>
                            <th style="font-weight:bold; font-size:14px;">Email</th>
                            <th style="font-weight:bold; font-size:14px;">No KTP</th>
                            <th style="font-weight:bold; font-size:14px;">Status Nikah</th>
                            <th style="font-weight:bold; font-size:14px;">Pendidikan</th>
                            <th style="font-weight:bold; font-size:14px;">Jurusan</th>
                            <th style="font-weight:bold; font-size:14px;">Nama Sekolah</th>
                            <th style="font-weight:bold; font-size:14px;">Tahun Lulus</th>
                            <th style="font-weight:bold; font-size:14px;">Jenis Kelamin</th>
                            <th style="font-weight:bold; font-size:14px;">Agama</th>
                            <th style="font-weight:bold; font-size:14px;">Status</th>
                            <th style="font-weight:bold; font-size:14px;">Tanggal Input</th>
                            <th style="font-weight:bold; font-size:14px;">Rencana Posisi</th>
                            <th style="font-weight:bold; font-size:14px;">Pengalaman Kerja</th>

                            <th style="font-weight:bold; font-size:14px;">Jenis Interview</th>
                            <th style="font-weight:bold; font-size:14px;">Nilai</th>
                            <th style="font-weight:bold; font-size:14px;">Status Nilai</th>
                            <th style="font-weight:bold; font-size:14px;">Saran Posisi</th>
                            <th style="font-weight:bold; font-size:14px;">Hasil Wawancara</th>
                            <th style="font-weight:bold; font-size:14px;">User Interview</th>
                            <th style="font-weight:bold; font-size:14px;">Tanggal Tes Interview HR</th>
                    </thead>
                    <tbody>
                    </tbody>                  
                  </table>
                </div>
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

 
<script type="text/javascript">
 
var save_method; //for save method string
var table;
var base_url = '<?php echo base_url();?>';
 
$(document).ready(function() {
 
    //datatables
    table = $('#table').DataTable({ 
 
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
 
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('InterviewHr/ajax_list')?>",
            "type": "POST"
        },
        
        //Set column definition initialisation properties.
        "columnDefs": [
            { 
                "targets": [ -1 ], //last column
                "orderable": false, //set not orderable
            },
            { 
                "targets": [ -2 ], //2 last column (photo)
                "orderable": false, //set not orderable
            },
        ],
        dom: 'lBfrtip',
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
        buttons: [
            'copy', 
            {
                extend: 'csv',
                exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29 ]
                }
            },
            {
                extend: 'excel',
                exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29 ]
                }
            },
            {
                extend: 'pdf',
                exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29 ]
                }
            }, 
            'print'
        ],
 
    });
 
    //datepicker
    $('.datepicker').datepicker({
        autoclose: true,
        dateFormat: "yy-mm-dd",
        todayHighlight: true,
        orientation: "top auto",
        todayBtn: true,
        todayHighlight: true,  
    });

    $(function() {
         $('.date-picker-year').datepicker({
                changeYear: true,
                showButtonPanel: true,
                dateFormat: 'yy',
                yearRange: "1980:2050",
                onClose: function(dateText, inst) { 
                    var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
                    $(this).datepicker('setDate', new Date(year, 1));
                }
        });
        $(".date-picker-year").focus(function () {
                $(".ui-datepicker-month").hide();
        });
    });
 
    //set input/textarea/select event when change value, remove class error and remove text help block 
    $("input").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
    $("textarea").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
    $("select").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
 
});
 
 
 
function add_interview_hr()
{
    save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form').modal('show'); // show bootstrap modal
    $('.modal-title').text('Add InterviewHr'); // Set Title to Bootstrap modal title
 
    $('#photo-preview').hide(); // hide photo preview modal
 
    // $('#label-photo').text('Upload Photo'); // label photo upload
}
 
function edit_interview_hr(id)
{
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
 
 
    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('InterviewHr/ajax_edit')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
 
            $('[name="id"]').val(data.id);
            $('[name="nama"]').val(data.nama);
            $('[name="area"]').val(data.area);
            $('[name="treg"]').val(data.treg);
            $('[name="alamat"]').val(data.alamat);
            $('[name="kelurahan"]').val(data.kelurahan);
            $('[name="kecamatan"]').val(data.kecamatan);
            $('[name="kota"]').val(data.kota);
            $('[name="propinsi"]').val(data.propinsi);
            $('[name="project"]').val(data.project);
            $('[name="layanan"]').val(data.layanan);
            $('[name="loker"]').val(data.loker);
            $('[name="kota_lahir"]').val(data.kota_lahir);
            $('[name="tgl_lahir"]').val(data.tgl_lahir);
            // $('[name="tgl_lahir"]').datepicker('update',data.tgl_lahir);
            $('[name="no_hp1"]').val(data.no_hp1);
            $('[name="no_hp2"]').val(data.no_hp2);
            $('[name="email"]').val(data.email);
            $('[name="no_ktp"]').val(data.no_ktp);
            $('[name="status_nikah"]').val(data.status_nikah);
            $('[name="pendidikan"]').val(data.pendidikan);
            $('[name="jurusan"]').val(data.jurusan);
            $('[name="nama_sekolah"]').val(data.nama_sekolah);
            $('[name="th_lulus"]').val(data.th_lulus);
            $('[name="jenis_kelamin"]').val(data.jenis_kelamin);
            $('[name="agama"]').val(data.agama);
            $('[name="status"]').val(data.status);
            $('[name="rencana_posisi"]').val(data.rencana_posisi);
            $('[name="pengalaman_kerja"]').val(data.pengalaman_kerja);
            // $('[name="tgl_input"]').datepicker('update',data.tgl_input);
            $('[name="batch"]').val(data.batch);
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit InterviewHr'); // Set title to Bootstrap modal title
 
            // $('#photo-preview').show(); // show photo preview modal
 
            // if(data.photo)
            // {
            //     $('#label-photo').text('Change Photo'); // label photo upload
            //     $('#photo-preview div').html('<img src="'+base_url+'upload/'+data.photo+'" class="img-responsive">'); // show photo
            //     $('#photo-preview div').append('<input type="checkbox" name="remove_photo" value="'+data.photo+'"/> Remove photo when saving'); // remove photo
 
            // }
            // else
            // {
            //     $('#label-photo').text('Upload Photo'); // label photo upload
            //     $('#photo-preview div').text('(No photo)');
            // }
 
 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}
 
function reload_table()
{
    table.ajax.reload(null,false); //reload datatable ajax 
}
 
function save()
{
    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable 
    var url;
 
    if(save_method == 'add') {
        url = "<?php echo site_url('InterviewHr/ajax_add')?>";
    } else {
        url = "<?php echo site_url('InterviewHr/ajax_update')?>";
    }
 
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
                $('#modal_form').modal('hide');
                reload_table();
            }
            else
            {
                for (var i = 0; i < data.inputerror.length; i++) 
                {
                    $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                }
            }
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 
            Swal.fire(
                'Success',
                'Data Sudah Tersimpan',
                'success'
            )
 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error adding / update data');
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 
 
        }
    });
}
 
function delete_interview_hr(id)
{
    if(confirm('Are you sure delete this data?'))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('InterviewHr/ajax_delete')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
                //if success reload ajax table
                $('#modal_form').modal('hide');
                reload_table();
                Swal.fire(
                    'Success',
                    'Data Sudah Terhapus',
                    'success'
                )
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error deleting data');
            }
        });
 
    }
}

function hanyaAngka(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
 
    return false;
    return true;
}
 
</script>
 
<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">InterviewHr Form</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">
                    <input type="hidden" value="" name="id"/> 
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-6">Nama</label>
                            <div class="col-md-12">
                                <input name="nama" placeholder="Nama" class="form-control" type="text" onkeypress="return event.charCode < 48 || event.charCode  >57">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-6">Area</label>
                            <div class="col-md-12">
                                <select name="area" class="form-control">
                                    <option value="">--Select Area--</option>
                                    <option value="Bandung">Bandung</option>
                                    <option value="BSD Tangerang">BSD Tangerang</option>
                                    <option value="Balikpapan">Balikpapan</option>
                                    <option value="Jakarta">Jakarta</option>
                                    <option value="Malang">Malang</option>
                                    <option value="Makassar">Makassar</option>
                                    <option value="Medan">Medan</option>
                                    <option value="Semarang">Semarang</option>
                                    <option value="Surabaya">Surabaya</option>
                                </select>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-6">Treg</label>
                            <div class="col-md-12">
                                <select name="treg" class="form-control">
                                    <option value="">--Select Treg--</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                </select>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-6">Alamat</label>
                            <div class="col-md-12">
                            <textarea name="alamat" placeholder="Alamat" class="form-control"></textarea>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-6">Kelurahan</label>
                            <div class="col-md-12">
                                <input name="kelurahan" placeholder="Kelurahan" class="form-control" type="text" onkeypress="return event.charCode < 48 || event.charCode  >57">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-6">Kecamatan</label>
                            <div class="col-md-12">
                                <input name="kecamatan" placeholder="Kecamatan" class="form-control" type="text" onkeypress="return event.charCode < 48 || event.charCode  >57">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-6">Kota</label>
                            <div class="col-md-12">
                                <input name="kota" placeholder="Kota" class="form-control" type="text" onkeypress="return event.charCode < 48 || event.charCode  >57">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-6">Provinsi</label>
                            <div class="col-md-12">
                                <input name="propinsi" placeholder="Provinsi" class="form-control" type="text" onkeypress="return event.charCode < 48 || event.charCode  >57">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-6">Project</label>
                            <div class="col-md-12">
                                <input name="project" placeholder="Project" class="form-control" type="text" onkeypress="return event.charCode < 48 || event.charCode  >57">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-6">Layanan</label>
                            <div class="col-md-12">
                                <select name="layanan" class="form-control">
                                    <option value="">--Select Layanan--</option>
                                    <option value="CT NOL">CT NOL</option>
                                    <option value="CTB">CTB</option>
                                    <option value="FBCC">FBCC</option>
                                    <option value="TAM CRL">TAM CRL</option>
                                    <option value="WIFI ID">WIFI ID</option>
                                </select>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-6">Loker</label>
                            <div class="col-md-12">
                                <input name="loker" placeholder="Loker" class="form-control" type="text" onkeypress="return event.charCode < 48 || event.charCode  >57">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-6">Kota Lahir</label>
                            <div class="col-md-12">
                                <input name="kota_lahir" placeholder="Kota Lahir" class="form-control" type="text" onkeypress="return event.charCode < 48 || event.charCode  >57">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-6">Tanggal Lahir</label>
                            <div class="col-md-12">
                                <input name="tgl_lahir" placeholder="Tanggal Lahir" class="form-control datepicker" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-6">NO HP</label>
                            <div class="col-md-12">
                                <input name="no_hp1" placeholder="NO HP" class="form-control" type="text" onkeypress="return hanyaAngka(event)">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-6">NO HP Darurat</label>
                            <div class="col-md-12">
                                <input name="no_hp2" placeholder="NO HP Darurat" class="form-control" type="text" onkeypress="return hanyaAngka(event)">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-6">Email</label>
                            <div class="col-md-12">
                                <input name="email" placeholder="Email" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-6">NO KTP</label>
                            <div class="col-md-12">
                                <input name="no_ktp" placeholder="NO KTP" class="form-control" type="text" onkeypress="return hanyaAngka(event)">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-6">Status Nikah</label>
                            <div class="col-md-12">
                                <select name="status_nikah" class="form-control">
                                    <option value="">--Select Status Nikah--</option>
                                    <option value="Belum Menikah">Belum Menikah</option>
                                    <option value="Menikah">Menikah</option>
                                </select>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-6">Pendidikan</label>
                            <div class="col-md-12">
                                <select name="pendidikan" class="form-control">
                                    <option value="">--Select Pendidikan--</option>
                                    <option value="SMA">SMA</option>
                                    <option value="SMK">SMK</option>
                                    <option value="D1">D1</option>
                                    <option value="D3">D3</option>
                                    <option value="S1">S1</option>
                                    <option value="S2">S2</option>
                                </select>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-6">Jurusan</label>
                            <div class="col-md-12">
                                <input name="jurusan" placeholder="Jurusan" class="form-control" type="text" onkeypress="return event.charCode < 48 || event.charCode  >57">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-6">Nama Sekolah</label>
                            <div class="col-md-12">
                                <input name="nama_sekolah" placeholder="Nama Sekolah" class="form-control" type="text" onkeypress="return event.charCode < 48 || event.charCode  >57">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-6">Tahun Lulus</label>
                            <div class="col-md-12">
                                <input name="th_lulus" placeholder="Tahun Lulus" class="form-control date-picker-year" type="text" onkeypress="return hanyaAngka(event)">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-6">Jenis Kelamin</label>
                            <div class="col-md-12">
                                <select name="jenis_kelamin" class="form-control">
                                    <option value="">--Select Jenis Kelamin--</option>
                                    <option value="Laki Laki">Laki Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-6">Agama</label>
                            <div class="col-md-12">
                                <select name="agama" class="form-control">
                                    <option value="">--Select Agama--</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Kristen Protestan">Kristen Protestan</option>
                                    <option value="Katolik">Katolik</option>
                                    <option value="Budha">Budha</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Konghucu">Konghucu</option>
                                </select>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <!-- <label class="control-label col-md-6">Status</label> -->
                            <div class="col-md-12">
                                <input name="status" placeholder="Status" class="form-control" type="hidden" value="InterviewHr">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <!-- <label class="control-label col-md-6">Tanggal Input</label> -->
                            <div class="col-md-12">
                                <input name="tgl_input" placeholder="Tanggal Input" class="form-control datepicker" type="hidden" value="<?=date("Y-m-d")?>">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-6">Batch</label>
                            <div class="col-md-12">
                                <input name="batch" placeholder="Batch" class="form-control" type="text" onkeypress="return hanyaAngka(event)">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-6">Rencana Posisi</label>
                            <div class="col-md-12">
                                <input name="rencana_posisi" placeholder="Rencana Posisi" class="form-control" type="text" onkeypress="return event.charCode < 48 || event.charCode  >57">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-6">Pengalaman Kerja</label>
                            <div class="col-md-12">
                                <textarea name="pengalaman_kerja" placeholder="Pengalaman Kerja" class="form-control" onkeypress="return event.charCode < 48 || event.charCode  >57"></textarea>
                                <span class="help-block"></span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->
</body>
</html>
 
