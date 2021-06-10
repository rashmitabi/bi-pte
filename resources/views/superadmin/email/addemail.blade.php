@extends('layouts.appSuperAdmin')
@section('content')
<!-- Page Content  -->
<div id="content">

    <section class="top-title-button mb-3">
        <div class="row mx-0 align-items-center">
            <div class="col-12 col-md-12 col-xl-8 col-sm-8 left">
                <h1 class="title mb-4">Add Email Template</h1>
            </div>
        </div>
    </section>

    <section class="top-title-button white-bg mb-3 remove-main-margin">
        <div class="row mx-0 align-items-center">
            <div class="col-12 col-md-12 col-xl-8 col-sm-8 left">
                <form class="form mt-4 ml-3">
                    <div class="form-group row">
                        <label class="col-4 col-form-label ">Template Name</label>
                        <div class="col-7">
                            <input type="text" class="form-control " placeholder="Enter Subscription Title">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-4 col-form-label ">Email Subject</label>
                        <div class="col-7">
                            <input type="email" class="form-control " placeholder="Enter Email Subject">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-12 col-form-label pt-0">Email Body</label>
                        <div class="col-12">
                            <div id="editor">
                                <h2>The three greatest things you learn from traveling</h2>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-4 col-form-label ">Status</label>
                        <div class="col-7 toggle-switch">
                            <input type="checkbox" id="files" /><label for="files">Status</label>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-11 save-btn">
                            <button type="button" class="btn btn-outline-primary"><i
                                    class="far fa-save save-icon"></i>Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
<script>
	ClassicEditor
		.create( document.querySelector( '#editor' ), {
			// toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
		} )
		.then( editor => {
			window.editor = editor;
		} )
		.catch( err => {
			console.error( err.stack );
		} );
</script>
@endsection
