
      <!-- End Navbar -->
      <div class="panel-header panel-header-sm">
      </div>
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Tabel BPJS</h4>
              </div>
              <div class="card-body">
                <button class="btn btn-success" onclick="add_bpjs()"><i class="glyphicon glyphicon-plus"></i> Add BPJS</button>
                <button class="btn btn-default" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i> Reload</button>
                <br />
                <br />
                <div class="table-responsive">
                  <table id="table" class="table">
                    <thead class="text-primary">
                            <th style="font-weight:bold; font-size:14px;">NO</th>
                            <th style="font-weight:bold; font-size:14px;">Nama</th>
                            <th style="font-weight:bold; font-size:14px;">Area</th>
                            <th style="font-weight:bold; font-size:14px;">Treg</th>
                            <th style="font-weight:bold; font-size:14px;">NO HP</th>
                            <th style="font-weight:bold; font-size:14px;">Email</th>
                            <th style="font-weight:bold; font-size:14px;">NO KTP</th>
                            <th style="font-weight:bold; font-size:14px;">NO KK</th>
                            <th style="font-weight:bold; font-size:14px;">BPJS Kesehatan</th>
                            <th style="font-weight:bold; font-size:14px;">BPJS Ketenaga Kerja</th>
                            <th style="font-weight:bold; font-size:14px;">NIK Anggota Keluarga</th>
                            <th style="font-weight:bold; font-size:14px;">Nama Anggota Keluarga</th>
                            <th style="font-weight:bold; font-size:14px;">Jenis Kelamin Anggota Keluarga</th>
                            <th style="font-weight:bold; font-size:14px;">Status Hubungan Anggota Keluarga</th>
                            <th style="font-weight:bold; font-size:14px;">Kepemilikan BPJS</th>
                            <th style="font-weight:bold; font-size:14px;">BPJS Join Perusahaan</th>
                            <th style="font-weight:bold; font-size:14px;">Gambar</th>
                            <th style="width:150px; font-weight:bold; font-size:14px;">Action</th>
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
    $('input[name="bpjs_kesehatan"]').prop('disabled', true);
    $('input[name="bpjs_tenagakerja"]').prop('disabled', true);

    $('select[name="kepemilikan_bpjs"]').on('change', function() {
        var status1 = document.getElementById("kepemilikan_bpjs").value;
        var status2 = document.getElementById("bpjs_join_perusahaan").value;

        if((status1 == 'Sudah') && (status2 == 'Ya')) {
          $('input[name="bpjs_kesehatan"]').prop('disabled', false);
          $('input[name="bpjs_tenagakerja"]').prop('disabled', false);
        }
        else {
          $('input[name="bpjs_kesehatan"]').prop('disabled', true);
          $('input[name="bpjs_tenagakerja"]').prop('disabled', true);
        }
    });

    $('select[name="bpjs_join_perusahaan"]').on('change', function() {
        var status1 = document.getElementById("kepemilikan_bpjs").value;
        var status2 = document.getElementById("bpjs_join_perusahaan").value;

        if((status1 == 'Sudah') && (status2 == 'Ya')) {
          $('input[name="bpjs_kesehatan"]').prop('disabled', false);
          $('input[name="bpjs_tenagakerja"]').prop('disabled', false);
        }
        else {
          $('input[name="bpjs_kesehatan"]').prop('disabled', true);
          $('input[name="bpjs_tenagakerja"]').prop('disabled', true);
        }
    });

    //datatables
    table = $('#table').DataTable({ 
 
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
 
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('bpjs/ajax_list')?>",
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
                    columns: [ 0, 1, 2, 3, 4, 6,7,8,9,10,11,12,13,14 ]
                }
            },
            {
                extend: 'excel',
                exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 6,7,8,9,10,11,12,13,14 ]
                }
            },
            {
                extend: 'pdf',
                exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 6,7,8,9,10,11,12,13,14 ]
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
 
 
 
function add_bpjs()
{
    save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form').modal('show'); // show bootstrap modal
    $('.modal-title').text('Add BPJS'); // Set Title to Bootstrap modal title
 
    $('#photo-preview').hide(); // hide photo preview modal
 
    $('#label-photo').text('Upload Photo'); // label photo upload
}
 
function edit_bpjs(id)
{
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
 
 
    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('bpjs/ajax_edit')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            if(data.kepemilikan_bpjs == "Sudah" && data.bpjs_join_perusahaan == "Ya") {
              $('input[name="bpjs_kesehatan"]').prop('disabled', false);
              $('input[name="bpjs_tenagakerja"]').prop('disabled', false);
            }
            else {
              $('input[name="bpjs_kesehatan"]').prop('disabled', true);
              $('input[name="bpjs_tenagakerja"]').prop('disabled', true);
            }
            
            $('[name="id_bpjs"]').val(data.id_bpjs);
            $('[name="id_karyawan_onboard"]').val(data.id_karyawan_onboard);
            $('[name="no_kk"]').val(data.no_kk);
            $('[name="bpjs_kesehatan"]').val(data.bpjs_kesehatan);
            $('[name="bpjs_tenagakerja"]').val(data.bpjs_tenagakerja);
            $('[name="nik"]').val(data.nik);
            $('[name="nama_k"]').val(data.nama_k);
            $('[name="jenis_kelamin_k"]').val(data.jenis_kelamin_k);
            $('[name="status_hubungan_k"]').val(data.status_hubungan_k);
            $('[name="kepemilikan_bpjs"]').val(data.kepemilikan_bpjs);
            $('[name="bpjs_join_perusahaan"]').val(data.bpjs_join_perusahaan);
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit BPJS'); // Set title to Bootstrap modal title
 
            $('#photo-preview').show(); // show photo preview modal
 
            if(data.photo)
            {
                $('#label-photo').text('Change Photo'); // label photo upload
                $('#photo-preview div').html('<img src="'+base_url+'uploads/materai/'+data.photo+'" class="img-responsive">'); // show photo
                $('#photo-preview div').append('<input type="checkbox" name="remove_photo" value="'+data.photo+'"/> Remove photo when saving'); // remove photo
 
            }
            else
            {
                $('#label-photo').text('Upload Photo'); // label photo upload
                $('#photo-preview div').text('(No photo)');
            }
 
 
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
        url = "<?php echo site_url('bpjs/ajax_add')?>";
    } else {
        url = "<?php echo site_url('bpjs/ajax_update')?>";
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
 
function delete_bpjs(id)
{
    if(confirm('Are you sure delete this data?'))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('bpjs/ajax_delete')?>/"+id,
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
                <h3 class="modal-title">Karyawan Onboard Form</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">
                    <input type="hidden" value="" name="id_bpjs"/> 
                    <input name="upd" placeholder="UPD" class="form-control" type="hidden" value="<?=$this->session->userdata('nama')?>">
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-6">Nama Karyawan</label>
                            <div class="col-md-12">
                                <select name="id_karyawan_onboard" class="form-control">
                                    <option value="">--Select Nama Karyawan--</option>
                                    <?php
                                    foreach($kandidat->result() as $value){
                                    ?>
                                        <option value="<?=$value->id;?>"><?php echo $value->nama;?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-6">NO KK</label>
                            <div class="col-md-12">
                                <input name="no_kk" placeholder="NO KK" class="form-control" type="text" onkeypress="return hanyaAngka(event)">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-6">kepemilikan BPJS</label>
                            <div class="col-md-12">
                                <select name="kepemilikan_bpjs" id="kepemilikan_bpjs" class="form-control">
                                    <option value="">--Select kepemilikan BPJS--</option>
                                    <option value="Sudah">Sudah</option>
                                    <option value="Belum">Belum</option>
                                </select>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-6">Bersedia Join dengan Perusahaan</label>
                            <div class="col-md-12">
                                <select name="bpjs_join_perusahaan" id="bpjs_join_perusahaan" class="form-control">
                                    <option value="">--Select Bersedia Join dengan Perusahaan--</option>
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                </select>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-6">BPJS Kesehatan</label>
                            <div class="col-md-12">
                                <input name="bpjs_kesehatan" id="bpjs_kesehatan" placeholder="BPJS Kesehatan" class="form-control" type="text" onkeypress="return hanyaAngka(event)">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-6">BPJS Tenaga Kerja</label>
                            <div class="col-md-12">
                                <input name="bpjs_tenagakerja" id="bpjs_tenagakerja" placeholder="BPJS Tenaga Kerja" class="form-control" type="text" onkeypress="return hanyaAngka(event)">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-6">NIK</label>
                            <div class="col-md-12">
                                <input name="nik" placeholder="NIKk" class="form-control" type="text" onkeypress="return hanyaAngka(event)">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-6">Nama Anggota Keluarga</label>
                            <div class="col-md-12">
                                <input name="nama_k" placeholder="Nama Anggota Keluarga" class="form-control" type="text" onkeypress="return event.charCode < 48 || event.charCode  >57">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-6">Jenis Kelamin Anggota Keluarga</label>
                            <div class="col-md-12">
                                <select name="jenis_kelamin_k" class="form-control">
                                    <option value="">--Select Jenis Kelamin Anggota Keluarga--</option>
                                    <option value="Laki Laki">Laki Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-6">Status Hubungan Anggota Keluarga</label>
                            <div class="col-md-12">
                                <select name="status_hubungan_k" class="form-control">
                                    <option value="">--Select Status Hubungan Anggota Keluarga--</option>
                                    <option value="Ayah">Ayah</option>
                                    <option value="Ibu">Ibu</option>
                                    <option value="Anak">Anak</option>
                                </select>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group" id="photo-preview">
                            <label class="control-label col-md-3">Photo</label>
                            <div class="col-md-9">
                                (No photo)
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-7">Upload Photo </label>
                            <label class="control-label col-md-6 custom-file-upload" id="label-photo" for="file-upload">Pilih Photo</label>
                            <div class="col-md-9">
                                <input name="photo" type="file" class="form-control" id="file-upload">
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
 
