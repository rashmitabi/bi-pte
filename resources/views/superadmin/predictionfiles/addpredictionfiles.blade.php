@extends('layouts.appSuperAdmin')
@section('content')
<!-- Page Content  -->
<div id="content">

    <section class="top-title-button mb-3">
        <div class="row mx-0 align-items-center">
            <div class="col-12 col-md-12 col-xl-8 col-sm-8 left">
                <h1 class="title mb-4">Add Prediction File</h1>
            </div>
        </div>
    </section>

    <section class="top-title-button white-bg mb-3 remove-main-margin">
        <div class="row mx-0 align-items-center">
            <div class="col-12 col-md-12 col-xl-8 col-sm-8 left">
                {!! Form::open(array('route' => 'predictionfiles.store','method'=>'POST','class'=>'form mt-4 ml-3', 'enctype' => 'multipart/form-data')) !!}
                    <div class="form-group row">
                        <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">File Title</label>
                        <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                            <input type="text" class="form-control" name="title" placeholder="File Title" value="{{old('title')}}">
                            @if($errors->has('title'))
                              <span class="error-msg">{{$errors->first('title')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">File Description</label>
                        <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                            <input type="text" class="form-control" name="description" placeholder="File Description" value="{{old('description')}}">
                            @if($errors->has('description'))
                              <span class="error-msg">{{$errors->first('description')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                      <label  class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Upload Prediction File</label>
                       <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                           <div class="custom-file">
                               <input type="file" class="custom-file-input" name="file" id="customFile">
                               <label class="custom-file-label" for="customFile">Please Upload Prediction File</label>
                               @if($errors->has('file'))
                                  <span class="error-msg">{{$errors->first('file')}}</span>
                                @endif
                           </div>
                      </div>
                   </div>
                    <div class="form-group row">
                      <label class="col-4 col-form-label ">File Section</label>
                      <div class="col-8">
                        <select id="sections" name="section_id"  class="form-select">
                          <option value="" selected>Select Section</option>
                          @if(count($sections) > 0)
                            @foreach($sections as $section)
                              <option value="{{ $section->id }}" {{ ( old('section_id') == $section->id )?'selected':''}}>{{ ucfirst($section->section_name) }}</option>
                            @endforeach
                          @endif
                        </select>
                        @if($errors->has('section_id'))
                          <span class="error-msg">{{$errors->first('section_id')}}</span>
                        @endif
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-4 col-form-label ">File Type</label>
                      <div class="col-8">
                        <select id="types" name="design_id" class="form-select" data-json="{{ json_encode($types) }}">
                          <option value="" selected>Select Type</option>
                          
                        </select>
                        @if($errors->has('design_id'))
                          <span class="error-msg">{{$errors->first('design_id')}}</span>
                        @endif
                      </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Status</label>
                        <div class="col-12 col-md-7 col-xl-7 col-sm-12 toggle-switch">
                            <input type="checkbox" id="status" name="status" value="E" checked {{ (old('status') == 'E')?'checked':'' }}/><label for="status">Toggle</label>
                            @if($errors->has('status'))
                                <span class="error-msg">{{$errors->first('status')}}</span>
                            @endif
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
<script src="{{ asset('assets/js/add_video.js') }}" defer></script>
@endsection