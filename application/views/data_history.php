
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
    <link href="<?php echo base_url("assets/DataTables/datatables.min.css"); ?>" rel="stylesheet" type="text/css"/>
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
            <a class="nav-link" href="<?php echo site_url('apps/index/'); ?>">Monitoring</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="<?php echo site_url('apps/grafik/'); ?>">Grafik</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="<?php echo site_url('apps/data_history/'); ?>">Data History</a>
          </li>
          <!-- <li class="nav-item ">
            <a class="nav-link" href="<?php echo site_url('apps/logout/'); ?>">Logout</a>
          </li> -->
        </ul>
      </div>
    </nav>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
            <h1>Data History</h1>
			<table id="sensor_data"
				class="table table-bordered table-striped table-hover table-sm">
				<thead class="thead-dark">
					<tr>
						<th>Conductivity (uSiemens)</th>
						<th>TDS (ppm)</th>
						<th>Time</th>
					</tr>
				</thead>
				<tbody>
				</tbody>
			</table>
		</div>
      </div>
    </div>
    <script src="<?php echo base_url("assets/js/jquery-3.2.1.slim.min.js"); ?>"></script>
    <script src="<?php echo base_url("assets/js/jquery.min.js"); ?>"></script>
    <script src="<?php echo base_url("assets/js/popper.min.js"); ?>"></script>
    <script src="<?php echo base_url("assets/js/bootstrap.min.js"); ?>"></script>
    <script src="<?php echo base_url("assets/justgage/justgage-1.1.0.js");?>" type="text/javascript"></script>
    <script src="<?php echo base_url("assets/justgage/raphael-2.1.4.min.js");?>" type="text/javascript"></script>
    <script src="<?php echo base_url("assets/DataTables/datatables.min.js");?>" type="text/javascript"></script>
            
    <script>
    $(document).ready(function(){
    	$('#sensor_data').DataTable({
    		"ajax": {
                url : "<?php echo site_url("api/get_data/") ?>",
                type : 'GET'
            },
        });
    });
    </script>
</html>
