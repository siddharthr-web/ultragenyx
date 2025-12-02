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
  </style>

  <div id="section-to-print">
  	<div class="card">
		  <div class="card-header">
            <h3 class="card-title">Sub Component</h3>            
          </div>
          <div class="row">
				<div class="col-md-12">
					Assembly Name: Test Name
				</div>
		  </div>
		  <div class="row">
				<div class="col-md-12">
					Internal Part No: Test Name
				</div>
		  </div>
		  <div class="row">
				<div class="col-md-12">
					Vendor Part No: Test
				</div>
		  </div>
		  <div class="row">
				<div class="col-md-12">
					Intended Use Description: Test
				</div>
		  </div>
		  <div class="row">
				<div class="col-md-12">
					Where Used (including source document reference): Test
				</div>
		  </div>
		  <div class="row">
				<div class="col-md-12">
					Critical Functional Single Use Part Attributes: Test
				</div>
		  </div>
		  <div class="row">
				<div class="col-md-12">
					Product or Process Contact?: Test
				</div>
		  </div>
  	</div>
  </div>



  <script type="text/javascript">
  	$(document).ready(function() {
    	window.print();
	});
  </script>