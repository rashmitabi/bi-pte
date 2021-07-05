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
                            <th>Total Score</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
<!-- Modal -->
<div class="modal fade" id="testresults" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered custom-width">
            <div class="modal-content body-bg">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fas fa-times"></i></span>
                    </button>
                </div>
                <div class="modal-body common-wrap" id="result-edit-body">
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
                <div class="progress-pie-chart " data-percent="50">
                   <div class="ppc-progress">
                      <div class="ppc-progress-fill"></div>
                   </div>
                   <div class="ppc-percents">
                      <div class="pcc-percents-wrapper">
                          <span>%</span>
                      </div>
                   </div>
                </div>
                  <!-- <div class="progress blue" id="listening"> 
                  <span class="progress-left"> 
                    <span class="progress-bar"></span> 
                  </span> 
                  <span class="progress-right"> 
                    <span class="progress-bar"></span> 
                  </span>
                      <div class="progress-value"></div>
                  </div> -->
            </div>
          </div>
      </div>
      <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
          <div class="mt-5 ml-5 mb-0 score-heading">
            <h4>Score:</h4> 
          </div>   
          <div class="row d-flex justify-content-center mt-100">
            <div class="col-md-6">
                <div class="progress-pie-chart1" data-percent="60">
                   <div class="ppc-progress1">
                      <div class="ppc-progress-fill1"></div>
                   </div>
                   <div class="ppc-percents1">
                      <div class="pcc-percents-wrapper">
                          <span>%</span>
                      </div>
                   </div>
                </div>
                  <!-- <div class="progress blue" id="speaking"> <span class="progress-left"> <span class="progress-bar"></span> </span> <span class="progress-right"> <span class="progress-bar"></span> </span>
                      <div class="progress-value">30</div>
                  </div> -->
            </div>
          </div>
      </div>
      <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
          <div class="mt-5 ml-5 mb-0 score-heading">
            <h4>Score:</h4> 
          </div>   
          <div class="row d-flex justify-content-center mt-100">
            <div class="col-md-6">
                 <div class="progress-pie-chart2" data-percent="30">
                   <div class="ppc-progress2">
                      <div class="ppc-progress-fill2"></div>
                   </div>
                   <div class="ppc-percents2">
                      <div class="pcc-percents-wrapper">
                          <span>%</span>
                      </div>
                   </div>
                </div>
                  <!-- <div class="progress blue" id="writing"> <span class="progress-left"> <span class="progress-bar"></span> </span> <span class="progress-right"> <span class="progress-bar"></span> </span>
                      <div class="progress-value">20</div>
                  </div> -->
            </div>
          </div>
      </div>
      <div class="tab-pane fade" id="nav-speaking" role="tabpanel" aria-labelledby="nav-speaking-tab">
          <div class="mt-5 ml-5 mb-0 score-heading">
            <h4>Score:</h4> 
          </div>   
          <div class="row d-flex justify-content-center mt-100">
            <div class="col-md-6">
                 <div class="progress-pie-chart3" data-percent="80">
                   <div class="ppc-progress3">
                      <div class="ppc-progress-fill3"></div>
                   </div>
                   <div class="ppc-percents3">
                      <div class="pcc-percents-wrapper">
                          <span>%</span>
                      </div>
                   </div>
                </div>
                  <!-- <div class="progress blue" id="reading"> <span class="progress-left"> <span class="progress-bar"></span> </span> <span class="progress-right"> <span class="progress-bar"></span> </span>
                      <div class="progress-value">10</div>
                  </div> -->
            </div>
          </div>
      </div>
  </div>
</div>
                </div>
           </div>
       </div>
</div>
@endsection



@section('js-hooks')
<script type="text/javascript" defer>
  var url="{{ route('results.index') }}";
</script>
<script type="text/javascript" src="{{ asset('assets/js/testresults.js') }}" defer></script>
@endsection
