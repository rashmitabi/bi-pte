<div class="modal-body">
    <form class="form mt-4">
        @csrf
        <div class="form-group row">
            <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label required">Subscription Title</label>
            <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                <input type="text" class="form-control " name="title" placeholder="Enter Subscription Title" value="{{ $subscription->title }}">
                <span class="error-msg" id="titleError"></span>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label required">Description</label>
            <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                <textarea class="form-control" id="exampleFormControlTextarea1"
                    rows="3" name="description" placeholder="Enter Description">{{ $subscription->description }}</textarea>
                    <span class="error-msg" id="descriptionError"></span>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label required">Select Role</label>
            <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                <select class="user-type custom-select" name="role_id">
                    <option selected disabled>Select User Type</option>
                    <option value="2" {{ ($subscription->role_id == '2')?'selected':''}}>Branch Admin</option>
                    <!-- @foreach($roles as $role)
                        <option value="{{ $role->id }}" {{ ($subscription->role_id == $role->id)?'selected':''}}>{{ $role->role_name }}</option>
                    @endforeach -->
                </select>
                <span class="error-msg" id="roleidError"></span>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label required">Number Of Students Allowed</label>
            <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                <input type="number" class="form-control " name="students_allowed" placeholder="Enter Number Of Students Allowed" value="{{ $subscription->students_allowed }}">
                <span class="error-msg" id="studentsAllowedError"></span>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label required">Monthly Price</label>
            <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                <input type="text" class="form-control " name="monthly_price" placeholder="Enter Monthly Price" value="{{ $subscription->monthly_price }}">
                <span class="error-msg" id="monthlyPriceError"></span>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label required">Quarterly Price</label>
            <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                <input type="text" class="form-control " name="quarterly_price" placeholder="Enter Quarterly Price" value="{{ $subscription->quarterly_price }}">
                <span class="error-msg" id="quarterlyPriceError"></span>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label required">Half Yearly Price</label>
            <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                <input type="text" class="form-control " name="halfyearly_price" placeholder="Enter Half Yearly Price" value="{{ $subscription->halfyearly_price }}">
                <span class="error-msg" id="halfyearlyPriceError"></span>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label required">Annually Price</label>
            <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                <input type="text" class="form-control " name="annually_price" placeholder="Enter Annually Price" value="{{ $subscription->annually_price }}">
                <span class="error-msg" id="annuallyPriceError"></span>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label required">White Labelling Price</label>
            <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                <input type="text" class="form-control " name="white_labelling_price" placeholder="White Labelling Price" value="{{ $subscription->white_labelling_price }}">
                <span class="error-msg" id="whiteLabellingPriceError"></span>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label required">Mock Tests</label>
            <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                <input type="text" class="form-control " name="mock_tests" placeholder="Number Of Mock Tests Allowed" value="{{ $subscription->mock_tests }}">
                <span class="error-msg" id="mockTestsError"></span>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label required">Practice Tests</label>
            <div class="col-12 col-md-7 col-xl-7 col-sm-12">
                <input type="text" class="form-control " name="practice_tests" placeholder="Number Of Practice Tests Allowed" value="{{ $subscription->practice_tests }}">
                <span class="error-msg" id="practiceTestsError"></span>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Can Add Videos?</label>
            <div class="col-12 col-md-7 col-xl-7 col-sm-12 toggle-switch">
                <input type="checkbox" id="videos" name="videos" value="Y" {{ ($subscription->videos == 'Y')?'checked':''}} />
                <label for="videos">Toggle</label>
                <span class="error-msg" id="videosError"></span>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Can Add Prediction Files?</label>
            <div class="col-12 col-md-7 col-xl-7 col-sm-12 toggle-switch">
                <input type="checkbox" id="prediction_files" name="prediction_files" value="Y" {{ ($subscription->prediction_files == 'Y')?'checked':''}} />
                <label for="prediction_files">Toggle</label>
                <span class="error-msg" id="predictionFilesError"></span>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Status</label>
            <div class="col-12 col-md-7 col-xl-7 col-sm-12 toggle-switch">
                <input type="checkbox" id="status" name="status" value="E" {{ ($subscription->status == 'E')?'checked':''}} />
                <label for="status">Toggle</label>
                <span class="error-msg" id="statusError"></span>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-12 col-md-12 col-xl-11 col-sm-12 save-btn">
                <button type="button" class="btn btn-outline-primary subscription-update" data-id="{{ $subscription->id }}" data-url="{{ route('subscription.update', $subscription->id) }}"><i
                        class="far fa-save save-icon"></i>Save</button>
            </div>
        </div>
    </form>
</div>