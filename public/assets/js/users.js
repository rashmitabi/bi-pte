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
      '<option selected disabled>Actions</option>'+
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
      '<option selected disabled>Actions</option>'+
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
    var date = new Date();
    var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
    var end = new Date(date.getFullYear(), date.getMonth(), date.getDate());
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
    $(".finalsubmit").css("display","block");
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
    var modelstatus = $(this).data('md');
    if(modelstatus == 'yes'){
      
    }
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
        $("#dob").datepicker({
          todayHighlight: true,
          endDate: end,
          format:'yyyy-mm-dd'
        });
        $("#svalidity").datepicker({
          todayHighlight: true,
          startDate: today,
          format:'yyyy-mm-dd'
        });
        $("#ivalidity").datepicker({
            todayHighlight: true,
            startDate: today,
            format:'yyyy-mm-dd'
        });
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
  $('body').on('submit','#userupdate',function(e){
    e.preventDefault();
    var id = $(this).find('.user-update').data('id');
    var apiUrl = $(this).find('.user-update').data('url');
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
    $('#scityError').text('');
    // $('#sgstinError').text('');
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
    $('#icityError').text('');
    
    $('#igstinError').text('');
    $('#logoError').text('');
    $('#bannerError').text('');
    $('#validityError').text('');


    $.ajax({
      url: apiUrl,
      //type:'PATCH',
      //data: $('form').serialize(),
      type:'POST',
      enctype: 'multipart/form-data',
      data: new FormData(this),
      processData: false,
      contentType: false,
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
        $('#scityError').text(response.responseJSON.errors.scity);
        // $('#sgstinError').text(response.responseJSON.errors.sgstin);
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
        $('#icityError').text(response.responseJSON.errors.icity);
        
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
  
  //single test checked/uncheck event.
  $('body').on('click',".multitest", function() {
    var total = $(this).attr("data-count");
    var id = [];
    $('.multitest:checked').each(function(){
        id.push($(this).val());
    });
    if(id.length >= 10 && id.length < 20){
      $(".testradio10").prop("checked",true);
    }else if(id.length >= 20 && id.length < 30){
      $(".testradio10").prop("checked",false);
      $(".testradio20").prop("checked",true);
    }else if (id.length >= 30 && id.length < 40){
      $(".testradio10").prop("checked",false);
      $(".testradio20").prop("checked",false);
      $(".testradio30").prop("checked",true);
    }else if(id.length >= 40 && id.length < 50){
      $(".testradio10").prop("checked",false);
      $(".testradio20").prop("checked",false);
      $(".testradio30").prop("checked",false);
      $(".testradio40").prop("checked",true);
    }else{
      $(".testradio10").prop("checked",false);
      $(".testradio20").prop("checked",false);
      $(".testradio30").prop("checked",false);
      $(".testradio40").prop("checked",false);
      $(".testradio40").prop("checked",true);
    }
    if(id.length == total)
    {
      $("#selectAllTest").prop("checked",true);
    }else{
      $("#selectAllTest").prop("checked",false);
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

  $('body').on('click','.user-email-template',function(){
    $("#emailtemplateError").text("");
    var url = $(this).data('url');
    var user_ids = $("#user_ids").val();
    var emailtemplate   = $("#emailtemplate :selected").val();
    if(emailtemplate == ''){
      $('#emailtemplateError').text("email template is required");
    }else{
      var formdata = $('#emailsend').serialize();
      $.ajax({
        url: url,
        type:'POST',
        data:formdata,
        success:function(data) {
          location.reload();
        },
        error: function(response) {
              $('#statusError').text(response.responseJSON.errors.type);
            }
      });
    } 
  });

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
         
      /*if(selectedValue == "export"){
        window.location = institute_export_url_route;
        return false; 
      }*/

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
          $('#setuserstatus').modal('toggle');
          $.ajax({
            url: change_status_get_model,
            type:'POST',
            data:{'_token':CSRF_TOKEN,'user_ids' : chekedInstituteIds},
            beforeSend: function(){
              $('#user-status-update').html('<i class="fa fa-spinner fa-spin"></i>  Please Wait...');
            },
            success:function(data) {
              $('#user-status-update').html(data.html);
            },
            error: function(response) {
              console.log(response.responseJSON.errors);
            }
          }); 
        }else if(selectedValue == "email" && chekedInstituteIds != ''){
          $('#userSendEmail').modal('toggle');
          $.ajax({
            url: change_send_email_get_model,
            type:'POST',
            data:{'_token':CSRF_TOKEN,'user_ids' : chekedInstituteIds},
            beforeSend: function(){
              $('#show-send-email-body').html('<i class="fa fa-spinner fa-spin"></i>  Please Wait...');
            },
            success:function(data) {
              $('#show-send-email-body').html(data.html);
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
              data:{'_token':CSRF_TOKEN, 'id' : chekedInstituteIds,'type':'P', 'role': 'Institute'},
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
              data:{'_token':CSRF_TOKEN, 'id' : chekedInstituteIds,'type':'M', 'role': 'Institute'},
              beforeSend: function(){
                $('#assign-mock-test-body').html('<i class="fa fa-spinner fa-spin"></i>  Please Wait...');
              },
              success:function(data) {
                $('#assign-mock-test-body').html(data.html);

              },
            }); 
        }else if(selectedValue == "export" && chekedInstituteIds != ''){
          var fileName = 'institude'+Date.now();
          $.ajax({
            url: institute_export_url_route,
            type:'GET',
            xhrFields: {
              responseType: 'blob'
            },
            data: {
                _token: CSRF_TOKEN,
                ids: chekedInstituteIds
            },
            success:function(data) {
              var a = document.createElement('a');
              var url = window.URL.createObjectURL(data);
              a.href = url;
              a.download = fileName;
              document.body.append(a);
              a.click();
              a.remove();
              window.URL.revokeObjectURL(url);
              setTimeout(function(){
                location.reload();
              }, 3000);
            },
          });
        }
      }else{
        alert("Please select any institute.");
        $(this).val('Actions');
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

      /*if(selectedValue == "export"){
          
        window.location = student_export_url_route;
        return false;  
      }*/
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
          $('#setuserstatus').modal('toggle');
          $.ajax({
            url: change_status_get_model,
            type:'POST',
            data:{'_token':CSRF_TOKEN,'user_ids' : chekedStudentsIds},
            beforeSend: function(){
              $('#user-status-update').html('<i class="fa fa-spinner fa-spin"></i>  Please Wait...');
            },
            success:function(data) {
              $('#user-status-update').html(data.html);
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
            data:{'_token':CSRF_TOKEN, 'id' : chekedStudentsIds,'type':'P', 'role': 'Students'},
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
            data:{'_token':CSRF_TOKEN, 'id' : chekedStudentsIds,'type':'M' , 'role': 'Students'},
            beforeSend: function(){
              $('#assign-mock-test-body').html('<div class="mb-5 text-center"><i class="fa fa-spinner fa-spin"></i>  Please Wait...</div>');
            },
            success:function(data) {
              $('#assign-mock-test-body').html(data.html);

            },
          }); 
        }else if(selectedValue == "export"){
          var fileName = 'institude'+Date.now();
          $.ajax({
            url: student_export_url_route,
            type:'GET',
            xhrFields: {
              responseType: 'blob'
            },
            data: {
                _token: CSRF_TOKEN,
                ids: chekedStudentsIds
            },
            success:function(data) {
              var a = document.createElement('a');
              var url = window.URL.createObjectURL(data);
              a.href = url;
              a.download = fileName;
              document.body.append(a);
              a.click();
              a.remove();
              window.URL.revokeObjectURL(url);
              setTimeout(function(){
                location.reload();
              }, 3000);
            },
          });
        }else if(selectedValue == "email"){
          $('#userSendEmail').modal('toggle');
          $.ajax({
            url: change_send_email_get_model,
            type:'POST',
            data:{'_token':CSRF_TOKEN,'user_ids' : chekedStudentsIds},
            beforeSend: function(){
              $('#show-send-email-body').html('<i class="fa fa-spinner fa-spin"></i>  Please Wait...');
            },
            success:function(data) {
              $('#show-send-email-body').html(data.html);
            },
            error: function(response) {
              console.log(response.responseJSON.errors);
            }
          }); 
        }
      }
      else{
        alert("Please select any student.");
        $(this).val('Actions');
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
  
  //user post method status update
  $('body').on('click','.user-update-status',function(){
    $("#statusError").text("");
    var user_id = $(this).data('id');
    var status   = $("#status :selected").val();
    if(status == 'no'){
      $('#statusError').text("status is required");
    }else{
      $.ajax({
        url: change_status_url_route,
        type:'GET',
        data:{
            _token:CSRF_TOKEN,
            user_id:user_id,
            status:status
        },
        success:function(data) {
          location.reload();
        },
        error: function(response) {
              $('#statusError').text(response.responseJSON.errors.type);
            }
      });
    } 
  });
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

  /* select test filter*/
  $('body').on('click','.test_select',function(){
      var testCount = $('input:radio[name=test_select]:checked').val();
      for(var i=1;i<=testCount;i++)
      {
        $(".singletest"+i).prop("checked", true);
      }
  });
  /*Check user unique validation at store start*/
  $(".unique-susername").change(function() {
    $("#suname-unique-msg").text('');
    var uname       = $(this).val();
    var url         = $(this).attr("data-url");
    var unique_type = $(this).attr("data-unique-type");
    var action      = $(this).attr("data-action");
    var id          = $(this).attr("data-id");
    var msg = 'username already exists!';
    console.log(uname);
    $.ajax({
      url: url,
      type:'POST',
      data:{
          _token:CSRF_TOKEN,
          uname       :uname,
          unique_type :unique_type,
          action      :action,
          id          :id
      },
      success:function(data) {
        if(data == false){
          $(".unique-susername").after("<span class='error-msg' id='suname-unique-msg'>"+msg+"</span>");
          $(':input[type="submit"]').prop('disabled', true);
        }else{
          $("#suname-unique-msg").text('');
          var checkMsg = $("#semail-unique-msg").text();
          if(checkMsg == ''){
            $(':input[type="submit"]').prop('disabled', false);
          }
        }
      },
    });
  });
  $(".unique-semail").change(function() {
    $("#semail-unique-msg").text('');
    var email       = $(this).val();
    var url         = $(this).attr("data-url");
    var unique_type = $(this).attr("data-unique-type");
    var action      = $(this).attr("data-action");
    var id          = $(this).attr("data-id");
    var msg = 'Email already exists!';
    if(email == ''){
      $(':input[type="submit"]').prop('disabled', true);
      $("#semail-unique-msg").text('');
    }else{
      $.ajax({
        url: url,
        type:'POST',
        data:{
            _token:CSRF_TOKEN,
            uname       :email,
            unique_type :unique_type,
            action      :action,
            id          :id
        },
        success:function(data) {
          if(data == false){
            $(".unique-semail").after("<span class='error-msg' id='semail-unique-msg'>"+msg+"</span>");
            $(':input[type="submit"]').prop('disabled', true);
          }else{
            $("#semail-unique-msg").text('');
            var checkMsg = $("#suname-unique-msg").text();
            if(checkMsg == ''){
              $(':input[type="submit"]').prop('disabled', false);
            }
          }
        },
      }); 
    }
  });
  /*Check user unique validation at store end*/

  /*Check institude unique validation start*/
  $(".unique-iusername").change(function() {
    $("#iuname-unique-msg").text('');
    var uname       = $(this).val();
    var url         = $(this).attr("data-url");
    var unique_type = $(this).attr("data-unique-type");
    var action      = $(this).attr("data-action");
    var id          = $(this).attr("data-id");
    var msg = 'username already exists!';
    if(uname == ''){
      $(':input[type="submit"]').prop('disabled', true);     
    }else{
      $.ajax({
        url: url,
        type:'POST',
        data:{
            _token:CSRF_TOKEN,
            uname       :uname,
            unique_type :unique_type,
            action      :action,
            id          :id
        },
        success:function(data) {
          if(data == false){
            $(".unique-iusername").after("<span class='error-msg' id='iuname-unique-msg'>"+msg+"</span>");
            $(':input[type="submit"]').prop('disabled', true);
            console.log('false');
          }else{
            $("#iuname-unique-msg").text('');
            var checkMsg = $("#iemail-unique-msg").text();
            if(checkMsg == ''){
              $(':input[type="submit"]').prop('disabled', false);
            }
            console.log('true');
          }
        },
      }); 
    }
  });
  $(".unique-iemail").change(function() {
    $("#iemail-unique-msg").text('');
    var email       = $(this).val();
    var url         = $(this).attr("data-url");
    var unique_type = $(this).attr("data-unique-type");
    var action      = $(this).attr("data-action");
    var id          = $(this).attr("data-id");
    var msg = 'Email already exists!';
    if(email == ''){
      $(':input[type="submit"]').prop('disabled', true);
      $("#iemail-unique-msg").text('');
    }else{
      $.ajax({
        url: url,
        type:'POST',
        data:{
            _token:CSRF_TOKEN,
            uname       :email,
            unique_type :unique_type,
            action      :action,
            id          :id
        },
        success:function(data) {
          if(data == false){
            $(".unique-iemail").after("<span class='error-msg' id='iemail-unique-msg'>"+msg+"</span>");
            $(':input[type="submit"]').prop('disabled', true);
          }else{
            $("#iemail-unique-msg").text('');
            var checkMsg = $("#iuname-unique-msg").text();
            if(checkMsg == ''){
              $(':input[type="submit"]').prop('disabled', false);
            }
          }
        },
      }); 
    }
  });
  /*Check institude unique validation end*/

  $(document).on("change", ".custom-file-input", function(){ 
        $(this).parent(".custom-file").attr("data-text", $(this).val().replace(/.*(\/|\\)/, '') );
        $(this).next('.custom-file-label').text('');
    });
});