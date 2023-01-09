<!-- Modal -->
<div class="modal fade" id="newOwner" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel" style=""><strong>Add Owners</strong> <button type="button" class="close pull-right" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button></h4>

      </div>
      <form class="form">
      <div class="modal-body">
        <div class="form-group">
          <label for="">Owner Name:</label>
          <input type="text" class="form-control" id="ownersName" name="newmonth">
        </div>
        <div class="form-group">
          <label for="">Email Add:</label>
          <input type="text" class="form-control" id="ownersEmail" name="contact">
        </div>
        <div class="form-group">
          <label for="">Contact Number:</label>
          <input type="text" class="form-control" id="ownersContact" name="contact">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" name="new" value="1" onclick="addOwner()">Submit</button>
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
            <option value="payment">Payment</option>
            <option value="borrowed">Borrowed</option>
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
<div class="modal fade" id="borrowCollectables" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel" style=""><strong>Borrowed Collectibles</strong> <button type="button" class="close pull-right" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button></h4>
      </div>

      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <table class="table table-hover" style="border-top:2px solid #333!important; border:1px solid #ddd;">
              <thead>
                <tr style="font-size:12px;">
                  <td style="vertical-align:middle;"><strong>BORROWER</strong></td>
                  <td style="vertical-align:middle;text-align:right;"><strong>BALANCE</strong></td>
                </tr>
              </thead>
              <tbody>
                <?php
                  $borrower = mysqli_query($con,"SELECT * FROM borrow GROUP BY BORROWER ASC");
                  while ($name = mysqli_fetch_array($borrower)) {
                    $owname = $name['BORROWER'];
                    $file = mysqli_query($con,"SELECT * FROM borrow where BORROWER = '$owname' ORDER BY id DESC");
                    if (mysqli_num_rows($file) <> 0) {
                      $slip = mysqli_fetch_array($file);
                      if ($slip['BALANCE'] <> 0) {
                        echo '<tr>
                          <td style="text-align:LEFT;">
                          '.$slip['BORROWER'].'
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
