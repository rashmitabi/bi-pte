@extends('layouts.appSuperAdmin')
@section('content')
<!-- Page Content  -->
<div id="content">

    <section class="top-title-button mb-3">
        <div class="row mx-0 align-items-center">
            <div class="col-12 col-md-12 col-xl-8 col-sm-8  left">
                <h1 class="title mb-4">Add Role</h1>
            </div>
        </div>
    </section>
    <section class="top-title-button white-bg remove-main-margin mb-3">
        <div class="row mx-0 align-items-center">
            <div class="col-12 col-md-12 col-xl-8 col-sm-8 left">
                {!! Form::open(array('route' => 'roles.store','method'=>'POST','class'=>'form mt-4 ml-3')) !!}
                  
                    <div class="form-group row">
                      <label  class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Role Name</label>
                      <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                          <input type="text" id="role_name" name="role_name" value="{{old('role_name')}}" class="form-control " placeholder="Enter Role Name" >
                          @if($errors->has('role_name'))
                            <span class="error-msg">{{$errors->first('role_name')}}</span>
                          @endif
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Permissions</label>
                      <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                        <select id="permission" name="permission[]"  class="user-type  form-select  selectpicker" multiple data-live-search="true">
                          @if(count($modules) > 0)
                            @foreach($modules as $module)
                              <option value="{{ $module->id }}{{ '-' }}{{ $module->module_slug }}" {{ ( old('permission') == $module->id )?'selected':''}}>{{ $module->module_name }}</option>
                            @endforeach
                          @endif
                        </select>
                        @if($errors->has('permission'))
                          <span class="error-msg">{{$errors->first('permission')}}</span>
                        @endif
                      </div>
                    </div>
                    <div class="form-group row">
                      <label  class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Status</label>
                      <div class="col-12 col-md-7 col-xl-7 col-sm-12 toggle-switch">
                        <input type="checkbox" id="status" name="status" value="E" {{ (old('status') == 'E')?'checked':'' }} /><label for="status">Toggle</label>
                        @if($errors->has('status'))
                          <span class="error-msg">{{$errors->first('status')}}</span>
                        @endif
                      </div>
                    </div>
                    <div class="form-group row mt-5">
                      <div class="col-12 col-md-12 col-xl-11 col-sm-12 save-btn">
                        <a href="{{ route('roles.index') }}"><button  type="button" class="btn btn-outline-primary "><img class="back-btn" src="{{ asset('assets/images/icons/back.svg') }}" style="width: 14px;margin-right: 10px">Cancel</button></a>
                        <button  type="submit" class="btn btn-outline-primary mr-2"><i class="far fa-save save-icon"></i>Save Role</button>
                        
                      </div>
                    </div>
                {!! Form::close() !!}
                
            </div>
        </div>
    </section>

</div>
@endsection