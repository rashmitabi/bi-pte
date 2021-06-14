@extends('layouts.appSuperAdmin')
@section('content')
<!-- Page Content  -->
<div id="content">

    <section class="top-title-button mb-3">
        <div class="row mx-0 align-items-center">
            <div class="col-12 col-md-12 col-xl-8 col-sm-8 left">
                <h1 class="title mb-4">Add New Voucher</h1>
            </div>
        </div>
    </section>

    <section class="top-title-button white-bg mb-3 remove-main-margin">
        <div class="row mx-0 align-items-center">
            <div class="col-12 col-md-12 col-xl-8 col-sm-8 left">
                {!! Form::open(array('route' => 'vouchers.store','method'=>'POST','class'=>'form mt-4 ml-3')) !!}
                    <div class="form-group row">
                        <label class="col-4 col-form-label ">Voucher Name</label>
                        <div class="col-7">
                            <input type="text" class="form-control "name="name" placeholder="Enter Voucher Name" value="{{old('name')}}">
                            @if($errors->has('name'))
                                <span class="error-msg">{{$errors->first('name')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-4 col-form-label ">Voucher Code</label>
                        <div class="col-7">
                            <input type="text" class="form-control "name="code" placeholder="Enter Voucher Code" value="{{old('code')}}">
                            @if($errors->has('code'))
                                <span class="error-msg">{{$errors->first('code')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-4 col-form-label ">Select Role</label>
                        <div class="col-7">
                            <select class="user-type custom-select" name="role_id">
                                <option selected disabled>Select User Type</option>
                                <option value="1" {{ (old('role_id') == '1')?'selected':''}}>Student</option>
                                <option value="2" {{ (old('role_id') == '2')?'selected':''}}>Institute</option>
                            </select>
                                @if($errors->has('role_id'))
                                    <span class="error-msg">{{$errors->first('role_id')}}</span>
                                @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-4 col-form-label ">Voucher Type</label>
                        <div class="col-7">
                            <select class="user-type custom-select" name="voucher_type">
                                <option selected disabled>Select Voucher Type</option>
                                <option value="P" {{ (old('voucher_type') == 'P')?'selected':''}}>Percentage Amount</option>
                                <option value="F" {{ (old('voucher_type') == 'F')?'selected':''}}>Fixed Amount</option>
                            </select>
                            @if($errors->has('voucher_type'))
                                <span class="error-msg">{{$errors->first('voucher_type')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-4 col-form-label ">Voucher Price</label>
                        <div class="col-7">
                            <input type="text" class="form-control " name="voucher_price" placeholder="Enter Voucher Price" value="{{ old('voucher_price') }}">
                            @if($errors->has('voucher_price'))
                                <span class="error-msg">{{$errors->first('voucher_price')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                      <label  class="col-4 col-form-label ">Voucher Expiry Date</label>
                       <div class="col-7">
                          <input type="date" class="form-control " name="valid_till" placeholder="Select Voucher Expiry Date" value="{{ old('valid_till') }}">
                            @if($errors->has('valid_till'))
                                <span class="error-msg">{{$errors->first('valid_till')}}</span>
                            @endif
                      </div>
                   </div>
                    <div class="form-group row">
                        <label class="col-4 col-form-label ">Status</label>
                        <div class="col-7 toggle-switch">
                            <input type="checkbox" id="video" name="status" value="E" {{ (old('valid_till') == 'E')?'checked':'' }} /><label for="video">Status</label>
                            @if($errors->has('status'))
                                <span class="error-msg">{{$errors->first('status')}}</span>
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