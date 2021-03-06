@extends('layouts.appSuperAdmin')
@section('content')
<!-- Page Content  -->
<div id="content">

    <section class="top-title-button mb-3">
        <div class="row mx-0 align-items-center">
            <div class="col-12 col-md-12 col-xl-8 col-sm-12 left">
                <h1 class="title mb-4">Add Subscription</h1>
            </div>
        </div>
    </section>
    
    <section class="top-title-button white-bg mb-3 remove-main-margin">
        <div class="row mx-0 align-items-center">
            <div class="col-12 col-md-12 col-xl-8 col-sm-12 mt-4 left">
                {!! Form::open(array('route' => 'subscription.store','method'=>'POST','class'=>'form')) !!}
                    <div class="form-group row">
                        <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label required">Subscription Title</label>
                        <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                            <input type="text" class="form-control "name="title" placeholder="Enter Subscription Title" value="{{old('title')}}">
                            @if($errors->has('title'))
                            <span class="error-msg">{{$errors->first('title')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-md-5 col-xl-4 col-sm-12  col-form-label required">Description</label>
                        <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                            <textarea class="form-control" name="description" id="exampleFormControlTextarea1"
                                rows="3" placeholder="Enter Description">{{old('description')}}</textarea>
                                @if($errors->has('description'))
                                    <span class="error-msg">{{$errors->first('description')}}</span>
                                @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label required">Select Role</label>
                        <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                            <select class="user-type custom-select" name="role_id">
                                <option selected disabled>Select User Type</option>
                                <option value="2" {{ (old('role_id') == '2')?'selected':''}}>Branch Admin</option>
                                <!-- @foreach($roles as $role)
                                    <option value="{{ $role->id }}" {{ (old('role_id') == $role->id)?'selected':''}}>{{ $role->role_name }}</option>
                                @endforeach -->
                            </select>
                                @if($errors->has('role_id'))
                                    <span class="error-msg">{{$errors->first('role_id')}}</span>
                                @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label required">Number Of Students Allowed</label>
                        <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                            <input type="number" class="form-control " name="students_allowed" placeholder="Enter Number Of Students Allowed" value="{{old('students_allowed')}}">
                            @if($errors->has('students_allowed'))
                                <span class="error-msg">{{$errors->first('students_allowed')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label required">Monthly Price</label>
                        <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                            <input type="text" class="form-control " name="monthly_price" placeholder="Enter Monthly Price" value="{{old('monthly_price')}}">
                            @if($errors->has('monthly_price'))
                                <span class="error-msg">{{$errors->first('monthly_price')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label required">Quarterly Price</label>
                        <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                            <input type="text" class="form-control " name="quarterly_price" placeholder="Enter Quarterly Price" value="{{old('quarterly_price')}}">
                            @if($errors->has('quarterly_price'))
                                <span class="error-msg">{{$errors->first('quarterly_price')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label required">Half Yearly Price</label>
                        <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                            <input type="text" class="form-control " name="halfyearly_price" placeholder="Enter Half Yearly Price" value="{{old('halfyearly_price')}}">
                            @if($errors->has('halfyearly_price'))
                                <span class="error-msg">{{$errors->first('halfyearly_price')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label required">Annually Price</label>
                        <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                            <input type="text" class="form-control " name="annually_price" placeholder="Enter Annually Price" value="{{old('annually_price')}}">
                            @if($errors->has('annually_price'))
                                <span class="error-msg">{{$errors->first('annually_price')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label required">White Labelling Price</label>
                        <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                            <input type="text" class="form-control " name="white_labelling_price" placeholder="White Labelling Price" value="{{old('white_labelling_price')}}">
                            @if($errors->has('white_labelling_price'))
                                <span class="error-msg">{{$errors->first('white_labelling_price')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label required">Mock Tests</label>
                        <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                            <input type="text" class="form-control " name="mock_tests" placeholder="Number Of Mock Tests Allowed" value="{{old('mock_tests')}}">
                            @if($errors->has('mock_tests'))
                                <span class="error-msg">{{$errors->first('mock_tests')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label required">Practice Tests</label>
                        <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                            <input type="text" class="form-control " name="practice_tests" placeholder="Number Of Practice Tests Allowed" value="{{old('practice_tests')}}">
                            @if($errors->has('practice_tests'))
                                <span class="error-msg">{{$errors->first('practice_tests')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Can Add Videos?</label>
                        <div class="col-12 col-md-7 col-xl-7 col-sm-12 toggle-switch">
                            <input type="checkbox" id="videos" name="videos" value="Y" checked /><label for="videos">Toggle</label>
                            @if($errors->has('videos'))
                                <span class="error-msg">{{$errors->first('videos')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Can Add Prediction Files?</label>
                        <div class="col-12 col-md-7 col-xl-7 col-sm-12 toggle-switch">
                            <input type="checkbox" id="prediction_files" name="prediction_files" value="Y" checked /><label for="prediction_files">Toggle</label>
                            @if($errors->has('prediction_files'))
                                <span class="error-msg">{{$errors->first('prediction_files')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Status</label>
                        <div class="col-12 col-md-7 col-xl-7 col-sm-12 toggle-switch">
                            <input type="checkbox" id="status" name="status" value="E" checked /><label for="status">Toggle</label>
                            @if($errors->has('status'))
                                <span class="error-msg">{{$errors->first('status')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-12 col-md-12 col-xl-11 col-sm-12 save-btn">
                            <a href="{{ route('subscription.index') }}"><button  type="button" class="btn btn-outline-primary "><img class="back-btn" src="{{ asset('assets/images/icons/back.svg') }}" style="width: 14px;margin-right: 10px">Cancel</button></a>
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