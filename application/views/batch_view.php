
      <!-- End Navbar -->
      <div class="panel-header panel-header-sm">
      </div>
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Tabel Batch</h4>
              </div>
              <div class="card-body">
                <button class="btn btn-success" onclick="add_batch()"><i class="glyphicon glyphicon-plus"></i> Add Batch</button>
                <button class="btn btn-default" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i> Reload</button>
                <br />
                <br />
                <div class="table-responsive">
                  <table id="table" class="table">
                    <thead class="text-primary">
                            <th style="font-weight:bold; font-size:14px;">NO</th>
                            <th style="font-weight:bold; font-size:14px;">Nama Batch</th>
                            <th style="font-weight:bold; font-size:14px;">Area</th>
                            <th style="font-weight:bold; font-size:14px;">Layanan</th>
                            <th style="font-weight:bold; font-size:14px;">Tanggal Mulai Batch</th>
                            <th style="font-weight:bold; font-size:14px;">Tanggal Akhir Batch</th>
                            <th style="font-weight:bold; font-size:14px;">UPD</th>
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
 
    //datatables
    table = $('#table').DataTable({ 
 
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
 
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('Batch/ajax_list')?>",
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
                    columns: [ 0, 1, 2, 3, 4, 6,7,8 ]
                }
            },
            {
                extend: 'excel',
                exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 6,7,8 ]
                }
            },
            {
                extend: 'pdf',
                exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 6,7,8 ]
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
 
 
 
function add_batch()
{
    save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form').modal('show'); // show bootstrap modal
    $('.modal-title').text('Add Batch'); // Set Title to Bootstrap modal title
 
    $('#photo-preview').hide(); // hide photo preview modal
 
    // $('#label-photo').text('Upload Photo'); // label photo upload
}
 
function edit_batch(id)
{
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
 
 
    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('Batch/ajax_edit')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
 
            $('[name="id_batch"]').val(data.id_batch);
            $('[name="area"]').val(data.area);
            $('[name="layanan"]').val(data.layanan);
            $('[name="nama_batch"]').val(data.nama_batch);
            // $('[name="tgl_input"]').datepicker('update',data.tgl_input);
            $('[name="upd"]').val(data.upd);
            $('[name="tgl_mulai_batch"]').val(data.tgl_mulai_batch);
            $('[name="tgl_akhir_batch"]').val(data.tgl_akhir_batch);
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Batch'); // Set title to Bootstrap modal title
 
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
        url = "<?php echo site_url('Batch/ajax_add')?>";
    } else {
        url = "<?php echo site_url('Batch/ajax_update')?>";
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
                if(data.cek == "ada") {
                    Swal.fire(
                        'Gagal',
                        'Data Sudah Ada Untuk Tanggal Tersebut',
                        'warning'
                    )
                }
                else {
                    $('#modal_form').modal('hide');
                    reload_table();
                    Swal.fire(
                        'Success',
                        'Data Sudah Tersimpan',
                        'success'
                    )
                }
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
 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error adding / update data');
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 
 
        }
    });
}
 
function delete_batch(id)
{
    if(confirm('Are you sure delete this data?'))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('Batch/ajax_delete')?>/"+id,
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
                <h3 class="modal-title">Batch Form</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">
                    <input type="hidden" value="" name="id_batch"/> 
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-6">Nama Batch</label>
                            <div class="col-md-12">
                                <input name="nama_batch" placeholder="Nama Batch" class="form-control" type="text" onkeypress="return hanyaAngka(event)">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-6">Area</label>
                            <div class="col-md-12">
                                <select name="area" class="form-control">
                                    <option value="">--Select Area--</option>
                                    <option value="BALIKPAPAN">BALIKPAPAN</option>
                                    <option value="BANDUNG">BANDUNG</option>
                                    <option value="BANTEN">BANTEN</option>
                                    <option value="DENPASAR">DENPASAR</option>
                                    <option value="GRESIK">GRESIK</option>
                                    <option value="JAKARTA">JAKARTA</option>
                                    <option value="JEMBER">JEMBER</option>
                                    <option value="JOMBANG">JOMBANG</option>
                                    <option value="LUMAJANG">LUMAJANG</option>
                                    <option value="MATARAM">MATARAM</option>
                                    <option value="MADIUN">MADIUN</option>
                                    <option value="MALANG">MALANG</option>
                                    <option value="MAKASSAR">MAKASSAR</option>
                                    <option value="MEDAN">MEDAN</option>
                                    <option value="MOJOKERTO">MOJOKERTO</option>
                                    <option value="NGANJUK">NGANJUK</option>
                                    <option value="PAMEKASAN">PAMEKASAN</option>
                                    <option value="PASURUAN">PASURUAN</option>
                                    <option value="PROBOLINGGO">PROBOLINGGO</option>
                                    <option value="SEMARANG">SEMARANG</option>
                                    <option value="SIDOARJO">SIDOARJO</option>
                                    <option value="SINGARAJA">SINGARAJA</option>
                                    <option value="SURABAYA">SURABAYA</option>
                                </select>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-6">Layanan</label>
                            <div class="col-md-12">
                                <select name="layanan" class="form-control">
                                    <option value="">--Select Layanan--</option>
                                    <option value="DITKONS HCC PLASA">DITKONS HCC PLASA</option>
                                    <option value="FBCC DUNNING">FBCC DUNNING</option>
                                    <option value="FBCC DUNNING NASIONAL">FBCC DUNNING NASIONAL</option>
                                    <option value="FBCC REMCALL">FBCC REMCALL</option>
                                    <option value="TELKOM TAM DCS">TELKOM TAM DCS</option>
                                    <option value="TELKOM TIER 1 COMPLAINT 147">TELKOM TIER 1 COMPLAINT 147</option>
                                    <option value="WIFI ID SEAMLESS">WIFI ID SEAMLESS</option>
                                </select>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-6">Tanggal Awal Batch</label>
                            <div class="col-md-12">
                                <input name="tgl_mulai_batch" placeholder="Tanggal Awal Batch" class="form-control datepicker" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-6">Tanggal Akhir Batch</label>
                            <div class="col-md-12">
                                <input name="tgl_akhir_batch" placeholder="Tanggal Akhir Batch" class="form-control datepicker" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <!-- <div class="form-group">
                            <label class="control-label col-md-6">UPD</label>
                            <div class="col-md-12"> -->
                                <input name="upd" placeholder="UPD" class="form-control" type="hidden" value="<?=$this->session->userdata('nama')?>">
                                <!-- <span class="help-block"></span>
                            </div>
                        </div> -->
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
 
