
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Valve Automation System">
    <meta name="author" content="Laurensius Dede Suhardiman and Azis Sugianto Suparman">
    <title>Valve Automation System</title>
    <link href="<?php echo base_url("assets/css/bootstrap.min.css"); ?>" rel="stylesheet">
    <link href="<?php echo base_url("assets/css/starter-template.css"); ?>" rel="stylesheet">
  </head>
  <body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
      <a class="navbar-brand" href="#">Valve Automation System</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item  active">
            <a class="nav-link" href="#">Monitoring</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="<?php echo site_url('apps/grafik/'); ?>">Grafik</a>
          </li>
          <!-- <li class="nav-item ">
            <a class="nav-link" href="<?php echo site_url('apps/logout/'); ?>">Logout</a>
          </li> -->
        </ul>
      </div>
    </nav>
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
            <center>
                <!-- <h1><span id="conductivity">0</span></h1>
                <h5>CONDUCTIVITY</h5> -->
                <div id="gg_conductivity"></div>
            </center>
        </div>
        <div class="col-lg-6">
            <center>
                <!-- <h1><span id="tds">0</span></h1>
                <h5>SALINITY</h5> -->
                <div id="gg_tds"></div>
            </center>
        </div>  
      </div>
    </div>
    <script src="<?php echo base_url("assets/js/jquery-3.2.1.slim.min.js"); ?>"></script>
    <script src="<?php echo base_url("assets/js/jquery.min.js"); ?>"></script>
    <script src="<?php echo base_url("assets/js/popper.min.js"); ?>"></script>
    <script src="<?php echo base_url("assets/js/bootstrap.min.js"); ?>"></script>
    <script src="<?php echo base_url("assets/justgage/justgage-1.1.0.js");?>" type="text/javascript"></script>
    <script src="<?php echo base_url("assets/justgage/raphael-2.1.4.min.js");?>" type="text/javascript"></script>
            
    <script>
    $(document).ready(function(){
      var gg_conductivity = new JustGage({
          id: "gg_conductivity",
          value: 0,
          min: 0,
          max: 1500,
          decimals: 2,
          title: "Conductivity ",
          label: "microSiemens",
          donut: false,
          relativeGaugeSize : true,
          // textRenderer: "customValue",
          gaugeWidthScale: 0.2
      });

      var gg_tds = new JustGage({
          id: "gg_tds",
          value: 0,
          min: 0,
          max: 1500,
          decimals: 2,
          title: "TDS ",
          label: "ppm",
          donut: false,
          relativeGaugeSize : true,
          // textRenderer: "customValue",
          gaugeWidthScale: 0.2
      });



      function load_recent(){
        $.ajax({
          url : '<?php echo site_url("api/get_recent/") ?>' ,
          type : 'GET',
          dataType : 'json',
          cache: false,
          contentType: false,
          processData: false,
          success : function(response){
            // $("#conductivity").html(parseFloat(response[0].conductivity,2));
            // $("#tds").html(parseFloat(response[0].tds,2));
            
            gg_conductivity.refresh(parseFloat(response[0].conductivity,2));
            gg_tds.refresh(parseFloat(response[0].tds,2));
          },
          error : function(response){
            console.log(response);
          },
        });
      }
      setInterval(function(){load_recent();},1000);
    });
    </script>
</html>
