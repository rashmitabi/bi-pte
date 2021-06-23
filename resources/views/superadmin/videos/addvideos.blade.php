@extends('layouts.appSuperAdmin')
@section('content')
<!-- Page Content  -->
<div id="content">

    <section class="top-title-button mb-3">
        <div class="row mx-0 align-items-center">
            <div class="col-12 col-md-12 col-xl-8 col-sm-8 left">
                <h1 class="title mb-4">Add Videos</h1>
            </div>
        </div>
    </section>

    <section class="top-title-button white-bg mb-3 remove-main-margin">
        <div class="row mx-0 align-items-center">
            <div class="col-12 col-md-12 col-xl-8 col-sm-8 left">
                {!! Form::open(array('route' => 'videos.store','method'=>'POST','class'=>'form mt-4 ml-3')) !!}
                    <div class="form-group row">
                        <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Video Title</label>
                        <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                            <input type="text" class="form-control" name="title" placeholder="Video Title">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Video Description</label>
                        <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                            <input type="text" class="form-control" name="description" placeholder="Video Title">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Video Link</label>
                        <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                            <input type="text" class="form-control" name="link" placeholder="Youtube Video Link">
                        </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-4 col-form-label ">Video Section</label>
                      <div class="col-8">
                        <select id="sections" name="section_id"  class="form-select">
                          <option value="" selected>Select Section</option>
                          @if(count($sections) > 0)
                            @foreach($sections as $section)
                              <option value="{{ $section->id }}" {{ ( old('section_id') == $section->id )?'selected':''}}>{{ $section->section_name }}</option>
                            @endforeach
                          @endif
                        </select>
                        @if($errors->has('section_id'))
                          <span class="error-msg">{{$errors->first('section_id')}}</span>
                        @endif
                      </div>
                    </div>
                    <div class="form-group row" style="display:none;">
                      <label class="col-4 col-form-label ">Video Type</label>
                      <div class="col-8">
                        <select id="types" name="design_id"  class="form-select">
                          <option value="" selected>Select Section</option>
                          @if(count($sections) > 0)
                            @foreach($sections as $section)
                              <option value="{{ $section->id }}" {{ ( old('section_id') == $section->id )?'selected':''}}>{{ $section->section_name }}</option>
                            @endforeach
                          @endif
                        </select>
                        @if($errors->has('section_id'))
                          <span class="error-msg">{{$errors->first('section_id')}}</span>
                        @endif
                      </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Status</label>
                        <div class="col-12 col-md-7 col-xl-7 col-sm-12 toggle-switch">
                            <input type="checkbox" id="status" name="status" value="Y" /><label for="status">Status</label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-12 col-md-12 col-xl-11 col-sm-12 save-btn">
                            <button type="submit" class="btn btn-outline-primary"><i
                                    class="far fa-save save-icon"></i>Save
                                </button>
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </section>
</div>

@endsection
@section('js-hooks')
<script type="text/javascript" defer>
  var url="{{ route('videos.getType') }}";
</script>
<script src="{{ asset('assets/js/add_video.js') }}" defer></script>
@endsection