<div class="modal-body">
  <form class="form mt-4">
    @csrf
    <div class="form-group row">
      <label class="col-4 col-form-label ">Role Name</label>
      <div class="col-8">
        <input type="text" id="role_name" name="role_name" value="{{ $roleData->role_name }}" class="form-control " placeholder="Enter Role Name" >
        <span class="error-msg" id="role_nameError"></span>
      </div>
    </div>
    <div class="form-group row">
      <label class="col-4 col-form-label ">Permissions</label>
      <div class="col-8">
        <select id="permission" name="permission" class="user-type custom-select" >
          <option selected disabled>Select User Type</option>
          @if(count($modules) > 0)
            @foreach($modules as $module)
              <option value="{{ $module->id }}{{ '-' }}{{ $module->module_slug }}" {{ ($module->id == $roleData->module_id )?'selected':''}}>{{ $module->module_name }}</option>
            @endforeach
          @endif
        </select>
        <span class="error-msg" id="permissionError"></span>
      </div>
    </div>
    <div class="form-group row">
      <label class="col-4 col-form-label ">Status</label>
      <div class="col-8 toggle-switch">
        <input type="checkbox" id="status" name="status" value="E" {{ ($roleData->status == 'E')?'checked':''}} /><label for="status">Status</label>
        <span class="error-msg" id="statusError"></span>
      </div>
    </div>
    <div class="form-group row">
      <div class="col-12 save-btn">
        <button type="button" class="btn btn-outline-primary roles-update" data-id="{{ $roleData->id }}" data-url="{{ route('roles.update', $roleData->id) }}"><i class="far fa-save save-icon"></i>Save</button>
      </div>
    </div>
</form>