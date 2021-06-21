<form class="form mt-4 ml-3" method="post" action="">
@csrf
<div class="form-group row">
    <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Subject Name</label>
    <div class="col-12 col-md-7 col-xl-7 col-sm-12">
        <input type="text" class="form-control "name="name" placeholder="Enter Subject Name" value="{{ $subject->subject_name }}">
        <span class="error-msg" id="nameError"></span>
    </div>
</div>
<div class="form-group row">
    <div class="col-12 col-md-12 col-xl-11 col-sm-12 save-btn">
        <button type="button" class="btn btn-outline-primary subject-update" data-id="{{ $subject->id }}" data-url="{{ route('subjects.update', $subject->id) }}">
            <i class="far fa-save save-icon"></i>Save</button>
    </div>
</div>
</form>