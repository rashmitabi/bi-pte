
  <form class="form mt-4">
    @csrf
    <div class="form-group row">
      <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Role Name</label>
      <div class="col-12 col-md-7 col-xl-7 col-sm-12">
        <input type="text" id="role_name" name="role_name" value="{{ $roleData->role_name }}" class="form-control " placeholder="Enter Role Name" >
        <span class="error-msg" id="role_nameError"></span>
      </div>
    </div>
    <div class="form-group row">
      <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Permissions</label>
      <div class="col-12 col-md-7 col-xl-7 col-sm-12">
        <?php 
        $permission_array = array();
        foreach ($roleData->permission as $permission) {
          array_push($permission_array, $permission->module_id);
        }
        
         ?>
        <select id="permission" name="permission[]" class="user-type custom-select  selectpicker" multiple data-live-search="true" style="display: block !important;">
          @if(count($modules) > 0)
            @foreach($modules as $module)
              @if(in_array($module->id,$permission_array))
                <option value="{{ $module->id }}{{ '-' }}{{ $module->module_slug }}" selected>{{ $module->module_name }}</option>
              @else
                <option value="{{ $module->id }}{{ '-' }}{{ $module->module_slug }}" >{{ $module->module_name }}</option>
              @endif
            @endforeach
          @endif
        </select>
        <span class="error-msg" id="permissionError"></span>
      </div>
    </div>
    <div class="form-group row">
      <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Status</label>
      <div class="col-12 col-md-7 col-xl-7 col-sm-12 toggle-switch">
        <input type="checkbox" id="status" name="status" value="E" {{ ($roleData->status == 'E')?'checked':''}} /><label for="status">Status</label>
        <span class="error-msg" id="statusError"></span>
      </div>
    </div>
    <div class="form-group row">
      <div class="col-12 col-md-12 col-xl-11 col-sm-1 save-btn">
        <button type="button" class="btn btn-outline-primary roles-update" data-id="{{ $roleData->id }}" data-url="{{ route('roles.update', $roleData->id) }}"><i class="far fa-save save-icon"></i>Save</button>
      </div>
    </div>
</form>