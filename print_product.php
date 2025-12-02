<?php
include("config/config.php");
include("queries/common_queries.php");
require("common/class/common.php");
require("common/class/validation.php");
include("config/auth_token.php");
$_SESSION['connection'] = $connection;
include ('queries/add-edit-product-query.php');
$type = getSingleRecords($connection, 'type', array('id'=>$type_id))['name'];
?>

<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script> 
<style type="text/css">
  	@media print {
	  body * {
	    visibility: hidden;
	  }
	  #section-to-print, #section-to-print * {
	    visibility: visible;
		/*display: none;*/
	  }
	  #section-to-print {
	    position: absolute;
	    left: 0;
	    top: 0;
	  }
	}

	#section-to-print {
	    visibility: hidden;
	}

	table {
		width:1000px;
	}

	td {
		text-align: center;
	}
  </style>

  <div id="section-to-print">
  	<div class="card">
		  <div class="card-header">
            <h3 class="card-title">Assembly</h3>            
          </div>
          <div class="row">
				<div class="col-md-12">
					Assembly Name: <?php echo $name; ?>
				</div>
		  </div>
		  <div class="row">
				<div class="col-md-12">
					Internal Part No: <?php echo $internal_part_no; ?>
				</div>
		  </div>
		  <div class="row">
				<div class="col-md-12">
					Vendor Part No: <?php echo $vendor_part_no; ?>
				</div>
		  </div>
		  <div class="row">
				<div class="col-md-12">
					Intended Use Description: <?php echo $intended_use_description; ?>
				</div>
		  </div>
		  <div class="row">
				<div class="col-md-12">
					Type: <?php echo $type; ?>
				</div>
		  </div>
		  <div class="row">
				<div class="col-md-12">
					Batch Record: <?php echo $batch_record; //($product_contact=='1')?'Yes':'No'; ?>
				</div>
		  </div>



		<div class="row">
				<div class="col-md-12">
					Product Contact?: <?php echo ($product_contact=='1')?'Yes':'No'; ?>
				</div>
		  </div>


		  <div class="row">
				<div class="col-md-12">
					Can be Irradiated?: <?php echo ($can_be_irradiated=='1')?'Yes':'No'; ?>
				</div>
		  </div>


		  <div class="row">
				<div class="col-md-12">
					Can be autoclaved?: <?php echo ($can_be_autoclaved=='1')?'Yes':'No'; ?>
				</div>
		  </div>

		  <div class="row">
				<div class="col-md-12">
					Status: <?php echo $is_active; ?>
				</div>
		  </div>
  	</div>



  	<div class="card">
		  <div class="card-header">
            <h3 class="card-title">Details</h3>            
          </div>
          <div class="row">
				<div class="col-md-12">
					Material: <?php 
					$i=1;
					foreach ($materialNames as $value) {
						echo ($i!=$materialNames->num_rows) ? $value['name'].',' : $value['name'];
					 $i++;
					}
					 ?>
				</div>
		  </div>
          <div class="row">
				<div class="col-md-12">
					Manufacturer: <?php 
					$i=1;
					foreach ($manufacturerNames as $value) {
						echo ($i!=$manufacturerNames->num_rows) ? $value['name'].',' : $value['name'];
					 $i++;
					}
					 ?>
				</div>
		  </div>
		  <div class="row">
				<div class="col-md-12">
					Product: <?php 
					$i=1;
					foreach ($productNames as $value) {
						echo ($i!=$productNames->num_rows) ? $value['name'].',' : $value['name'];
					 $i++;
					}
					 ?>
				</div>
		  </div>
		  <div class="row">
				<div class="col-md-12">
					Process: <?php 
					$i=1;
					foreach ($processNames as $value) {
						echo ($i!=$processNames->num_rows) ? $value['name'].',' : $value['name'];
					 $i++;
					}
					 ?>
				</div>
		  </div>
		  <div class="row">
				<div class="col-md-12">
					Equipment: <?php 
					$i=1;
					foreach ($equipmentNames as $value) {
						echo ($i!=$equipmentNames->num_rows) ? $value['name'].',' : $value['name'];
					 $i++;
					}
					 ?>
				</div>
		  </div>
  	</div>





  	<div class="card">
		  <div class="card-header">
            <h3 class="card-title">pH Range</h3>            
          </div>
          <div class="row">
				<div class="col-md-12">
					pH Min: <?php echo $ph_min; ?>
				</div>
		  </div>
		  <div class="row">
				<div class="col-md-12">
					pH Max: <?php echo $ph_max; ?>
				</div>
		  </div>
  	</div>





  	<div class="card">
		  <div class="card-header">
            <h3 class="card-title">Chemical Exposure</h3>            
          </div>
          <div class="row">
				<div class="col-md-12">
					<?php echo $chemical_exposure; ?>
				</div>
		  </div>
  	</div>


  	<div class="card">
		  <div class="card-header">
            <h3 class="card-title">Other Details</h3>            
          </div>
          <div class="row">
				<div class="col-md-12">
					<?php echo $other_details; ?>
				</div>
		  </div>
  	</div>



  	<div class="card">
		  <div class="card-header">
            <h3 class="card-title">Temperature Range</h3>            
          </div>
          <div class="row">
				<div class="col-md-12">
					Temperature Min: <?php echo $temp_min; ?>
				</div>
		  </div>
		  <div class="row">
				<div class="col-md-12">
					Temperature Max: <?php echo $temp_max; ?>
				</div>
		  </div>
  	</div>

  	<div class="card">
		  <div class="card-header">
            <h3 class="card-title">Pressure Range</h3>            
          </div>
          <div class="row">
				<div class="col-md-12">
					Pressure Min: <?php echo $pressure_min; ?>
				</div>
		  </div>
		  <div class="row">
				<div class="col-md-12">
					Pressure Max: <?php echo $pressure_max; ?>
				</div>
		  </div>
  	</div>
  	<div class="card">
		  <div class="card-header">
            <h3 class="card-title">Flow Rate Range</h3>            
          </div>
          <div class="row">
				<div class="col-md-12">
					Flow Rate Min: <?php echo $flow_rate_min; ?>
				</div>
		  </div>
		  <div class="row">
				<div class="col-md-12">
					Flow Rate Max: <?php echo $flow_rate_max; ?>
				</div>
		  </div>
  	</div>

  	<div class="card">
		  <div class="card-header">
            <h3 class="card-title">Volume Range</h3>            
          </div>
          <div class="row">
				<div class="col-md-12">
					Volume Min: <?php echo $volume_min; ?>
				</div>
		  </div>
		  <div class="row">
				<div class="col-md-12">
					Volume Max: <?php echo $volume_max; ?>
				</div>
		  </div>
  	</div>
  	<div class="card">
  		<div class="card-header">
            <h3 class="card-title">Sub Component</h3>            
          </div>
		  <table border="1">
		  	<tr>
		  		<th>Sub Component</th>
		  		<th>pH Range</th>
		  		<th>Temp Range</th>
		  		<th>Pressure Range</th>
		  		<th>Volume Range</th>
		  		<th>Flow Rate Range</th>
		  	</tr>
			<?php foreach ($subComponentArray as $value) {  ?>
			  	<tr>
			  		<td><?php echo $value['sub_copoment_name']; ?></td>
			  		<td><?php echo $value['ph_min'].'-'.$value['ph_max']; ?></td>
			  		<td><?php echo $value['temp_min'].'-'.$value['temp_max']; ?></td>
			  		<td><?php echo $value['pressure_min'].'-'.$value['pressure_max']; ?></td>
			  		<td><?php echo $value['volume_min'].'-'.$value['volume_max']; ?></td>
			  		<td><?php echo $value['flow_rate_min'].'-'.$value['flow_rate_max']; ?></td>
			  	</tr>
			<?php } ?>
		  </table>
  	</div>

  </div>



  <script type="text/javascript">
  	$(document).ready(function() {
    	window.print();

    	window.onafterprint = function () {
			window.close();
		}
	});
  </script>