<form class="form mt-4" id="certificateScore">
    @csrf
    <input type="hidden" name="student_user_id" value="{{ $scores['user_id'] }}">
    <input type="hidden" name="test_id" value="{{ $scores['test_id'] }}">
    <input type="hidden" name="count" value="{{ $scores['count'] }}">
    @if(checkPermission('add_test_reports'))
    <input type="hidden" id="update_url" value="{{ route('branchadmin-update-score') }}">
    @endif
    <div class="form-group row">
        <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Listening</label>
        <div class="col-12 col-md-7 col-xl-7 col-sm-12">
            <input type="text" class="form-control " name="listening" value="{{ $scores['listening'] }}">
            <span class="error-msg" id="listeningError"></span>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Speaking</label>
        <div class="col-12 col-md-7 col-xl-7 col-sm-12">
            <input type="text" class="form-control" name="speaking" value="{{ $scores['speaking'] }}">
            <span class="error-msg" id="speakingError"></span>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Reading</label>
        <div class="col-12 col-md-7 col-xl-7 col-sm-12">
            <input type="text" class="form-control " name="reading" value="{{ $scores['reading'] }}">
            <span class="error-msg" id="readingError"></span>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Writing</label>
        <div class="col-12 col-md-7 col-xl-7 col-sm-12">
            <input type="text" class="form-control " name="writing" value="{{ $scores['writing'] }}">
            <span class="error-msg" id="writingError"></span>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Grammer</label>
        <div class="col-12 col-md-7 col-xl-7 col-sm-12">
            <input type="text" class="form-control" name="grammar" value="{{ $scores['grammar'] }}">
            <span class="error-msg" id="grammarError"></span>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Oral Fluency</label>
        <div class="col-12 col-md-7 col-xl-7 col-sm-12">
            <input type="text" class="form-control" name="oral_fluency" value="{{ $scores['oral_fluency'] }}">
            <span class="error-msg" id="oral_fluencyError"></span>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Pronunciation</label>
        <div class="col-12 col-md-7 col-xl-7 col-sm-12">
            <input type="text" class="form-control" name="pronunciation" value="{{ $scores['pronunciation'] }}">
            <span class="error-msg" id="pronunciationError"></span>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Spelling</label>
        <div class="col-12 col-md-7 col-xl-7 col-sm-12">
            <input type="text" class="form-control" name="spelling" value="{{ $scores['spelling'] }}">
            <span class="error-msg" id="spellingError"></span>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Vacabulary</label>
        <div class="col-12 col-md-7 col-xl-7 col-sm-12">
            <input type="text" class="form-control" name="vocabulary" value="{{ $scores['vocabulary'] }}">
            <span class="error-msg" id="vocabularyError"></span>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Written Discourse</label>
        <div class="col-12 col-md-7 col-xl-7 col-sm-12">
            <input type="text" class="form-control" name="written_discourse" value="{{ $scores['written_disclosure'] }}">
            <span class="error-msg" id="written_discourseError"></span>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Overall Score</label>
        <div class="col-12 col-md-7 col-xl-7 col-sm-12">
            <input type="text" class="form-control" name="score" value="{{ $scores['overall'] }}">
            <span class="error-msg" id="scoreError"></span>
        </div>
    </div>
    @if(checkPermission('add_test_reports'))
    <div class="form-group row">
        <div class="col-12 col-md-12 col-xl-11 col-sm-12 save-btn">
            <button type="button" class="btn btn-outline-primary" id="add_certificate" data-url="{{ route('branchadmin-certificates.store') }}"><i
                    class="far fa-save save-icon"></i>Save Certificate</button>
        </div>
    </div>
    @endif
</form>