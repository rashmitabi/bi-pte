@extends('layouts.appSuperAdmin')
@section('content')
<!-- Page Content  -->
<div id="content">

    <section class="top-title-button mb-3">
        <div class="row mx-0 align-items-center">
            <div class="col-12 col-md-12 col-xl-8 col-sm-8 left">
                <h1 class="title mb-4">Add New Test</h1>
            </div>
        </div>
    </section>

    <section class="top-title-button white-bg mb-3 remove-main-margin">
        <div class="row mx-0 align-items-center">
            <div class="col-12 col-md-12 col-xl-8 col-sm-8 left">
                {!! Form::open(array('route' => 'tests.store','method'=>'POST','class'=>'form mt-4 ml-3')) !!}
                    <div class="form-group row">
                        <label class="col-4 col-form-label ">Select Test Type</label>
                        <div class="col-7">
                            <select class="user-type custom-select" name="type">
                                <option selected disabled>Select Test Type</option>
                                <option value="M" {{ (old('type') == 'M')?'selected':''}} >Mock</option>
                                <option value="P" {{ (old('type') == 'P')?'selected':''}} >Practice</option>
                            </select>
                            @if($errors->has('type'))
                            <span class="error-msg">{{$errors->first('type')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-4 col-form-label ">Test Name</label>
                        <div class="col-7">
                            <input type="text" class="form-control " name="test_name"
                                placeholder="Enter Test Name" value="{{ old('test_name') }}">
                            @if($errors->has('test_name'))
                                <span class="error-msg">{{$errors->first('test_name')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-4 col-form-label ">Select Subject</label>
                        <div class="col-7">
                            <select class="user-type custom-select" name="subject">
                                <option selected disabled>Select Subject Type</option>
                                @foreach($subjects as $subject)
                                    <option value="{{ $subject->id }}" {{ (old('subject') == $subject->id)?'selected':'' }}>{{ $subject->subject_name }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('subject'))
                                <span class="error-msg">{{$errors->first('subject')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-11 save-btn">
                            <button type="submit" class="btn btn-outline-primary"><i
                                    class="far fa-save save-icon"></i>Save</button>
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </section>
</div>

@endsection