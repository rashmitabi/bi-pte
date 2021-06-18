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
    '<select class="form-control action-btn">'+
      '<option value="volvo">Actions</option>'+
      '<option value="volvo">Send Email</option>'+
      '<option value="saab">Change Password</option>'+
      '<option value="opel">BLock/unblock Users</option>'+
      '<option value="opel">Export Users</option>'+
      '<option value="opel">Assign Practice Tests</option>'+
      '<option value="opel">Assign Mock Tests</option>'+
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
  "dom": "<'row'<'col-sm-12 col-md-3 top-label'<'toolbar'>><'col-sm-12 col-md-6 top-search'f><'col-sm-12 col-md-3 top-pagination'l>>" +
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

$('body').on('change','.user-type',function(){
  var role_id = $(this).val();
  // alert(role_id);
  if(role_id == 3){
    $("#student").css("display","block");
    $("#breanchadmin").css("display","none");
  }else{
    $("#breanchadmin").css("display","block");
    $("#student").css("display","none");
  }
});

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
  //user password page data start
  $('body').on('click','.user-setpassword',function(){
    var id = $(this).data('id');
    var apiUrl = $(this).data('url');
    $.ajax({
      url: apiUrl,
      type:'GET',
      data:{'id' : id},
      beforeSend: function(){
        $('#password-set-body').html('<i class="fa fa-spinner fa-spin"></i>  Please Wait...');
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
});