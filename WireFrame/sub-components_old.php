<?php include('header.php'); ?>
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content-header">
      <section class="content">
        <div class="card">
          <div class="card-header">
          <h3 class="card-title"><i class="fas fa-th-large"></i>&nbsp; Sub Components</h3>
          <div class="card-tools"> <a href="/AceInfoway/Admin/Agency" class="btn btn-primary btn-sm"><i class="fas fa-arrow-left"></i>&nbsp;Back</a> </div>
          </div>
          <form class="form">
          <div class="card-body">
            <!-- <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                <label class="control-label">Agency Name</label>: <span class="requireClass">*</span>
                <input class="form-control" type="text"  placeholder="Unique Agency Name" />            
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                <label class="control-label">Agency Name</label>: <span class="requireClass">*</span>
                <input class="form-control" type="text"  placeholder="Unique Agency Name" />            
                </div>
              </div>
            </div> -->
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                <label class="control-label">Material</label>: <span class="requireClass">*</span>
                <select class="form-control" required>
                  <option value="" disabled selected>Select Material</option>
                  <option value="0">Polymer Type</option>
                  <option value="1">MOC (Material of Construction)</option>
                </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                <label class="control-label">Manufacturer</label>: <span class="requireClass">*</span>
                <select class="form-control" required>
                  <option value="" disabled selected>Select Manufacturer</option>
                  <option value="0">Thermo</option>
                  <option value="1">Sartorius</option>
                  <option value="2">Millipore</option>
                  <option value="3">Ect</option>
                </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                <label class="control-label">Process</label>: <span class="requireClass">*</span>
                <select class="form-control" required>
                  <option value="" disabled selected>Select Process</option>
                  <option value="0">Clarification</option>
                  <option value="1">Filling</option>
                  <option value="2">Concentration</option>
                  <option value="3">Separation</option>
                  <option value="4">Production (BioRx)</option>
                  <option value="5">Cell Culture</option>
                  <option value="6">Filtration</option>
                  <option value="7">Solution Preparation</option>
                  <option value="8">Heat Inactivation</option>
                  <option value="9">Misc/Others</option>
                </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                <label class="control-label">Equipment</label>: <span class="requireClass">*</span>
                <select class="form-control" required>
                  <option value="" disabled selected>Select Equipment</option>
                  <option value="0">Single Use Bio Reactors</option>
                  <option value="1">Single Use Mixers</option>
                  <option value="2">Depth Filtration</option>
                  <option value="3">Chromatography</option>
                  <option value="4">Buffer Totes</option>
                </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                <label class="control-label">Product/Program</label>: <span class="requireClass">*</span>
                <select class="form-control" required>
                  <option value="" disabled selected>Select Product/Program</option>
                  <option value="0">301</option>
                  <option value="1">401</option>
                  <option value="2">701</option>
                </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                <label class="control-label">Components</label>: <span class="requireClass">*</span>
                <select class="form-control" required>
                  <option value="" disabled selected>Select Components</option>
                  <option value="0">Bags</option>
                  <option value="1">Fittings</option>
                  <option value="2">Tubing</option>
                  <option value="3">Connectors</option>
                  <option value="4">Filters</option>
                  <option value="5">Valves</option>
                  <option value="6">Ports</option>
                  <option value="7">Filling Needles</option>
                  <option value="8">Pump Liner</option>
                  <option value="9">Centrifuge Liner</option>
                  <option value="10">Sensors</option>
                  <option value="11">Bottles</option>
                  <option value="12">Gasket/O-rings</option>
                  <option value="13">Clamps</option>
                  <option value="14">Chromatography Column</option>
                </select>
                </div>
              </div>
            </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Update</button>
            <a class="btn btn-default white mr-0" href="/aceinfoway/admin/agency"><i class="ft ft-x-circle"></i> Cancel</a> 
          </div>    
          </form>
        </div>
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Data</h3>            
          </div>
          <!-- Bootstrap 3 table -->
          <form class="form">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Leachable/Extractables Data</label>: <span class="requireClass">*</span>
                            <input class="form-control" type="text"  placeholder="Leachable/Extractables Data" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Validation</label>: <span class="requireClass">*</span>
                            <input class="form-control" type="text"  placeholder="Validation" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">CoA (sample)</label>: <span class="requireClass">*</span>
                            <input class="form-control" type="text"  placeholder="CoA" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Process used in</label>: <span class="requireClass">*</span>
                            <input class="form-control" type="text"  placeholder="Process used in" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Equipment used in</label>: <span class="requireClass">*</span>
                            <input class="form-control" type="text"  placeholder="Equipment used in" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Supplier Change Notification</label>: <span class="requireClass">*</span>
                            <input class="form-control" type="text"  placeholder="Supplier Change Notification" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Temp Range (Hard Coded)</label>: <span class="requireClass">*</span>
                            <input class="form-control" type="text"  placeholder="Temp Range" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">pH Range (Hard Coded)</label>: <span class="requireClass">*</span>
                            <input class="form-control" type="text"  placeholder="pH Range" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Pressure Range (Hard Coded)</label>: <span class="requireClass">*</span>
                            <input class="form-control" type="text"  placeholder="Pressure Range" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Can be irritated? (Hard Coded)</label>: <span class="requireClass">*</span>
                            <input class="form-control" type="text"  placeholder="Can be irritated?" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Can be autoclaved? (Hard Coded)</label>: <span class="requireClass">*</span>
                            <input class="form-control" type="text"  placeholder="Can be autoclaved?" />
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Update</button>
              <a class="btn btn-default white mr-0" href="/aceinfoway/admin/agency"><i class="ft ft-x-circle"></i> Cancel</a> 
            </div>    
          </form>
        </div>
      </section>
    </section>
  </div>
  
<?php include('footer.php'); ?>