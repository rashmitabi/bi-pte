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
                <div class="progress-pie-chart" data-percent="60">
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
                      <div class="progress-value">{{ $resultData[2] }}</div>
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
                  <!-- <div class="progress blue" id="speaking"> <span class="progress-left"> <span class="progress-bar"></span> </span> <span class="progress-right"> <span class="progress-bar"></span> </span>
                      <div class="progress-value">{{ $resultData[4] }}</div>
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
                  <!-- <div class="progress blue" id="writing"> <span class="progress-left"> <span class="progress-bar"></span> </span> <span class="progress-right"> <span class="progress-bar"></span> </span>
                      <div class="progress-value">{{ $resultData[3] }}</div>
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
                  <!-- <div class="progress blue" id="reading"> <span class="progress-left"> <span class="progress-bar"></span> </span> <span class="progress-right"> <span class="progress-bar"></span> </span>
                      <div class="progress-value">{{ $resultData[1] }}</div>
                  </div> -->
            </div>
          </div>
      </div>
  </div>
</div>