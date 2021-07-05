$('#users').DataTable({
  language: {
    search: '',
    searchPlaceholder: "Search by name, email & mobile number",
    "sLengthMenu": '<select name="users_length">'+
        '<option value="10">10 Per Page</option>'+
        '<option value="20">20 Per Page</option>'+
        '<option value="30">30 Per Page</option>'+
        '<option value="40">40 Per Page</option>'+
        '<option value="50">50 Per Page</option>'+
        '<option value="-1">All</option>'+
        '</select>',
    paginate: {
        next: '<i class="fas fa-chevron-right"></i>', // or '→'
        previous: '<i class="fas fa-chevron-left"></i>' // or '←' 
    }
  },
  "dom": "<'row'<'col-sm-12 col-md-3 top-label'<'toolbar'>><'col-sm-12 col-md-3 top-search'f><'col-sm-12 col-md-3 header_filter'><'col-sm-12 col-md-3 top-pagination'l>>" +
    "<'row'<'col-sm-12't>>" +
    "<'row'<'col-sm-12 col-md-12'p>>",
  processing: true,
  serverSide: true,
  ajax: url_users,
  columns: [
    {data: 'checkbox', name: 'checkbox', orderable: false, searchable: false},
    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
    {data: 'name', name: 'name'},
    {data: 'email', name: 'email'},
    {data: 'phone_number', name: 'phone_number'},
    {data: 'action', name: 'action', orderable: false, searchable: false},
  ]
});
$("#users_wrapper div.toolbar").html('Registered Users');


$('<div class="pull-right">' +
    '<select id="action-institute" class="form-control action-btn">'+
      '<option value="">Actions</option>'+
      '<option value="email">Send Email</option>'+
      '<option value="password" >Change Password</option>'+
      '<option value="blockUnblock">BLock/unblock Users</option>'+
      '<option value="export">Export Users</option>'+
      '<option value="assignPracticeTest">Assign Practice Tests</option>'+
      '<option value="assignMockTest">Assign Mock Tests</option>'+
    '</select>' +
  '</div>').appendTo("#users_wrapper .header_filter");
$(".dataTables_filter label").addClass("pull-right");
   
      
$('#students').DataTable({
  language: {
      search: '',
      searchPlaceholder: "Search by name, email & mobile number",
      "sLengthMenu": '<select name="students_length">'+
          '<option value="10">10 Per Page</option>'+
          '<option value="20">20 Per Page</option>'+
          '<option value="30">30 Per Page</option>'+
          '<option value="40">40 Per Page</option>'+
          '<option value="50">50 Per Page</option>'+
          '<option value="-1">All</option>'+
          '</select>',
      paginate: {
          next: '<i class="fas fa-chevron-right"></i>', // or '→'
          previous: '<i class="fas fa-chevron-left"></i>' // or '←' 
      }
  },
 "dom": "<'row'<'col-sm-12 col-md-3 top-label'<'toolbar'>><'col-sm-12 col-md-3 top-search'f><'col-sm-12 col-md-3 header_filter'><'col-sm-12 col-md-3 top-pagination'l>>" +
    "<'row'<'col-sm-12't>>" +
    "<'row'<'col-sm-12 col-md-12'p>>",
  processing: true,
  serverSide: true,
  ajax: url_students,
  columns: [
    {data: 'checkbox', name: 'checkbox', orderable: false, searchable: false},
    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
    {data: 'name', name: 'name'},
    {data: 'email', name: 'email'},
    {data: 'mobile_no', name: 'mobile_no'},
    {data: 'action', name: 'action', orderable: false, searchable: false},
  ]
});
$("#students_wrapper div.toolbar").html('Registered Users');
$('<div class="pull-right">' +
    '<select id="action-student" class="form-control action-btn">'+
      '<option value="">Actions</option>'+
      '<option value="email">Send Email</option>'+
      '<option value="password" >Change Password</option>'+
      '<option value="blockUnblock">BLock/unblock Users</option>'+
      '<option value="export">Export Users</option>'+
      '<option value="assignPracticeTest">Assign Practice Tests</option>'+
      '<option value="assignMockTest">Assign Mock Tests</option>'+
    '</select>' +
  '</div>').appendTo("#students_wrapper .header_filter");
$(".dataTables_filter label").addClass("pull-right");



function password(){
  $(this).toggleClass("password-icon");
  var input = $(".password");
  if (input.attr("type") === "password") {
    input.attr("type", "text");
    $(".password-icon").addClass("fa-eye");
    $(".password-icon").removeClass("fa-eye-slash");
  } else {
    $(".password-icon").addClass("fa-eye-slash");
    $(".password-icon").removeClass("fa-eye");
    input.attr("type", "password");
  }
}

function confirm_password(){
  $(this).toggleClass("cpassword-icon");
  var input = $(".confirm_password");
  if (input.attr("type") === "password") {
    input.attr("type", "text");
    $(".cpassword-icon").addClass("fa-eye");
    $(".cpassword-icon").removeClass("fa-eye-slash");
  } else {
    $(".cpassword-icon").addClass("fa-eye-slash");
    $(".cpassword-icon").removeClass("fa-eye");
    input.attr("type", "password");
  }
}

$(document).ready(function() {
  //add new user page data start
  $('body').on('change','.usertype_form',function(){
    var role_id = $("#type").val();
    // alert(role_id);
    if(role_id == 3){
      $("#student").css("display","block");
      $("#breanchadmin").css("display","none");
    }else{
      $("#breanchadmin").css("display","block");
      $("#student").css("display","none");
    }
  });
  //add new user page data start

  //user password page data start
  $('body').on('click','.user-setpassword',function(){
    var id = $(this).data('id');
    var apiUrl = $(this).data('url');
    $.ajax({
      url: apiUrl,
      type:'GET',
      data:{'id' : id},
      beforeSend: function(){
        $('#password-set-body').html('<div class="mb-5 text-center"><i class="fa fa-spinner fa-spin"></i>  Please Wait...</div>');
      },
      success:function(data) {
        $('#password-set-body').html(data.html);
      },
    }); 
  });
  //user password page data start

  //password update data start
  $('body').on('click','.user-password-update',function(){
    var id = $(this).data('id');
    var apiUrl = $(this).data('url');
    $('#passwordError').text('');
    $('#confirm_passwordError').text('');
    $.ajax({
      url: apiUrl,
      type:'PATCH',
      data: $('form').serialize(),
      success:function(data) {
        if(data == 1){
          setTimeout(function(){
            location.reload();
          }, 2000);
        }
      },
      error: function(response) {
        console.log(response.responseJSON.errors.password);
        $('#passwordError').text(response.responseJSON.errors.password);
        $('#confirm_passwordError').text(response.responseJSON.errors.confirm_password);
      }
    });
  });
  //password update data end

  //user edit page data start
  $('body').on('click','.user-edit',function(){
    var id = $(this).data('id');
    var apiUrl = $(this).data('url');
    $.ajax({
      url: apiUrl,
      type:'GET',
      data:{'id' : id},
      beforeSend: function(){
        $('#edit-user-body').html('<div class="mb-5 text-center"><i class="fa fa-spinner fa-spin"></i>  Please Wait...</div>');
      },
      success:function(data) {
        $('#edit-user-body').html(data.html);
      },
    }); 
  });
  //user edit page data start

  //user show mock test page data start
  $('body').on('click','.user-edit',function(){
    var id = $(this).data('id');
    var apiUrl = $(this).data('url');
    $.ajax({
      url: apiUrl,
      type:'GET',
      data:{'id' : id},
      beforeSend: function(){
        $('#edit-user-body').html('<div class="mb-5 text-center"><i class="fa fa-spinner fa-spin"></i>  Please Wait...</div>');
      },
      success:function(data) {
        $('#edit-user-body').html(data.html);
      },
    }); 
  });
  //user show mock test page data start

  //user show page data start
  $('body').on('click','.user-show',function(){
    var id = $(this).data('id');
    var apiUrl = $(this).data('url');
    $.ajax({
      url: apiUrl,
      type:'GET',
      data:{'id' : id},
      beforeSend: function(){
        $('#show-user-body').html('<div class="mb-5 text-center"><i class="fa fa-spinner fa-spin"></i>  Please Wait...</div>');
      },
      success:function(data) {
        $('#show-user-body').html(data.html);
      },
    }); 
  });
  //user show page data start

  //user  update data start
  $('body').on('click','.user-update',function(){
    var id = $(this).data('id');
    var apiUrl = $(this).data('url');
    $('#fnameError').text('');
    $('#lnameError').text('');
    $('#unameError').text('');
    $('#passwordError').text('');
    $('#confirm_passwordError').text('');
    $('#semailError').text('');
    $('#dobError').text('');
    $('#mobilenoError').text('');
    $('#scitizenError').text('');
    $('#sresidenceError').text('');
    $('#sstateError').text('');
    $('#sstate_codeError').text('');
    $('#sgstinError').text('');
    $('#svalidityError').text('');

    $('#iunameError').text('');
    $('#inameError').text('');
    $('#iemailError').text('');
    $('#ipasswordError').text('');
    $('#iconfirm_passwordError').text('');
    $('#country_codeError').text('');
    $('#phone_noError').text('');
    $('#students_allowedError').text('');
    $('#subdomainError').text('');
    $('#domainError').text('');
    $('#welcome_msgError').text('');
    $('#istateError').text('');
    $('#istate_codeError').text('');
    $('#igstinError').text('');
    $('#logoError').text('');
    $('#bannerError').text('');
    $('#validityError').text('');


    $.ajax({
      url: apiUrl,
      type:'PATCH',
      data: $('form').serialize(),
      success:function(data) {
        if(data == 1){
          setTimeout(function(){
            location.reload();
          }, 2000);
        }
      },
      error: function(response) {
        console.log(response.responseJSON.errors.password);
        $('#fnameError').text(response.responseJSON.errors.fname);
        $('#lnameError').text(response.responseJSON.errors.lname);
        $('#unameError').text(response.responseJSON.errors.uname);
        $('#passwordError').text(response.responseJSON.errors.password);
        $('#confirm_passwordError').text(response.responseJSON.errors.confirm_password);
        $('#semailError').text(response.responseJSON.errors.semail);
        $('#dobError').text(response.responseJSON.errors.dob);
        $('#mobilenoError').text(response.responseJSON.errors.mobileno);
        $('#scitizenError').text(response.responseJSON.errors.scitizen);
        $('#sresidenceError').text(response.responseJSON.errors.sresidence);
        $('#sstateError').text(response.responseJSON.errors.sstate);
        $('#sstate_codeError').text(response.responseJSON.errors.sstate_code);
        $('#sgstinError').text(response.responseJSON.errors.sgstin);
        $('#svalidityError').text(response.responseJSON.errors.svalidity);

        $('#iunameError').text(response.responseJSON.errors.iuname);
        $('#inameError').text(response.responseJSON.errors.iname);
        $('#iemailError').text(response.responseJSON.errors.iemail);
        $('#ipasswordError').text(response.responseJSON.errors.ipassword);
        $('#iconfirm_passwordError').text(response.responseJSON.errors.iconfirm_password);
        $('#country_codeError').text(response.responseJSON.errors.country_code);
        $('#phone_noError').text(response.responseJSON.errors.phone_no);
        $('#students_allowedError').text(response.responseJSON.errors.students_allowed);
        $('#subdomainError').text(response.responseJSON.errors.subdomain);
        $('#domainError').text(response.responseJSON.errors.domain);
        $('#welcome_msgError').text(response.responseJSON.errors.welcome_msg);
        $('#istateError').text(response.responseJSON.errors.istate);
        $('#istate_codeError').text(response.responseJSON.errors.istate_code);
        $('#igstinError').text(response.responseJSON.errors.igstin);
        $('#logoError').text(response.responseJSON.errors.logo);
        $('#bannerError').text(response.responseJSON.errors.banner);
        $('#validityError').text(response.responseJSON.errors.validity);
      }
    });
  });
  //user update data end
  
  // student all check functionality start
  $('body').on('change',"#checkedAllStudent", function(){
    if(this.checked){
      $(".checkSingleStudent").each(function(){
        this.checked = true;
        $(this).val(1);
      }) 
      $("#checkedAllStudent").val(1);             
    }else{
      $(".checkSingleStudent").each(function(){
        this.checked = false;
        $(this).val(0);
      }) 
      $("#checkedAllStudent").val(0);             
    }
  });

  $('body').on('click',".checkSingleStudent", function () {
    if ($(this).is(":checked")){
      var isAllChecked = 0;
      $(".checkSingleStudent").each(function(){
        if(!this.checked)
          isAllChecked = 1;
      })              
      if(isAllChecked == 0){ 
        $("#checkedAllStudent").prop("checked", true); 
        $("#checkedAllStudent").val(1);
      } 
      $(this).val(1);    
    }else {
      $("#checkedAllStudent").prop("checked", false);
      $("#checkedAllStudent").val(0);
      $(this).val(0);    
    }
  });
  // student all check functionality end

  //select all apply in mock test and prectice test model
  $('body').on('change',"#selectAllTest", function(){
    if(this.checked){
      $(".multitest").each(function(){
        this.checked = true;
      })            
    }else{
      $(".multitest").each(function(){
        this.checked = false;
      })             
    }
  });

  $('body').on('change',"#sstate", function(){
      var state_code = $('option:selected', this).attr('data-code');
      console.log(state_code);
      $("#sstate_code").val(state_code);
  });
  $('body').on('change',"#istate", function(){
    var state_code = $('option:selected', this).attr('data-code');
    console.log(state_code);
    $("#istate_code").val(state_code);
});
  
  // institute all check functionality start
  $('body').on('change',"#checkedAllInstitute", function(){
    if(this.checked){
      $(".checkSingleInstitute").each(function(){
        this.checked = true;
        $(this).val(1);
      }) 
      $("#checkedAllInstitute").val(1);             
    }else{
      $(".checkSingleInstitute").each(function(){
        this.checked = false;
        $(this).val(0);
      }) 
      $("#checkedAllInstitute").val(0);             
    }
  });

  $('body').on('click',".checkSingleInstitute", function () {
    if ($(this).is(":checked")){
      var isAllChecked = 0;
      $(".checkSingleInstitute").each(function(){
        if(!this.checked)
          isAllChecked = 1;
      })              
      if(isAllChecked == 0){ 
        $("#checkedAllInstitute").prop("checked", true); 
        $("#checkedAllInstitute").val(1);
      } 
      $(this).val(1);    
    }else {
      $("#checkedAllInstitute").prop("checked", false);
      $("#checkedAllInstitute").val(0);
      $(this).val(0);    
    }
  });


  $('body').on('change',"#selectAllTest", function(){
    if(this.checked){
      $(".multitest").each(function(){
        this.checked = true;
      })            
    }else{
      $(".multitest").each(function(){
        this.checked = false;
      })             
    }
  });
  // institute all check functionality end

  //All common action start
  $("#action-institute").change(function () {
      var selectedText = $(this).find("option:selected").text();
      var selectedValue = $(this).val();
      var AllChecked = $("#checkedAllInstitute").is(":checked");
      var isAnyChecked = 0;
      $(".checkSingleInstitute").each(function(){
        if(this.checked)
          isAnyChecked = 1;
      });    
      var idSelector = function() { return $(this).attr("data-id"); };
      var chekedInstituteIds = $(":checkbox:checked").map(idSelector).get();
      
      if(selectedValue == "export"){
        window.location = institute_export_url_route;
        return false; 
      }

      if(isAnyChecked == 1 ){
        if(selectedValue == "password" && chekedInstituteIds != ''){
          $('#setpassword').modal('toggle');
          $.ajax({
            url: password_url_route,
            type:'GET',
            data:{'id' : chekedInstituteIds},
            beforeSend: function(){
              $('#password-set-body').html('<i class="fa fa-spinner fa-spin"></i>  Please Wait...');
            },
            success:function(data) {
              $('#password-set-body').html(data.html);

            },
          }); 

        }else if(selectedValue == "blockUnblock" && chekedInstituteIds != ''){
          $.ajax({
            url: change_status_url_route,
            type:'GET',
            data:{'user_ids' : chekedInstituteIds},
            success:function(data) {
              if(data == 1){
                setTimeout(function(){
                  location.reload();
                }, 2000);
              }
            },
            error: function(response) {
              console.log(response.responseJSON.errors);
            }
          }); 
        }else if(selectedValue == "assignPracticeTest" && chekedInstituteIds != ''){
            $('#practisetest').modal('toggle');
            $.ajax({
              url: get_multiple_assign_test,
              type:'POST',
              data:{'_token':CSRF_TOKEN, 'id' : chekedInstituteIds,'type':'P'},
              beforeSend: function(){
                $('#prectice-test-body').html('<i class="fa fa-spinner fa-spin"></i>  Please Wait...');
              },
              success:function(data) {
                $('#prectice-test-body').html(data.html);
  
              },
            }); 
        }else if(selectedValue == "assignMockTest" && chekedInstituteIds != ''){
            $('#mocktest').modal('toggle');
            $.ajax({
              url: get_multiple_assign_test,
              type:'POST',
              data:{'_token':CSRF_TOKEN, 'id' : chekedInstituteIds,'type':'M'},
              beforeSend: function(){
                $('#assign-mock-test-body').html('<i class="fa fa-spinner fa-spin"></i>  Please Wait...');
              },
              success:function(data) {
                $('#assign-mock-test-body').html(data.html);

              },
            }); 
        }
      }else{
        alert("Please select any institute.");
        $(this).val('');
      }
  });

  $("#action-student").change(function () {
      var selectedText = $(this).find("option:selected").text();
      var selectedValue = $(this).val();
      var AllChecked = $("#checkedAllStudent").is(":checked");
      var isAnyChecked = 0;
      $(".checkSingleStudent").each(function(){
        if(this.checked)
          isAnyChecked = 1;
      });    
      var idSelector = function() { return $(this).attr("data-id"); };
      var chekedStudentsIds = $(":checkbox:checked").map(idSelector).get();

      if(selectedValue == "export"){
          
        window.location = student_export_url_route;
        return false;  
      }


      
      if(isAnyChecked == 1 && chekedStudentsIds != ''){
        if(selectedValue == "password"){
          $('#setpassword').modal('toggle');
          $.ajax({
            url: password_url_route,
            type:'GET',
            data:{'id' : chekedStudentsIds},
            beforeSend: function(){
              $('#password-set-body').html('<i class="fa fa-spinner fa-spin"></i>  Please Wait...');
            },
            success:function(data) {
              $('#password-set-body').html(data.html);

            },
          }); 
        }else if(selectedValue == "blockUnblock"){
          $.ajax({
            url: change_status_url_route,
            type:'GET',
            data:{'user_ids' : chekedStudentsIds},
            success:function(data) {
              if(data == 1){
                setTimeout(function(){
                  location.reload();
                }, 2000);
              }
            },
            error: function(response) {
              console.log(response.responseJSON.errors);
            }
          }); 
        }else if(selectedValue == "assignPracticeTest"){
          $('#practisetest').modal('toggle');
          $.ajax({
            url: get_multiple_assign_test,
            type:'POST',
            data:{'_token':CSRF_TOKEN, 'id' : chekedStudentsIds,'type':'P'},
            beforeSend: function(){
              $('#prectice-test-body').html('<div class="mb-5 text-center"><i class="fa fa-spinner fa-spin"></i>  Please Wait...</div>');
            },
            success:function(data) {
              $('#prectice-test-body').html(data.html);

            },
          }); 
        }else if(selectedValue == "assignMockTest"){
          $('#mocktest').modal('toggle');
          $.ajax({
            url: get_multiple_assign_test,
            type:'POST',
            data:{'_token':CSRF_TOKEN, 'id' : chekedStudentsIds,'type':'M'},
            beforeSend: function(){
              $('#assign-mock-test-body').html('<div class="mb-5 text-center"><i class="fa fa-spinner fa-spin"></i>  Please Wait...</div>');
            },
            success:function(data) {
              $('#assign-mock-test-body').html(data.html);

            },
          }); 
        }
      }
      else{
        alert("Please select any student.");
        $(this).val('');
      }
  });
  // $.ajax({
        //   url: apiUrl,
        //   type:'PATCH',
        //   data: {action : selectedValue, ids : 'all'},
        //   success:function(data) {
        //     if(data == 1){
        //       setTimeout(function(){
        //         location.reload();
        //       }, 2000);
        //     }
        //   },
        //   error: function(response) {
        //     console.log(response.responseJSON.errors.password);
            
        //   }
        // });
  //All common action end


  /*user single tests assign get and update start*/
  $('body').on('click','.get-assign-test',function(){
    var url = $(this).data('url');
    var type = $(this).data('test-type');
    var randomString = '#prectice-test-body';
    if(type == 'M'){
        randomString = '#assign-mock-test-body';
    }
    $.ajax({
      url: url,
      type:'GET',
      data:{type:type},
      beforeSend: function(){
        $(randomString).html('<div class="mb-5 text-center"><i class="fa fa-spinner fa-spin"></i>  Please Wait...</div>');
      },
      success:function(data) {
        $(randomString).html(data.html);
      },
    }); 
  });
  $('body').on('click','.store-assign-test',function(){
    $("#checkError").text("");
    var user_id = $(this).data('user-id');
    var url     = $(this).data('url');
    var type    = $(this).data('test-type');
    var id = [];
    $('.multitest:checked').each(function(){
        id.push($(this).val());
    });
    if(id.length > 0){
        $.ajax({
          url: url,
          type:'POST',
          data:{
              _token:CSRF_TOKEN,
              user_id:user_id,
              id:id,
              type:type
          },
          success:function(data) {
            location.reload();
          },
        }); 
    }else{
      $("#checkError").text("Please select any one test");
    }
  });
  /*user single tests assign get and update end*/

  /*multiple user tests assign get and update start*/
  $('body').on('click','.store-multiple-assign-test',function(){
    $("#checkError").text("");
    var user_id = $(this).data('user-id');
    var url     = $(this).data('url');
    var type    = $(this).data('test-type');
    var id = [];
    $('.multitest:checked').each(function(){
        id.push($(this).val());
    });
    if(id.length > 0){
        $.ajax({
          url: url,
          type:'POST',
          data:{
              _token:CSRF_TOKEN,
              user_id:user_id,
              id:id,
              type:type
          },
          success:function(data) {
            location.reload();
          },
        }); 
    }else{
      $("#checkError").text("Please select any one tests");
    }
  });
  /*multiple user tests assign get and update end*/
});