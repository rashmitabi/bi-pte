@extends('layouts.appSuperAdmin')
@section('content')
<!-- Page Content  -->
<div id="content">
    <section class="top-title-button mb-3">
        <div class="row mx-0 align-items-center">
            <div class="col-12 col-md-8 col-xl-8 col-sm-8 left">
                <h1 class="title mb-4">Manage User</h1>
            </div>
            <div class="col-12 col-md-4 col-xl-4 col-sm-4 right">
                <button type="button" class="btn btn-primary"><i class="fas fa-plus-circle mr-1"></i> New
                    User</button>
            </div>
        </div>
    </section>
    <section class="top-title-button white-bg remove-main-margin mb-3">
        <div class="row mx-0 align-items-center">
            <div class="col-12 col-md-12 col-xl-12 col-sm-8 p-0 left">
                <div class="tab">
                  <nav>
                      <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Institute</a>
                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Students</a>
                      </div>
                  </nav>
                  <div class="tab-content" id="nav-tabContent">
                       <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                       <table id="users" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th> <input type="checkbox" class="form-check-input position-relative ml-0" id="exampleCheck1"> </th>
                            <th>Sr No</th>
                            <th>Institute Name</th>
                            <th>Email</th>
                            <th>Mobile Number</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="checkbox" class="form-check-input position-relative ml-0" id="exampleCheck1"></td>
                            <td>1</td>
                            <td>Abc Institute</td>
                            <td>navneet394@gmail.com</td>
                            <td>9842000106</td>
                            <td>
                                <ul class="actions-btns">
                                <li class="action"><a href="#"><i class="fas fa-user"></i></a></li>
                                    <li class="action"><a href="#"><i class="fas fa-pen"></i></a></li>
                                    <li class="action"><a href="#"><i class="fas fa-trash"></i></a></li>
                                    <li class="action shield green"><a href="#"><img src="{{ asset('assets/images/icons/blocked.svg') }}" class=""></a></li>
                                    <li class="action"><a href="#"><i class="fas fa-unlock-alt"></i></a></li>
                                    <li class="action"><a href="#"><i class="fas fa-clipboard-check"></i></a></li>
                                    <li class="action"><a href="#"><i class="fas fa-clipboard-list"></i></a></li>
                                    <li class="action"><a href="#"><i class="fas fa-clipboard-list"></i></a></li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" class="form-check-input position-relative ml-0" id="exampleCheck1"></td>
                            <td>2</td>
                            <td>Abc Institute</td>
                            <td>navneet394@gmail.com</td>
                            <td>9842000106</td>
                            <td>
                                <ul class="actions-btns">
                                    <li class="action"><a href="#"><i class="fas fa-user"></i></a></li>
                                    <li class="action"><a href="#"><i class="fas fa-pen"></i></a></li>
                                    <li class="action"><a href="#"><i class="fas fa-trash"></i></a></li>
                                    <li class="action shield green"><a href="#"><img src="{{ asset('assets/images/icons/blocked.svg') }}" class=""></a></li>
                                    <li class="action"><a href="#"><i class="fas fa-unlock-alt"></i></a></li>
                                    <li class="action"><a href="#"><i class="fas fa-clipboard-check"></i></a></li>
                                    <li class="action"><a href="#"><i class="fas fa-clipboard-list"></i></a></li>
                                    <li class="action"><a href="#"><i class="fas fa-clipboard-list"></i></a></li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" class="form-check-input position-relative ml-0" id="exampleCheck1"></td>
                            <td>3</td>
                            <td>Abc Institute</td>
                            <td>navneet394@gmail.com</td>
                            <td>9842000106</td>
                            <td>
                                <ul class="actions-btns">
                                <li class="action"><a href="#"><i class="fas fa-user"></i></a></li>
                                    <li class="action"><a href="#"><i class="fas fa-pen"></i></a></li>
                                    <li class="action"><a href="#"><i class="fas fa-trash"></i></a></li>
                                    <li class="action shield green"><a href="#"><img src="{{ asset('assets/images/icons/blocked.svg') }}" class=""></a></li>
                                    <li class="action"><a href="#"><i class="fas fa-unlock-alt"></i></a></li>
                                    <li class="action"><a href="#"><i class="fas fa-clipboard-check"></i></a></li>
                                    <li class="action"><a href="#"><i class="fas fa-clipboard-list"></i></a></li>
                                    <li class="action"><a href="#"><i class="fas fa-clipboard-list"></i></a></li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" class="form-check-input position-relative ml-0" id="exampleCheck1"></td>
                            <td>4</td>
                            <td>Abc Institute</td>
                            <td>navneet394@gmail.com</td>
                            <td>9842000106</td>
                            <td>
                                <ul class="actions-btns">
                                <li class="action"><a href="#"><i class="fas fa-user"></i></a></li>
                                    <li class="action"><a href="#"><i class="fas fa-pen"></i></a></li>
                                    <li class="action"><a href="#"><i class="fas fa-trash"></i></a></li>
                                    <li class="action shield green"><a href="#"><img src="{{ asset('assets/images/icons/blocked.svg') }}" class=""></a></li>
                                    <li class="action"><a href="#"><i class="fas fa-unlock-alt"></i></a></li>
                                    <li class="action"><a href="#"><i class="fas fa-clipboard-check"></i></a></li>
                                    <li class="action"><a href="#"><i class="fas fa-clipboard-list"></i></a></li>
                                    <li class="action"><a href="#"><i class="fas fa-clipboard-list"></i></a></li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" class="form-check-input position-relative ml-0" id="exampleCheck1"></td>
                            <td>5</td>
                            <td>Abc Institute</td>
                            <td>navneet394@gmail.com</td>
                            <td>9842000106</td>
                            <td>
                                <ul class="actions-btns">
                                <li class="action"><a href="#"><i class="fas fa-user"></i></a></li>
                                    <li class="action"><a href="#"><i class="fas fa-pen"></i></a></li>
                                    <li class="action"><a href="#"><i class="fas fa-trash"></i></a></li>
                                    <li class="action shield green"><a href="#"><img src="{{ asset('assets/images/icons/blocked.svg') }}" class=""></a></li>
                                    <li class="action"><a href="#"><i class="fas fa-unlock-alt"></i></a></li>
                                    <li class="action"><a href="#"><i class="fas fa-clipboard-check"></i></a></li>
                                    <li class="action"><a href="#"><i class="fas fa-clipboard-list"></i></a></li>
                                    <li class="action"><a href="#"><i class="fas fa-clipboard-list"></i></a></li>
                                </ul>
                            </td>
                        </tr>
                </table>
                       </div>
                       <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                       <table id="students" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th> <input type="checkbox" class="form-check-input position-relative ml-0" id="exampleCheck1"> </th>
                            <th>Sr No</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Mobile Number</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="checkbox" class="form-check-input position-relative ml-0" id="exampleCheck1"></td>
                            <td>1</td>
                            <td>navneet kaur</td>
                            <td>navneet394@gmail.com</td>
                            <td>9842000106</td>
                            <td>
                                <ul class="actions-btns">
                                <li class="action"><a href="#"><i class="fas fa-user"></i></a></li>
                                    <li class="action"><a href="#"><i class="fas fa-pen"></i></a></li>
                                    <li class="action"><a href="#"><i class="fas fa-trash"></i></a></li>
                                    <li class="action shield green"><a href="#"><img src="{{ asset('assets/images/icons/blocked.svg') }}" class=""></a></li>
                                    <li class="action"><a href="#"><i class="fas fa-unlock-alt"></i></a></li>
                                    <li class="action"><a href="#"><i class="fas fa-clipboard-check"></i></a></li>
                                    <li class="action"><a href="#"><i class="fas fa-clipboard-list"></i></a></li>
                                    <li class="action"><a href="#"><i class="fas fa-clipboard-list"></i></a></li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" class="form-check-input position-relative ml-0" id="exampleCheck1"></td>
                            <td>2</td>
                            <td>navneet kaur</td>
                            <td>navneet394@gmail.com</td>
                            <td>9842000106</td>
                            <td>
                                <ul class="actions-btns">
                                    <li class="action"><a href="#"><i class="fas fa-user"></i></a></li>
                                    <li class="action"><a href="#"><i class="fas fa-pen"></i></a></li>
                                    <li class="action"><a href="#"><i class="fas fa-trash"></i></a></li>
                                    <li class="action shield green"><a href="#"><img src="{{ asset('assets/images/icons/blocked.svg') }}" class=""></a></li>
                                    <li class="action"><a href="#"><i class="fas fa-unlock-alt"></i></a></li>
                                    <li class="action"><a href="#"><i class="fas fa-clipboard-check"></i></a></li>
                                    <li class="action"><a href="#"><i class="fas fa-clipboard-list"></i></a></li>
                                    <li class="action"><a href="#"><i class="fas fa-clipboard-list"></i></a></li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" class="form-check-input position-relative ml-0" id="exampleCheck1"></td>
                            <td>3</td>
                            <td>navneet kaur</td>
                            <td>navneet394@gmail.com</td>
                            <td>9842000106</td>
                            <td>
                                <ul class="actions-btns">
                                <li class="action"><a href="#"><i class="fas fa-user"></i></a></li>
                                    <li class="action"><a href="#"><i class="fas fa-pen"></i></a></li>
                                    <li class="action"><a href="#"><i class="fas fa-trash"></i></a></li>
                                    <li class="action shield green"><a href="#"><img src="{{ asset('assets/images/icons/blocked.svg') }}" class=""></a></li>
                                    <li class="action"><a href="#"><i class="fas fa-unlock-alt"></i></a></li>
                                    <li class="action"><a href="#"><i class="fas fa-clipboard-check"></i></a></li>
                                    <li class="action"><a href="#"><i class="fas fa-clipboard-list"></i></a></li>
                                    <li class="action"><a href="#"><i class="fas fa-clipboard-list"></i></a></li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" class="form-check-input position-relative ml-0" id="exampleCheck1"></td>
                            <td>4</td>
                            <td>navneet kaur</td>
                            <td>navneet394@gmail.com</td>
                            <td>9842000106</td>
                            <td>
                                <ul class="actions-btns">
                                <li class="action"><a href="#"><i class="fas fa-user"></i></a></li>
                                    <li class="action"><a href="#"><i class="fas fa-pen"></i></a></li>
                                    <li class="action"><a href="#"><i class="fas fa-trash"></i></a></li>
                                    <li class="action shield green"><a href="#"><img src="{{ asset('assets/images/icons/blocked.svg') }}" class=""></a></li>
                                    <li class="action"><a href="#"><i class="fas fa-unlock-alt"></i></a></li>
                                    <li class="action"><a href="#"><i class="fas fa-clipboard-check"></i></a></li>
                                    <li class="action"><a href="#"><i class="fas fa-clipboard-list"></i></a></li>
                                    <li class="action"><a href="#"><i class="fas fa-clipboard-list"></i></a></li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" class="form-check-input position-relative ml-0" id="exampleCheck1"></td>
                            <td>5</td>
                            <td>navneet kaur</td>
                            <td>navneet394@gmail.com</td>
                            <td>9842000106</td>
                            <td>
                                <ul class="actions-btns">
                                <li class="action"><a href="#"><i class="fas fa-user"></i></a></li>
                                    <li class="action"><a href="#"><i class="fas fa-pen"></i></a></li>
                                    <li class="action"><a href="#"><i class="fas fa-trash"></i></a></li>
                                    <li class="action shield green"><a href="#"><img src="{{ asset('assets/images/icons/blocked.svg') }}" class=""></a></li>
                                    <li class="action"><a href="#"><i class="fas fa-unlock-alt"></i></a></li>
                                    <li class="action"><a href="#"><i class="fas fa-clipboard-check"></i></a></li>
                                    <li class="action"><a href="#"><i class="fas fa-clipboard-list"></i></a></li>
                                    <li class="action"><a href="#"><i class="fas fa-clipboard-list"></i></a></li>
                                </ul>
                            </td>
                        </tr>
                </table>
                       </div>
                  </div>
               </div>
            </div>
        </div>
   </section>
</div>
@endsection