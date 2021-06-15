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


    <!-- questions forms -->
    <section class="top-title-button mb-3">
        <div class="row mx-0 align-items-center">
            <div class="col-12 col-md-12 col-xl-8 col-sm-8 left">
                <h1 class="title mb-4">Add New Question</h1>
            </div>
        </div>
    </section>

    <section class="top-title-button white-bg mb-3 remove-main-margin">
        <div class="row mx-0 align-items-center">
            <div class="col-12 col-md-12 col-xl-12 col-sm-8 p-0 left">
               <div class="question-forms">
                   <div class="col-12 heading-text">
                      <h5>Reading and Writing : Fill in the blanks(1)</h5>
                   </div>
                   <div class="sub-heading">
                       <h4>Paragraph<span>Enter the First Module Paragraph</span></h4>
                   </div>
                   <form class="form ml-1">
                      <div class="form-group mb-5 row">
                           <div class="col-11">
                              <!-- <div id="editor">
                                 <h2>The three greatest things you learn from traveling</h2>
                              </div> -->
                              <textarea name="editor" id="editor"></textarea>
                           </div>
                       </div>
                       <div class=" col-11 mt-2 ml-3 white-bg common-col">
                            <div class="form-group mb-3 row">
                              <label class="col-3 col-form-label custom-label ">Ans Options 1</label>
                              <div class="col-7 p-0">
                                 <input type="text" class="form-control " placeholder="Whole,Total,Very,Open">
                              </div>
                           </div>
                           <div class="form-group mb-3 row">
                              <label class="col-3 col-form-label custom-label">Correct Options 1</label>
                              <div class="col-7 p-0">
                                 <input type="text" class="form-control " placeholder="Whole">
                              </div>
                           </div>
                       </div>
                       <div class=" col-11 mt-2 ml-3 white-bg common-col">
                            <div class="form-group mb-3 row">
                              <label class="col-3 col-form-label custom-label ">Ans Options 2</label>
                              <div class="col-7 p-0">
                                 <input type="text" class="form-control " placeholder="Whole,Total,Very,Open">
                              </div>
                           </div>
                           <div class="form-group mb-3 row">
                              <label class="col-3 col-form-label custom-label">Correct Options 2</label>
                              <div class="col-7 p-0">
                                 <input type="text" class="form-control " placeholder="Whole">
                              </div>
                           </div>
                       </div>
                       <div class=" col-11 mt-2 ml-3 white-bg common-col">
                            <div class="form-group mb-3 row">
                              <label class="col-3 col-form-label custom-label ">Ans Options 3</label>
                              <div class="col-7 p-0">
                                 <input type="text" class="form-control " placeholder="Whole,Total,Very,Open">
                              </div>
                           </div>
                           <div class="form-group mb-3 row">
                              <label class="col-3 col-form-label custom-label">Correct Options 3</label>
                              <div class="col-7 p-0">
                                 <input type="text" class="form-control " placeholder="Whole">
                              </div>
                           </div>
                       </div>
                       <div class=" col-11 mt-2 ml-3 white-bg common-col">
                            <div class="form-group mb-3 row">
                              <label class="col-3 col-form-label custom-label ">Ans Options 4</label>
                              <div class="col-7 p-0">
                                 <input type="text" class="form-control " placeholder="Whole,Total,Very,Open">
                              </div>
                           </div>
                           <div class="form-group mb-3 row">
                              <label class="col-3 col-form-label custom-label">Correct Options 4</label>
                              <div class="col-7 p-0">
                                 <input type="text" class="form-control " placeholder="Whole">
                              </div>
                           </div>
                       </div>
                       <div class=" col-11 mt-2 ml-3 white-bg common-col">
                            <div class="form-group mb-3 row">
                              <label class="col-3 col-form-label custom-label ">Ans Options 5</label>
                              <div class="col-7 p-0">
                                 <input type="text" class="form-control " placeholder="Whole,Total,Very,Open">
                              </div>
                           </div>
                           <div class="form-group mb-3 row">
                              <label class="col-3 col-form-label custom-label">Correct Options 5</label>
                              <div class="col-7 p-0">
                                 <input type="text" class="form-control " placeholder="Whole">
                              </div>
                           </div>
                       </div>
                       <div class=" col-11 mt-2 ml-3 white-bg common-col">
                            <div class="form-group mb-3 row">
                              <label class="col-3 col-form-label custom-label ">Ans Options 6</label>
                              <div class="col-7 p-0">
                                 <input type="text" class="form-control " placeholder="Whole,Total,Very,Open">
                              </div>
                           </div>
                           <div class="form-group mb-3 row">
                              <label class="col-3 col-form-label custom-label">Correct Options 6</label>
                              <div class="col-7 p-0">
                                 <input type="text" class="form-control " placeholder="Whole">
                              </div>
                           </div>
                       </div>
                       <div class=" col-11 mt-2 ml-3 white-bg common-col">
                            <div class="form-group mb-3 row">
                              <label class="col-3 col-form-label custom-label ">Ans Options 7</label>
                              <div class="col-7 p-0">
                                 <input type="text" class="form-control " placeholder="Whole,Total,Very,Open">
                              </div>
                           </div>
                           <div class="form-group mb-3 row">
                              <label class="col-3 col-form-label custom-label">Correct Options 7</label>
                              <div class="col-7 p-0">
                                 <input type="text" class="form-control " placeholder="Whole">
                              </div>
                           </div>
                       </div>
                       <div class=" col-11 mt-2 ml-3 white-bg common-col">
                            <div class="form-group mb-3 row">
                              <label class="col-3 col-form-label custom-label ">Ans Options 8</label>
                              <div class="col-7 p-0">
                                 <input type="text" class="form-control " placeholder="Whole,Total,Very,Open">
                              </div>
                           </div>
                           <div class="form-group mb-3 row">
                              <label class="col-3 col-form-label custom-label">Correct Options 8</label>
                              <div class="col-7 p-0">
                                 <input type="text" class="form-control " placeholder="Whole">
                              </div>
                              <div class="add-icon">
                                  <a><i class="fas fa-plus"></i></a>
                              </div>
                           </div>
                       </div>
                       <div class="form-group row">
                                   <div class="col-11 save-btn mt-5 ">
                                        <button  type="button" class="btn btn-outline-primary"><a href="#"><img class="back-btn" src="{{ asset('assets/images/icons/back.svg') }}"></a>Cancel</button>
                                        <button  type="button" class="btn btn-outline-primary mr-2"><i class="far fa-save save-icon"></i>Submit</button>
                                  </div> 
                        </div>
                   </form>
               </div>
            </div>
        </div>
    </section>



    <!-- multiple-choice -->
    <section class="top-title-button mb-3">
        <div class="row mx-0 align-items-center">
            <div class="col-12 col-md-12 col-xl-8 col-sm-8 left">
                <h1 class="title mb-4">Add New Question</h1>
            </div>
        </div>
    </section>

    <section class="top-title-button white-bg mb-3 remove-main-margin">
        <div class="row mx-0 align-items-center">
            <div class="col-12 col-md-12 col-xl-12 col-sm-8 p-0 left">
               <div class="question-forms">
                   <div class="col-12 heading-text">
                      <h5>Multiple-choice,Choose multiple answers(6)</h5>
                   </div>
                   <div class="sub-heading">
                       <h4>Paragraph<span>Enter the First Module Paragraph</span></h4>
                   </div>
                   <form class="form ml-1">
                      <div class="form-group mb-5 row">
                           <div class="col-11">
                              <!-- <div id="editor">
                                 <h2>The three greatest things you learn from traveling</h2>
                              </div> -->
                              <textarea name="editor1" id="editor1"></textarea>
                           </div>
                       </div>
                       <div class=" col-11 mt-2 ml-3 white-bg common-col">
                            <div class="form-group mb-3 row">
                              <label class="col-3 col-form-label custom-label ">Options Title</label>
                              <div class="col-8 p-0">
                                 <input type="text" class="form-control " placeholder="Which of the Following Are True Statements?">
                              </div>
                           </div>
                           <div class="form-group mb-3 row">
                              <label class="col-3 col-form-label custom-label">Ans Options A</label>
                              <div class="col-8 p-0">
                                 <input type="text" class="form-control " placeholder="Which of the Following Are True Statements?">
                              </div>
                           </div>
                           <div class="form-group mb-3 row">
                              <label class="col-3 col-form-label custom-label ">Ans Options B</label>
                              <div class="col-8 p-0">
                                 <input type="text" class="form-control " placeholder="Which of the Following Are True Statements?">
                              </div>
                           </div>
                           <div class="form-group mb-3 row">
                              <label class="col-3 col-form-label custom-label">Ans Options C</label>
                              <div class="col-8 p-0">
                                 <input type="text" class="form-control " placeholder="Which of the Following Are True Statements?">
                              </div>
                           </div>
                           <div class="form-group mb-3 row">
                              <label class="col-3 col-form-label custom-label ">Ans Options D</label>
                              <div class="col-8 p-0">
                                 <input type="text" class="form-control " placeholder="Which of the Following Are True Statements?">
                              </div>
                           </div>
                           <div class="form-group mb-3 row">
                              <label class="col-3 col-form-label custom-label">Ans Options E</label>
                              <div class="col-8 p-0">
                                 <input type="text" class="form-control " placeholder="">
                              </div>
                              <div class="plus-icon">
                                  <a><i class="fas fa-plus"></i></a>
                              </div>
                           </div>
                           <div class="form-group mb-3 row">
                              <label class="col-3 col-form-label custom-label">Correct Options</label>
                              <div class="col-8 p-0">
                                 <input type="text" class="form-control " placeholder="Whole">
                              </div>
                           </div>
                       </div>
                       <div class="form-group row">
                            <div class="col-11 save-btn mt-5 ">
                                <button  type="button" class="btn btn-outline-primary"><a href="#"><img class="back-btn" src="{{ asset('assets/images/icons/back.svg') }}"></a>Cancel</button>
                                <button  type="button" class="btn btn-outline-primary mr-2"><i class="far fa-save save-icon"></i>Submit</button>
                            </div> 
                        </div>
                   </form>
               </div>
            </div>
        </div>
    </section>


<!-- re-order para -->
<section class="top-title-button mb-3">
        <div class="row mx-0 align-items-center">
            <div class="col-12 col-md-12 col-xl-8 col-sm-8 left">
                <h1 class="title mb-4">Add New Question</h1>
            </div>
        </div>
    </section>

    <section class="top-title-button white-bg mb-3 remove-main-margin">
        <div class="row mx-0 align-items-center">
            <div class="col-12 col-md-12 col-xl-12 col-sm-8 p-0 left">
               <div class="question-forms">
                   <div class="col-12 heading-text">
                      <h5>Re-order Paragraphs(8)</h5>
                   </div>
                   <form class="form ml-1">
                       <div class=" col-11 mt-5 ml-3 white-bg common-col">
                           <div class="form-group mb-3 row">
                              <label class="col-3 col-form-label custom-label">Ans Options A</label>
                              <div class="col-8 p-0">
                                 <input type="text" class="form-control " placeholder="it Seems that The Lack of Psychological Reward is the Reason for their Disatisfaction.">
                              </div>
                           </div>
                           <div class="form-group mb-3 row">
                              <label class="col-3 col-form-label custom-label ">Ans Options B</label>
                              <div class="col-8 p-0">
                                 <input type="text" class="form-control " placeholder="it Seems that The Lack of Psychological Reward is the Reason for their Disatisfaction.">
                              </div>
                           </div>
                           <div class="form-group mb-3 row">
                              <label class="col-3 col-form-label custom-label">Ans Options C</label>
                              <div class="col-8 p-0">
                                 <input type="text" class="form-control " placeholder="Which of the Following Are True Statements?">
                              </div>
                           </div>
                           <div class="form-group mb-3 row">
                              <label class="col-3 col-form-label custom-label ">Ans Options D</label>
                              <div class="col-8 p-0">
                                 <input type="text" class="form-control " placeholder="Which of the Following Are True Statements?">
                              </div>
                           </div>
                           <div class="form-group mb-3 row">
                              <label class="col-3 col-form-label custom-label">Ans Options E</label>
                              <div class="col-8 p-0">
                                 <input type="text" class="form-control " placeholder="">
                              </div>
                              <div class="plus-icon">
                                  <a><i class="fas fa-plus"></i></a>
                              </div>
                           </div>
                       </div>
                        <div class=" col-11 mt-4 ml-3 white-bg common-col">
                           <div class="form-group mb-3 row">
                              <label class="col-3 col-form-label custom-label">Correct Options</label>
                              <div class="col-8 p-0">
                                 <input type="text" class="form-control " placeholder="it Seems that The Lack of Psychological Reward is the Reason for their Disatisfaction.">
                              </div>
                           </div>
                           <div class="form-group mb-3 row">
                              <label class="col-3 col-form-label custom-label ">Correct Options</label>
                              <div class="col-8 p-0">
                                 <input type="text" class="form-control " placeholder="it Seems that The Lack of Psychological Reward is the Reason for their Disatisfaction.">
                              </div>
                           </div>
                           <div class="form-group mb-3 row">
                              <label class="col-3 col-form-label custom-label">Correct Options</label>
                              <div class="col-8 p-0">
                                 <input type="text" class="form-control " placeholder="it Seems that The Lack of Psychological Reward is the Reason for their Disatisfaction.">
                              </div>
                           </div>
                           <div class="form-group mb-3 row">
                              <label class="col-3 col-form-label custom-label ">Correct Options</label>
                              <div class="col-8 p-0">
                                 <input type="text" class="form-control " placeholder="it Seems that The Lack of Psychological Reward is the Reason for their Disatisfaction.">
                              </div>
                           </div>
                           <div class="form-group mb-3 row">
                              <label class="col-3 col-form-label custom-label">Correct Options</label>
                              <div class="col-8 p-0">
                                 <input type="text" class="form-control " placeholder="it Seems that The Lack of Psychological Reward is the Reason for their Disatisfaction.">
                              </div>
                              <div class="plus-icon">
                                  <a><i class="fas fa-plus"></i></a>
                              </div>
                           </div>
                       </div>
                       <div class="form-group row">
                            <div class="col-11 save-btn mt-5 ">
                                <button  type="button" class="btn btn-outline-primary"><a href="#"><img class="back-btn" src="{{ asset('assets/images/icons/back.svg') }}"></a>Cancel</button>
                                <button  type="button" class="btn btn-outline-primary mr-2"><i class="far fa-save save-icon"></i>Submit</button>
                            </div> 
                        </div>
                   </form>
               </div>
            </div>
        </div>
    </section>

    <!-- reading fill in blanks -->
    <section class="top-title-button mb-3">
        <div class="row mx-0 align-items-center">
            <div class="col-12 col-md-12 col-xl-8 col-sm-8 left">
                <h1 class="title mb-4">Add New Question</h1>
            </div>
        </div>
    </section>

    <section class="top-title-button white-bg mb-3 remove-main-margin">
        <div class="row mx-0 align-items-center">
            <div class="col-12 col-md-12 col-xl-12 col-sm-8 p-0 left">
               <div class="question-forms">
                   <div class="col-12 heading-text">
                      <h5>Reading : Fill in the blanks(10)</h5>
                   </div>
                   <div class="sub-heading">
                       <h4>Paragraph<span>Enter the First Module Paragraph</span></h4>
                   </div>
                   <form class="form ml-1">
                      <div class="form-group mb-5 row">
                           <div class="col-11">
                              <!-- <div id="editor">
                                 <h2>The three greatest things you learn from traveling</h2>
                              </div> -->
                              <textarea name="editor" id="editor2"></textarea>
                           </div>
                       </div>
                       <div class=" col-11 mt-2 ml-3 white-bg common-col">
                            <div class="form-group mb-3 row">
                              <label class="col-3 col-form-label custom-label ">Ans Options</label>
                              <div class="col-7 p-0">
                                 <input type="text" class="form-control " placeholder="Whole,Total,Very,Open">
                              </div>
                           </div>
                           <div class="form-group mb-3 row">
                              <label class="col-3 col-form-label custom-label">Correct Options</label>
                              <div class="col-7 p-0">
                                 <input type="text" class="form-control " placeholder="Whole">
                              </div>
                              <div class="add-icon">
                                  <a><i class="fas fa-plus"></i></a>
                              </div>
                           </div>
                       </div>
                       <div class="form-group row">
                            <div class="col-11 save-btn mt-5 ">
                                <button  type="button" class="btn btn-outline-primary"><a href="#"><img class="back-btn" src="{{ asset('assets/images/icons/back.svg') }}"></a>Cancel</button>
                                <button  type="button" class="btn btn-outline-primary mr-2"><i class="far fa-save save-icon"></i>Submit</button>
                            </div> 
                        </div>
                   </form>
               </div>
            </div>
        </div>
    </section>


    <!-- listning spoken -->
    <section class="top-title-button mb-3">
        <div class="row mx-0 align-items-center">
            <div class="col-12 col-md-12 col-xl-8 col-sm-8 left">
                <h1 class="title mb-4">Add New Question</h1>
            </div>
        </div>
    </section>

    <section class="top-title-button white-bg mb-3 remove-main-margin">
        <div class="row mx-0 align-items-center">
            <div class="col-12 col-md-12 col-xl-12 col-sm-8 p-0 left">
               <div class="question-forms">
                   <div class="col-12 heading-text">
                      <h5>Summarize Spoken Item (1-2)</h5>
                   </div>
                   <div class="row">
                       <div class="col-8">
                         <form class="form">
                                <div class=" col-12 mt-5 mb-1 ml-1 white-bg common-col">
                                  <div class="form-group mb-2 row">
                                   <label class="col-3 col-form-label">Q1 Audio</label>
                                   <div class="col-8 p-0">
                                       <input type="text" class="form-control " placeholder="Whole,Total,Very,Open">
                                  </div>
                                  </div>
                                   <div class="form-group mb-2 row">
                                  <label class="col-3 col-form-label ">Q1 Images</label>
                                  <div class="col-8 p-0">
                                       <input type="text" class="form-control " placeholder="Whole">
                                   </div>
                                    </div>
                              </div>
                               <div class="sub-heading pl-1">
                                   <h5>Summary Script<span>Paragraph</span></h5>
                               </div>
                                <div class="form-group mb-2 row">
                                    <div class="col-12 pl-1 p-0">
                                        <!-- <div id="editor">
                                            <h2>The three greatest things you learn from traveling</h2>
                                        </div> -->
                                        <textarea name="editor" id="editor3"></textarea>
                                    </div>
                              </div>
                               <div class="sub-heading pl-1">
                                   <h5>Sample Answer<span>Paragraph</span></h5>
                               </div>
                               <div class="form-group mb-2 row">
                                    <div class="col-12 pl-1 p-0">
                                        <!-- <div id="editor">
                                            <h2>The three greatest things you learn from traveling</h2>
                                        </div> -->
                                        <textarea name="editor" id="editor4"></textarea>
                                    </div>
                              </div>
                              <div class=" col-12 mt-5 mb-1 ml-1 white-bg common-col">
                                  <div class="form-group mb-2 row">
                                   <label class="col-3 col-form-label">Q2 Audio</label>
                                   <div class="col-8 p-0">
                                       <input type="text" class="form-control " placeholder="Whole,Total,Very,Open">
                                  </div>
                                  </div>
                                   <div class="form-group mb-2 row">
                                      <label class="col-3 col-form-label ">Q2 Images</label>
                                  <div class="col-8 p-0">
                                       <input type="text" class="form-control " placeholder="Whole">
                                   </div>
                                    </div>
                              </div>
                              <div class="sub-heading pl-1">
                                   <h5>Summary Script<span>Paragraph</span></h5>
                               </div>
                               <div class="form-group mb-2 row">
                                    <div class="col-12 pl-1 p-0">
                                        <!-- <div id="editor">
                                            <h2>The three greatest things you learn from traveling</h2>
                                        </div> -->
                                        <textarea name="editor" id="editor5"></textarea>
                                    </div>
                              </div>
                              <div class="sub-heading pl-1">
                                   <h5>Sample Answer<span>Paragraph</span></h5>
                               </div>
                               <div class="form-group mb-2 row">
                                    <div class="col-12 pl-1 p-0">
                                        <!-- <div id="editor">
                                            <h2>The three greatest things you learn from traveling</h2>
                                        </div> -->
                                        <textarea name="editor" id="editor6"></textarea>
                                    </div>
                              </div>
                        </form>
                    </div>
                    <div class="col-4">
                       <form class="form mt-4">
                           <h5>Images</h5>
                           <div class="form-group mb-2 row">
                                <div class="col-12 p-0">                              
                                    <div class="custom-file mb-3">
                                        <input type="file" class="custom-file-input" id="customFile">
                                        <label class="custom-file-label" for="customFile">Select Image</label>
                                    </div>
                                      <input type="text" class="form-control " placeholder="">
                                </div>
                            </div>
                            <h5 class="mt-4">Audio</h5>
                           <div class="form-group mb-2 row">
                                <div class="col-12 p-0">                              
                                    <div class="custom-file mb-3">
                                        <input type="file" class="custom-file-input" id="customFile">
                                        <label class="custom-file-label" for="customFile">Select Audio</label>
                                    </div>
                                      <input type="text" class="form-control " placeholder="">
                                </div>
                            </div>
                       </form>
                    </div>
                    </div>
                   <form class="form ml-1">
                       <div class="form-group row">
                            <div class="col-11 save-btn mt-5 ">
                                <button  type="button" class="btn btn-outline-primary"><a href="#"><img class="back-btn" src="{{ asset('assets/images/icons/back.svg') }}"></a>Cancel</button>
                                <button  type="button" class="btn btn-outline-primary mr-2"><i class="far fa-save save-icon"></i>Submit</button>
                            </div> 
                        </div>
                   </form>
               </div>
            </div>
        </div>
    </section>

    <!-- multiple answers -->
    <section class="top-title-button mb-3">
        <div class="row mx-0 align-items-center">
            <div class="col-12 col-md-12 col-xl-8 col-sm-8 left">
                <h1 class="title mb-4">Add New Question</h1>
            </div>
        </div>
    </section>

    <section class="top-title-button white-bg mb-3 remove-main-margin">
        <div class="row mx-0 align-items-center">
            <div class="col-12 col-md-12 col-xl-12 col-sm-8 p-0 left">
               <div class="question-forms">
                   <div class="col-12 heading-text">
                      <h5>Choose Multiple answers Item (3-4)</h5>
                   </div>
                   <div class="row">
                       <div class="col-8">
                         <form class="form">
                                <div class=" col-12 mt-5 mb-1 ml-1 white-bg common-col">
                                    <div class="form-group mb-2 row">
                                       <label class="col-4 col-form-label">Q3 Question</label>
                                       <div class="col-7 p-0">
                                          <input type="text" class="form-control " placeholder="Whole,Total,Very,Open">
                                       </div>
                                  </div>
                                  <div class="form-group mb-2 row">
                                      <label class="col-4 col-form-label ">Q3 Audio</label>
                                      <div class="col-7 p-0">
                                          <input type="text" class="form-control " placeholder="Whole">
                                      </div>
                                   </div>
                                   <div class="form-group mb-2 row">
                                      <label class="col-4 col-form-label ">Q3 Options</label>
                                      <div class="col-7 p-0">
                                          <input type="text" class="form-control " placeholder="Whole">
                                      </div>
                                   </div>
                                   <div class="form-group mb-2 row">
                                      <label class="col-4 col-form-label ">Q3 Correct Answers</label>
                                      <div class="col-7 p-0">
                                          <input type="text" class="form-control " placeholder="Whole">
                                      </div>
                                   </div>
                              </div>
                              <div class=" col-12 mt-5 mb-1 ml-1 white-bg common-col">
                                    <div class="form-group mb-2 row">
                                       <label class="col-4 col-form-label">Q4 Question</label>
                                       <div class="col-7 p-0">
                                          <input type="text" class="form-control " placeholder="Whole,Total,Very,Open">
                                       </div>
                                  </div>
                                  <div class="form-group mb-2 row">
                                      <label class="col-4 col-form-label ">Q4 Audio</label>
                                      <div class="col-7 p-0">
                                          <input type="text" class="form-control " placeholder="Whole">
                                      </div>
                                   </div>
                                   <div class="form-group mb-2 row">
                                      <label class="col-4 col-form-label ">Q4 Options</label>
                                      <div class="col-7 p-0">
                                          <input type="text" class="form-control " placeholder="Whole">
                                      </div>
                                   </div>
                                   <div class="form-group mb-2 row">
                                      <label class="col-4 col-form-label ">Q4 Correct Answers</label>
                                      <div class="col-7 p-0">
                                          <input type="text" class="form-control " placeholder="Whole">
                                      </div>
                                   </div>
                              </div>
                        </form>
                    </div>
                    <div class="col-4">
                       <form class="form mt-4">
                            <h5 class="mt-4">Audio</h5>
                           <div class="form-group mb-2 row">
                                <div class="col-12 p-0">                              
                                    <div class="custom-file mb-3">
                                        <input type="file" class="custom-file-input" id="customFile">
                                        <label class="custom-file-label" for="customFile">Select Audio</label>
                                    </div>
                                      <input type="text" class="form-control " placeholder="">
                                </div>
                            </div>
                       </form>
                    </div>
                    </div>
                   <form class="form ml-1">
                       <div class="form-group row">
                            <div class="col-11 save-btn mt-5 ">
                                <button  type="button" class="btn btn-outline-primary"><a href="#"><img class="back-btn" src="{{ asset('assets/images/icons/back.svg') }}"></a>Cancel</button>
                                <button  type="button" class="btn btn-outline-primary mr-2"><i class="far fa-save save-icon"></i>Submit</button>
                            </div> 
                        </div>
                   </form>
               </div>
            </div>
        </div>
    </section>
   
    <!-- fill in the blanks -->
    <section class="top-title-button mb-3">
        <div class="row mx-0 align-items-center">
            <div class="col-12 col-md-12 col-xl-8 col-sm-8 left">
                <h1 class="title mb-4">Add New Question</h1>
            </div>
        </div>
    </section>

    <section class="top-title-button white-bg mb-3 remove-main-margin">
        <div class="row mx-0 align-items-center">
            <div class="col-12 col-md-12 col-xl-12 col-sm-8 p-0 left">
               <div class="question-forms">
                   <div class="col-12 heading-text">
                      <h5>Fill in the blanks (5-6)</h5>
                   </div>
                   <div class="row">
                       <div class="col-8">
                         <form class="form">
                                <div class=" col-12 mt-5 mb-1 ml-1 white-bg common-col">
                                  <div class="form-group mb-2 row">
                                      <label class="col-2 col-form-label pl-1 ">Q5 Audio</label>
                                      <div class="col-9 p-0">
                                          <input type="text" class="form-control " placeholder="Whole">
                                      </div>
                                   </div>
                                </div>
                                <div class="sub-heading pl-1">
                                   <h5>Question 5<span>Paragraph</span></h5>
                               </div>
                               <div class="form-group mb-2 row">
                                    <div class="col-12 pl-1 p-0">
                                        <!-- <div id="editor">
                                            <h2>The three greatest things you learn from traveling</h2>
                                        </div> -->
                                        <textarea name="editor" id="editor7"></textarea>
                                    </div>
                              </div>
                              <div class=" col-12 mt-4 mb-1 ml-1 white-bg common-col">
                                  <div class="form-group mb-2 row">
                                      <label class="col-4 col-form-label pl-1 ">Q5 Correct Answers</label>
                                      <div class="col-7 p-0">
                                          <input type="text" class="form-control " placeholder="Whole">
                                      </div>
                                   </div>
                                </div>
                                <div class=" col-12 mt-5 mb-1 ml-1 white-bg common-col">
                                  <div class="form-group mb-2 row">
                                      <label class="col-2 col-form-label pl-1 ">Q6 Audio</label>
                                      <div class="col-9 p-0">
                                          <input type="text" class="form-control " placeholder="Whole">
                                      </div>
                                   </div>
                                </div>
                                <div class="sub-heading pl-1">
                                   <h5>Question 6<span>Paragraph</span></h5>
                               </div>
                               <div class="form-group mb-2 row">
                                    <div class="col-12 pl-1 p-0">
                                        <!-- <div id="editor">
                                            <h2>The three greatest things you learn from traveling</h2>
                                        </div> -->
                                        <textarea name="editor" id="editor8"></textarea>
                                    </div>
                              </div>
                              <div class=" col-12 mt-4 mb-1 ml-1 white-bg common-col">
                                  <div class="form-group mb-2 row">
                                      <label class="col-4 col-form-label pl-1 ">Q6 Correct Answers</label>
                                      <div class="col-7 p-0">
                                          <input type="text" class="form-control " placeholder="Whole">
                                      </div>
                                   </div>
                                </div>
                        </form>
                    </div>
                    <div class="col-4">
                       <form class="form mt-4">
                            <h5 class="mt-4">Audio</h5>
                           <div class="form-group mb-2 row">
                                <div class="col-12 p-0">                              
                                    <div class="custom-file mb-3">
                                        <input type="file" class="custom-file-input" id="customFile">
                                        <label class="custom-file-label" for="customFile">Select Audio</label>
                                    </div>
                                      <input type="text" class="form-control " placeholder="">
                                </div>
                            </div>
                       </form>
                    </div>
                    </div>
                   <form class="form ml-1">
                       <div class="form-group row">
                            <div class="col-11 save-btn mt-5 ">
                                <button  type="button" class="btn btn-outline-primary"><a href="#"><img class="back-btn" src="{{ asset('assets/images/icons/back.svg') }}"></a>Cancel</button>
                                <button  type="button" class="btn btn-outline-primary mr-2"><i class="far fa-save save-icon"></i>Submit</button>
                            </div> 
                        </div>
                   </form>
               </div>
            </div>
        </div>
    </section>
   

    <!-- highlight summary -->
    <section class="top-title-button mb-3">
        <div class="row mx-0 align-items-center">
            <div class="col-12 col-md-12 col-xl-8 col-sm-8 left">
                <h1 class="title mb-4">Add New Question</h1>
            </div>
        </div>
    </section>

    <section class="top-title-button white-bg mb-3 remove-main-margin">
        <div class="row mx-0 align-items-center">
            <div class="col-12 col-md-12 col-xl-12 col-sm-8 p-0 left">
               <div class="question-forms">
                   <div class="col-12 heading-text">
                      <h5>Highlight correct summary Item (7-8)</h5>
                   </div>
                   <div class="row">
                       <div class="col-8">
                         <form class="form">
                                <div class=" col-12 mt-5 mb-1 ml-1 white-bg common-col">
                                    <div class="form-group mb-2 row">
                                       <label class="col-4 col-form-label">Q7 Audio</label>
                                       <div class="col-7 p-0">
                                          <input type="text" class="form-control " placeholder="Whole,Total,Very,Open">
                                       </div>
                                  </div>
                                  <div class="form-group mb-2 row">
                                      <label class="col-4 col-form-label ">Q7 choice 1</label>
                                      <div class="col-7 p-0">
                                          <input type="text" class="form-control " placeholder="Whole">
                                      </div>
                                   </div>
                                   <div class="form-group mb-2 row">
                                      <label class="col-4 col-form-label ">Q7 choice 2</label>
                                      <div class="col-7 p-0">
                                          <input type="text" class="form-control " placeholder="Whole">
                                      </div>
                                   </div>
                                   <div class="form-group mb-2 row">
                                      <label class="col-4 col-form-label ">Q7 choice 3</label>
                                      <div class="col-7 p-0">
                                          <input type="text" class="form-control " placeholder="Whole">
                                      </div>
                                   </div>
                                   <div class="form-group mb-2 row">
                                      <label class="col-4 col-form-label ">Q7 choice 4</label>
                                      <div class="col-7 p-0">
                                          <input type="text" class="form-control " placeholder="Whole">
                                      </div>
                                   </div>
                                   <div class="form-group mb-2 row">
                                      <label class="col-4 col-form-label ">Q7 Correct Answers</label>
                                      <div class="col-7 p-0">
                                          <input type="text" class="form-control " placeholder="Whole">
                                      </div>
                                   </div>
                              </div>
                              <div class=" col-12 mt-5 mb-1 ml-1 white-bg common-col">
                                    <div class="form-group mb-2 row">
                                       <label class="col-4 col-form-label">Q8 Audio</label>
                                       <div class="col-7 p-0">
                                          <input type="text" class="form-control " placeholder="Whole,Total,Very,Open">
                                       </div>
                                  </div>
                                  <div class="form-group mb-2 row">
                                      <label class="col-4 col-form-label ">Q8 choice 1</label>
                                      <div class="col-7 p-0">
                                          <input type="text" class="form-control " placeholder="Whole">
                                      </div>
                                   </div>
                                   <div class="form-group mb-2 row">
                                      <label class="col-4 col-form-label ">Q8 choice 2</label>
                                      <div class="col-7 p-0">
                                          <input type="text" class="form-control " placeholder="Whole">
                                      </div>
                                   </div>
                                   <div class="form-group mb-2 row">
                                      <label class="col-4 col-form-label ">Q8 choice 3</label>
                                      <div class="col-7 p-0">
                                          <input type="text" class="form-control " placeholder="Whole">
                                      </div>
                                   </div>
                                   <div class="form-group mb-2 row">
                                      <label class="col-4 col-form-label ">Q8 choice 4</label>
                                      <div class="col-7 p-0">
                                          <input type="text" class="form-control " placeholder="Whole">
                                      </div>
                                   </div>
                                   <div class="form-group mb-2 row">
                                      <label class="col-4 col-form-label ">Q8 Correct Answers</label>
                                      <div class="col-7 p-0">
                                          <input type="text" class="form-control " placeholder="Whole">
                                      </div>
                                   </div>
                              </div>
                        </form>
                    </div>
                    <div class="col-4">
                       <form class="form mt-4">
                            <h5 class="mt-4">Audio</h5>
                           <div class="form-group mb-2 row">
                                <div class="col-12 p-0">                              
                                    <div class="custom-file mb-3">
                                        <input type="file" class="custom-file-input" id="customFile">
                                        <label class="custom-file-label" for="customFile">Select Audio</label>
                                    </div>
                                      <input type="text" class="form-control " placeholder="">
                                </div>
                            </div>
                       </form>
                    </div>
                    </div>
                   <form class="form ml-1">
                       <div class="form-group row">
                            <div class="col-11 save-btn mt-5 ">
                                <button  type="button" class="btn btn-outline-primary"><a href="#"><img class="back-btn" src="{{ asset('assets/images/icons/back.svg') }}"></a>Cancel</button>
                                <button  type="button" class="btn btn-outline-primary mr-2"><i class="far fa-save save-icon"></i>Submit</button>
                            </div> 
                        </div>
                   </form>
               </div>
            </div>
        </div>
    </section>

    <!-- multiple choice single answers -->
    <section class="top-title-button mb-3">
        <div class="row mx-0 align-items-center">
            <div class="col-12 col-md-12 col-xl-8 col-sm-8 left">
                <h1 class="title mb-4">Add New Question</h1>
            </div>
        </div>
    </section>

    <section class="top-title-button white-bg mb-3 remove-main-margin">
        <div class="row mx-0 align-items-center">
            <div class="col-12 col-md-12 col-xl-12 col-sm-8 p-0 left">
               <div class="question-forms">
                   <div class="col-12 heading-text">
                      <h5>Multiple-choice,choose single answers Item (9-10)</h5>
                   </div>
                   <div class="row">
                       <div class="col-8">
                         <form class="form">
                                <div class=" col-12 mt-5 mb-1 ml-1 white-bg common-col">
                                    <div class="form-group mb-2 row">
                                       <label class="col-4 col-form-label">Q9 Question</label>
                                       <div class="col-7 p-0">
                                          <input type="text" class="form-control " placeholder="Whole,Total,Very,Open">
                                       </div>
                                    </div>
                                    <div class="form-group mb-2 row">
                                       <label class="col-4 col-form-label">Q9 Audio</label>
                                       <div class="col-7 p-0">
                                          <input type="text" class="form-control " placeholder="Whole,Total,Very,Open">
                                       </div>
                                  </div>
                                  <div class="form-group mb-2 row">
                                      <label class="col-4 col-form-label ">Q9 choice 1</label>
                                      <div class="col-7 p-0">
                                          <input type="text" class="form-control " placeholder="Whole">
                                      </div>
                                   </div>
                                   <div class="form-group mb-2 row">
                                      <label class="col-4 col-form-label ">Q9 choice 2</label>
                                      <div class="col-7 p-0">
                                          <input type="text" class="form-control " placeholder="Whole">
                                      </div>
                                   </div>
                                   <div class="form-group mb-2 row">
                                      <label class="col-4 col-form-label ">Q9 choice 3</label>
                                      <div class="col-7 p-0">
                                          <input type="text" class="form-control " placeholder="Whole">
                                      </div>
                                   </div>
                                   <div class="form-group mb-2 row">
                                      <label class="col-4 col-form-label ">Q9 choice 4</label>
                                      <div class="col-7 p-0">
                                          <input type="text" class="form-control " placeholder="Whole">
                                      </div>
                                   </div>
                                   <div class="form-group mb-2 row">
                                      <label class="col-4 col-form-label ">Q9 Correct Answers</label>
                                      <div class="col-7 p-0">
                                          <input type="text" class="form-control " placeholder="Whole">
                                      </div>
                                   </div>
                              </div>
                              <div class=" col-12 mt-5 mb-1 ml-1 white-bg common-col">
                                  <div class="form-group mb-2 row">
                                       <label class="col-4 col-form-label">Q10 Question</label>
                                       <div class="col-7 p-0">
                                          <input type="text" class="form-control " placeholder="Whole,Total,Very,Open">
                                       </div>
                                  </div>
                                    <div class="form-group mb-2 row">
                                       <label class="col-4 col-form-label">Q10 Audio</label>
                                       <div class="col-7 p-0">
                                          <input type="text" class="form-control " placeholder="Whole,Total,Very,Open">
                                       </div>
                                  </div>
                                  <div class="form-group mb-2 row">
                                      <label class="col-4 col-form-label ">Q10 choice 1</label>
                                      <div class="col-7 p-0">
                                          <input type="text" class="form-control " placeholder="Whole">
                                      </div>
                                   </div>
                                   <div class="form-group mb-2 row">
                                      <label class="col-4 col-form-label ">Q10 choice 2</label>
                                      <div class="col-7 p-0">
                                          <input type="text" class="form-control " placeholder="Whole">
                                      </div>
                                   </div>
                                   <div class="form-group mb-2 row">
                                      <label class="col-4 col-form-label ">Q10 choice 3</label>
                                      <div class="col-7 p-0">
                                          <input type="text" class="form-control " placeholder="Whole">
                                      </div>
                                   </div>
                                   <div class="form-group mb-2 row">
                                      <label class="col-4 col-form-label ">Q10 choice 4</label>
                                      <div class="col-7 p-0">
                                          <input type="text" class="form-control " placeholder="Whole">
                                      </div>
                                   </div>
                                   <div class="form-group mb-2 row">
                                      <label class="col-4 col-form-label ">Q10 Correct Answers</label>
                                      <div class="col-7 p-0">
                                          <input type="text" class="form-control " placeholder="Whole">
                                      </div>
                                   </div>
                              </div>
                        </form>
                    </div>
                    <div class="col-4">
                       <form class="form mt-4">
                            <h5 class="mt-4">Audio</h5>
                           <div class="form-group mb-2 row">
                                <div class="col-12 p-0">                              
                                    <div class="custom-file mb-3">
                                        <input type="file" class="custom-file-input" id="customFile">
                                        <label class="custom-file-label" for="customFile">Select Audio</label>
                                    </div>
                                      <input type="text" class="form-control " placeholder="">
                                </div>
                            </div>
                       </form>
                    </div>
                    </div>
                   <form class="form ml-1">
                       <div class="form-group row">
                            <div class="col-11 save-btn mt-5 ">
                                <button  type="button" class="btn btn-outline-primary"><a href="#"><img class="back-btn" src="{{ asset('assets/images/icons/back.svg') }}"></a>Cancel</button>
                                <button  type="button" class="btn btn-outline-primary mr-2"><i class="far fa-save save-icon"></i>Submit</button>
                            </div> 
                        </div>
                   </form>
               </div>
            </div>
        </div>
    </section>


    <!-- missing word -->
    <section class="top-title-button mb-3">
        <div class="row mx-0 align-items-center">
            <div class="col-12 col-md-12 col-xl-8 col-sm-8 left">
                <h1 class="title mb-4">Add New Question</h1>
            </div>
        </div>
    </section>

    <section class="top-title-button white-bg mb-3 remove-main-margin">
        <div class="row mx-0 align-items-center">
            <div class="col-12 col-md-12 col-xl-12 col-sm-8 p-0 left">
               <div class="question-forms">
                   <div class="col-12 heading-text">
                      <h5>Select missing word item (11-12)</h5>
                   </div>
                   <div class="row">
                       <div class="col-8">
                         <form class="form">
                                <div class=" col-12 mt-5 mb-1 ml-1 white-bg common-col">
                                    <div class="form-group mb-2 row">
                                       <label class="col-4 col-form-label">Q11 Audio</label>
                                       <div class="col-7 p-0">
                                          <input type="text" class="form-control " placeholder="Whole,Total,Very,Open">
                                       </div>
                                  </div>
                                  <div class="form-group mb-2 row">
                                      <label class="col-4 col-form-label ">Q11 choice 1</label>
                                      <div class="col-7 p-0">
                                          <input type="text" class="form-control " placeholder="Whole">
                                      </div>
                                   </div>
                                   <div class="form-group mb-2 row">
                                      <label class="col-4 col-form-label ">Q11 choice 2</label>
                                      <div class="col-7 p-0">
                                          <input type="text" class="form-control " placeholder="Whole">
                                      </div>
                                   </div>
                                   <div class="form-group mb-2 row">
                                      <label class="col-4 col-form-label ">Q11 choice 3</label>
                                      <div class="col-7 p-0">
                                          <input type="text" class="form-control " placeholder="Whole">
                                      </div>
                                   </div>
                                   <div class="form-group mb-2 row">
                                      <label class="col-4 col-form-label ">Q11 choice 4</label>
                                      <div class="col-7 p-0">
                                          <input type="text" class="form-control " placeholder="Whole">
                                      </div>
                                   </div>
                                   <div class="form-group mb-2 row">
                                      <label class="col-4 col-form-label ">Q11 Correct Answers</label>
                                      <div class="col-7 p-0">
                                          <input type="text" class="form-control " placeholder="Whole">
                                      </div>
                                   </div>
                              </div>
                              <div class=" col-12 mt-5 mb-1 ml-1 white-bg common-col">
                                    <div class="form-group mb-2 row">
                                       <label class="col-4 col-form-label">Q12 Audio</label>
                                       <div class="col-7 p-0">
                                          <input type="text" class="form-control " placeholder="Whole,Total,Very,Open">
                                       </div>
                                  </div>
                                  <div class="form-group mb-2 row">
                                      <label class="col-4 col-form-label ">Q12 choice 1</label>
                                      <div class="col-7 p-0">
                                          <input type="text" class="form-control " placeholder="Whole">
                                      </div>
                                   </div>
                                   <div class="form-group mb-2 row">
                                      <label class="col-4 col-form-label ">Q12 choice 2</label>
                                      <div class="col-7 p-0">
                                          <input type="text" class="form-control " placeholder="Whole">
                                      </div>
                                   </div>
                                   <div class="form-group mb-2 row">
                                      <label class="col-4 col-form-label ">Q12 choice 3</label>
                                      <div class="col-7 p-0">
                                          <input type="text" class="form-control " placeholder="Whole">
                                      </div>
                                   </div>
                                   <div class="form-group mb-2 row">
                                      <label class="col-4 col-form-label ">Q12 choice 4</label>
                                      <div class="col-7 p-0">
                                          <input type="text" class="form-control " placeholder="Whole">
                                      </div>
                                   </div>
                                   <div class="form-group mb-2 row">
                                      <label class="col-4 col-form-label ">Q12 Correct Answers</label>
                                      <div class="col-7 p-0">
                                          <input type="text" class="form-control " placeholder="Whole">
                                      </div>
                                   </div>
                              </div>
                        </form>
                    </div>
                    <div class="col-4">
                       <form class="form mt-4">
                            <h5 class="mt-4">Audio</h5>
                           <div class="form-group mb-2 row">
                                <div class="col-12 p-0">                              
                                    <div class="custom-file mb-3">
                                        <input type="file" class="custom-file-input" id="customFile">
                                        <label class="custom-file-label" for="customFile">Select Audio</label>
                                    </div>
                                      <input type="text" class="form-control " placeholder="">
                                </div>
                            </div>
                       </form>
                    </div>
                    </div>
                   <form class="form ml-1">
                       <div class="form-group row">
                            <div class="col-11 save-btn mt-5 ">
                                <button  type="button" class="btn btn-outline-primary"><a href="#"><img class="back-btn" src="{{ asset('assets/images/icons/back.svg') }}"></a>Cancel</button>
                                <button  type="button" class="btn btn-outline-primary mr-2"><i class="far fa-save save-icon"></i>Submit</button>
                            </div> 
                        </div>
                   </form>
               </div>
            </div>
        </div>
    </section>

    <!-- write dictations -->
    <section class="top-title-button mb-3">
        <div class="row mx-0 align-items-center">
            <div class="col-12 col-md-12 col-xl-8 col-sm-8 left">
                <h1 class="title mb-4">Add New Question</h1>
            </div>
        </div>
    </section>

    <section class="top-title-button white-bg mb-3 remove-main-margin">
        <div class="row mx-0 align-items-center">
            <div class="col-12 col-md-12 col-xl-12 col-sm-8 p-0 left">
               <div class="question-forms">
                   <div class="col-12 heading-text">
                      <h5>Write Form Dictations (15-17)</h5>
                   </div>
                   <div class="row">
                       <div class="col-8">
                         <form class="form">
                         <div class=" col-12 mt-5 mb-1 ml-1 white-bg common-col">
                                    <div class="form-group mb-2 row">
                                       <label class="col-4 col-form-label">Q15 Audio</label>
                                       <div class="col-7 p-0">
                                          <input type="text" class="form-control " placeholder="Whole,Total,Very,Open">
                                       </div>
                                  </div>
                                   <div class="form-group mb-2 row">
                                      <label class="col-4 col-form-label ">Q15 Correct Answers</label>
                                      <div class="col-7 p-0">
                                          <input type="text" class="form-control " placeholder="Whole">
                                      </div>
                                   </div>
                              </div><div class=" col-12 mt-5 mb-1 ml-1 white-bg common-col">
                                    <div class="form-group mb-2 row">
                                       <label class="col-4 col-form-label">Q16 Audio</label>
                                       <div class="col-7 p-0">
                                          <input type="text" class="form-control " placeholder="Whole,Total,Very,Open">
                                       </div>
                                  </div>
                                   <div class="form-group mb-2 row">
                                      <label class="col-4 col-form-label ">Q16 Correct Answers</label>
                                      <div class="col-7 p-0">
                                          <input type="text" class="form-control " placeholder="Whole">
                                      </div>
                                   </div>
                              </div>
                              <div class=" col-12 mt-5 mb-1 ml-1 white-bg common-col">
                                    <div class="form-group mb-2 row">
                                       <label class="col-4 col-form-label">Q17 Audio</label>
                                       <div class="col-7 p-0">
                                          <input type="text" class="form-control " placeholder="Whole,Total,Very,Open">
                                       </div>
                                  </div>
                                   <div class="form-group mb-2 row">
                                      <label class="col-4 col-form-label ">Q17 Correct Answers</label>
                                      <div class="col-7 p-0">
                                          <input type="text" class="form-control " placeholder="Whole">
                                      </div>
                                   </div>
                              </div>
                        </form>
                    </div>
                    <div class="col-4">
                       <form class="form mt-4">
                            <h5 class="mt-4">Audio</h5>
                           <div class="form-group mb-2 row">
                                <div class="col-12 p-0">                              
                                    <div class="custom-file mb-3">
                                        <input type="file" class="custom-file-input" id="customFile">
                                        <label class="custom-file-label" for="customFile">Select Audio</label>
                                    </div>
                                      <input type="text" class="form-control " placeholder="">
                                </div>
                            </div>
                       </form>
                    </div>
                    </div>
                   <form class="form ml-1">
                       <div class="form-group row">
                            <div class="col-11 save-btn mt-5 ">
                                <button  type="button" class="btn btn-outline-primary"><a href="#"><img class="back-btn" src="{{ asset('assets/images/icons/back.svg') }}"></a>Cancel</button>
                                <button  type="button" class="btn btn-outline-primary mr-2"><i class="far fa-save save-icon"></i>Submit</button>
                            </div> 
                        </div>
                   </form>
               </div>
            </div>
        </div>
    </section>

    <!-- writing instruction -->
    <section class="top-title-button mb-3">
        <div class="row mx-0 align-items-center">
            <div class="col-12 col-md-12 col-xl-8 col-sm-8 left">
                <h1 class="title mb-4">Add New Question</h1>
            </div>
        </div>
    </section>

    <section class="top-title-button white-bg mb-3 remove-main-margin">
        <div class="row mx-0 align-items-center">
            <div class="col-12 col-md-12 col-xl-12 col-sm-8 p-0 left">
               <div class="question-forms">
                   <div class="col-12 heading-text">
                      <h5>Writing Instruction</h5>
                   </div>
                   <div class="sub-heading">
                       <h4>Instruction<span>About discussion in Questions</span></h4>
                   </div>
                   <form class="form ml-1">
                      <div class="form-group mb-5 row">
                           <div class="col-11">
                              <!-- <div id="editor">
                                 <h2>The three greatest things you learn from traveling</h2>
                              </div> -->
                              <textarea name="editor" id="editor9"></textarea>
                           </div>
                       </div>
                       <div class="form-group row">
                            <div class="col-11 save-btn mt-5 ">
                                <button  type="button" class="btn btn-outline-primary"><a href="#"><img class="back-btn" src="{{ asset('assets/images/icons/back.svg') }}"></a>Cancel</button>
                                <button  type="button" class="btn btn-outline-primary mr-2"><i class="far fa-save save-icon"></i>Submit</button>
                            </div> 
                        </div>
                   </form>
               </div>
            </div>
        </div>
    </section>

    <!-- summarize Written -->
    <section class="top-title-button mb-3">
        <div class="row mx-0 align-items-center">
            <div class="col-12 col-md-12 col-xl-8 col-sm-8 left">
                <h1 class="title mb-4">Add New Question</h1>
            </div>
        </div>
    </section>

    <section class="top-title-button white-bg mb-3 remove-main-margin">
        <div class="row mx-0 align-items-center">
            <div class="col-12 col-md-12 col-xl-12 col-sm-8 p-0 left">
               <div class="question-forms">
                   <div class="col-12 heading-text">
                      <h5>Summarize Written</h5>
                   </div>
                   <div class="sub-heading">
                       <h4>Item-1<span>Question</span></h4>
                   </div>
                   <form class="form ml-1">
                      <div class="form-group mb-3 row">
                           <div class="col-11">
                              <!-- <div id="editor">
                                 <h2>The three greatest things you learn from traveling</h2>
                              </div> -->
                              <textarea name="editor" id="editor10"></textarea>
                           </div>
                        </div>
                        <div class="sub-heading">
                           <h4>Sample Item-1<span>Question</span></h4>
                        </div>
                        <div class="form-group mb-3 row">
                           <div class="col-11">
                              <!-- <div id="editor">
                                 <h2>The three greatest things you learn from traveling</h2>
                              </div> -->
                              <textarea name="editor" id="editor11"></textarea>
                           </div>
                        </div>
                        <div class="sub-heading">
                           <h4>Item-2<span>Question</span></h4>
                        </div>
                        <div class="form-group mb-3 row">
                           <div class="col-11">
                              <!-- <div id="editor">
                                 <h2>The three greatest things you learn from traveling</h2>
                              </div> -->
                              <textarea name="editor" id="editor12"></textarea>
                           </div>
                        </div>
                        <div class="sub-heading">
                           <h4>Sample Item-2<span>Question</span></h4>
                        </div>
                        <div class="form-group mb-3 row">
                           <div class="col-11">
                              <!-- <div id="editor">
                                 <h2>The three greatest things you learn from traveling</h2>
                              </div> -->
                              <textarea name="editor" id="editor13"></textarea>
                           </div>
                        </div>
                       <div class="form-group row">
                            <div class="col-11 save-btn mt-5 ">
                                <button  type="button" class="btn btn-outline-primary"><a href="#"><img class="back-btn" src="{{ asset('assets/images/icons/back.svg') }}"></a>Cancel</button>
                                <button  type="button" class="btn btn-outline-primary mr-2"><i class="far fa-save save-icon"></i>Submit</button>
                            </div> 
                        </div>
                   </form>
               </div>
            </div>
        </div>
    </section>

    <!-- Essay Writing -->

    <section class="top-title-button mb-3">
        <div class="row mx-0 align-items-center">
            <div class="col-12 col-md-12 col-xl-8 col-sm-8 left">
                <h1 class="title mb-4">Add New Question</h1>
            </div>
        </div>
    </section>

    <section class="top-title-button white-bg mb-3 remove-main-margin">
        <div class="row mx-0 align-items-center">
            <div class="col-12 col-md-12 col-xl-12 col-sm-8 p-0 left">
               <div class="question-forms">
                   <div class="col-12 heading-text">
                      <h5>Essay Writing</h5>
                   </div>
                   <div class="sub-heading">
                       <h4>Essay Title<span>Question</span></h4>
                   </div>
                   <form class="form ml-1">
                      <div class="form-group mb-3 row">
                           <div class="col-11">
                              <!-- <div id="editor">
                                 <h2>The three greatest things you learn from traveling</h2>
                              </div> -->
                              <textarea name="editor" id="editor14"></textarea>
                           </div>
                        </div>
                        <div class="sub-heading">
                           <h4>Sample Essay<span>Question</span></h4>
                        </div>
                        <div class="form-group mb-3 row">
                           <div class="col-11">
                              <!-- <div id="editor">
                                 <h2>The three greatest things you learn from traveling</h2>
                              </div> -->
                              <textarea name="editor" id="editor15"></textarea>
                           </div>
                        </div>
                       <div class="form-group row">
                            <div class="col-11 save-btn mt-5 ">
                                <button  type="button" class="btn btn-outline-primary"><a href="#"><img class="back-btn" src="{{ asset('assets/images/icons/back.svg') }}"></a>Cancel</button>
                                <button  type="button" class="btn btn-outline-primary mr-2"><i class="far fa-save save-icon"></i>Submit</button>
                            </div> 
                        </div>
                   </form>
               </div>
            </div>
        </div>
    </section>


    <!-- speaking instruction -->
    <section class="top-title-button mb-3">
        <div class="row mx-0 align-items-center">
            <div class="col-12 col-md-12 col-xl-8 col-sm-8 left">
                <h1 class="title mb-4">Add New Question</h1>
            </div>
        </div>
    </section>

    <section class="top-title-button white-bg mb-3 remove-main-margin">
        <div class="row mx-0 align-items-center">
            <div class="col-12 col-md-12 col-xl-12 col-sm-8 p-0 left">
               <div class="question-forms">
                   <div class="col-12 heading-text">
                      <h5>Speaking Instruction</h5>
                   </div>
                   <div class="row">
                       <div class="col-8 pl-0">
                         <form class="form ml-1">
                          <div class="sub-heading">
                                <h4>Instruction<span>About discussion in Questions</span></h4>
                          </div>
                          <div class="form-group mb-3 row">
                           <div class="col-12">
                              <!-- <div id="editor">
                                 <h2>The three greatest things you learn from traveling</h2>
                              </div> -->
                              <textarea name="editor" id="editor16"></textarea>
                           </div>
                        </div>
                         </form>
                    </div>
                    <div class="col-4">
                       <form class="form mt-4">
                            <h5 class="mt-4">Image</h5>
                           <div class="form-group mb-2 row">
                                <div class="col-12 p-0">                              
                                    <div class="custom-file mb-3">
                                        <input type="file" class="custom-file-input" id="customFile">
                                        <label class="custom-file-label" for="customFile">Select Image</label>
                                    </div>
                                      <input type="text" class="form-control " placeholder="">
                                </div>
                            </div>
                       </form>
                    </div>
                    </div>
                   <form class="form ml-1">
                       <div class="form-group row">
                            <div class="col-11 save-btn mt-5 ">
                                <button  type="button" class="btn btn-outline-primary"><a href="#"><img class="back-btn" src="{{ asset('assets/images/icons/back.svg') }}"></a>Cancel</button>
                                <button  type="button" class="btn btn-outline-primary mr-2"><i class="far fa-save save-icon"></i>Submit</button>
                            </div> 
                        </div>
                   </form>
               </div>
            </div>
        </div>
    </section>

    <!-- read Aloud -->
    <section class="top-title-button mb-3">
        <div class="row mx-0 align-items-center">
            <div class="col-12 col-md-12 col-xl-8 col-sm-8 left">
                <h1 class="title mb-4">Add New Question</h1>
            </div>
        </div>
    </section>

    <section class="top-title-button white-bg mb-3 remove-main-margin">
        <div class="row mx-0 align-items-center">
            <div class="col-12 col-md-12 col-xl-12 col-sm-8 p-0 left">
               <div class="question-forms">
                   <div class="col-12 heading-text">
                      <h5>Speaking Task 1: Read Aloud</h5>
                   </div>
                   <div class="row">
                       <div class="col-8 pl-0">
                         <form class="form ml-1">
                                <div class="sub-heading">
                                    <h4>Speaking Question 1<span>Paragraph</span></h4>
                               </div>
                              <div class="form-group mb-1 row">
                                   <div class="col-12 pr-0">
                                      <!-- <div id="editor">
                                          <h2>The three greatest things you learn from traveling</h2>
                                      </div> -->
                                      <textarea name="editor" id="editor17"></textarea>
                                  </div>
                               </div>
                               <div class=" col-12 mt-4 ml-3 white-bg common-col">
                                    <div class="form-group mb-3 row">
                                       <label class="col-3 col-form-label">Sample Ans 1</label>
                                       <div class="col-9">
                                          <input type="text" class="form-control " placeholder="Whole,Total,Very,Open">
                                       </div>
                                  </div>
                              </div>
                              <div class="sub-heading">
                                    <h4>Speaking Question 2<span>Paragraph</span></h4>
                               </div>
                              <div class="form-group mb-1 row">
                                   <div class="col-12 pr-0">
                                      <!-- <div id="editor">
                                          <h2>The three greatest things you learn from traveling</h2>
                                      </div> -->
                                      <textarea name="editor" id="editor18"></textarea>
                                  </div>
                               </div>
                               <div class=" col-12 mt-4 ml-3 white-bg common-col">
                                    <div class="form-group mb-2 row">
                                       <label class="col-3 col-form-label">Sample Ans 2</label>
                                       <div class="col-9">
                                          <input type="text" class="form-control " placeholder="Whole,Total,Very,Open">
                                       </div>
                                  </div>
                              </div>
                              <div class="sub-heading">
                                    <h4>Speaking Question 3<span>Paragraph</span></h4>
                               </div>
                              <div class="form-group mb-1 row">
                                   <div class="col-12 pr-0">
                                      <!-- <div id="editor">
                                          <h2>The three greatest things you learn from traveling</h2>
                                      </div> -->
                                      <textarea name="editor" id="editor19"></textarea>
                                  </div>
                               </div>
                               <div class=" col-12 mt-4 ml-3  white-bg common-col">
                                    <div class="form-group mb-2 row">
                                       <label class="col-3 col-form-label">Sample Ans 3</label>
                                       <div class="col-9">
                                          <input type="text" class="form-control " placeholder="Whole,Total,Very,Open">
                                       </div>
                                  </div>
                              </div>
                              <div class="sub-heading">
                                    <h4>Speaking Question 4<span>Paragraph</span></h4>
                               </div>
                              <div class="form-group mb-1 row">
                                   <div class="col-12 pr-0">
                                      <!-- <div id="editor">
                                          <h2>The three greatest things you learn from traveling</h2>
                                      </div> -->
                                      <textarea name="editor" id="editor20"></textarea>
                                  </div>
                               </div>
                               <div class=" col-12 mt-4 ml-3 white-bg common-col">
                                    <div class="form-group mb-2 row">
                                       <label class="col-3 col-form-label">Sample Ans 4</label>
                                       <div class="col-9">
                                          <input type="text" class="form-control " placeholder="Whole,Total,Very,Open">
                                       </div>
                                  </div>
                              </div>
                              <div class="sub-heading">
                                    <h4>Speaking Question 5<span>Paragraph</span></h4>
                               </div>
                              <div class="form-group mb-1 row">
                                   <div class="col-12 pr-0">
                                      <!-- <div id="editor">
                                          <h2>The three greatest things you learn from traveling</h2>
                                      </div> -->
                                      <textarea name="editor" id="editor21"></textarea>
                                  </div>
                               </div>
                               <div class=" col-12 mt-4 ml-3 white-bg common-col">
                                    <div class="form-group mb-2 row">
                                       <label class="col-3 col-form-label">Sample Ans 5</label>
                                       <div class="col-9">
                                          <input type="text" class="form-control " placeholder="Whole,Total,Very,Open">
                                       </div>
                                  </div>
                              </div>
                              <div class="sub-heading">
                                    <h4>Speaking Question 6<span>Paragraph</span></h4>
                               </div>
                              <div class="form-group mb-1 row">
                                   <div class="col-12 pr-0">
                                      <!-- <div id="editor">
                                          <h2>The three greatest things you learn from traveling</h2>
                                      </div> -->
                                      <textarea name="editor" id="editor22"></textarea>
                                  </div>
                               </div>
                               <div class=" col-12 mt-4 ml-3 white-bg common-col">
                                    <div class="form-group mb-2 row">
                                       <label class="col-3 col-form-label">Sample Ans 6</label>
                                       <div class="col-9">
                                          <input type="text" class="form-control " placeholder="Whole,Total,Very,Open">
                                       </div>
                                  </div>
                              </div>
                         </form>
                       </div>
                       <div class="col-4">
                       <form class="form mt-4">
                            <h5 class="mt-4">Audio</h5>
                           <div class="form-group mb-2 row">
                                <div class="col-12 p-0">                              
                                    <div class="custom-file mb-3">
                                        <input type="file" class="custom-file-input" id="customFile">
                                        <label class="custom-file-label" for="customFile">Select Audio</label>
                                    </div>
                                      <input type="text" class="form-control " placeholder="">
                                </div>
                            </div>
                       </form>
                    </div>
                    </div>
                   <form class="form ml-1">
                       <div class="form-group row">
                            <div class="col-11 save-btn mt-3">
                                <button  type="button" class="btn btn-outline-primary"><a href="#"><img class="back-btn" src="{{ asset('assets/images/icons/back.svg') }}"></a>Cancel</button>
                                <button  type="button" class="btn btn-outline-primary mr-2"><i class="far fa-save save-icon"></i>Submit</button>
                            </div> 
                        </div>
                   </form>
               </div>
            </div>
        </div>
    </section>


    <!-- repeat Sentence -->
    <section class="top-title-button mb-3">
        <div class="row mx-0 align-items-center">
            <div class="col-12 col-md-12 col-xl-8 col-sm-8 left">
                <h1 class="title mb-4">Add New Question</h1>
            </div>
        </div>
    </section>

    <section class="top-title-button white-bg mb-3 remove-main-margin">
        <div class="row mx-0 align-items-center">
            <div class="col-12 col-md-12 col-xl-12 col-sm-8 p-0 left">
               <div class="question-forms">
                   <div class="col-12 heading-text">
                      <h5>Speaking : Repeat Sentence</h5>
                   </div>
                   <div class="row">
                       <div class="col-8">
                         <form class="form">
                               <div class=" col-12 mt-5 mb-1 ml-1 pr-3 white-bg common-col">
                                    <div class="form-group mb-2 row">
                                       <label class="col-3 col-form-label">Question 7</label>
                                       <div class="col-9 p-0">
                                          <input type="text" class="form-control " placeholder="Whole,Total,Very,Open">
                                       </div>
                                    </div>
                                   <div class="form-group mb-2 row">
                                      <label class="col-3 col-form-label ">Sample Ans 7</label>
                                      <div class="col-9 p-0">
                                          <input type="text" class="form-control " placeholder="Whole">
                                      </div>
                                   </div>
                              </div>
                              <div class=" col-12 mt-5 mb-1 ml-1 pr-3 white-bg common-col">
                                    <div class="form-group mb-2 row">
                                       <label class="col-3 col-form-label">Question 8</label>
                                       <div class="col-9 p-0">
                                          <input type="text" class="form-control " placeholder="Whole,Total,Very,Open">
                                       </div>
                                  </div>
                                   <div class="form-group mb-2 row">
                                      <label class="col-3 col-form-label ">Sample Ans 8</label>
                                      <div class="col-9 p-0">
                                          <input type="text" class="form-control " placeholder="Whole">
                                      </div>
                                   </div>
                              </div>
                              <div class=" col-12 mt-5 mb-1 ml-1 pr-3 white-bg common-col">
                                    <div class="form-group mb-2 row">
                                       <label class="col-3 col-form-label">Question 9</label>
                                       <div class="col-9 p-0">
                                          <input type="text" class="form-control " placeholder="Whole,Total,Very,Open">
                                       </div>
                                  </div>
                                   <div class="form-group mb-2 row">
                                      <label class="col-3 col-form-label ">Sample Ans 9</label>
                                      <div class="col-9 p-0">
                                          <input type="text" class="form-control " placeholder="Whole">
                                      </div>
                                   </div>
                              </div>
                              <div class=" col-12 mt-5 mb-1 ml-1 pr-3 white-bg common-col">
                                    <div class="form-group mb-2 row">
                                       <label class="col-3 col-form-label">Question 10</label>
                                       <div class="col-9 p-0">
                                          <input type="text" class="form-control " placeholder="Whole,Total,Very,Open">
                                       </div>
                                  </div>
                                   <div class="form-group mb-2 row">
                                      <label class="col-3 col-form-label ">Sample Ans 10</label>
                                      <div class="col-9 p-0">
                                          <input type="text" class="form-control " placeholder="Whole">
                                      </div>
                                   </div>
                              </div>
                              <div class=" col-12 mt-5 mb-1 ml-1 pr-3 white-bg common-col">
                                    <div class="form-group mb-2 row">
                                       <label class="col-3 col-form-label">Question 11</label>
                                       <div class="col-9 p-0">
                                          <input type="text" class="form-control " placeholder="Whole,Total,Very,Open">
                                       </div>
                                  </div>
                                   <div class="form-group mb-2 row">
                                      <label class="col-3 col-form-label ">Sample Ans 11</label>
                                      <div class="col-9 p-0">
                                          <input type="text" class="form-control " placeholder="Whole">
                                      </div>
                                   </div>
                              </div>
                              <div class=" col-12 mt-5 mb-1 ml-1 pr-3 white-bg common-col">
                                    <div class="form-group mb-2 row">
                                       <label class="col-3 col-form-label">Question 12</label>
                                       <div class="col-9 p-0">
                                          <input type="text" class="form-control " placeholder="Whole,Total,Very,Open">
                                       </div>
                                  </div>
                                   <div class="form-group mb-2 row">
                                      <label class="col-3 col-form-label ">Sample Ans 12</label>
                                      <div class="col-9 p-0">
                                          <input type="text" class="form-control " placeholder="Whole">
                                      </div>
                                   </div>
                              </div>
                              <div class=" col-12 mt-5 mb-1 ml-1 pr-3 white-bg common-col">
                                    <div class="form-group mb-2 row">
                                       <label class="col-3 col-form-label">Question 13</label>
                                       <div class="col-9 p-0">
                                          <input type="text" class="form-control " placeholder="Whole,Total,Very,Open">
                                       </div>
                                  </div>
                                   <div class="form-group mb-2 row">
                                      <label class="col-3 col-form-label ">Sample Ans 13</label>
                                      <div class="col-9 p-0">
                                          <input type="text" class="form-control " placeholder="Whole">
                                      </div>
                                   </div>
                              </div>
                              <div class=" col-12 mt-5 mb-1 ml-1 pr-3 white-bg common-col">
                                    <div class="form-group mb-2 row">
                                       <label class="col-3 col-form-label">Question 14</label>
                                       <div class="col-9 p-0">
                                          <input type="text" class="form-control " placeholder="Whole,Total,Very,Open">
                                       </div>
                                  </div>
                                   <div class="form-group mb-2 row">
                                      <label class="col-3 col-form-label ">Sample Ans 14</label>
                                      <div class="col-9 p-0">
                                          <input type="text" class="form-control " placeholder="Whole">
                                      </div>
                                   </div>
                              </div>
                              <div class=" col-12 mt-5 mb-1 ml-1 pr-3 white-bg common-col">
                                    <div class="form-group mb-2 row">
                                       <label class="col-3 col-form-label">Question 15</label>
                                       <div class="col-9 p-0">
                                          <input type="text" class="form-control " placeholder="Whole,Total,Very,Open">
                                       </div>
                                  </div>
                                   <div class="form-group mb-2 row">
                                      <label class="col-3 col-form-label ">Sample Ans 15</label>
                                      <div class="col-9 p-0">
                                          <input type="text" class="form-control " placeholder="Whole">
                                      </div>
                                   </div>
                              </div>
                              <div class=" col-12 mt-5 mb-1 ml-1 pr-3 white-bg common-col">
                                    <div class="form-group mb-2 row">
                                       <label class="col-3 col-form-label">Question 16</label>
                                       <div class="col-9 p-0">
                                          <input type="text" class="form-control " placeholder="Whole,Total,Very,Open">
                                       </div>
                                  </div>
                                   <div class="form-group mb-2 row">
                                      <label class="col-3 col-form-label ">Sample Ans 16</label>
                                      <div class="col-9 p-0">
                                          <input type="text" class="form-control " placeholder="Whole">
                                      </div>
                                   </div>
                              </div>
                        </form>
                    </div>
                    <div class="col-4">
                       <form class="form mt-4">
                            <h5 class="mt-4">Audio</h5>
                           <div class="form-group mb-2 row">
                                <div class="col-12 p-0">                              
                                    <div class="custom-file mb-3">
                                        <input type="file" class="custom-file-input" id="customFile">
                                        <label class="custom-file-label" for="customFile">Select Audio</label>
                                    </div>
                                      <input type="text" class="form-control " placeholder="">
                                </div>
                            </div>
                       </form>
                    </div>
                    </div>
                   <form class="form ml-1">
                       <div class="form-group row">
                            <div class="col-11 save-btn mt-5 ">
                                <button  type="button" class="btn btn-outline-primary"><a href="#"><img class="back-btn" src="{{ asset('assets/images/icons/back.svg') }}"></a>Cancel</button>
                                <button  type="button" class="btn btn-outline-primary mr-2"><i class="far fa-save save-icon"></i>Submit</button>
                            </div> 
                        </div>
                   </form>
               </div>
            </div>
        </div>
    </section>

    <!-- describe image -->
    <section class="top-title-button mb-3">
        <div class="row mx-0 align-items-center">
            <div class="col-12 col-md-12 col-xl-8 col-sm-8 left">
                <h1 class="title mb-4">Add New Question</h1>
            </div>
        </div>
    </section>

    <section class="top-title-button white-bg mb-3 remove-main-margin">
        <div class="row mx-0 align-items-center">
            <div class="col-12 col-md-12 col-xl-12 col-sm-8 p-0 left">
               <div class="question-forms">
                   <div class="col-12 heading-text">
                      <h5>Describe Image</h5>
                   </div>
                   <div class="row">
                       <div class="col-8">
                         <form class="form">
                               <div class=" col-12 mt-5 mb-1 ml-1 pr-3 white-bg common-col">
                                    <div class="form-group mb-2 row">
                                       <label class="col-3 col-form-label">Question 17</label>
                                       <div class="col-9 p-0">
                                          <input type="text" class="form-control " placeholder="Whole,Total,Very,Open">
                                       </div>
                                    </div>
                                   <div class="form-group mb-2 row">
                                      <label class="col-3 col-form-label ">Sample Ans 17</label>
                                      <div class="col-9 p-0">
                                          <input type="text" class="form-control " placeholder="Whole">
                                      </div>
                                   </div>
                              </div>
                              <div class=" col-12 mt-5 mb-1 ml-1 pr-3 white-bg common-col">
                                    <div class="form-group mb-2 row">
                                       <label class="col-3 col-form-label">Question 18</label>
                                       <div class="col-9 p-0">
                                          <input type="text" class="form-control " placeholder="Whole,Total,Very,Open">
                                       </div>
                                  </div>
                                   <div class="form-group mb-2 row">
                                      <label class="col-3 col-form-label ">Sample Ans 18</label>
                                      <div class="col-9 p-0">
                                          <input type="text" class="form-control " placeholder="Whole">
                                      </div>
                                   </div>
                              </div>
                              <div class=" col-12 mt-5 mb-1 ml-1 pr-3 white-bg common-col">
                                    <div class="form-group mb-2 row">
                                       <label class="col-3 col-form-label">Question 19</label>
                                       <div class="col-9 p-0">
                                          <input type="text" class="form-control " placeholder="Whole,Total,Very,Open">
                                       </div>
                                  </div>
                                   <div class="form-group mb-2 row">
                                      <label class="col-3 col-form-label ">Sample Ans 19</label>
                                      <div class="col-9 p-0">
                                          <input type="text" class="form-control " placeholder="Whole">
                                      </div>
                                   </div>
                              </div>
                              <div class=" col-12 mt-5 mb-1 ml-1 pr-3 white-bg common-col">
                                    <div class="form-group mb-2 row">
                                       <label class="col-3 col-form-label">Question 20</label>
                                       <div class="col-9 p-0">
                                          <input type="text" class="form-control " placeholder="Whole,Total,Very,Open">
                                       </div>
                                  </div>
                                   <div class="form-group mb-2 row">
                                      <label class="col-3 col-form-label ">Sample Ans 20</label>
                                      <div class="col-9 p-0">
                                          <input type="text" class="form-control " placeholder="Whole">
                                      </div>
                                   </div>
                              </div>
                              <div class=" col-12 mt-5 mb-1 ml-1 pr-3 white-bg common-col">
                                    <div class="form-group mb-2 row">
                                       <label class="col-3 col-form-label">Question 21</label>
                                       <div class="col-9 p-0">
                                          <input type="text" class="form-control " placeholder="Whole,Total,Very,Open">
                                       </div>
                                  </div>
                                   <div class="form-group mb-2 row">
                                      <label class="col-3 col-form-label ">Sample Ans 21</label>
                                      <div class="col-9 p-0">
                                          <input type="text" class="form-control " placeholder="Whole">
                                      </div>
                                   </div>
                              </div>
                              <div class=" col-12 mt-5 mb-1 ml-1 pr-3 white-bg common-col">
                                    <div class="form-group mb-2 row">
                                       <label class="col-3 col-form-label">Question 22</label>
                                       <div class="col-9 p-0">
                                          <input type="text" class="form-control " placeholder="Whole,Total,Very,Open">
                                       </div>
                                  </div>
                                   <div class="form-group mb-2 row">
                                      <label class="col-3 col-form-label ">Sample Ans 22</label>
                                      <div class="col-9 p-0">
                                          <input type="text" class="form-control " placeholder="Whole">
                                      </div>
                                   </div>
                              </div>
                        </form>
                    </div>
                    <div class="col-4">
                       <form class="form mt-4">
                            <h5 class="mt-4">Image</h5>
                           <div class="form-group mb-2 row">
                                <div class="col-12 p-0">                              
                                    <div class="custom-file mb-3">
                                        <input type="file" class="custom-file-input" id="customFile">
                                        <label class="custom-file-label" for="customFile">Select Image</label>
                                    </div>
                                      <input type="text" class="form-control " placeholder="">
                                </div>
                            </div>
                            <h5 class="mt-2">Audio</h5>
                            <div class="form-group mb-2 row">
                                <div class="col-12 p-0">                              
                                    <div class="custom-file mb-3">
                                        <input type="file" class="custom-file-input" id="customFile">
                                        <label class="custom-file-label" for="customFile">Select Audio</label>
                                    </div>
                                      <input type="text" class="form-control " placeholder="">
                                </div>
                            </div>
                       </form>
                    </div>
                    </div>
                   <form class="form ml-1">
                       <div class="form-group row">
                            <div class="col-11 save-btn mt-5 ">
                                <button  type="button" class="btn btn-outline-primary"><a href="#"><img class="back-btn" src="{{ asset('assets/images/icons/back.svg') }}"></a>Cancel</button>
                                <button  type="button" class="btn btn-outline-primary mr-2"><i class="far fa-save save-icon"></i>Submit</button>
                            </div> 
                        </div>
                   </form>
               </div>
            </div>
        </div>
    </section>


    <!-- re-tell lecture -->
    <section class="top-title-button mb-3">
        <div class="row mx-0 align-items-center">
            <div class="col-12 col-md-12 col-xl-8 col-sm-8 left">
                <h1 class="title mb-4">Add New Question</h1>
            </div>
        </div>
    </section>

    <section class="top-title-button white-bg mb-3 remove-main-margin">
        <div class="row mx-0 align-items-center">
            <div class="col-12 col-md-12 col-xl-12 col-sm-8 p-0 left">
               <div class="question-forms">
                   <div class="col-12 heading-text">
                      <h5>Re-tell lecture</h5>
                   </div>
                   <div class="row">
                       <div class="col-8">
                         <form class="form">
                               <div class=" col-12 mt-5 mb-1 ml-1 pr-3 white-bg common-col">
                                    <div class="form-group mb-2 row">
                                       <label class="col-3 col-form-label">Question 23</label>
                                       <div class="col-9 p-0">
                                          <input type="text" class="form-control " placeholder="Whole,Total,Very,Open">
                                       </div>
                                    </div>
                                    <div class="form-group mb-2 row">
                                       <label class="col-3 col-form-label">Image 23</label>
                                       <div class="col-9 p-0">
                                          <input type="text" class="form-control " placeholder="Whole,Total,Very,Open">
                                       </div>
                                    </div>
                                   <div class="form-group mb-2 row">
                                      <label class="col-3 col-form-label ">Sample Ans 23</label>
                                      <div class="col-9 p-0">
                                          <input type="text" class="form-control " placeholder="Whole">
                                      </div>
                                   </div>
                              </div>
                              <div class=" col-12 mt-5 mb-1 ml-1 pr-3 white-bg common-col">
                                    <div class="form-group mb-2 row">
                                       <label class="col-3 col-form-label">Question 24</label>
                                       <div class="col-9 p-0">
                                          <input type="text" class="form-control " placeholder="Whole,Total,Very,Open">
                                       </div>
                                    </div>
                                    <div class="form-group mb-2 row">
                                       <label class="col-3 col-form-label">Image 24</label>
                                       <div class="col-9 p-0">
                                          <input type="text" class="form-control " placeholder="Whole,Total,Very,Open">
                                       </div>
                                    </div>
                                   <div class="form-group mb-2 row">
                                      <label class="col-3 col-form-label ">Sample Ans 24</label>
                                      <div class="col-9 p-0">
                                          <input type="text" class="form-control " placeholder="Whole">
                                      </div>
                                   </div>
                              </div>
                              <div class=" col-12 mt-5 mb-1 ml-1 pr-3 white-bg common-col">
                                    <div class="form-group mb-2 row">
                                       <label class="col-3 col-form-label">Question 25</label>
                                       <div class="col-9 p-0">
                                          <input type="text" class="form-control " placeholder="Whole,Total,Very,Open">
                                       </div>
                                    </div>
                                    <div class="form-group mb-2 row">
                                       <label class="col-3 col-form-label">Image 25</label>
                                       <div class="col-9 p-0">
                                          <input type="text" class="form-control " placeholder="Whole,Total,Very,Open">
                                       </div>
                                    </div>
                                   <div class="form-group mb-2 row">
                                      <label class="col-3 col-form-label ">Sample Ans 25</label>
                                      <div class="col-9 p-0">
                                          <input type="text" class="form-control " placeholder="Whole">
                                      </div>
                                   </div>
                              </div>
                        </form>
                    </div>
                    <div class="col-4">
                       <form class="form mt-4">
                            <h5 class="mt-4">Image</h5>
                           <div class="form-group mb-2 row">
                                <div class="col-12 p-0">                              
                                    <div class="custom-file mb-3">
                                        <input type="file" class="custom-file-input" id="customFile">
                                        <label class="custom-file-label" for="customFile">Select Image</label>
                                    </div>
                                      <input type="text" class="form-control " placeholder="">
                                </div>
                            </div>
                            <h5 class="mt-2">Audio</h5>
                            <div class="form-group mb-2 row">
                                <div class="col-12 p-0">                              
                                    <div class="custom-file mb-3">
                                        <input type="file" class="custom-file-input" id="customFile">
                                        <label class="custom-file-label" for="customFile">Select Audio</label>
                                    </div>
                                      <input type="text" class="form-control " placeholder="">
                                </div>
                            </div>
                       </form>
                    </div>
                    </div>
                   <form class="form ml-1">
                       <div class="form-group row">
                            <div class="col-11 save-btn mt-5 ">
                                <button  type="button" class="btn btn-outline-primary"><a href="#"><img class="back-btn" src="{{ asset('assets/images/icons/back.svg') }}"></a>Cancel</button>
                                <button  type="button" class="btn btn-outline-primary mr-2"><i class="far fa-save save-icon"></i>Submit</button>
                            </div> 
                        </div>
                   </form>
               </div>
            </div>
        </div>
    </section>


    <!-- short question -->
    <section class="top-title-button mb-3">
        <div class="row mx-0 align-items-center">
            <div class="col-12 col-md-12 col-xl-8 col-sm-8 left">
                <h1 class="title mb-4">Add New Question</h1>
            </div>
        </div>
    </section>

    <section class="top-title-button white-bg mb-3 remove-main-margin">
        <div class="row mx-0 align-items-center">
            <div class="col-12 col-md-12 col-xl-12 col-sm-8 p-0 left">
               <div class="question-forms">
                   <div class="col-12 heading-text">
                      <h5>Answer-Short Question</h5>
                   </div>
                   <div class="row">
                       <div class="col-8">
                         <form class="form">
                               <div class=" col-12 mt-5 mb-1 ml-1 pr-3 white-bg common-col">
                                    <div class="form-group mb-2 row">
                                       <label class="col-3 col-form-label">Question 26</label>
                                       <div class="col-9 p-0">
                                          <input type="text" class="form-control " placeholder="Whole,Total,Very,Open">
                                       </div>
                                    </div>
                                    <div class="form-group mb-2 row">
                                       <label class="col-3 col-form-label">Image 26</label>
                                       <div class="col-9 p-0">
                                          <input type="text" class="form-control " placeholder="Whole,Total,Very,Open">
                                       </div>
                                    </div>
                                   <div class="form-group mb-2 row">
                                      <label class="col-3 col-form-label ">Sample Ans 26</label>
                                      <div class="col-9 p-0">
                                          <input type="text" class="form-control " placeholder="Whole">
                                      </div>
                                   </div>
                              </div>
                              <div class=" col-12 mt-5 mb-1 ml-1 pr-3 white-bg common-col">
                                    <div class="form-group mb-2 row">
                                       <label class="col-3 col-form-label">Question 27</label>
                                       <div class="col-9 p-0">
                                          <input type="text" class="form-control " placeholder="Whole,Total,Very,Open">
                                       </div>
                                    </div>
                                    <div class="form-group mb-2 row">
                                       <label class="col-3 col-form-label">Image 27</label>
                                       <div class="col-9 p-0">
                                          <input type="text" class="form-control " placeholder="Whole,Total,Very,Open">
                                       </div>
                                    </div>
                                   <div class="form-group mb-2 row">
                                      <label class="col-3 col-form-label ">Sample Ans 27</label>
                                      <div class="col-9 p-0">
                                          <input type="text" class="form-control " placeholder="Whole">
                                      </div>
                                   </div>
                              </div>
                              <div class=" col-12 mt-5 mb-1 ml-1 pr-3 white-bg common-col">
                                    <div class="form-group mb-2 row">
                                       <label class="col-3 col-form-label">Question 28</label>
                                       <div class="col-9 p-0">
                                          <input type="text" class="form-control " placeholder="Whole,Total,Very,Open">
                                       </div>
                                    </div>
                                    <div class="form-group mb-2 row">
                                       <label class="col-3 col-form-label">Image 28</label>
                                       <div class="col-9 p-0">
                                          <input type="text" class="form-control " placeholder="Whole,Total,Very,Open">
                                       </div>
                                    </div>
                                   <div class="form-group mb-2 row">
                                      <label class="col-3 col-form-label ">Sample Ans 28</label>
                                      <div class="col-9 p-0">
                                          <input type="text" class="form-control " placeholder="Whole">
                                      </div>
                                   </div>
                              </div>
                              <div class=" col-12 mt-5 mb-1 ml-1 pr-3 white-bg common-col">
                                    <div class="form-group mb-2 row">
                                       <label class="col-3 col-form-label">Question 29</label>
                                       <div class="col-9 p-0">
                                          <input type="text" class="form-control " placeholder="Whole,Total,Very,Open">
                                       </div>
                                    </div>
                                    <div class="form-group mb-2 row">
                                       <label class="col-3 col-form-label">Image 29</label>
                                       <div class="col-9 p-0">
                                          <input type="text" class="form-control " placeholder="Whole,Total,Very,Open">
                                       </div>
                                    </div>
                                   <div class="form-group mb-2 row">
                                      <label class="col-3 col-form-label ">Sample Ans 29</label>
                                      <div class="col-9 p-0">
                                          <input type="text" class="form-control " placeholder="Whole">
                                      </div>
                                   </div>
                              </div>
                              <div class=" col-12 mt-5 mb-1 ml-1 pr-3 white-bg common-col">
                                    <div class="form-group mb-2 row">
                                       <label class="col-3 col-form-label">Question 30</label>
                                       <div class="col-9 p-0">
                                          <input type="text" class="form-control " placeholder="Whole,Total,Very,Open">
                                       </div>
                                    </div>
                                    <div class="form-group mb-2 row">
                                       <label class="col-3 col-form-label">Image 30</label>
                                       <div class="col-9 p-0">
                                          <input type="text" class="form-control " placeholder="Whole,Total,Very,Open">
                                       </div>
                                    </div>
                                   <div class="form-group mb-2 row">
                                      <label class="col-3 col-form-label ">Sample Ans 30</label>
                                      <div class="col-9 p-0">
                                          <input type="text" class="form-control " placeholder="Whole">
                                      </div>
                                   </div>
                              </div>
                              <div class=" col-12 mt-5 mb-1 ml-1 pr-3 white-bg common-col">
                                    <div class="form-group mb-2 row">
                                       <label class="col-3 col-form-label">Question 31</label>
                                       <div class="col-9 p-0">
                                          <input type="text" class="form-control " placeholder="Whole,Total,Very,Open">
                                       </div>
                                    </div>
                                    <div class="form-group mb-2 row">
                                       <label class="col-3 col-form-label">Image 31</label>
                                       <div class="col-9 p-0">
                                          <input type="text" class="form-control " placeholder="Whole,Total,Very,Open">
                                       </div>
                                    </div>
                                   <div class="form-group mb-2 row">
                                      <label class="col-3 col-form-label ">Sample Ans 31</label>
                                      <div class="col-9 p-0">
                                          <input type="text" class="form-control " placeholder="Whole">
                                      </div>
                                   </div>
                              </div>
                              <div class=" col-12 mt-5 mb-1 ml-1 pr-3 white-bg common-col">
                                    <div class="form-group mb-2 row">
                                       <label class="col-3 col-form-label">Question 32</label>
                                       <div class="col-9 p-0">
                                          <input type="text" class="form-control " placeholder="Whole,Total,Very,Open">
                                       </div>
                                    </div>
                                    <div class="form-group mb-2 row">
                                       <label class="col-3 col-form-label">Image 32</label>
                                       <div class="col-9 p-0">
                                          <input type="text" class="form-control " placeholder="Whole,Total,Very,Open">
                                       </div>
                                    </div>
                                   <div class="form-group mb-2 row">
                                      <label class="col-3 col-form-label ">Sample Ans 32</label>
                                      <div class="col-9 p-0">
                                          <input type="text" class="form-control " placeholder="Whole">
                                      </div>
                                   </div>
                              </div>
                              <div class=" col-12 mt-5 mb-1 ml-1 pr-3 white-bg common-col">
                                    <div class="form-group mb-2 row">
                                       <label class="col-3 col-form-label">Question 33</label>
                                       <div class="col-9 p-0">
                                          <input type="text" class="form-control " placeholder="Whole,Total,Very,Open">
                                       </div>
                                    </div>
                                    <div class="form-group mb-2 row">
                                       <label class="col-3 col-form-label">Image 33</label>
                                       <div class="col-9 p-0">
                                          <input type="text" class="form-control " placeholder="Whole,Total,Very,Open">
                                       </div>
                                    </div>
                                   <div class="form-group mb-2 row">
                                      <label class="col-3 col-form-label ">Sample Ans 33</label>
                                      <div class="col-9 p-0">
                                          <input type="text" class="form-control " placeholder="Whole">
                                      </div>
                                   </div>
                              </div>
                              <div class=" col-12 mt-5 mb-1 ml-1 pr-3 white-bg common-col">
                                    <div class="form-group mb-2 row">
                                       <label class="col-3 col-form-label">Question 34</label>
                                       <div class="col-9 p-0">
                                          <input type="text" class="form-control " placeholder="Whole,Total,Very,Open">
                                       </div>
                                    </div>
                                    <div class="form-group mb-2 row">
                                       <label class="col-3 col-form-label">Image 34</label>
                                       <div class="col-9 p-0">
                                          <input type="text" class="form-control " placeholder="Whole,Total,Very,Open">
                                       </div>
                                    </div>
                                   <div class="form-group mb-2 row">
                                      <label class="col-3 col-form-label ">Sample Ans 34</label>
                                      <div class="col-9 p-0">
                                          <input type="text" class="form-control " placeholder="Whole">
                                      </div>
                                   </div>
                              </div>
                              <div class=" col-12 mt-5 mb-1 ml-1 pr-3 white-bg common-col">
                                    <div class="form-group mb-2 row">
                                       <label class="col-3 col-form-label">Question 35</label>
                                       <div class="col-9 p-0">
                                          <input type="text" class="form-control " placeholder="Whole,Total,Very,Open">
                                       </div>
                                    </div>
                                    <div class="form-group mb-2 row">
                                       <label class="col-3 col-form-label">Image 35</label>
                                       <div class="col-9 p-0">
                                          <input type="text" class="form-control " placeholder="Whole,Total,Very,Open">
                                       </div>
                                    </div>
                                   <div class="form-group mb-2 row">
                                      <label class="col-3 col-form-label ">Sample Ans 35</label>
                                      <div class="col-9 p-0">
                                          <input type="text" class="form-control " placeholder="Whole">
                                      </div>
                                   </div>
                              </div>
                        </form>
                    </div>
                    <div class="col-4">
                       <form class="form mt-4">
                            <h5 class="mt-4">Image</h5>
                           <div class="form-group mb-2 row">
                                <div class="col-12 p-0">                              
                                    <div class="custom-file mb-3">
                                        <input type="file" class="custom-file-input" id="customFile">
                                        <label class="custom-file-label" for="customFile">Select Image</label>
                                    </div>
                                      <input type="text" class="form-control " placeholder="">
                                </div>
                            </div>
                            <h5 class="mt-2">Audio</h5>
                            <div class="form-group mb-2 row">
                                <div class="col-12 p-0">                              
                                    <div class="custom-file mb-3">
                                        <input type="file" class="custom-file-input" id="customFile">
                                        <label class="custom-file-label" for="customFile">Select Audio</label>
                                    </div>
                                      <input type="text" class="form-control " placeholder="">
                                </div>
                            </div>
                       </form>
                    </div>
                    </div>
                   <form class="form ml-1">
                       <div class="form-group row">
                            <div class="col-11 save-btn mt-5 ">
                                <button  type="button" class="btn btn-outline-primary"><a href="#"><img class="back-btn" src="{{ asset('assets/images/icons/back.svg') }}"></a>Cancel</button>
                                <button  type="button" class="btn btn-outline-primary mr-2"><i class="far fa-save save-icon"></i>Submit</button>
                            </div> 
                        </div>
                   </form>
               </div>
            </div>
        </div>
    </section>



</div>
@endsection