
  <form class="form mt-4">
    @csrf
    <div class="form-group row">
      <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Module Name</label>
      <div class="col-12 col-md-7 col-xl-7 col-sm-12">
        <input type="text" id="module_name" name="module_name" value="{{ $module->module_name }}" class="form-control " placeholder="Enter Module Name" >
        <span class="error-msg" id="module_nameError"></span>
      </div>
    </div>
    <div class="form-group row">
      <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Status</label>
      <div class="col-12 col-md-7 col-xl-7 col-sm-12 toggle-switch">
        <input type="checkbox" id="status" name="status" value="E" {{ ($module->status == 'E')?'checked':''}} /><label for="status">Status</label>
        <span class="error-msg" id="statusError"></span>
      </div>
    </div>
    <div class="form-group row">
      <div class="col-12 col-md-12 col-xl-11 col-sm-12 save-btn">
        <button type="button" class="btn btn-outline-primary modules-update" data-id="{{ $module->id }}" data-url="{{ route('modules.update', $module->id) }}"><i class="far fa-save save-icon"></i>Save</button>
      </div>
    </div>
</form>