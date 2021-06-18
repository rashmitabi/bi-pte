<form class="form mt-4 ml-3">
    <div class="form-group row">
        <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Template Name</label>
        <div class="col-12 col-md-7 col-xl-7 col-sm-12">
            <input type="text" class="form-control " name="name" placeholder="Enter Subscription Title" value="{{ $EmailTemplate->name }}">
            <span class="error-msg" id="nameError"></span>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Email Subject</label>
        <div class="col-12 col-md-7 col-xl-7 col-sm-12">
            <input type="email" class="form-control " name="subject" placeholder="Enter Email Subject" value="{{ $EmailTemplate->subject }}">
            <span class="error-msg" id="subjectError"></span>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-12 col-form-label pt-0">Email Body</label>
        <div class="col-12">
            <!-- <div id="editor">
                <h2>The three greatest things you learn from traveling</h2>
            </div> -->
            <textarea name="editeditor" id="editeditor"></textarea>
            <span class="error-msg" id="bodyError"></span>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-12 col-md-5 col-xl-4 col-sm-12 col-form-label ">Status</label>
        <div class="col-7 toggle-switch">
            <input type="checkbox" id="files" name="status" value="E" {{ ($EmailTemplate->status == 'E')?'checked':'' }} /><label for="files">Status</label>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-12 save-btn">
            <button type="button" class="btn btn-outline-primary email-update" data-id="{{ $EmailTemplate->id }}" data-url="{{ route('email.update', $EmailTemplate->id) }}">
            <i class="far fa-save save-icon"></i>Save</button>
        </div>
    </div>
</form>