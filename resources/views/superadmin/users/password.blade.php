<div class="modal-body">
  <form class="form mt-5" method="POST">
    
    @csrf
    <div class="form-group row">
      <label class="col-5 col-form-label ">Password</label>
      <div class="col-7">
        <input type="password" id="password" name="password" class="form-control password" placeholder="Password">
        <i class="far fa-eye-slash lock-icon password-icon" onclick="password()"></i>
        <span class="error-msg" id="passwordError"></span>
      </div> 
    </div>
    <div class="form-group row">
      <label  class="col-5 col-form-label ">Confirm Password</label>
      <div class="col-7">
        <input type="password" id="confirm_password" name="confirm_password" class="form-control confirm_password" placeholder="Confirm Password">
        <i class="far fa-eye-slash lock-icon cpassword-icon" onclick="confirm_password()"></i>
        <span class="error-msg" id="confirm_passwordError"></span>
      </div>
    </div>
    <div class="form-group row">
      <div class="col-12 save-btn">
        <button  type="button" class="btn btn-outline-primary user-password-update" data-id="{{ $user->id }}" data-url="{{ route('superadmin-user-setpassword', $user->id) }}"><i class="far fa-save save-icon"></i>Save Password</button>
      </div>
    </div>
  </form>
</div>