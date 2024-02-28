
      <!-- End Navbar -->
      <!-- <div class="panel-header panel-header-lg">
        <canvas id="bigDashboardChart"></canvas>
      </div> -->
      <div class="panel-header panel-header-sm">
        Cari
      </div>
      <div class="content">
        <div class="row">
          
          <div class="col-lg-2 col-md-2">
            <div class="card card-chart">
            </div>
          </div>
          <div class="col-lg-8 col-md-8">
            <div class="card card-chart" style="border-radius: 50px 20px;">
              <div class="card-header">
                <!-- <h4 class="card-title">Cari</h4> -->
              </div>
              <div class="card-body">
                <form class="form-inline">
                  <div class="form-group mx-sm-3">
                    <label><h5>Search</h5></label>
                  </div>
                  <div class="form-group mx-sm-3">
                      <select name="area" id="area" class="form-control">
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
                  </div>
                  <div class="form-group mx-sm-3">
                                <select name="layanan" id="layanan" class="form-control">
                                    <option value="">--Select Layanan--</option>
                                    <option value="DITKONS HCC PLASA">DITKONS HCC PLASA</option>
                                    <option value="FBCC DUNNING">FBCC DUNNING</option>
                                    <option value="FBCC DUNNING NASIONAL">FBCC DUNNING NASIONAL</option>
                                    <option value="FBCC REMCALL">FBCC REMCALL</option>
                                    <option value="TELKOM TAM DCS">TELKOM TAM DCS</option>
                                    <option value="TELKOM TIER 1 COMPLAINT 147">TELKOM TIER 1 COMPLAINT 147</option>
                                    <option value="WIFI ID SEAMLESS">WIFI ID SEAMLESS</option>
                                </select>
                  </div>
                  <div class="form-group mx-sm-3">
                    <input type="month" name="bulan_tahun" id="bulan_tahun" class="form-control">
                  </div>
                  <button class="btn btn-primary">Cari</button>
                </form>
              </div>
            </div>
          </div>
          <div class="col-lg-2 col-md-2">
            <div class="card card-chart">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-2">
            <div class="card card-chart">
              <div class="card-header">
                <h4 class="card-title"><center>CAPLAN<br><br></center></h4>
              </div>
              <div class="card-body" id="total_caplan">
                  <!-- <center><h1 id="jumlah_caplan"></h1></center> -->
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="now-ui-icons arrows-1_refresh-69"></i> Just Updated
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-2">
            <div class="card card-chart">
              <div class="card-header">
                <h4 class="card-title"><center>CV MASUK <br>VIA EMAIL</center></h4>
              </div>
              <div class="card-body" id="total_cv">
                  <!-- <h1 id="jumlah_data_cv"><center></center></h1> -->
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="now-ui-icons arrows-1_refresh-69"></i> Just Updated
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-2">
            <div class="card card-chart">
              <div class="card-header" id="nama_batch">
                <!-- <h4 class="card-title" id="data_nama_batch"><center>TRAINING <br>BATCH </center></h4> -->
              </div>
              <div class="card-body" id="total_training">
                  <!-- <h1 id="data_total_training"><center></center></h1> -->
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="now-ui-icons arrows-1_refresh-69"></i> Just Updated
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-2">
            <div class="card card-chart">
              <div class="card-header">
                <h4 class="card-title"><center>TOTAL <br>EXISTING</center></h4>
              </div>
              <div class="card-body" id="total_existing">
                  <!-- <h1 id="data_total_existing"><center></center></h1> -->
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="now-ui-icons arrows-1_refresh-69"></i> Just Updated
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-2">
            <div class="card card-chart">
              <div class="card-header">
                <h4 class="card-title"><center>JUMLAH <br> GAP</center></h4>
              </div>
              <div class="card-body" id="gap">
                  <!-- <h1 id="data_total_existing"><center></center></h1> -->
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="now-ui-icons arrows-1_refresh-69"></i> Just Updated
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-2">
            <div class="card card-chart">
              <div class="card-header">
                <h4 class="card-title"><center>PROSES<br> RESIGN</center></h4>
              </div>
              <div class="card-body" id="total_resign">
                  <!-- <h1 id="data_total_resign"><center></center></h1> -->
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="now-ui-icons arrows-1_refresh-69"></i> Just Updated
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-8 col-md-8">
            <div class="card card-chart">
              <div class="card-header">
                <h4 class="card-title">Komposisi Under Team</h4>
              </div>
              <div class="card-body">
                <div class="chart-area" id="komposisi_under_team">
                  <!-- <canvas id="myChart"></canvas> -->
                </div>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="now-ui-icons ui-2_time-alarm"></i> Last 7 days
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-4">
            <div class="card card-chart">
              <div class="card-header">
                <h4 class="card-title">Presentase Kelulusan</h4>
              </div>
              <div class="card-body">
                <div class="chart-area" id="presentase_kelulusan_chart">
                  <!-- <canvas id="myChartPie"></canvas> -->
                  <center><h1><p id="myChartPieText"></p></h1></center>
                </div>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="now-ui-icons arrows-1_refresh-69"></i> Just Updated
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6">
            <div class="card card-chart">
              <div class="card-header">
                <h4 class="card-title">Total Setiap Proses Diterima TAM Malang</h4>
              </div>
              <div class="card-body">
                <div class="chart-area"  id="setiap_proses_diterima_chart">
                  <!-- <canvas id="myChartBarDiterima"></canvas> -->
                </div>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="now-ui-icons arrows-1_refresh-69"></i> Just Updated
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="card card-chart">
              <div class="card-header">
                <h4 class="card-title">Total Setiap Proses Ditolak TAM Malang</h4>
              </div>
              <div class="card-body">
                <div class="chart-area" id="setiap_proses_ditolak_chart">
                  <!-- <canvas id="myChartBarDitolak" id="setiap_proses_ditolak_chart"></canvas> -->
                </div>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="now-ui-icons arrows-1_refresh-69"></i> Just Updated
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
  <!--   Core JS Files   -->
  <script src="<?=base_url()?>assets/admin/js/core/jquery.min.js"></script>
  <script src="<?=base_url()?>assets/admin/js/core/popper.min.js"></script>
  <script src="<?=base_url()?>assets/admin/js/core/bootstrap.min.js"></script>
  <script src="<?=base_url()?>assets/admin/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <!-- <script src="<?=base_url()?>assets/admin/js/plugins/chartjs.min.js"></script> -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js@3.6.2/dist/chart.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="<?=base_url()?>assets/admin/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?=base_url()?>assets/admin/js/now-ui-dashboard.min.js?v=1.5.0" type="text/javascript"></script><!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
  <script src="<?=base_url()?>assets/admin/demo/demo.js"></script>
  <script>
    // $(document).ready(function() {
    //   // Javascript method's body can be found in assets/js/demos.js
    //   demo.initDashboardPageCharts();

    // });
  let labelKomposisi = [];
  let dataTotalKomposisi = [];
  let area;
  let layanan;
  let bulan_tahun;

  function pad2(n) {
    return (n < 10 ? '0' : '') + n;
  }

  var date = new Date();
  var month = pad2(date.getMonth()+1);//months (0-11)
  var day = pad2(date.getDate());//day (1-31)
  var year= date.getFullYear();
  var t_caplan = 0;
  var t_existing = 0;

  var formattedDate =  year+"-"+month+"-"+day;

  $(document).ready(function() {

    $.ajax({
            url : "<?php echo site_url('dashboard/ajax_total_caplan')?>/" + formattedDate + "/",
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {
              console.log(data);
              let j_caplan = data.jumlah_caplan;
              let j_data_caplan;
              if(j_caplan == null){
                j_data_caplan = parseInt(0);
              }
              else if(j_caplan == ''){
                j_data_caplan = parseInt(0);
              }
              else {
                j_data_caplan = parseInt(j_caplan);
              }
              let total_caplan = (j_data_caplan);
              $("#total_caplan").html("<h1 id='jumlah_caplan'><center>" + total_caplan + "</center></h1>");
              $("#gap").html("<h1 id='jumlah_gap'><center>" + (total_caplan - parseInt(data.total_existing_agent)) + "</center></h1>");

              t_caplan = total_caplan;
    
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }
        });

    $.ajax({
            url : "<?php echo site_url('dashboard/ajax_total_cv')?>/" + formattedDate + "/",
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {
              console.log(data);
              let total = data[0]['total_cv'];
              let total_data;
              if(total == null){
                total_data = parseInt(0);
              }
              else{
                total_data = parseInt(total);
              }

              $("#total_cv").html("<h1 id='jumlah_data_cv'><center>" + total_data + "</center></h1>");
              
    
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }
        });
    
    $.ajax({
            url : "<?php echo site_url('dashboard/ajax_total_training')?>/" + formattedDate + "/",
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {
              let total =  data[0]['total'];
              let total_data ;
              if(total == null){
                total_data = parseInt(0);
              }
              else{
                total_data = parseInt(total);
              }

              let nama_bacth =  data[0]['nama_bacth'];
              let nama_batch_data;
              if(nama_bacth == null){
                nama_batch_data = parseInt(0);
              }
              else{
                nama_batch_data = parseInt(nama_bacth);
              }

              $("#total_training").html("<h1 id='data_total_training'><center>" + total_data + "</center></h1>");
              $("#nama_batch").html("<h4 class='card-title' id='data_nama_batch'><center>TRAINING <br>BATCH " + nama_batch_data + "</center></h4>");
              
    
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }
        });

        $.ajax({
            url : "<?php echo site_url('dashboard/ajax_total_existing')?>/" + formattedDate + "/",
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {
              console.log(data);
              $("#total_existing").html("<h1 id='data_total_existing'><center>" + data + "</center></h1>");
              t_existing=data;
    
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }
        });
        $("#total_caplan").html("<h1 id='jumlah_caplan'><center>0</center></h1>");
        $("#gap").html("<h1 id='jumlah_gap'><center>0</center></h1>");

        $.ajax({
            url : "<?php echo site_url('dashboard/ajax_total_resign')?>/" + formattedDate + "/",
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {
              console.log(data);
              $("#total_resign").html("<h1 id='data_total_resign'><center>" + data + "</center></h1>");
              
    
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }
        });
    // setup 
    $.ajax({
            url : "<?php echo site_url('dashboard/ajax_komposisi')?>/",
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {
              $("#komposisi_under_team").html('<canvas id="myChart"></canvas>');
              // console.log(data);
                // console.log(data.length);
                for (let i = 0; i < data.length; i++) {
                  labelKomposisi[i] = data[i]['user_interview'];
                }

                for (let i = 0; i < data.length; i++) {
                  dataTotalKomposisi[i] = data[i]['jumlah'];
                }


                const dataKomposisi = {
              labels: labelKomposisi,
              datasets: [{
                label: 'Total Data',
                data: dataTotalKomposisi,
                backgroundColor: [
                  'rgba(255, 26, 104, 0.2)'
                ],
                borderColor: [
                  'rgba(255, 26, 104, 1)'
                ],
                borderWidth: 1
              }]
            };

            // config 
            const config = {
              type: 'bar',
              data : dataKomposisi,
              options: {
                indexAxis : 'y',
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
              }
            };

            // render init block
            $('#myChart').chart = new Chart(
              $('#myChart'),
              config
            );
    
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }
        });

    $.ajax({
        url : "<?php echo site_url('dashboard/ajax_total_setiap_proses_diterima')?>/"+ formattedDate + "/",
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
          console.log(data);
            // console.log(data.length);
            $("#setiap_proses_diterima_chart").html('<canvas id="myChartBarDiterima"></canvas>');

          // setup 
          const dataBarDiterima = {
            labels: ['CV', 'KANDIDAT', 'INTERVIEW HR', 'INTERVIEW USER', 'TRAINING'],
            datasets: [{
              label: 'TOTAL DATA',
              data: [data.total_cv, data.jumlah_kandidat, data.jumlah_interview_hr, data.jumlah_interview_user, data.jumlah_trainer],
              backgroundColor: [
                'rgba(54, 162, 235, 0.2)'
              ],
              borderColor: [
                'rgba(54, 162, 235, 1)'
              ],
              borderWidth: 1
            }]
          };

          // config 
          const configBarDiterima = {
            type: 'bar',
            data: dataBarDiterima,
            options: {
              responsive: true,
              maintainAspectRatio: false,
              scales: {
                  yAxes: [{
                      ticks: {
                          beginAtZero:true
                      }
                  }]
              }
            }
          };

          // render init block
          const myChartBarDiterima = new Chart(
            document.getElementById('myChartBarDiterima'),
            configBarDiterima
          );
 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });

    $.ajax({
        url : "<?php echo site_url('dashboard/ajax_total_setiap_proses_ditolak')?>/"+ formattedDate + "/",
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
          console.log(data);
            // console.log(data.length);
            $("#setiap_proses_ditolak_chart").html('<canvas id="myChartBarDitolak"></canvas>');

          // setup 
          const dataBarDitolak = {
            labels: ['CV', 'KANDIDAT', 'INTERVIEW HR', 'INTERVIEW USER', 'TRAINING'],
            datasets: [{
              label: 'TOTAL DATA',
              data: [data.total_cv, data.jumlah_kandidat, data.jumlah_interview_hr, data.jumlah_interview_user, data.jumlah_trainer],
            backgroundColor: [
              'rgba(255, 206, 86, 0.2)'
            ],
            borderColor: [
              'rgba(255, 206, 86, 1)'
            ],
            borderWidth: 1
          }]
        };

        // config 
        const configBarDitolak = {
          type: 'bar',
          data: dataBarDitolak,
          options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            }
          }
        };

        // render init block
        const myChartBarDitolak = new Chart(
          document.getElementById('myChartBarDitolak'),
          configBarDitolak
        );
 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });

    
    $.ajax({
        url : "<?php echo site_url('dashboard/ajax_total_presentase_training')?>/"+ formattedDate + "/",
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
          console.log(data);
            // console.log(data.length);
            $("#presentase_kelulusan_chart").html('<canvas id="myChartPie"></canvas>');
            
            let data_presentase_training = '';
            if(data.total_lulus == '0' && data.total_proses_training == '0'){
              data_presentase_training = 'kosong';
            }

            const dataPie = {
            labels: [
              'Lulus',
              'Proses Training'
            ],
            datasets: [{
              label: 'My First Dataset',
              data: [data.total_lulus, data.total_proses_training],
              backgroundColor: [
                'rgb(255, 99, 132)',
                'rgb(54, 162, 235)',
                'rgb(255, 205, 86)'
              ],
              hoverOffset: 4
            }]
          };

          // config 
          const configPie = {
            type: 'pie',
            data: dataPie,
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            }
          };

          // render init block
          // if(data_presentase_training == 'kosong'){
            // document.getElementById('myChartPieText').value = "Data Kosong";
          // }
          // else {
            const myChartPie = new Chart(
              document.getElementById('myChartPie'),
              configPie
            );
          // }
 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });

    $("button").click(function(e) {
        e.preventDefault();
        area = $( "#area" ).val();
        layanan = $( "#layanan" ).val();
        bulan_tahun= $( "#bulan_tahun" ).val();

        if(area == "") {
          area = "MALANG";
        }
        
        if(layanan == "") {
          layanan = "TELKOM TAM DCS";
        }

        if(bulan_tahun == "") {
          bulan_tahun = formattedDate;
        }

        $.ajax({
            url : "<?php echo site_url('dashboard/ajax_total_caplan')?>/" + bulan_tahun + "/" + area + "/" + layanan + "/",
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {
              console.log(data);
              let j_caplan = data.jumlah_caplan;
              let j_data_caplan;
              if(j_caplan == null){
                j_data_caplan = parseInt(0);
              }
              else {
                j_data_caplan = parseInt(j_caplan);
              }

              $("#jumlah_caplan").remove();
              $("#jumlah_gap").remove();
              let total_caplan = (j_data_caplan);
              $("#total_caplan").html("<h1 id='jumlah_caplan'><center>" + total_caplan + "</center></h1>");
              $("#gap").html("<h1 id='jumlah_gap'><center>" + (total_caplan - parseInt(data.total_existing_agent)) + "</center></h1>");

            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }
        });

    $.ajax({
            url : "<?php echo site_url('dashboard/ajax_total_cv')?>/" + bulan_tahun + "/" + area + "/" + layanan + "/",
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {
              console.log(data);
              let total = data[0]['total_cv'];
              let total_data;
              if(total == null){
                total_data = parseInt(0);
              }
              else{
                total_data = parseInt(total);
              }

              $("#jumlah_data_cv").remove();
              $("#total_cv").html("<h1 id='jumlah_data_cv'><center>" + total_data + "</center></h1>");
              
    
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }
        });
    
    $.ajax({
            url : "<?php echo site_url('dashboard/ajax_total_training')?>/" + bulan_tahun + "/" + area + "/" + layanan + "/",
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {
              $("#data_total_training").remove();
              $("#data_nama_batch").remove();

              let total =  data[0]['total'];
              let total_data;
              if(total == null){
                total_data = parseInt(0);
              }
              else{
                total_data = parseInt(total);
              }

              let nama_bacth =  data[0]['nama_bacth'];
              let nama_batch_data;
              if(nama_bacth == null){
                nama_batch_data = parseInt(0);
              }
              else{
                nama_batch_data = parseInt(nama_bacth);
              }

              $("#total_training").html("<h1 id='data_total_training'><center>" + total_data + "</center></h1>");
              $("#nama_batch").html("<h4 class='card-title' id='data_nama_batch'><center>TRAINING <br>BATCH " + nama_batch_data + "</center></h4>");
              
              
    
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }
        });

        $.ajax({
            url : "<?php echo site_url('dashboard/ajax_total_existing')?>/" + bulan_tahun + "/" + area + "/" + layanan + "/",
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {
              console.log(data);
              $("#data_total_existing").remove(); 
              $("#total_existing").html("<h1 id='data_total_existing'><center>" + data + "</center></h1>");
              
    
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }
        });

        $.ajax({
            url : "<?php echo site_url('dashboard/ajax_total_resign')?>/" + bulan_tahun + "/" + area + "/" + layanan + "/",
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {
              console.log(data);
              $("#data_total_resign").remove();
              $("#total_resign").html("<h1 id='data_total_resign'><center>" + data + "</center></h1>");
              
    
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }
        });

        // alert(area+' '+ layanan);        

        $.ajax({
            url : "<?php echo site_url('dashboard/ajax_komposisi')?>/" + area + "/" + layanan + "/",
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {
              // myChart.destroy();
                console.log(data);
                // console.log(data.length);
                $("#myChart").remove();
                
                labelKomposisi= [];
                dataTotalKomposisi=[];
                let array_kosong = [];

                if(array_kosong == data){
                  return;
                }
                
                $("#komposisi_under_team").html('<canvas id="myChart"></canvas>');

                for (let i = 0; i < data.length; i++) {
                  if(data[i]['user_interview'] != undefined){
                    labelKomposisi[i] = data[i]['user_interview'];
                  }
                }

                for (let i = 0; i < data.length; i++) {
                  if(data[i]['user_interview'] != undefined){
                    dataTotalKomposisi[i] = data[i]['jumlah'];
                  }
                }
                // alert(labelKomposisi);

                const dataKomposisi = {
              labels: labelKomposisi,
              datasets: [{
                label: 'Total Data',
                data: dataTotalKomposisi,
                backgroundColor: [
                  'rgba(255, 26, 104, 0.2)'
                ],
                borderColor: [
                  'rgba(255, 26, 104, 1)'
                ],
                borderWidth: 1
              }]
            };

            // config 
            const config = {
              type: 'bar',
              data : dataKomposisi,
              options: {
                indexAxis : 'y',
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
              }
            };

            // render init block
            $('#myChart').chart = new Chart(
              $('#myChart'),
              config
            );
    
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }
        });

        $.ajax({
          url : "<?php echo site_url('dashboard/ajax_total_presentase_training')?>/"+ bulan_tahun + "/" + area + "/" + layanan + "/",
          type: "GET",
          dataType: "JSON",
          success: function(data)
          {
            console.log(data);
              // console.log(data.length);
              $("#myChartPie").remove();
              $("#presentase_kelulusan_chart").html('<canvas id="myChartPie"></canvas>');
              
              let data_presentase_training = '';
              if(data.total_lulus == '0' && data.total_proses_training == '0'){
                data_presentase_training = 'kosong';
              }

              const dataPie = {
              labels: [
                'Lulus',
                'Proses Training'
              ],
              datasets: [{
                label: 'My First Dataset',
                data: [data.total_lulus, data.total_proses_training],
                backgroundColor: [
                  'rgb(255, 99, 132)',
                  'rgb(54, 162, 235)',
                  'rgb(255, 205, 86)'
                ],
                hoverOffset: 4
              }]
            };

            // config 
            const configPie = {
              type: 'pie',
              data: dataPie,
              options: {
                  responsive: true,
                  maintainAspectRatio: false,
                  scales: {
                      yAxes: [{
                          ticks: {
                              beginAtZero:true
                          }
                      }]
                  }
              }
            };

            // render init block
            // if(data_presentase_training == 'kosong'){
              // document.getElementById('myChartPieText').value = "Data Kosong";
            // }
            // else {
              const myChartPie = new Chart(
                document.getElementById('myChartPie'),
                configPie
              );
            // }
  
          },
          error: function (jqXHR, textStatus, errorThrown)
          {
              alert('Error get data from ajax');
          }
      });

      $.ajax({
          url : "<?php echo site_url('dashboard/ajax_total_setiap_proses_diterima')?>/"+ bulan_tahun + "/" + area + "/" + layanan + "/",
          type: "GET",
          dataType: "JSON",
          success: function(data)
          {
            console.log(data);
              // console.log(data.length);
              $("#myChartBarDiterima").remove();
              $("#setiap_proses_diterima_chart").html('<canvas id="myChartBarDiterima"></canvas>');

            // setup 
            const dataBarDiterima = {
              labels: ['CV', 'KANDIDAT', 'INTERVIEW HR', 'INTERVIEW USER', 'TRAINING'],
              datasets: [{
                label: 'TOTAL DATA',
                data: [data.total_cv, data.jumlah_kandidat, data.jumlah_interview_hr, data.jumlah_interview_user, data.jumlah_trainer],
                backgroundColor: [
                  'rgba(54, 162, 235, 0.2)'
                ],
                borderColor: [
                  'rgba(54, 162, 235, 1)'
                ],
                borderWidth: 1
              }]
            };

            // config 
            const configBarDiterima = {
              type: 'bar',
              data: dataBarDiterima,
              options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
              }
            };

            // render init block
            const myChartBarDiterima = new Chart(
              document.getElementById('myChartBarDiterima'),
              configBarDiterima
            );
  
          },
          error: function (jqXHR, textStatus, errorThrown)
          {
              alert('Error get data from ajax');
          }
      });

      $.ajax({
          url : "<?php echo site_url('dashboard/ajax_total_setiap_proses_ditolak')?>/"+ bulan_tahun + "/" + area + "/" + layanan + "/",
          type: "GET",
          dataType: "JSON",
          success: function(data)
          {
            console.log(data);
              // console.log(data.length);
              $("#myChartBarDitolak").remove();
              $("#setiap_proses_ditolak_chart").html('<canvas id="myChartBarDitolak"></canvas>');

            // setup 
            const dataBarDitolak = {
              labels: ['CV', 'KANDIDAT', 'INTERVIEW HR', 'INTERVIEW USER', 'TRAINING'],
              datasets: [{
                label: 'TOTAL DATA',
                data: [data.total_cv, data.jumlah_kandidat, data.jumlah_interview_hr, data.jumlah_interview_user, data.jumlah_trainer],
              backgroundColor: [
                'rgba(255, 206, 86, 0.2)'
              ],
              borderColor: [
                'rgba(255, 206, 86, 1)'
              ],
              borderWidth: 1
            }]
          };

          // config 
          const configBarDitolak = {
            type: 'bar',
            data: dataBarDitolak,
            options: {
              responsive: true,
              maintainAspectRatio: false,
              scales: {
                  yAxes: [{
                      ticks: {
                          beginAtZero:true
                      }
                  }]
              }
            }
          };

          // render init block
          const myChartBarDitolak = new Chart(
            document.getElementById('myChartBarDitolak'),
            configBarDitolak
          );
  
          },
          error: function (jqXHR, textStatus, errorThrown)
          {
              alert('Error get data from ajax');
          }
      });
    });
  });
  </script>
    
</body>

</html>