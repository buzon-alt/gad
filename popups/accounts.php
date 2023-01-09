<!-- Modal -->
<div class="modal fade" id="newAccount" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel" style=""><strong>Account</strong> <button type="button" class="close pull-right" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button></h4>

      </div>
      <div class="modal-body">
        <form class="form">
          <div class="form-group">
            <input type="text" class="form-control" id="employeename" name="" value="" placeholder="Select Employee Name..." list="employeeList">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" id="username" name="" value="" placeholder="username...">
          </div>
          <div class="form-group">
            <input type="password" class="form-control" id="password" name="" value="" placeholder="password...">
          </div>
          <div class="form-group">
            <input type="password" class="form-control" id="repassword" name="" value=""   placeholder="retype password...">
          </div>
          <div class="form-group">
            <label for="">Account Type:</label>
            <select class="form-control" id="idAccounttype" name="">
              <option value="Cashier">Cashier</option>
              <option value="Designer">Designer</option>
              <option value="Operator">Operator</option>
              <option value="Administrator">Administrator</option>
            </select>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="addAccount()">Submit</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="editAccount" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel" style=""><strong>Modify Account</strong> <button type="button" class="close pull-right" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button></h4>

      </div>
      <div class="modal-body">
        <form class="form">
          <div class="form-group">
            <input type="hidden" class="form-control" id="idUser" name="" value=""  >
            <input type="text" class="form-control" id="idemployeename" name="" value="" placeholder="Select Employee Name..." list="employeeList" readonly>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" id="idusername" name="" value="" placeholder="username..." readonly>
          </div>
          <div class="form-group">
            <input type="password" class="form-control" id="idpassword" name="" value="" placeholder="password...">
          </div>
          <div class="form-group">
            <input type="password" class="form-control" id="idrepassword" name="" value=""   placeholder="retype password...">
          </div>
          <div class="form-group">
            <label for="">Account Type:</label>
            <select class="form-control" id="idaAccounttype" name="">
              <option value="Cashier">Cashier</option>
              <option value="Designer">Designer</option>
              <option value="Operator">Operator</option>
              <option value="Administrator">Administrator</option>
            </select>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="updateAccount()">Submit</button>
      </div>
    </div>
  </div>
</div>
