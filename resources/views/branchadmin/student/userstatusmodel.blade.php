<form class="form mt-5" method="POST">
    @csrf
    <div class="form-group row">
      <label class="col-12 col-md-5 col-xl-12 col-sm-12 col-form-label ">Change Status</label>
      <div class="col-12 col-md-7 col-xl-12 col-sm-12">
        <select name="status" id="status" class="form-control">
                <option selected disabled value='no'>select status</option>
                <option value="R">Block</option>
                <option value="A">Unblock</option>
        </select>
        <span class="error-msg" id="statusError"></span>
      </div>
    </div>
    <div class="form-group row">
      <div class="col-12 col-md-12 col-xl-12 col-sm-12 save-btn">
          <input type="hidden" name="user_ids" value="">
          <button  type="button" class="btn btn-outline-primary user-update-status" data-id="{{ $user_ids }}"><i class="far fa-save save-icon"></i>Update</button>
      </div>
    </div>
  </form>