@extends('layouts.appSuperAdmin')
@section('content')
<!-- Page Content  -->
<div id="content">

    <section class="top-title-button mb-3">
        <div class="row mx-0 align-items-center">
            <div class="col-12 col-md-8 col-xl-8 col-sm-8 left">
                <h1 class="title mb-4">Manage Test Results</h1>
            </div>
        </div>
    </section>

    <section class="top-title-button white-bg mb-3 remove-main-margin">
        <div class="row mx-0 align-items-center">
            <div class="col-12 col-md-12 col-xl-12 col-sm-12 left p-0">
                <!-- <h1 class="title mb-4">Manage Subscription</h1> -->
                <table id="results" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>Sr No</th>
                            <th>User Name</th>
                            <th>Test Name</th>
                            <th>Test Type</th>
                            <th>Test Subject</th>
                            <th>Score</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Meet</td>
                            <td>Test1</td>
                            <td>Practice Test</td>
                            <td>Subject 1</td>
                            <td>90</td>
                            <td>
                                <ul class="actions-btns">
                                    <li class="action" data-toggle="modal" data-target="#testresults"><a href="#"><i class="fas fa-eye"></i></a></li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Meet</td>
                            <td>Test1</td>
                            <td>Practice Test</td>
                            <td>Subject 1</td>
                            <td>90</td>
                            <td>
                                <ul class="actions-btns">
                                    <li class="action" data-toggle="modal" data-target="#"><a href="#"><i class="fas fa-eye"></i></a></li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Meet</td>
                            <td>Test1</td>
                            <td>Practice Test</td>
                            <td>Subject 1</td>
                            <td>90</td>
                            <td>
                                <ul class="actions-btns">
                                    <li class="action" data-toggle="modal" data-target="#editvideos"><a href="#"><i class="fas fa-eye"></i></a></li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Meet</td>
                            <td>Test1</td>
                            <td>Practice Test</td>
                            <td>Subject 1</td>
                            <td>90</td>
                            <td>
                                <ul class="actions-btns">
                                    <li class="action" data-toggle="modal" data-target="#editvideos"><a href="#"><i class="fas fa-eye"></i></a></li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Meet</td>
                            <td>Test1</td>
                            <td>Practice Test</td>
                            <td>Subject 1</td>
                            <td>90</td>
                            <td>
                                <ul class="actions-btns">
                                    <li class="action" data-toggle="modal" data-target="#editvideos"><a href="#"><i class="fas fa-eye"></i></a></li>
                                </ul>
                            </td>
                        </tr>
                </table>
            </div>
        </div>
    </section>
</div>
@endsection


<!-- Modal -->
<div class="modal fade" id="testresults" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered custom-width">
            <div class="modal-content body-bg">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fas fa-times"></i></span>
                    </button>
                </div>
                <div class="modal-body common-wrap">
                    <div class="tab white-bg">
                       <nav>
                           <div class="nav nav-tabs results-tab" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Listening</a>
                                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Speaking</a>
                                <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Writing</a>
                                <a class="nav-item nav-link" id="nav-speaking-tab" data-toggle="tab" href="#nav-speaking" role="tab" aria-controls="nav-speaking" aria-selected="false">Reading</a>
                          </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                           <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                               <div class="mt-5 ml-5 mb-0 score-heading">
                                  <h4>Score:</h4> 
                               </div>   
                               <div class="row d-flex justify-content-center mt-100">
                                 <div class="col-md-6">
                                       <div class="progress blue"> <span class="progress-left"> <span class="progress-bar"></span> </span> <span class="progress-right"> <span class="progress-bar"></span> </span>
                                           <div class="progress-value">70</div>
                                       </div>
                                 </div>
                               </div>
                           </div>
                           <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                               <div class="mt-5 ml-5 mb-0 score-heading">
                                  <h4>Score:</h4> 
                                </div>   
                               <div class="row d-flex justify-content-center mt-100">
                                 <div class="col-md-6">
                                       <div class="progress blue"> <span class="progress-left"> <span class="progress-bar"></span> </span> <span class="progress-right"> <span class="progress-bar"></span> </span>
                                           <div class="progress-value">90</div>
                                       </div>
                                 </div>
                               </div>
                           </div>
                           <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                               <div class="mt-5 ml-5 mb-0 score-heading">
                                  <h4>Score:</h4> 
                               </div>   
                               <div class="row d-flex justify-content-center mt-100">
                                 <div class="col-md-6">
                                       <div class="progress blue"> <span class="progress-left"> <span class="progress-bar"></span> </span> <span class="progress-right"> <span class="progress-bar"></span> </span>
                                           <div class="progress-value">90</div>
                                       </div>
                                 </div>
                               </div>
                           </div>
                           <div class="tab-pane fade" id="nav-speaking" role="tabpanel" aria-labelledby="nav-speaking-tab">
                               <div class="mt-5 ml-5 mb-0 score-heading">
                                  <h4>Score:</h4> 
                               </div>   
                               <div class="row d-flex justify-content-center mt-100">
                                 <div class="col-md-6">
                                       <div class="progress blue"> <span class="progress-left"> <span class="progress-bar"></span> </span> <span class="progress-right"> <span class="progress-bar"></span> </span>
                                           <div class="progress-value">90</div>
                                       </div>
                                 </div>
                               </div>
                           </div>
                        </div>
                    </div>
                </div>
           </div>
       </div>
</div>

