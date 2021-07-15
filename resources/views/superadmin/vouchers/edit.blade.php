<form class="form mt-4 ml-3" method="post" action="">
@csrf
<div class="form-group row">
    <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label required">Voucher Name</label>
    <div class="col-12 col-md-7 col-xl-7 col-sm-12">
        <input type="text" class="form-control "name="name" placeholder="Enter Voucher Name" value="{{ $voucher->name }}">
        <span class="error-msg" id="nameError"></span>
    </div>
</div>
<div class="form-group row">
    <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label required">Voucher Code</label>
    <div class="col-12 col-md-7 col-xl-7 col-sm-12">
        <input type="text" class="form-control "name="code" placeholder="Enter Voucher Code" value="{{ $voucher->code }}">
        <span class="error-msg" id="codeError"></span>
    </div>
</div>
<div class="form-group row">
    <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label required">Select Role</label>
    <div class="col-12 col-md-7 col-xl-7 col-sm-12">
        <select class="user-type custom-select" name="role_id">
            <option selected disabled>Select User Type</option>
            @foreach($roles as $role)
                <option value="{{ $role->id }}" {{ ($voucher->role_id == $role->id)?'selected':''}}>{{ $role->role_name }}</option>
            @endforeach
        </select>
        <span class="error-msg" id="roleIdError"></span>
    </div>
</div>
<div class="form-group row">
    <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label required">Voucher Type</label>
    <div class="col-12 col-md-7 col-xl-7 col-sm-12">
        <select class="user-type custom-select voucher-type" name="voucher_type">
            <option selected disabled>Select Voucher Type</option>
            <option value="P" {{ ($voucher->discount_type == 'P')?'selected':''}}>Percentage Amount</option>
            <option value="F" {{ ($voucher->discount_type == 'F')?'selected':''}}>Fixed Amount</option>
        </select>
        <span class="error-msg" id="voucherTypeError"></span>
    </div>
</div>
<div class="form-group row">
    <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label voucher-price-label required">{{ ($voucher->discount_type == 'P')?'Percentage Price':'Fixed Price'}}</label>
    <div class="col-12 col-md-7 col-xl-7 col-sm-12">
        <input type="text" class="form-control " name="voucher_price" placeholder="Enter Voucher Price" value="{{ ($voucher->discount_type == 'P')?$voucher->discount_percentage:$voucher->discount_price }}">
        <span class="error-msg" id="voucherPriceError"></span>
    </div>
</div>
<div class="form-group row">
    <label  class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label required">Voucher Expiry Date</label>
    <div class="col-12 col-md-7 col-xl-7 col-sm-12">
        <input type="date" class="form-control " name="valid_till" placeholder="Select Voucher Expiry Date" value="{{ $voucher->valid_till }}">
        <span class="error-msg" id="validTillError"></span>
    </div>
</div>
<div class="form-group row">
    <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Status</label>
    <div class="col-12 col-md-7 col-xl-7 col-sm-12 toggle-switch">
        <input type="checkbox" id="video" name="status" value="E" {{ ($voucher->status == 'E')?'checked':''}} /><label for="video">Status</label>
        <span class="error-msg" id="statusError"></span>
    </div>
</div>
<div class="form-group row">
    <div class="col-12 col-md-12 col-xl-11 col-sm-12 save-btn">
        <button type="button" class="btn btn-outline-primary voucher-update" data-id="{{ $voucher->id }}" data-url="{{ route('vouchers.update', $voucher->id) }}"><i
                class="far fa-save save-icon"></i>Save</button>
    </div>
</div>
</form>