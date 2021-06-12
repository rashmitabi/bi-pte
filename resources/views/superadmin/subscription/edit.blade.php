<div class="modal-body">
    <form class="form mt-4">
        <div class="form-group row">
            <label class="col-4 col-form-label ">Subscription Title</label>
            <div class="col-8">
                <input type="text" class="form-control " name="title" placeholder="Enter Subscription Title" value="{{ $subscription->title }}">
                @if($errors->has('title'))
                    <span class="error-msg">{{$errors->first('title')}}</span>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label class="col-4 col-form-label ">Description</label>
            <div class="col-8">
                <textarea class="form-control" id="exampleFormControlTextarea1"
                    rows="3" name="description" placeholder="Enter Description">{{ $subscription->description }}</textarea>
                    @if($errors->has('description'))
                        <span class="error-msg">{{$errors->first('description')}}</span>
                    @endif
            </div>
        </div>
        <div class="form-group row">
            <label class="col-4 col-form-label ">Select Role</label>
            <div class="col-8">
                <select class="user-type custom-select" name="role_id">
                    <option selected disabled>Select User Type</option>
                    <option value="1" {{ ($subscription->role_id == '1')?'selected':''}}>Student</option>
                    <option value="2" {{ ($subscription->role_id == '2')?'selected':''}}>Institute</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-4 col-form-label ">Number Of Students Allowed</label>
            <div class="col-8">
                <input type="text" class="form-control " name="students_allowed" placeholder="Enter Number Of Students Allowed" value="{{ $subscription->students_allowed }}">
                @if($errors->has('students_allowed'))
                    <span class="error-msg">{{$errors->first('students_allowed')}}</span>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label class="col-4 col-form-label ">Monthly Price</label>
            <div class="col-8">
                <input type="text" class="form-control " name="monthly_price" placeholder="Enter Monthly Price" value="{{ $subscription->monthly_price }}">
                @if($errors->has('monthly_price'))
                    <span class="error-msg">{{$errors->first('monthly_price')}}</span>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label class="col-4 col-form-label ">Quarterly Price</label>
            <div class="col-8">
                <input type="text" class="form-control " name="quarterly_price" placeholder="Enter Quarterly Price" value="{{ $subscription->quarterly_price }}">
                @if($errors->has('quarterly_price'))
                    <span class="error-msg">{{$errors->first('quarterly_price')}}</span>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label class="col-4 col-form-label ">Half Yearly Price</label>
            <div class="col-8">
                <input type="text" class="form-control " name="halfyearly_price" placeholder="Enter Half Yearly Price" value="{{ $subscription->halfyearly_price }}">
                @if($errors->has('halfyearly_price'))
                    <span class="error-msg">{{$errors->first('halfyearly_price')}}</span>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label class="col-4 col-form-label ">Annually Price</label>
            <div class="col-8">
                <input type="text" class="form-control " name="annually_price" placeholder="Enter Annually Price" value="{{ $subscription->annually_price }}">
                @if($errors->has('annually_price'))
                    <span class="error-msg">{{$errors->first('annually_price')}}</span>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label class="col-4 col-form-label ">White Labelling Price</label>
            <div class="col-8">
                <input type="text" class="form-control " name="white_labelling_price" placeholder="White Labelling Price" value="{{ $subscription->white_labelling_price }}">
                @if($errors->has('white_labelling_price'))
                    <span class="error-msg">{{$errors->first('white_labelling_price')}}</span>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label class="col-4 col-form-label ">Mock Tests</label>
            <div class="col-8">
                <input type="text" class="form-control " name="mock_tests" placeholder="Number Of Mock Tests Allowed" value="{{ $subscription->mock_tests }}">
                @if($errors->has('mock_tests'))
                    <span class="error-msg">{{$errors->first('mock_tests')}}</span>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label class="col-4 col-form-label ">Practice Tests</label>
            <div class="col-8">
                <input type="text" class="form-control " name="practice_tests" placeholder="Number Of Practice Tests Allowed" value="{{ $subscription->practice_tests }}">
                @if($errors->has('practice_tests'))
                    <span class="error-msg">{{$errors->first('practice_tests')}}</span>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label class="col-4 col-form-label ">Practice Questions</label>
            <div class="col-7">
                <input type="text" class="form-control " name="practice_questions" placeholder="Number Of Practice Questions Allowed" value="{{ $subscription->practice_questions }}">
                @if($errors->has('practice_questions'))
                    <span class="error-msg">{{$errors->first('practice_questions')}}</span>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label class="col-4 col-form-label ">Can Add Videos?</label>
            <div class="col-8 toggle-switch">
                <input type="checkbox" id="video" name="videos" value="Y" {{ ($subscription->videos == 'Y')?'selected':''}} /><label for="video">Toggle</label>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-4 col-form-label ">Can Add Prediction Files?</label>
            <div class="col-8 toggle-switch">
                <input type="checkbox" id="files" name="prediction_files" value="Y" {{ ($subscription->prediction_files == 'Y')?'selected':''}} /><label for="files">Toggle</label>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-4 col-form-label ">Status</label>
            <div class="col-8 toggle-switch">
                <input type="checkbox" id="status" name="status" value="E" {{ ($subscription->status == 'E')?'selected':''}} /><label for="status">Toggle</label>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-12 save-btn">
                <button type="button" class="btn btn-outline-primary"><i
                        class="far fa-save save-icon"></i>Save</button>
            </div>
        </div>
    </form>
</div>