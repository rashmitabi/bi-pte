jQuery(document).ready(function() {

    // toggle sidebar
    jQuery("#menu-toggle").click(function() {
        jQuery("#wrapper").toggleClass("toggled");
        jQuery("#admin-header").toggleClass("toggled-menu");
    });

    // Reschedule popup
    jQuery("#detail_container .rescheduled-btn").click(function() {
        jQuery("#detail_container").slideUp(200);
        jQuery("#reschedule_container").slideDown(200);
    });
    jQuery("#reschedule_container .back-to-bookingdetails").click(function() {
        jQuery("#reschedule_container").slideUp(200);
        jQuery("#detail_container").slideDown(200);
    });


    jQuery("#select_service_listing .cards").click(function() {
        jQuery("#select_service_listing .cards").each(function() {
            jQuery('#select_service_listing .cards').removeClass("active");
        });
        jQuery(this).addClass("active");
    });

    // Instead, you should rely on implicit iteration:
    $("li").addClass("bar");


});

jQuery(document).ready(function() {

    document.querySelectorAll('input[type=color]').forEach(function(picker) {

        var targetLabel = document.querySelector('label[for="' + picker.id + '"]'),
            codeArea = document.createElement('span');

        codeArea.innerHTML = picker.value;
        targetLabel.appendChild(codeArea);

        picker.addEventListener('change', function() {
            codeArea.innerHTML = picker.value;
            targetLabel.appendChild(codeArea);
        });
    });

});

    jQuery(document).ready(function() {
        // This button will increment the value
        jQuery(".plus").click( function(e) {
        
            e.preventDefault();

            // Define field variable
            field = "input[name=" + $(this).attr("field") + "]";

            // Get its current value
            var currentVal = parseInt($(field).val());

            // If is not undefined
            if (!isNaN(currentVal) && currentVal < 20) {

                // Increment
                jQuery(field).val(currentVal + 1);
        
            }

        });

        // This button will decrement the value till 0
        jQuery(".minus").click( function(e) {
        
            e.preventDefault();

            // Define field variable
            field = "input[name=" + $(this).attr("field") + "]";

            // Get its current value
            var currentVal = parseInt($(field).val());

            // If it isn't undefined or its greater than 0
            if (!isNaN(currentVal) && currentVal > 1) {
                // Decrement one
                jQuery(field).val(currentVal - 1);
            }

        });
    $('#chooseFile').bind('change', function() {
        var filename = $("#chooseFile").val();
        if (/^\s*$/.test(filename)) {
            $(".file-upload").removeClass('active');
            $("#noFile").text("No file chosen...");
        } else {
            $(".file-upload").addClass('active');
            $("#noFile").text(filename.replace("C:\\fakepath\\", ""));
        }
    });




    var langArray = [];
    $('.img-select-dropdown option').each(function() {
        var img = $(this).attr("data-thumbnail");
        var text = this.innerText;
        var value = $(this).val();
        var item = '<li><img src="' + img + '" alt="" value="' + value + '"/><span>' + text + '</span></li>';
        langArray.push(item);
    })

    $('#img-drpdwn-ul').html(langArray);

    //Set the button value to the first el of the array
    $('.opt-select-btn').html(langArray[0]);
    $('.opt-select-btn').attr('value', 'en');

    //change button stuff on click
    $('#img-drpdwn-ul li').click(function() {
        var img = $(this).find('img').attr("src");
        var value = $(this).find('img').attr('value');
        var text = this.innerText;
        var item = '<li><img src="' + img + '" alt="" /><span>' + text + '</span></li>';
        $('.opt-select-btn').html(item);
        $('.opt-select-btn').attr('value', value);
        $(".img-drpdwn-main").toggle();
        //console.log(value);
    });

    $(".opt-select-btn").click(function() {
        $(".img-drpdwn-main").toggle();
    });

    //check local storage for the lang
    var sessionLang = localStorage.getItem('lang');
    if (sessionLang) {
        //find an item with value of sessionLang
        var langIndex = langArray.indexOf(sessionLang);
        $('.opt-select-btn').html(langArray[langIndex]);
        $('.opt-select-btn').attr('value', sessionLang);
    } else {
        var langIndex = langArray.indexOf('ch');
        console.log(langIndex);
        $('.opt-select-btn').html(langArray[langIndex]);
        //$('.opt-select-btn').attr('value', 'en');
    }


    var tabs = $('.tabs');
        var selector = $('.tabs').find('a').length;
        //var selector = $(".tabs").find(".selector");
        var activeItem = tabs.find('.active');
        var activeWidth = activeItem.innerWidth();
        $(".selector").css({
        "left": activeItem.position.left + "px", 
        "width": activeWidth + "px"
        });

        $(".tabs").on("click","a",function(e){
        e.preventDefault();
        $('.tabs a').removeClass("active");
        $(this).addClass('active');
        var activeWidth = $(this).innerWidth();
        var itemPos = $(this).position();
        $(".selector").css({
            "left":itemPos.left + "px", 
            "width": activeWidth + "px"
        });
    });


    var tabs = $('ul.nav-tabs');
        var selector = $('ul.nav-tabs').find('.nav-link').length;
        //var selector = $(".tabs").find(".selector");
        var activeItem = tabs.find('.active');
        var activeWidth = activeItem.innerWidth();
        $(".selector").css({
        "left": activeItem.position.left + "px", 
        "width": activeWidth + "px" 
        });
        document.querySelector("#one .confirm-order-driver").addEventListener('click', function() {
            swal({
                title: "Your Order has been confirmed.",
                type: "success",
                position: "center",
                timer: 1500,
                showConfirmButton: false,
                showCancelButton: false,
            });
        });
    
        document.querySelector(".cancel-order-driver").addEventListener('click', function() {
            swal({
                title: "Are you sure?",
                text: "You will not be able to recover this imaginary file!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel plz!",
                closeOnConfirm: false,
                closeOnCancel: false
            }).then((isConfirm) => {
                if (isConfirm.value) {
                    swal({
                        type: 'success',
                        html: 'Deleted!", "Your imaginary file has been deleted.'
                    })
                } else {
                    swal({
                        type: 'error',
                        html: 'Cancelled", "Your imaginary file is safe :)'
                    })
                }
            });
        });
        $("ul.nav-tabs").on("click",".nav-link",function(e){
        e.preventDefault();
        // $('ul.nav-tabs .nav-link').removeClass("active");
        // $('ul.nav-tabs .nav-link').removeClass("show");
        // $(this).addClass('active');
        // $(this).addClass('show');
        var activeWidth = $(this).innerWidth();
        var itemPos = $(this).position();
        $(".selector").css({
            "left":itemPos.left + "px", 
            "width": activeWidth + "px"
        });
    });

    jQuery('#switch-check').change(function(){
        if($(this).is(":checked")) {
            jQuery('.service-enable').removeClass('disable-service');
        } else {
            jQuery('.service-enable').addClass('disable-service');
        }
    });

    jQuery('.days-onoff').change(function(){
        if($(this).is(":checked")) {
            jQuery('.days-main-wrap').removeClass('days-onoff-hide');
        } else {
            jQuery('.days-main-wrap').addClass('days-onoff-hide');
        }
    });

    jQuery(document).ready(function() {
        jQuery('#one').DataTable();
    } );
    
    jQuery(document).ready(function() {
        jQuery('#two').DataTable();
    } );

    jQuery(document).ready(function() {
        jQuery('#pickup').DataTable();
    } );

    jQuery(document).ready(function() {
        jQuery('#two').DataTable();
    } );

    jQuery(document).ready(function() {
        jQuery('#three').DataTable();
    } );

    
});



        