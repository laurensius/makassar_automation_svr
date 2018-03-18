
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
    </nav>
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
            <center>
                <h1><span id="conductivity">0</span></h1>
                <h5>CONDUCTIVITY</h5>
            </center>
        </div>
        <div class="col-lg-6">
            <center>
                <h1><span id="tds">0</span></h1>
                <h5>SALINITY</h5>
            </center>
        </div>  
      </div>
    </div>
    <script src="<?php echo base_url("assets/js/jquery-3.2.1.slim.min.js"); ?>"></script>
    <script src="<?php echo base_url("assets/js/jquery.min.js"); ?>"></script>
    <script src="<?php echo base_url("assets/js/popper.min.js"); ?>"></script>
    <script src="<?php echo base_url("assets/js/bootstrap.min.js"); ?>"></script>
    <script>
    $(document).ready(function(){
      function load_recent(){
        $.ajax({
          url : '<?php echo site_url("api/get_recent/") ?>' ,
          type : 'GET',
          dataType : 'json',
          cache: false,
          contentType: false,
          processData: false,
          success : function(response){
            $("#conductivity").html(parseFloat(response[0].conductivity,2));
            $("#tds").html(parseFloat(response[0].tds,2));
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
