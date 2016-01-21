<?php
$mysqli = mysqli_connect('127.0.0.1','user','pw','db');

$stmt = $mysqli->prepare("SELECT timestamp FROM traffic WHERE server_id  = 1 ORDER BY id DESC LIMIT 1");
$stmt->execute();
$stmt->bind_result($last_time);
$stmt->fetch();
$stmt->close();

$stmt = $mysqli->prepare("SELECT COUNT(*) FROM `servers`");
$stmt->execute();
$stmt->bind_result($serv_count);
$stmt->fetch();
$stmt->close();


$reload = 0;
$reload = $last_time + 66 - time();


?>
<html>

<header>
<meta http-equiv="Refresh" content="<?php echo $reload ?>">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="css/bootstrap.min.css">
<!-- Optional theme -->
<link rel="stylesheet" href="css/bootstrap-theme.min.css">
<!-- jQuery v2.2.0 -->
<script src="js/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="js/bootstrap.min.js"></script>

<script src="js/highcharts.js"></script>
<title>Traffic</title>
<script> 
$(function () {
    $('#mb_out').highcharts({
        chart: {
            type: 'area'
        },
        title: {
            text: 'Traffic usage per Server (outbound)'
        },
        subtitle: {
            text: 'such Bandwidth'
        },
        xAxis: {
	        <?php
                $query = "SELECT timestamp FROM traffic where server_id = 1 ORDER BY id ASC";
                $stack = array();
                if ($result = $mysqli->query($query)) {

                /* fetch associative array */

                while ($row = $result->fetch_assoc()) {
			$timestamp = date("H:i:s",$row['timestamp']);
			array_push($stack, $timestamp);
		 }
                /* free result set */

                $result->free();
		$stack = json_encode($stack);
                } ?>
	    categories: <?php echo $stack; ?>,
            tickmarkPlacement: 'on',
            title: {
                enabled: false
            }
        },
        yAxis: {
            title: {
                text: 'MB/s'
            },
            labels: {
                formatter: function () {
                    return this.value;
                }
            }
        },
        tooltip: {
            shared: true,
            valueSuffix: ' MB/s'
        },
        plotOptions: {
            area: {
                stacking: 'normal',
                lineColor: '#666666',
                lineWidth: 1,
                marker: {
                    lineWidth: 1,
                    lineColor: '#666666'
                }
            }
        },
        series: [{
		<?php
                $query = "SELECT name,id FROM servers ORDER by id ASC";
                $stack = array();
		$server_count = 0;
                if ($result = $mysqli->query($query)) {

                /* fetch associative array */

                        while ($row = $result->fetch_assoc()) {
				$stack = array();	
				$name = json_encode($row['name']);
				$server_count++;
					
				$quary = "SELECT mb FROM traffic  WHERE server_id = ".$row['id']." ORDER by id ASC";
				if ($resulz = $mysqli->query($quary)) {

					/* fetch associative array */

    					while ($row = $resulz->fetch_assoc()) {
					array_push($stack, $row[mb]);	 
    					}
				/* free result set */

    				$resulz->free();
				$stack = json_encode($stack, JSON_NUMERIC_CHECK);
				?> name: <?php echo $name; ?>,<?php
				?> data: <?php echo $stack;
				 if ($server_count < $serv_count) { echo "},{"; } else { echo ""; }	
                        	}
		}
                /* free result set */

                $result->free();

		} ?>	
        }]
    });
$('#mb_in').highcharts({
        chart: {
            type: 'area'
        },
        title: {
            text: 'Traffic usage per Server (Inbound)'
        },
        subtitle: {
            text: 'such Bandwidth'
        },
        xAxis: {
	        <?php
                $query = "SELECT timestamp FROM traffic where server_id = 1 ORDER by id ASC";

                $stack = array();
                if ($result = $mysqli->query($query)) {

                /* fetch associative array */

                while ($row = $result->fetch_assoc()) {
			$timestamp = date("H:i:s",$row['timestamp']);
			array_push($stack, $timestamp);
		 }
                /* free result set */

                $result->free();
		$stack = json_encode($stack);
                } ?>
	    categories: <?php echo $stack; ?>,
            tickmarkPlacement: 'on',
            title: {
                enabled: false
            }
        },
        yAxis: {
            title: {
                text: 'MB/s'
            },
            labels: {
                formatter: function () {
                    return this.value;
                }
            }
        },
        tooltip: {
            shared: true,
            valueSuffix: ' MB/s'
        },
        plotOptions: {
            area: {
                stacking: 'normal',
                lineColor: '#666666',
                lineWidth: 1,
                marker: {
                    lineWidth: 1,
                    lineColor: '#666666'
                }
            }
        },
        series: [{
		<?php
                $query = "SELECT name,id FROM servers ORDER by id ASC";
                $stack = array();
		$server_count = 0;
                if ($result = $mysqli->query($query)) {

                /* fetch associative array */

                        while ($row = $result->fetch_assoc()) {
				$stack = array();	
				$name = json_encode($row['name']);
				$server_count++;	
					
				$quary = "SELECT mb_in FROM traffic  WHERE server_id = ".$row['id']." ORDER by id ASC";
				if ($resulz = $mysqli->query($quary)) {

					/* fetch associative array */

    					while ($row = $resulz->fetch_assoc()) {
					array_push($stack, $row[mb_in]);	 
    					}
				/* free result set */

    				$resulz->free();
				$stack = json_encode($stack, JSON_NUMERIC_CHECK);
				?> name: <?php echo $name; ?>,<?php
				?> data: <?php echo $stack;
				if ($server_count < $serv_count) { echo "},{"; } else { echo ""; } 	
                        	}
		}
                /* free result set */

                $result->free();

		} ?>	
        }]
    });

});				
		

</script> 

</header>

<body>
	<div class="container">
		<div id="mb_out" class="col-md-12"></div>
		<div id="mb_in" class="col-md-12"></div>
	</div>
</body>
</html>
