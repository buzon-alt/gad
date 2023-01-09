<!-- Modal -->
<div class="modal fade" id="createInventory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel" style=""><strong>New Inventory</strong> <button type="button" class="close pull-right" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button></h4>

      </div>
      <form class="form" action="" method="GET">
      <div class="modal-body">

        <div class="form-group">
          <label for="">Date Created</label>
          <input type="date" class="form-control" id="newmonth" name="newmonth" value="<?= date('Y-m-d');?>" >
        </div>
          <div class="form-group">
            <input type="text" class="form-control" id="countedBy" name="countedBy" value="" placeholder="Counted by...">
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
