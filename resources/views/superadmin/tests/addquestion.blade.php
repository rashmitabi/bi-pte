@extends('layouts.appSuperAdmin')
@section('content')
<!-- Page Content  -->
<div id="content">

    <section class="top-title-button mb-3">
        <div class="row mx-0 align-items-center">
            <div class="col-12 col-md-12 col-xl-8 col-sm-8 left">
                <h1 class="title mb-4">Add New Question</h1>
            </div>
        </div>
    </section>

    <section class="top-title-button white-bg mb-3 remove-main-margin">
        <div class="row mx-0 align-items-center">
            <div class="col-12 col-md-12 col-xl-7 col-sm-8 left">
            <div class="container">
    <div id="accordion" class="accordion">
        <div class="card mb-3">
            <div class="card-header collapsed" data-toggle="collapse" href="#collapseOne">
                <a class="card-title">
                    Reading
                </a>
            </div>
            <div id="collapseOne" class="card-body collapse" data-parent="#accordion" >
                 <div class="reading-list">
                  <button type="button" class="btn mb-1 btn-primary btn-lg btn-block">Reading and Writing : Fill in the blanks(1)</button>
                  <button type="button" class="btn mb-1 btn-primary btn-lg btn-block">Reading and Writing : Fill in the blanks(2)</button>
                  <button type="button" class="btn mb-1 btn-primary btn-lg btn-block">Reading and Writing : Fill in the blanks(3)</button>
                  <button type="button" class="btn mb-1 btn-primary btn-lg btn-block">Reading and Writing : Fill in the blanks(4)</button>
                  <button type="button" class="btn mb-1 btn-primary btn-lg btn-block">Reading and Writing : Fill in the blanks(5)</button>
                  <button type="button" class="btn mb-1 btn-primary btn-lg btn-block">Multiple-choice,Choose multiple answers(6)</button>
                  <button type="button" class="btn mb-1 btn-primary btn-lg btn-block">Multiple-choice,Choose multiple answers(7)</button>
                  <button type="button" class="btn mb-1 btn-primary btn-lg btn-block">Re-order Paragraphs(8)</button>
                  <button type="button" class="btn mb-1 btn-primary btn-lg btn-block">Re-order Paragraphs(9)</button>
                  <button type="button" class="btn mb-1 btn-primary btn-lg btn-block">Reading : Fill in the blanks(10)</button>
                  <button type="button" class="btn mb-1 btn-primary btn-lg btn-block">Reading : Fill in the blanks(11)</button>
                  <button type="button" class="btn mb-1 btn-primary btn-lg btn-block">Reading : Fill in the blanks(12)</button>
                  <button type="button" class="btn mb-1 btn-primary btn-lg btn-block">Reading : Fill in the blanks(13)</button>
                  <button type="button" class="btn mb-1 btn-primary btn-lg btn-block">Multiple-choice, choose single answers(14)</button>
                  <button type="button" class="btn  btn-primary btn-lg btn-block">Multiple-choice, choose single answers(15)</button>
                </div>
            </div>
        </div>
        <div class="card mb-3">
            <div class="card-header collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                <a class="card-title">
                 Listening
                </a>
            </div>
            <div id="collapseTwo" class="card-body collapse" data-parent="#accordion" >
            <div class="reading-list">
                  <button type="button" class="btn mb-1 btn-primary btn-lg btn-block">Summarize Spoken Item (1-2)</button>
                  <button type="button" class="btn mb-1 btn-primary btn-lg btn-block">Choose Multiple answers Item (3-4)</button>
                  <button type="button" class="btn mb-1 btn-primary btn-lg btn-block">Fill in the blanks (5-6)</button>
                  <button type="button" class="btn mb-1 btn-primary btn-lg btn-block">Highlight correct summary Item (7-8) </button>
                  <button type="button" class="btn mb-1 btn-primary btn-lg btn-block">Multiple-choice,choose single answers Item (9-10)</button>
                  <button type="button" class="btn mb-1 btn-primary btn-lg btn-block">Select missing word item (11-12)</button>
                  <button type="button" class="btn mb-1 btn-primary btn-lg btn-block">Highlight Incorrect Word (13-14)</button>
                  <button type="button" class="btn  btn-primary btn-lg btn-block">Write Form Dictations (15-17)</button>
                </div>
            </div>
        </div>
        <div class="card mb-3">
            <div class="card-header collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                <a class="card-title">
                 Writing
                </a>
            </div>
            <div id="collapseThree" class="collapse" data-parent="#accordion" >
                <div class="card-body">
                   <div class="reading-list">
                      <button type="button" class="btn mb-1 btn-primary btn-lg btn-block">Writing Instruction</button>
                      <button type="button" class="btn mb-1 btn-primary btn-lg btn-block">Summarize Written</button>
                      <button type="button" class="btn  btn-primary btn-lg btn-block">Essay Writing</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-3">
            <div class="card-header collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapsefour">
                <a class="card-title">
                 Speaking
                </a>
            </div>
            <div id="collapsefour" class="collapse" data-parent="#accordion" >
                <div class="card-body">
                    <div class="reading-list">
                      <button type="button" class="btn mb-1 btn-primary btn-lg btn-block">Speaking Instruction</button>
                      <button type="button" class="btn mb-1 btn-primary btn-lg btn-block">Read Aloud</button>
                      <button type="button" class="btn mb-1 btn-primary btn-lg btn-block">Repeat Sentence</button>
                      <button type="button" class="btn mb-1 btn-primary btn-lg btn-block">Describe Image</button>
                      <button type="button" class="btn mb-1 btn-primary btn-lg btn-block">Re-tell lecture</button>
                      <button type="button" class="btn mb-1 btn-primary btn-lg btn-block">Answer-short Question</button>
                      <button type="button" class="btn bg-success btn-primary btn-lg btn-block">Update Audio Time</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
            </div>
        </div>
    </section>
</div>

@endsection