<!-- Modal -->
<div class="modal fade" id="newEmployee" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel" style=""><strong>New Employee</strong> <button type="button" class="close pull-right" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button></h4>
      </div>
      <form class="form">
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="">Badge Number:</label>
              <input type="text" class="form-control" id="badge" name="badge" value="" placeholder="badge number...">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-8">
            <div class="form-group">
              <label for="">Name of Employee:</label>
              <input type="text" class="form-control" id="employeename" name="employeename" value="" placeholder="name of employee...">
            </div>
          </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="">Nationality:</label>
                <input type="text" class="form-control" id="nationality" name="nationality" value="" placeholder="nationality...">
              </div>
            </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label for="">Date of Birth:</label>
              <input type="date" class="form-control" id="dbirth" name="dbirth" value="" placeholder="">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="">Gender:</label>
              <select class="form-control  border-input" id="idSex">
		                    <option>Male</option>
		                    <option>Female</option>
		           </select>
             </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="">Civil Status:</label>
              <select class="form-control  border-input" id="idCivilStatus">
		                    <option>Single</option>
		                    <option>Married</option>
		                    <option>Divorced</option>
		                    <option>Widowed</option>
		           </select>
             </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="">Position:</label>
              <input type="text" class="form-control" id="position" name="position" value="" placeholder="Position">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="">Department:</label>
              <input type="text"class="form-control" id="department" name="department" value="" placeholder="Department">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label for="">Contact:</label>
              <input type="text" class="form-control" id="contact" name="contact" value="" placeholder="Contact">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="">Joining Date:</label>
              <input type="date" class="form-control" id="joiningdate" name="joiningdate" value="" placeholder="Nationality">
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" name="new" value="1" onclick="addnewEmp()">Submit</button>
      </div>
    </form>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="editEmployee" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel" style=""><strong>Modify Employee</strong> <button type="button" class="close pull-right" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button></h4>
      </div>
      <form class="form">
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="">Badge Number:</label>
              <input type="text" class="form-control" id="editbadge" name="badge" value="" placeholder="badge number...">
              <input type="hidden" class="form-control" id="editId" name="badge" value="" placeholder="name of employee...">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-8">
            <div class="form-group">
              <label for="">Name of Employee:</label>
              <input type="text" class="form-control" id="editemployeename" name="employeename" value="" placeholder="name of employee...">
            </div>
          </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="">Nationality:</label>
                <input type="text" class="form-control" id="editnationality" name="nationality" value="" placeholder="nationality...">
              </div>
            </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label for="">Date of Birth:</label>
              <input type="date" class="form-control" id="editdbirth" name="dbirth" value="" placeholder="">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="">Gender:</label>
              <select class="form-control  border-input" id="editidSex">
		                    <option>Male</option>
		                    <option>Female</option>
		           </select>
             </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="">Civil Status:</label>
              <select class="form-control  border-input" id="editidCivilStatus">
		                    <option>Single</option>
		                    <option>Married</option>
		                    <option>Divorced</option>
		                    <option>Widowed</option>
		           </select>
             </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="">Position:</label>
              <input type="text" class="form-control" id="editposition" name="position" value="" placeholder="Position">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="">Department:</label>
              <input type="text"class="form-control" id="editdepartment" name="department" value="" placeholder="Department">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label for="">Contact:</label>
              <input type="text" class="form-control" id="editcontact" name="contact" value="" placeholder="Contact">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="">Joining Date:</label>
              <input type="date" class="form-control" id="editjoiningdate" name="joiningdate" value="" placeholder="Nationality">
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" name="new" value="1" onclick="editnewEmp()">Submit</button>
      </div>
    </form>
    </div>
  </div>
</div>



<!-- Modal -->
<div class="modal fade" id="newRecord" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel" style=""><strong>New Records</strong> <button type="button" class="close pull-right" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button></h4>

      </div>
      <form class="form">
      <div class="modal-body">
        <div class="form-group">
          <input type="hidden" id="idName" name="" value="">
          <input type="hidden" id="idBalance" name="" value="">
          <label for="">Description:</label>
          <textarea id="idDescription" name="name" class="form-control" rows="4" cols="80"></textarea>
        </div>
        <div class="form-group">
          <label for="">Record Type:</label>
          <select class="form-control" id="idRecordtype" name=""> 
            <option value="Deduct">Deduct</option>
            <option value="Charge">Charge</option>
          </select>
        </div>
        <div class="form-group">
          <label for="">Amount:</label>
          <input type="number" class="form-control" id="idAmount" name="" value="0.00" style="text-align: left;border:1px solid #ccc;">
        </div>
        <div class="form-group">
          <label for="">Date:</label>
          <input type="date" class="form-control" id="idDate" name="" value="<?= date("Y-m-d");?>" style="text-align: left;border:1px solid #ccc;">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" name="new" value="1" onclick="addnewRecord()">Submit</button>
      </div>
    </form>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="newCA" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel" style=""><strong>New Records</strong> <button type="button" class="close pull-right" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button></h4>

      </div>
      <form class="form">
      <div class="modal-body">
        <div class="form-group">
          <input type="hidden" id="idCAName" name="" value="">
          <input type="hidden" id="idCABalance" name="" value="">
        </div>
        <div class="form-group">
          <label for="">Record Type:</label>
          <select class="form-control" id="idCARecordtype" name="">
            <option value="Deduct">Payment</option>
            <option value="Deduct">Deduct</option>
            <option value="Charge">Cash Advance</option>
          </select>
        </div>
        <div class="form-group">
          <label for="">Amount:</label>
          <input type="number" class="form-control" id="idCAAmount" name="" value="0.00" style="text-align: left;border:1px solid #ccc;">
        </div>
        <div class="form-group">
          <label for="">Date:</label>
          <input type="date" class="form-control" id="idCADate" name="" value="<?= date("Y-m-d");?>" style="text-align: left;border:1px solid #ccc;">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" name="new" value="1" onclick="addnewCARecord()">Submit</button>
      </div>
    </form>
    </div>
  </div>
</div>



<!-- Modal -->
<div class="modal fade" id="borrowCollectables" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel" style=""><strong>Charge Collectibles</strong> <button type="button" class="close pull-right" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button></h4>
      </div>

      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <table class="table table-hover" style="border-top:2px solid #333!important; border:1px solid #ddd;">
              <thead>
                <tr style="font-size:12px;">
                  <td style="vertical-align:middle;"><strong>Employee Name</strong></td>
                  <td style="vertical-align:middle;text-align:right;"><strong>BALANCE</strong></td>
                </tr>
              </thead>
              <tbody>
                <?php
                  $borrower = mysqli_query($con,"SELECT * FROM charge GROUP BY CHARGETO ");
                  while ($name = mysqli_fetch_array($borrower)) {
                    $owname = $name['CHARGETO'];
                    $file = mysqli_query($con,"SELECT * FROM charge where CHARGETO = '$owname' ORDER BY id DESC");
                    if (mysqli_num_rows($file) <> 0) {
                      $slip = mysqli_fetch_array($file);
                      if ($slip['BALANCE'] <> 0) {
                        echo '<tr>
                          <td style="text-align:LEFT;">
                          '.$slip['CHARGETO'].'
                          </td>
                          <td style="text-align:right;">'.number_format($slip['BALANCE'],2).'</td>
                        </tr>';
                      }

                    }else {
                      echo '<tr>
                        <td colspan="6" style="text-align:left;">
                          '.$owname.' has no borrowed amount...
                        </td>
                      </tr>';
                    }
                  }
                 ?>
              </table>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="cashCollectables" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel" style=""><strong>CA Collectibles</strong> <button type="button" class="close pull-right" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button></h4>
      </div>

      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <table class="table table-hover" style="border-top:2px solid #333!important; border:1px solid #ddd;">
              <thead>
                <tr style="font-size:12px;">
                  <td style="vertical-align:middle;"><strong>EMPLOYEE NAME</strong></td>
                  <td style="vertical-align:middle;text-align:right;"><strong>BALANCE</strong></td>
                </tr>
              </thead>
              <tbody>
                <?php
                  $borrower = mysqli_query($con,"SELECT * FROM cashadvance GROUP BY CHARGETO ");
                  while ($name = mysqli_fetch_array($borrower)) {
                    $owname = $name['CHARGETO'];
                    $file = mysqli_query($con,"SELECT * FROM cashadvance where CHARGETO = '$owname' ORDER BY id DESC");
                    if (mysqli_num_rows($file) <> 0) {
                      $slip = mysqli_fetch_array($file);
                      if ($slip['BALANCE'] <> 0) {
                        echo '<tr>
                          <td style="text-align:LEFT;">
                          '.$slip['CHARGETO'].'
                          </td>
                          <td style="text-align:right;">'.number_format($slip['BALANCE'],2).'</td>
                        </tr>';
                      }

                    }else {
                      echo '<tr>
                        <td colspan="6" style="text-align:left;">
                          '.$owname.' has no borrowed amount...
                        </td>
                      </tr>';
                    }
                  }
                 ?>
              </table>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
