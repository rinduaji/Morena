
      <!-- End Navbar -->
      <div class="panel-header panel-header-sm">
      </div>
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Tabel Report Karyawan</h4>
              </div>
              <div class="card-body">
                <!-- <button class="btn btn-success" onclick="add_report_karyawan()"><i class="glyphicon glyphicon-plus"></i> Add Report Karyawan</button> -->
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
                            <th style="font-weight:bold; font-size:14px;">Ibu Kandung</th>
                            <th style="font-weight:bold; font-size:14px;">NPWP</th>
                            <th style="font-weight:bold; font-size:14px;">NO KK</th>
                            <th style="font-weight:bold; font-size:14px;">BPJS Kesehatan</th>
                            <th style="font-weight:bold; font-size:14px;">BPJS Ketenaga Kerja</th>
                            <th style="font-weight:bold; font-size:14px;">NO Rekening</th>
                            <th style="font-weight:bold; font-size:14px;">Nama Bank</th>
                            <th style="font-weight:bold; font-size:14px;">Nama Pemilik</th>
                            <th style="font-weight:bold; font-size:14px;">Join Date</th>
                            <th style="font-weight:bold; font-size:14px;">End Date</th>
                            <th style="font-weight:bold; font-size:14px;">Jenis Kontrak</th>
                            <th style="font-weight:bold; font-size:14px;">NO Kontrak</th>
                            <th style="font-weight:bold; font-size:14px;">Perner</th>
                            <th style="font-weight:bold; font-size:14px;">Status Kontrak</th>
                            <th style="font-weight:bold; font-size:14px;">Awal Kontrak</th>
                            <th style="font-weight:bold; font-size:14px;">Akhir Kontrak</th>
                            <th style="font-weight:bold; font-size:14px;">Jabatan</th>
                            <!-- <th style="width:150px; font-weight:bold; font-size:14px;">Action</th> -->
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
            "url": "<?php echo site_url('ReportKaryawan/ajax_list')?>",
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
                    columns: [ 0, 1, 2, 3, 4, 6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22 ]
                }
            },
            {
                extend: 'excel',
                exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22 ]
                }
            },
            {
                extend: 'pdf',
                exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22 ]
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
 
 
 
function add_report_karyawan()
{
    save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form').modal('show'); // show bootstrap modal
    $('.modal-title').text('Add Karyawan Onboard'); // Set Title to Bootstrap modal title
 
    $('#photo-preview').hide(); // hide photo preview modal
 
    // $('#label-photo').text('Upload Photo'); // label photo upload
}
 
function edit_report_karyawan(id)
{
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
 
 
    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('ReportKaryawan/ajax_edit')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
 
            $('[name="id"]').val(data.id);
            $('[name="user_id"]').val(data.user_id);
            $('[name="ibu_kandung"]').val(data.ibu_kandung);
            $('[name="npwp"]').val(data.npwp);
            $('[name="norek_bank"]').val(data.norek_bank);
            $('[name="nama_bank"]').val(data.nama_bank);
            $('[name="nama_pemilik"]').val(data.nama_pemilik);
            $('[name="join_date"]').val(data.join_date);
            $('[name="end_date"]').val(data.end_date);
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Karyawan Onboard'); // Set title to Bootstrap modal title
 
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
        url = "<?php echo site_url('ReportKaryawan/ajax_add')?>";
    } else {
        url = "<?php echo site_url('ReportKaryawan/ajax_update')?>";
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
 
function delete_report_karyawan(id)
{
    if(confirm('Are you sure delete this data?'))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('ReportKaryawan/ajax_delete')?>/"+id,
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
                <h3 class="modal-title">Report Karyawan Form</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">
                    <input type="hidden" value="" name="id"/> 
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-6">Nama Kandidat</label>
                            <div class="col-md-12">
                                <select name="user_id" class="form-control">
                                    <option value="">--Select Nama Kandidat--</option>
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
                            <label class="control-label col-md-6">Nama Ibu Kandung</label>
                            <div class="col-md-12">
                                <input name="ibu_kandung" placeholder="Nama Ibu Kandung" class="form-control" type="text" onkeypress="return event.charCode < 48 || event.charCode  >57">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-6">NPWP</label>
                            <div class="col-md-12">
                                <input name="npwp" placeholder="NPWP" class="form-control" type="text" onkeypress="return hanyaAngka(event)">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-6">NO Rekening Bank</label>
                            <div class="col-md-12">
                                <input name="norek_bank" placeholder="NO Rekening Bank" class="form-control" type="text" onkeypress="return hanyaAngka(event)">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-6">Nama Bank</label>
                            <div class="col-md-12">
                                <input name="nama_bank" placeholder="Nama Bank" class="form-control" type="text" onkeypress="return event.charCode < 48 || event.charCode  >57">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-6">Nama Pemilik</label>
                            <div class="col-md-12">
                                <input name="nama_pemilik" placeholder="Nama Pemilik" class="form-control" type="text" onkeypress="return event.charCode < 48 || event.charCode  >57">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-6">Join Date</label>
                            <div class="col-md-12">
                                <input name="join_date" placeholder="Join Date" class="form-control datepicker" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-6">End Date</label>
                            <div class="col-md-12">
                                <input name="end_date" placeholder="End Date" class="form-control datepicker" type="text">
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
 
