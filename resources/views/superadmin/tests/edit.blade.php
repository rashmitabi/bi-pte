<form class="form mt-4 ml-3" method="POST" action="{{ route('superadmin-tests-update', $test->id) }}" enctype="multipart/form-data" id="test-update" name="test-update">
    @csrf
    <div class="form-group row">
        <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Select Test Type</label>
        <div class="col-12 col-md-7 col-xl-7 col-sm-12">
            <select class="user-type custom-select" name="type" id="type">
                <option selected disabled>Select Test Type</option>
                <option value="M" {{ ($test->type == 'M')?'selected':''}} >Mock</option>
                <option value="P" {{ ($test->type == 'P')?'selected':''}} >Practice</option>
            </select>
            <span class="error-msg" id="typeError"></span>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Test Name</label>
        <div class="col-12 col-md-7 col-xl-7 col-sm-12">
            <input type="text" class="form-control " name="test_name" id="test_name"
            placeholder="Enter Test Name" value="{{ $test->test_name }}">
            <span class="error-msg" id="nameError"></span>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Select Subject</label>
        <div class="col-12 col-md-7 col-xl-7 col-sm-12">
            <select class="user-type custom-select" name="subject" id="subject">
                <option selected disabled>Select Subject Type</option>
                @foreach($subjects as $subject)
                    <option value="{{ $subject->id }}" {{ ($test->subject_id == $subject->id)?'selected':'' }}>{{ $subject->subject_name }}</option>
                @endforeach
            </select>
            <span class="error-msg" id="subjectError"></span>
        </div>
    </div>
    <div class="form-group row">
    <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Test Image</label>
    <div class="col-12">  
            <div class="profile-img">
              @if($test->image != '')
                <img src="{{ asset('assets/images/test-images/'.$test->image) }}" id="output">
              @else
                <img src="{{ asset('assets/images/profile-img-2.png') }}" id="output">
              @endif
            </div>
            <div class="edit-profile-btn">
              <a><input type="file" name="image" id="image" onchange="readURL(event)" class="custom-file-input position-absolute"><i class="fas fa-pen icon"></i></a>
            </div>
          </div>
</div>
    <div class="form-group row">
        <div class="col-12 col-md-12 col-xl-11 col-sm-12 save-btn">
            <button type="submit" class="btn btn-outline-primary" data-id="{{ $test->id }}" data-url="{{ route('superadmin-tests-update', $test->id) }}"><i
                    class="far fa-save save-icon"></i>Save</button>
        </div>
    </div>
</form>