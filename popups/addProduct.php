<!-- Modal -->
<div class="modal fade" id="addProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel" style=""><strong>Add Product</strong> <button type="button" class="close pull-right" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button></h4>

      </div>
      <div class="modal-body">
        <form class="form">
          <div class="form-group">
            <input type="text" class="form-control" id="productName" name="" value="" placeholder="Product name...">
          </div>
          <div class="form-group">
            <input type="number" class="form-control" id="productPrice" name="" value="" min="1" placeholder="Price (ex: 1000.00)">
          </div>
          <div class="form-group">
            <span><i>Note: Do not put comma (,) on price!</i> </span>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="addPricelist()">Submit</button>
      </div>
    </div>
  </div>
</div>



<!-- Modal -->
<div class="modal fade" id="editProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel" style=""><strong>Edit Product</strong> <button type="button" class="close pull-right" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button></h4>

      </div>
      <div class="modal-body">
        <form class="form">
          <div class="form-group">
            <input type="hidden" id="productId" name="" value="">
            <input type="text" class="form-control" id="editproductName" name="" value="" placeholder="Product name...">
          </div>
          <div class="form-group">
            <input type="number" class="form-control" id="editproductPrice" name="" value="" min="1" placeholder="Price (ex: 1000.00)">
          </div>
          <div class="form-group">
            <span><i>Note: Do not put comma (,) on price!</i> </span>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="editPricelist()">Submit</button>
      </div>
    </div>
  </div>
</div>
