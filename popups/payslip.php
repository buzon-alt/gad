<!-- Modal -->
<div class="modal fade" id="createPayslip" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel" style=""><strong>New Payslip</strong> <button type="button" class="close pull-right" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button></h4>
      </div>
      <form class="form" action="../php/payslip.php" method="POST" enctype="multipart/form-data">
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label for="">Name of Employee:</label>
              <input type="text" class="form-control" id="employeename" name="employeename" value="" placeholder="name of employee...">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="">Month</label>
              <input type="month" class="form-control" id="month" name="month" value="<?= date("Y-m");?>">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="">Days Period:</label>
              <input type="text"class="form-control" id="dayPeriod" name="dayPeriod" value="" placeholder="example: (1-31)">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label for="">Add File:</label>
              <input type="file" class="form-control" id="file" name="file" value="" accept=".doc,.docm,.docx,.dot,.dotm,.dotx,.csv,.xls,.xlsb,.xlsm,.xlsx">
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="new" value="1">Submit</button>
      </div>
    </form>
    </div>
  </div>
</div>
