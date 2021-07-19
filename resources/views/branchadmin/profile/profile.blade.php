@extends('layouts.appBranchAdmin')
@section('content')
<!-- Page Content  -->
<div id="content">
  <section class="top-title-button mb-3">
      <div class="row mx-0">
           <div class="col-12 col-md-12 col-xl-12 col-sm-8 p-0 col-header">
                <div class="px-4 pt-0 pb-4 bg-banner">
                    <div class="media profile-header">
                        <div class="profile "><img src="https://d19m59y37dris4.cloudfront.net/university/1-1-1/img/teacher-4.jpg" width="130" class="rounded mb-2 img-thumbnail"></div>
                        <div class="profile "><img src="https://d19m59y37dris4.cloudfront.net/university/1-1-1/img/teacher-4.jpg" width="130" class="rounded mb-2 img-thumbnail"></div>
                    </div>  
                </div>
                <button><a href="#" class="btn edit-btn btn-dark">Edit profile</a></button>
           </div>
       </div>
   </section>
   <section>
       <div class="row">
           <div class="col-12 col-md-12 col-xl-12 col-sm-8">
               <div class="profile-detail">
               <form>
                    <div class="form-group row">
                       <label for="staticEmail" class="col-sm-6 col-form-label">Institute Name</label>
                        <div class="col-sm-6">
                          <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="admin institute">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-6 col-form-label">Email</label>
                        <div class="col-sm-6">
                          <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="admin@gamil.com">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-6 col-form-label">UserName</label>
                        <div class="col-sm-6">
                          <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="admin">
                        </div>
                    </div> 
                    <div class="form-group row">  
                        <label for="staticEmail" class="col-sm-6 col-form-label">Mobile Number</label>
                        <div class="col-sm-6">
                          <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="8701257853">
                        </div>
                    </div> 
                    <div class="form-group row">    
                        <label for="staticEmail" class="col-sm-6 col-form-label">Status</label>
                        <div class="col-sm-6">
                          <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="Pending">
                        </div>
                    </div>  
                    <div class="form-group row">    
                        <label for="staticEmail" class="col-sm-6 col-form-label">GSTIN</label>
                        <div class="col-sm-6">
                          <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="GST1258789">
                        </div>
                    </div>  
                    <div class="form-group row">    
                        <label for="staticEmail" class="col-sm-6 col-form-label">Country Citizen</label>
                        <div class="col-sm-6">
                          <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="Test city">
                        </div>
                    </div>  
                    <div class="form-group row">    
                        <label for="staticEmail" class="col-sm-6 col-form-label">Domain</label>
                        <div class="col-sm-6">
                          <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="Institute">
                        </div>
                    </div>
                    <div class="form-group row">    
                        <label for="staticEmail" class="col-sm-6 col-form-label"> Sub Domain</label>
                        <div class="col-sm-6">
                          <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="Subadmin Institute">
                        </div>
                    </div>
                    <div class="form-group row">    
                        <label for="staticEmail" class="col-sm-6 col-form-label">Welcome Message</label>
                        <div class="col-sm-6">
                          <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="Institute">
                        </div>
                    </div>
                    <div class="form-group row">    
                        <label for="staticEmail" class="col-sm-6 col-form-label">Show Superadmin Video</label>
                        <div class="col-sm-6">
                          <input type="text" readonly class="form-control-plaintext" style="display: flex; float: left; width: 7%;" id="staticEmail" value="yes"><i class="fas fa-check check-icon"></i>
                        </div>
                    </div>
                    <div class="form-group row">    
                        <label for="staticEmail" class="col-sm-6 col-form-label">Show Superadmin Prediction Files</label>
                        <div class="col-sm-6">
                        <input type="text" readonly class="form-control-plaintext" style="display: flex; float: left; width: 7%;" id="staticEmail" value="yes"><i class="fas fa-check check-icon"></i>
                        </div>
                    </div>
                    <div class="form-group row">    
                        <label for="staticEmail" class="col-sm-6 col-form-label">Show Superadmin Tests</label>
                        <div class="col-sm-6">
                        <input type="text" readonly class="form-control-plaintext" style="display: flex; float: left; width: 7%;" id="staticEmail" value="No"><i class="fas fa-times cancel-icon"></i>
                        </div>
                    </div>
                    <div class="form-group row">  
                        <label for="staticEmail" class="col-sm-6 col-form-label">Number of students allowed</label>
                        <div class="col-sm-6">
                          <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="50">
                        </div>
                    </div>
                </form>
               </div>
           </div>
       </div>
   </section>
</div>
@endsection