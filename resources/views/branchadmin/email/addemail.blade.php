@extends('layouts.appBranchAdmin')
@section('content')
<!-- Page Content  -->
<div id="content">

    <section class="top-title-button mb-3">
        <div class="row mx-0 align-items-center">
            <div class="col-12 col-md-12 col-xl-8 col-sm-8 left">
                <h1 class="title mb-4">Add Email Template</h1>
            </div>
        </div>
    </section>

    <section class="top-title-button white-bg mb-3 remove-main-margin">
        <div class="row mx-0 align-items-center">
            <div class="col-12 col-md-12 col-xl-8 col-sm-8 left">
                {!! Form::open(array('route' => 'branchadmin-email.store','method'=>'POST','class'=>'form mt-4 ml-3')) !!}
                    <div class="form-group row">
                        <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Template Name</label>
                        <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                            <input type="text" class="form-control " name="name" placeholder="Enter Template Name" value="{{ old('name') }}">
                            @if($errors->has('name'))
                                <span class="error-msg">{{$errors->first('name')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Email Subject</label>
                        <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                            <input type="text" class="form-control " name="subject" placeholder="Enter Email Subject" value="{{ old('subject') }}">
                            @if($errors->has('subject'))
                                <span class="error-msg">{{$errors->first('subject')}}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-12 col-form-label pt-0">Email Body</label>
                        <div class="col-12">
                            <!-- <div id="editor">
                                <h2>The three greatest things you learn from traveling</h2>
                            </div> -->
                            <textarea name="body" id="editor">{{ old('body') }}</textarea>
                            @if($errors->has('body'))
                                <span class="error-msg">{{$errors->first('body')}}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Status</label>
                        <div class="col-7 toggle-switch">
                            <input type="checkbox" id="files" name="status" value="E" {{ (old('status') == 'E')?'checked':'' }} /><label for="files">Status</label>
                            @if($errors->has('status'))
                                <span class="error-msg">{{$errors->first('status')}}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-12 col-md-12 col-xl-11 col-sm-12 save-btn">
                            <a href="{{ route('branchadmin-email.index') }}"><button  type="button" class="btn btn-outline-primary "><img class="back-btn" src="{{ asset('assets/images/icons/back.svg') }}" style="width: 14px;margin-right: 10px">Cancel</button></a>
                            <button type="submit" class="btn btn-outline-primary mr-2"><i
                                    class="far fa-save save-icon"></i>Save</button>
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </section>
</div>
@endsection
