<div class="modal-body">
    <form class="form mt-4">
        @csrf
        <div class="form-group row">
            <label class="col-4 col-form-label ">Subscription Title</label>
            <div class="col-8">
                <input type="text" class="form-control " name="title" placeholder="Enter Subscription Title" value="{{ $subscription->title }}">
                <span class="error-msg" id="titleError"></span>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-4 col-form-label ">Description</label>
            <div class="col-8">
                <textarea class="form-control" id="exampleFormControlTextarea1"
                    rows="3" name="description" placeholder="Enter Description">{{ $subscription->description }}</textarea>
                    <span class="error-msg" id="descriptionError"></span>
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
                <span class="error-msg" id="roleidError"></span>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-4 col-form-label ">Number Of Students Allowed</label>
            <div class="col-8">
                <input type="text" class="form-control " name="students_allowed" placeholder="Enter Number Of Students Allowed" value="{{ $subscription->students_allowed }}">
                <span class="error-msg" id="studentsAllowedError"></span>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-4 col-form-label ">Monthly Price</label>
            <div class="col-8">
                <input type="text" class="form-control " name="monthly_price" placeholder="Enter Monthly Price" value="{{ $subscription->monthly_price }}">
                <span class="error-msg" id="monthlyPriceError"></span>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-4 col-form-label ">Quarterly Price</label>
            <div class="col-8">
                <input type="text" class="form-control " name="quarterly_price" placeholder="Enter Quarterly Price" value="{{ $subscription->quarterly_price }}">
                <span class="error-msg" id="quarterlyPriceError"></span>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-4 col-form-label ">Half Yearly Price</label>
            <div class="col-8">
                <input type="text" class="form-control " name="halfyearly_price" placeholder="Enter Half Yearly Price" value="{{ $subscription->halfyearly_price }}">
                <span class="error-msg" id="halfyearlyPriceError"></span>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-4 col-form-label ">Annually Price</label>
            <div class="col-8">
                <input type="text" class="form-control " name="annually_price" placeholder="Enter Annually Price" value="{{ $subscription->annually_price }}">
                <span class="error-msg" id="annuallyPriceError"></span>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-4 col-form-label ">White Labelling Price</label>
            <div class="col-8">
                <input type="text" class="form-control " name="white_labelling_price" placeholder="White Labelling Price" value="{{ $subscription->white_labelling_price }}">
                <span class="error-msg" id="whiteLabellingPriceError"></span>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-4 col-form-label ">Mock Tests</label>
            <div class="col-8">
                <input type="text" class="form-control " name="mock_tests" placeholder="Number Of Mock Tests Allowed" value="{{ $subscription->mock_tests }}">
                <span class="error-msg" id="mockTestsError"></span>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-4 col-form-label ">Practice Tests</label>
            <div class="col-8">
                <input type="text" class="form-control " name="practice_tests" placeholder="Number Of Practice Tests Allowed" value="{{ $subscription->practice_tests }}">
                <span class="error-msg" id="practiceTestsError"></span>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-4 col-form-label ">Can Add Videos?</label>
            <div class="col-8 toggle-switch">
                <input type="checkbox" id="video" name="videos" value="Y" {{ ($subscription->videos == 'Y')?'checked':''}} /><label for="video">Toggle</label>
                <span class="error-msg" id="videosError"></span>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-4 col-form-label ">Can Add Prediction Files?</label>
            <div class="col-8 toggle-switch">
                <input type="checkbox" id="files" name="prediction_files" value="Y" {{ ($subscription->prediction_files == 'Y')?'checked':''}} /><label for="files">Toggle</label>
                <span class="error-msg" id="predictionFilesError"></span>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-4 col-form-label ">Status</label>
            <div class="col-8 toggle-switch">
                <input type="checkbox" id="status" name="status" value="E" {{ ($subscription->status == 'E')?'checked':''}} /><label for="status">Toggle</label>
                <span class="error-msg" id="statusError"></span>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-12 save-btn">
                <button type="button" class="btn btn-outline-primary subscription-update" data-id="{{ $subscription->id }}" data-url="{{ route('subscription.update', $subscription->id) }}"><i
                        class="far fa-save save-icon"></i>Save</button>
            </div>
        </div>
    </form>
</div>