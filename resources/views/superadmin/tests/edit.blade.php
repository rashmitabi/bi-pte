<form class="form mt-4 ml-3" method="post" action="">
    @csrf
    <div class="form-group row">
        <label class="col-4 col-form-label ">Select Test Type</label>
        <div class="col-7">
            <select class="user-type custom-select" name="type">
                <option selected disabled>Select Test Type</option>
                <option value="M" {{ ($test->type == 'M')?'selected':''}} >Mock</option>
                <option value="P" {{ ($test->type == 'P')?'selected':''}} >Practice</option>
            </select>
            <span class="error-msg" id="typeError"></span>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-4 col-form-label ">Test Name</label>
        <div class="col-7">
            <input type="text" class="form-control " name="test_name"
            placeholder="Enter Test Name" value="{{ $test->test_name }}">
            <span class="error-msg" id="nameError"></span>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-4 col-form-label ">Select Subject</label>
        <div class="col-7">
            <select class="user-type custom-select" name="subject">
                <option selected disabled>Select Subject Type</option>
                @foreach($subjects as $subject)
                    <option value="{{ $subject->id }}" {{ ($test->subject_id == $subject->id)?'selected':'' }}>{{ $subject->subject_name }}</option>
                @endforeach
            </select>
            <span class="error-msg" id="subjectError"></span>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-11 save-btn">
            <button type="button" class="btn btn-outline-primary test-update" data-id="{{ $test->id }}" data-url="{{ route('tests.update', $test->id) }}"><i
                    class="far fa-save save-icon"></i>Save</button>
        </div>
    </div>
</form>