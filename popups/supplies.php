<!-- Modal -->
<div class="modal fade" id="addSupplies" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel" style=""><strong>Add Supplies</strong> <button type="button" class="close pull-right" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button></h4>

      </div>
      <div class="modal-body">
        <form class="form">
          <div class="form-group">
            <input type="text" class="form-control" id="itemNumber" name="" value="" placeholder="Item number...">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" id="suppliesCatergory" name="" value="" placeholder="Caterogy name...">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" id="suppliesDesc" name="" value="" placeholder="Supplies description...">
          </div>
          <div class="form-group">
            <input type="number" class="form-control" id="suppliesNeed" name="" value="" min="1" placeholder="Qty. needed per month...">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" id="suppliesUnit" name="" value="" min="1" placeholder="Unit">
          </div>
          <div class="form-group">
            <input type="number" class="form-control" id="suppliesPrice" name="" value="" min="1" placeholder="Price (ex: 1000.00)">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" id="suppliesSupplier" name="" value="" min="1" placeholder="Supplier name...">
          </div>
          <div class="form-group">
            <span><i>Note: Do not put comma (,) on price!</i> </span>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="addSupplies()">Submit</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="editSupplies" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel" style=""><strong>Edit Supplies</strong> <button type="button" class="close pull-right" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button></h4>
      </div>
      <div class="modal-body">
        <form class="form">
            <input type="hidden" id="idSupplies" name="" value="">
          <div class="form-group">
            <input type="text" class="form-control" id="editsuppliesCatergory" name="" value="" placeholder="Caterogy name...">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" id="editsuppliesDesc" name="" value="" placeholder="Supplies description...">
          </div>
          <div class="form-group">
            <input type="number" class="form-control" id="editsuppliesNeed" name="" value="" min="1" placeholder="Qty. needed per month...">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" id="editsuppliesUnit" name="" value="" min="1" placeholder="Unit">
          </div>
          <div class="form-group">
            <input type="number" class="form-control" id="editsuppliesPrice" name="" value="" min="1" placeholder="Price (ex: 1000.00)">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" id="editsuppliesSupplier" name="" value="" min="1" placeholder="Supplier name...">
          </div>
          <div class="form-group">
            <span><i>Note: Do not put comma (,) on price!</i> </span>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="editSupplies()">Submit</button>
      </div>
    </div>
  </div>
</div>
