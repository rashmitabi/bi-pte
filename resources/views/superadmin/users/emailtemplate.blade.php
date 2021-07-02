<div class="modal-body">
  <form class="form mt-5" method="POST">
    
    @csrf
    <div class="form-group row">
      <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Select Email Template</label>
      <div class="col-12 col-md-7 col-xl-7 col-sm-12">
        <select name="emailtemplate" id="emailtemplate" >
           @foreach($templates as $template)
              <option value="{{ $template->id }}" data-subject="{{ $template->id }}" data-body="{{ $template->body }}">{{ $template->name }}</option>
           @endforeach
        </select>
      </div> 
    </div>
    
    <div class="form-group row">
      <div class="col-12 col-md-12 col-xl-11 col-sm-12 save-btn">
        @if(isset($user->id))
          <button  type="button" class="btn btn-outline-primary user-email-template" data-id="{{ $user->id }}" data-url="{{ route('superadmin-user-sendemailtemplate', $user->id) }}"><i class="far fa-save save-icon"></i>Save Password</button>
        @else
          @foreach($user as $row)
            <input type="hidden" name="user_ids[]" value="{{$row->id}}">
          @endforeach
          <input type="hidden" name="role_id" value="{{$user[0]->role_id}}">
          <button  type="button" class="btn btn-outline-primary user-email-template" data-id="" data-url="{{ route('superadmin-user-sendemailtemplate') }}"><i class="far fa-save save-icon"></i>Save Password</button>
        @endif

      </div>
    </div>
  </form>
</div>