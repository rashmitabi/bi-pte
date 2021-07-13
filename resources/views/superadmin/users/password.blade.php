<div class="modal-body">
  <h3>Reset password</h3>
  <form class="form mt-5" method="POST">
    @csrf
    <div class="form-group row">
      <label class="col-12 col-md-5 col-xl-12 col-sm-12 col-form-label ">Password</label>
      <div class="col-12 col-md-7 col-xl-12 col-sm-12">
        <input type="password" id="password" name="password" class="form-control password" placeholder="Password">
        <i class="far fa-eye-slash lock-icon password-icon" onclick="password()"></i>
        <span class="error-msg" id="passwordError"></span>
      </div> 
    </div>
    <div class="form-group row">
      <label  class="col-12 col-md-5 col-xl-12 col-sm-12 col-form-label ">Confirm Password</label>
      <div class="col-12 col-md-7 col-xl-12 col-sm-12">
        <input type="password" id="confirm_password" name="confirm_password" class="form-control confirm_password" placeholder="Confirm Password">
        <i class="far fa-eye-slash lock-icon cpassword-icon" onclick="confirm_password()"></i>
        <span class="error-msg" id="confirm_passwordError"></span>
      </div>
    </div>
    <div class="form-group row">
      <div class="col-12 col-md-12 col-xl-12 col-sm-12 save-btn">
        @if(isset($user->id))
          <button  type="button" class="btn btn-outline-primary user-password-update" data-id="{{ $user->id }}" data-url="{{ route('superadmin-user-setpassword', $user->id) }}"><i class="far fa-save save-icon"></i>Save Password</button>
        @else
          @foreach($user as $row)
            <input type="hidden" name="user_ids[]" value="{{$row->id}}">
          @endforeach
          <input type="hidden" name="role_id" value="{{$user[0]->role_id}}">
          <button  type="button" class="btn btn-outline-primary user-password-update" data-id="" data-url="{{ route('superadmin-user-setpassword', $user[0]->id) }}"><i class="far fa-save save-icon"></i>Save Password</button>
        @endif

      </div>
    </div>
  </form>
</div>