/**
 * Created by muhammad adnan on 10/31/2016.
 */
emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+.[a-zA-Z]{2,4}$/;
var filter_phone = /^0[0-9]{10}$/;
var reg_err = 0;
// ###################################################################################################################
$(document).ready(function(){

    $('#mycat').on('change', function() {
        var cat =  this.value; // or $(this).val()
        var type = $(this).data('type');

        window.location.href = base_url+'property_view/property_by_type/'+cat+'/'+type;
    });
});

function submit_property() {
    /// title
    var title = $('input[name="title"]');
    var location = $('input[name="location"]');
    var address = $('input[name="address"]');
    var country = $('select[name="country"]');
    var province = $('select[name="province"]');
    var city = $('select[name="city"]');
    var description = $('textarea[name="description"]');
    var beds = $('select[name="beds"]');
    var baths = $('select[name="baths"]');
    var rooms = $('select[name="rooms"]');
    var area = $('select[name="area"]');
    var furnish = $('select[name="furnish"]');
    var price = $('input[name="price"]');
    var propertyType = $('select[name="propertyType"]');
    var contractType = $('select[name="contractType"]');
    var fileUpload = $('#fileUpload');
    var error = 0;
    $('#submit_property label small').html('');
    $('.err').remove();

    // title 
    if (title.val() == "" || title.val() == null ) { var  error =+error + +1;
        $('label[for="title"] b').after('<small class="text-danger"> This field required!</small>  ').css('color', 'red');title.css('border-color', '#a94442');
    }else{
        $('label[for="title"] b').css('color', 'green'); $('label[for="title"] small').html('').css('color', 'green');title.css('border-color', 'green')
    }
    // location 
    if (location.val() == "" || location.val() == null ) { var  error =+error + +1;
        $('label[for="location"] b').after('<small class="text-danger"> This field required!</small>  ').css('color', 'red');location.css('border-color', '#a94442');
    }else{
        $('label[for="location"] b').css('color', 'green'); $('label[for="location"] small').html('').css('color', 'green');location.css('border-color', 'green')
    }
    // address 
    if (address.val() == "" || address.val() == null ) { var  error =+error + +1;
        $('label[for="address"] b').after('<small class="text-danger"> This field required!</small>  ').css('color', 'red');address.css('border-color', '#a94442');
    }else{
        $('label[for="address"] b').css('color', 'green'); $('label[for="address"] small').html('').css('color', 'green');address.css('border-color', 'green')
    }
    // country
    if (country.val() == "" || country.val() == null ) { var  error =+error + +1;
        $('label[for="country"] b').after('<small class="text-danger"> This field required!</small>  ').css('color', 'red');country.css('border-color', '#a94442');
    }else{
        $('label[for="country"] b').css('color', 'green'); $('label[for="country"] small').html('').css('color', 'green');country.css('border-color', 'green')
    }
    // province 
    if (province.val() == "" || province.val() == null ) { var  error =+error + +1;
        $('label[for="province"] b').after('<small class="text-danger"> This field required!</small>  ').css('color', 'red');province.css('border-color', '#a94442');
    }else{
        $('label[for="province"] b').css('color', 'green'); $('label[for="province"] small').html('').css('color', 'green');province.css('border-color', 'green')
    }
    // city 
    if (city.val() == "" || city.val() == null ) { var  error =+error + +1;
        $('label[for="city"] b').after('<small class="text-danger"> This field required!</small>  ').css('color', 'red');city.css('border-color', '#a94442');
    }else{
        $('label[for="city"] b').css('color', 'green'); $('label[for="city"] small').html('').css('color', 'green');city.css('border-color', 'green')
    }
    // price 
    if (price.val() == "" || price.val() == null ) { var  error =+error + +1;
        $('label[for="price"] b').after('<small class="text-danger"> This field required!</small>  ').css('color', 'red');price.css('border-color', '#a94442');
    }else{
        if($.isNumeric(price.val().replace(/,/g , ""))){
           $('label[for="price"] b').css('color', 'green'); $('label[for="price"] small').html('').css('color', 'green');price.css('border-color', 'green');
        }else{
             $('label[for="price"] b').after('<small class="text-danger"> Numaric value allowed!</small>  ').css('color', 'red');price.css('border-color', '#a94442');
        }
    }
    // propertyType 
    if (propertyType.val() == "" || propertyType.val() == null ) { var  error =+error + +1;
        $('label[for="propertyType"] b').after('<small class="text-danger"> This field required!</small>  ').css('color', 'red');propertyType.css('border-color', '#a94442');
    }else{
        $('label[for="propertyType"] b').css('color', 'green'); $('label[for="propertyType"] small').html('').css('color', 'green');propertyType.css('border-color', 'green')
    }
    // contractType 
    if (contractType.val() == "" || contractType.val() == null ) { var  error =+error + +1;
        $('label[for="contractType"] b').after('<small class="text-danger"> This field required!</small>  ').css('color', 'red');contractType.css('border-color', '#a94442');
    }else{
        $('label[for="contractType"] b').css('color', 'green'); $('label[for="contractType"] small').html('').css('color', 'green');contractType.css('border-color', 'green')
    }
    // description 
    if (description.val() == "" || description.val() == null ) { var  error =+error + +1;
        $('label[for="description"] b').after('<small class="text-danger"> This field required!</small>  ').css('color', 'red');description.css('border-color', '#a94442');
    }else{
        $('label[for="description"] b').css('color', 'green'); $('label[for="description"] small').html('').css('color', 'green');description.css('border-color', 'green')
    }
    // images
    if (fileUpload.val() == "" || fileUpload.val() == null ) { var  error =+error + +1;
        $('label[for="fileUpload"] b').after('<small class="text-danger"> This field required!</small>  ').css('color', 'red');fileUpload.css('border-color', '#a94442');
    }else{
        $('label[for="fileUpload"] b').css('color', 'green'); $('label[for="fileUpload"] small').html('').css('color', 'green');fileUpload.css('border-color', 'green')
    }
    // baths
    if (baths.val() == "" || baths.val() == null ) { var  error =+error + +1;
        $('label[for="baths"] b').after('<small class="text-danger"> This field required!</small>  ').css('color', 'red');baths.css('border-color', '#a94442');
    }else{
        $('label[for="baths"] b').css('color', 'green'); $('label[for="baths"] small').html('').css('color', 'green');baths.css('border-color', 'green')
    }
    // beds
    if (beds.val() == "" || beds.val() == null ) { var  error =+error + +1;
        $('label[for="beds"] b').after('<small class="text-danger"> This field required!</small>  ').css('color', 'red');beds.css('border-color', '#a94442');
    }else{
        $('label[for="beds"] b').css('color', 'green'); $('label[for="beds"] small').html('').css('color', 'green');beds.css('border-color', 'green')
    }
    //rooms
    if (rooms.val() == "" || rooms.val() == null ) { var  error =+error + +1;
        $('label[for="rooms"] b').after('<small class="text-danger"> This field required!</small>  ').css('color', 'red');rooms.css('border-color', '#a94442');
    }else{
        $('label[for="rooms"] b').css('color', 'green'); $('label[for="rooms"] small').html('').css('color', 'green');rooms.css('border-color', 'green')
    }
    // area
    if (area.val() == "" || area.val() == null ) { var  error =+error + +1;
        $('label[for="area"] b').after('<small class="text-danger"> This field required!</small>  ').css('color', 'red');area.css('border-color', '#a94442');
    }else{
        $('label[for="area"] b').css('color', 'green'); $('label[for="area"] small').html('').css('color', 'green');area.css('border-color', 'green')
    }
    // furnish
    if (furnish.val() == "" || furnish.val() == null ) { var  error =+error + +1;
        $('label[for="furnish"] b').after('<small class="text-danger"> This field required!</small>  ').css('color', 'red');furnish.css('border-color', '#a94442');
    }else{
        $('label[for="furnish"] b').css('color', 'green'); $('label[for="furnish"] small').html('').css('color', 'green');furnish.css('border-color', 'green')
    }
     if(error < 1 ){

        var ajaxData = new FormData();

        $.each($("input[type=file]"), function(i, obj) {
            $.each(obj.files,function(j,file){
                ajaxData.append('photo['+j+']', file);//i had to change "i" by "j"
            })
        });

        // amenties

        if($('input[name=electricity]').is(':checked')){var electricity = $('input[name=electricity]:checked').val();}else{var electricity = 0;}
        if( $('input[name=sui_gas]').is(':checked')){var sui_gass = $('input[name=sui_gass]').val();}else{var sui_gass = 0;}
        if( $('input[name=water]').is(':checked')){var water = $('input[name=water]').val();}else{var water = 0;}
        if( $('input[name=pool]').is(':checked')){var pool = $('input[name=pool]').val();}else{var pool = 0;}
        if( $('input[name=garden]').is(':checked')){var garden = $('input[name=garden]').val();}else{var garden = 0;}
        if( $('input[name=balcony]').is(':checked')){var balcony = $('input[name=balcony]').val();}else{var balcony = 0;}
        if( $('input[name=garage]').is(':checked')){var garage = $('input[name=garage]').val();}else{var garage = 0;}
        if( $('input[name=air_condition]').is(':checked')){var air_condition = $('input[name=air_condition]').val();}else{var air_condition = 0;}
        if( $('input[name=boundary_wall]').is(':checked')){var boundary_wall = $('input[name=boundary_wall]').val();}else{var boundary_wall = 0;}

       // bind varibles
        ajaxData.append("title", title.val());
        ajaxData.append("location", location.val());
        ajaxData.append("address", address.val());
        ajaxData.append("country", country.val());
        ajaxData.append("province", province.val());
        ajaxData.append("city", city.val());
        ajaxData.append("description", description.val());
        ajaxData.append("beds", beds.val());
        ajaxData.append("baths", baths.val());
        ajaxData.append("area", area.val());
        ajaxData.append("furnish", furnish.val());
        ajaxData.append("price", price.val().replace(/,/g,''));
        ajaxData.append("propertyType", propertyType.val());
        ajaxData.append("contractType", contractType.val());
        ajaxData.append("electricity", electricity);
        ajaxData.append("sui_gass", sui_gass);
        ajaxData.append("water", water);
        ajaxData.append("pool", pool);
        ajaxData.append("garden", garden);
        ajaxData.append("balcony", balcony);
        ajaxData.append("garage", garage);
        ajaxData.append("air_condition",  air_condition);
        ajaxData.append("boundary_wall", boundary_wall);

            jQuery.ajax({
                     url:base_url+"Ajax_script/submit_property",
                     type:'POST',
                     data:ajaxData,
                     cache: false,
                     processData: false, // Don't process the files
                     contentType: false, // Set content type to false
                     success:function(data) {
                         //alert(data);
                         //console.log(data);
                        var data =  $.parseJSON(data);

                         if(data.errors){
                             for (i = 0; i < data.errors.length; i++) {
                                 $('.submit-err').before('<div class="col-md-3 err"><div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Error!</strong> '+data.errors[i]+'</div></div>');
                             }
                         }else if(data.data == "successful"){
                            $('#submit_property')[0].reset();
                            $('.properties .row').remove();
                            $('.properties').html('<div class="alertBox success text-center"><h4>SUCCESS! <span>Your Property Submitted Successfully.</span></h4></div>');
                         }else if(data.data == "error"){
                             $('.properties').html('<div class="alertBox error text-center"><h4>ERROR! <span>Undefined Error. Try again.</span></h4></div>');
                         }
                     },
                     error: function(errorThrown){
                         alert('error');
                     }
                 });

     }// end error if
}

//  price change to number formate
$('input[name="price"]').keyup(function(event) {

  // skip for arrow keys
  if(event.which >= 37 && event.which <= 40) return;
  // format number
  $(this).val(function(index, value) {
    return value
    .replace(/\D/g, "")
    .replace(/\B(?=(\d{3})+(?!\d))/g, ",")
    ;
  });
});

// panel activation
$(document).ready(function(){
    //login show
    $("#login, #login_ftr,#user_login").click(function(){
        $("#myLogin").modal();
    });
    // register low
    $("#register, #register_ftr").click(function(){
        $("#myRegistration").modal();
    });
    $("#forgot_pass").click(function(){
        $("#myforgot_pass").modal();
    });


}); // end document .ready

// logip
    function login(){
        var username = $('#username').val();
        var password = $('#psw').val();
        if(username == ""){
            $('#username').css('border-color','red').focus();
            return false;
        }
        if(password == ""){
            $('#psw').css('border-color','red').focus();
            return false;
        }
        $('#load').html('<img src="'+base_url+'assets/images/ajax-load.gif">');
        $.post(base_url+"Ajax_script/login",
            {username:username,password:password},
            function(data){
                $('#load,.login_err').html('');
                //console.log(data);
                if(data=="suc"){
                    window.location = base_url+'user_panel/dashboard';
                }
                if(data=="err") {
                    $('.btn_err').addClass('btn-danger');
                    $('.login_err').html("<center class='text-danger'>Wrong username or password!</center>").css('color', 'red');
                }
            });
    }
    //signup
    function register() {
        reg_err = 0;
        var username = $('input[name="username"]');
        var email = $('input[name="email"]');
        var password = $('input[name="password"]');
        var repassword = $('input[name="repassword"]');
        var phone = $('input[name="phone"]');

        $('#myRegistration small, #myRegistration bb').html('');

        // title
        if (username.val() == "" || username.val() == null ) { reg_err =+reg_err + +1;
            $('label[for="username"]').after('<small class="text-danger"> This field required!</small>  ').css('color', 'red');username.css('border-color', '#a94442');
        }else{
            $('label[for="username"]').css('color', 'green'); $('label[for="username"] small').html('');username.css('border-color', 'green')
        }

        if (email.val() == "" || email.val() == null ) {
            $('label[for="email"]').html('Email * <small class="text-danger"> This field required!</small>  ').css('color', 'red');email.css('border-color', '#a94442');
        }else {
            if (emailPattern.test(email.val()) == false) {
                 reg_err = +reg_err + +1;
                $('label[for="email"]').html('Email * <small class="text-danger"> Invalid Email Id!</small>  ').css('color', 'red');email.css('border-color', '#a94442');
            }
        }
        if (filter_phone.test(phone.val())) {
            $('label[for="phone"]').css('color', 'green'); $('label[for="phone"] small').html('');phone.css('border-color', 'green');
        }else{
            reg_err =+reg_err + +1;
            $('label[for="phone"]').after('<small class="text-danger"> Invalid Phone Number!</small>  ').css('color', 'red');phone.css('border-color', '#a94442');
        }

        if(password.val() == ""){
            $('label[for="password"]').after('<small class="text-danger"> This Field Required!</small>  ').css('color', 'red');password.css('border-color', '#a94442');
              reg_err =+reg_err + +1;
        }else{
            if(password.val().length <6){
                $('label[for="password"]').after('<small class="text-danger"> At least 6 characters required!</small>  ').css('color', 'red');password.css('border-color', '#a94442');
                  reg_err =+reg_err + +1;
            }
        }
        if(repassword.val() == ""){
            $('label[for="repassword"]').after('<small class="text-danger"> This Field Required!</small>  ').css('color', 'red');repassword.css('border-color', '#a94442');
              reg_err =+reg_err + +1;
        }else {
            if (password.val() != repassword.val()) {
                $('label[for="repassword"]').after('<small class="text-danger"> Passwords Mismatched!</small>  ').css('color', 'red');
                repassword.css('border-color', '#a94442');
                 reg_err = +reg_err + +1;
            }
        }
        if(password.val() == repassword.val() && password.val().length > 5 ){
            $('label[for="password"], label[for="repassword"]').css('color', 'green'); $('label[for="password"] small, label[for="repassword"] small').html('');password.css('border-color', 'green');repassword.css('border-color', 'green');
        }

        if(reg_err < 1 ){
            $.post(base_url+'Ajax_script/register',
                {username:username.val(), email:email.val(),phone:phone.val(),password:password.val()},
                function (data) {
                    //alert(data);
                    //console.log(data);
                    var Obj = $.parseJSON( data );
                    if(Obj.data == 'successful'){
                        $('#myRegistration form').html('<h2>Email send to you please confirm!</h2><img src="'+base_url+'assets/images/loading.gif">');
                        setTimeout(
                            function()
                            {
                                window.location = base_url+'user_panel/dashboard';
                            }, 5000);
                    }
                    if(Obj.errors){
                        var err = "";
                        for (i = 0; i < Obj.errors.length; i++) {
                            err = err+Obj.errors[i]+'<br>';
                        }
                        $('.modal-content').css('background-color', 'antiquewhite');
                        $('.modal-footer').html(err).addClass('text-danger').css('text-align','left');
                        $('.register').removeClass('.btn-success').addClass('btn-danger');
                    }
                });
        }

    }

function is_email_available(){
    var email_err = 0;
    var email = $('#email');
    //alert(email.val());
    //$('#myRegistration small').html('');
    if (email.val() == "" || email.val() == null ) {   email_err = 1;
        $('label[for="email"]').html('<small class="text-danger"> This field requireddddd!</small>  ').css('color', 'red');email.css('border-color', '#a94442');
    }else {
        if (emailPattern.test(email.val()) == false) {
            email_err = 1;
            $('label[for="email"]').html('Email * <bb class="text-danger"> Invalid Email Id!</bb>  ').css('color', 'red');
            email.css('border-color', '#a94442');
        }
    }
    if(email_err > 0 ){
        reg_err = +reg_err + +1;

    }else {
        $.post(base_url + 'Ajax_script/is_email_available',
            {email: email.val()},
            function (data) {
                //alert(data);
                var jsonObj = $.parseJSON(data);
                //console.log(jsonObj);
                if(jsonObj.data > 0 ){
                    $('label[for="email"]').html('Email * <bb class="text-danger"> Email Already Exist!</bb>  ').css('color', 'red');
                }else{
                    $('#myRegistration bb').html('');
                    $('label[for="email"]').css('color', 'green'); $('label[for="email"] small').html('');email.css('border-color', 'green');
                }
            });
    }
}
// ##############################    FORGET PASSWORD
function forget_password() {
    var error = 0;
    var email = $('#useremail');
//alert(email.val());
    if (email.val() == "" || email.val() == null ) { var error = 1;
        $('label[for="useremail"]').html('Email * <small class="text-danger"> This field required!</small>  ').css('color', 'red');email.css('border-color', '#a94442');
    }else {
        if (emailPattern.test(email.val()) == false) {
           var error = 1;
            $('label[for="useremail"]').html('Email * <small class="text-danger"> Invalid Email Id!</small>  ').css('color', 'red');email.css('border-color', '#a94442');
        }
    }

    if(error < 1 ){
        $.post(base_url+'Ajax_script/is_email_available',
            {email:email.val()},
            function (data) {
                //alert(data);
                //console.log(data);
                var Obj = $.parseJSON( data );

                if(Obj.data == 1){ // if email is in record
                    //$('.fg-pass').html('<div class="bg-success text-center">Password is sent to your email id!</div>');
                    $.post(base_url+'Ajax_script/forget_password',
                        {email:email.val()},
                        function (data) {
                            //alert(data);
                            //console.log(data);
                            var Obj = $.parseJSON( data );

                            if(Obj.data == 'succ'){
                                $('.fg-pass').html('<div class="bg-success text-center">Password is sent to your email id!</div>');
                            }else if(Obj.data == 'some_err'){
                                $('.fg-pass').html('<div class="bg-danger text-red text-center">Some error accord!</div>');
                            }
                        });
                //  if emil is not in record
                }else if(Obj.data == 0){
                    $('.fg-pass').html('<div class="bg-danger text-center  text-red">Your email is not in record!</div>');
                }
            });
    }
}

function remove_property(id){
    var r = confirm("Are you sure to inactive property?");
    if (r == true) {
       if( $.isNumeric(id)){
           var act_count = $('.act_count').html()*1;
           var inact_count = $('.inact_count').html()*1;
           $('.re_' + id).attr('src',base_url + 'assets/images/ajax-load.gif');
           $.post(base_url+"Ajax_script/inactive_property",
               {id:id},
               function(data){
                   //console.log(data);
               var obj = $.parseJSON(data);
                if(obj.data == "y"){ // if data processed successfully
                    $('.act_count').html(act_count-1);
                    $('.inact_count').html(inact_count+1);
                    $('#'+id).closest('tr').css('background-color', 'rgb(234, 248, 217)').hide(1500);
                    if(act_count == 1){
                        $('.myProperties tr:nth-child(2)').after('<tr class="text-red"><td align="" colspan="7"><h4>Inactive property not found! </h4></td></tr>');
                    }
                }else{ // hacking + user check fails
                    $('.re_' + id).attr('src',base_url + 'assets/images/red-loader.gif');
                    $('#'+id).closest('tr').css('background-color', '#ffcdca');
                }
           });
        }else{  // incase if user try to hack
           $('.re_' + id).attr('src',base_url + 'assets/images/red-loader.gif');
           $('#'+id).closest('tr').css('background-color', '#ffcdca');
       }
    }
}
function active_property(id) {

    var r = confirm("Are you sure to activate property?");
    if (r == true) {
        if ($.isNumeric(id)) {
            // count property and change figures
            var act_count = $('.act_count').html()*1;
            var inact_count = $('.inact_count').html()*1;

            $('.act_' + id).attr('src',base_url + 'assets/images/ajax-load.gif');
            //return;
            if ($.isNumeric(id)) {

                $.post(base_url + "Ajax_script/active_property",
                    {id: id},
                    function (data) {
                        //console.log(data);
                        var obj = $.parseJSON(data);

                        if (obj.data == "y") { // if data processed successfully
                            $('.act_count').html(act_count+1);
                            $('.inact_count').html(inact_count-1);
                            $('#' + id).closest('tr').css('background-color', 'rgb(234, 248, 217)').hide(1500);
                            if(inact_count == 1){
                                $('.myProperties tr:nth-child(2)').after('<tr class="text-red"><td align="" colspan="7"><h4>Inactive property not found! </h4></td></tr>');
                            }
                        } else { // hacking + user check fails
                            $('.act_' + id).attr('src',base_url + 'assets/images/red-loader.gif');
                            $('#' + id).closest('tr').css('background-color', '#ffcdca');
                        }
                    });
            } else {  // incase if user try to hack
                $('.act_' + id).attr('src',base_url + 'assets/images/red-loader.gif');
                $('#' + id).closest('tr').css('background-color', '#ffcdca');
            }
        }
    }
}
function delete_property(id){

    var r = confirm("Are you sure to delete property permanently?");
    if (r == true) {

        if( $.isNumeric(id)){
            var act_count = $('.act_count').html()*1;
            var inact_count = $('.inact_count').html()*1;
            $('.de_' + id).attr('src',base_url + 'assets/images/ajax-load.gif');
            $.post(base_url+"Ajax_script/delete_property",
                {id:id},
                function(data){
                    //console.log(data);
                    var obj = $.parseJSON(data);

                    if(obj.data == "y"){ // if data processed successfully
                        $('.act_count').html(act_count-1);
                        $('.inact_count').html(inact_count-1);
                        $('#'+id).closest('tr').css('background-color', 'rgb(234, 248, 217)').hide(1500);
                        if(inact_count == 1){
                            $('.myProperties tr:nth-child(2)').after('<tr class="text-red"><td align="" colspan="7"><h4>Inactive property not found! </h4></td></tr>');
                        }
                    }else{ // hacking + user check fails
                        $('.de_' + id).attr('src',base_url + 'assets/images/red-loader.gif');
                        $('#'+id).closest('tr').css('background-color', '#ffcdca');
                    }
                });
        }else{  // incase if user try to hack
            $('.de_' + id).attr('src',base_url + 'assets/images/red-loader.gif');
            $('#'+id).closest('tr').css('background-color', '#ffcdca');
        }
    }
}
// delete pending
function delete_pending_property(id){

    var r = confirm("Are you sure to delete property permanently?");
    if (r == true) {

        if( $.isNumeric(id)){
            var act_count = $('.act_count').html()*1;
            var del_count = $('.del_count').html()*1;
            $('.de_' + id).attr('src',base_url + 'assets/images/ajax-load.gif');
            $.post(base_url+"Ajax_script/delete_pending_property",
                {id:id},
                function(data){

                    var obj = $.parseJSON(data);

                    if(obj.data == "y"){ // if data processed successfully
                        $('.act_count').html(act_count-1);
                        $('.del_count').html(del_count-1);
                        $('#'+id).closest('tr').css('background-color', 'rgb(234, 248, 217)').hide(1500);
                        if(del_count == 1){
                            $('.myProperties tr:nth-child(2)').after('<tr class="text-red"><td align="" colspan="7"><h4>Pending approval property not found! </h4></td></tr>');
                        }
                    }else{ // hacking + user check fails
                        $('.de_' + id).attr('src',base_url + 'assets/images/red-loader.gif');
                        $('#'+id).closest('tr').css('background-color', '#ffcdca');
                    }
                });
        }else{  // incase if user try to hack
            $('.de_' + id).attr('src',base_url + 'assets/images/red-loader.gif');
            $('#'+id).closest('tr').css('background-color', '#ffcdca');
        }
    }
}
// #############
// edit property
//##############
function edit_property() {
    /// title
    $('.text-danger').html('');
    var title = $('input[name="title"]');
    var id = $('input[name="pro_id"]');
    var location = $('input[name="location"]');
    var address = $('input[name="address"]');
    var country = $('select[name="country"]');
    var province = $('select[name="province"]');
    var city = $('select[name="city"]');
    var description = $('textarea[name="description"]');
    var beds = $('select[name="beds"]');
    var baths = $('select[name="baths"]');
    var rooms = $('select[name="rooms"]');
    var area = $('select[name="area"]');
    var furnish = $('select[name="furnish"]');
    var price = $('input[name="price"]');
    var propertyType = $('select[name="propertyType"]');
    var contractType = $('select[name="contractType"]');

    var error = 0;
    $('#submi_property label small').html('');
    $('.err').remove();

    // title
    if (title.val() == "" || title.val() == null ) { var  error =+error + +1;
        $('label[for="title"] b').after('<small class="text-danger"> This field required!</small>  ').css('color', 'red');title.css('border-color', '#a94442');
    }else{
        $('label[for="title"] b').css('color', 'green'); $('label[for="title"] small').html('').css('color', 'green');title.css('border-color', 'green')
    }
    // pro id
    if (id.val() == "" || id.val() == null ) { var  error =+error + +1;
        alert('Unknown Error ');
    }
    // location
    if (location.val() == "" || location.val() == null ) { var  error =+error + +1;
        $('label[for="location"] b').after('<small class="text-danger"> This field required!</small>  ').css('color', 'red');location.css('border-color', '#a94442');
    }else{
        $('label[for="location"] b').css('color', 'green'); $('label[for="location"] small').html('').css('color', 'green');location.css('border-color', 'green')
    }
    // address
    if (address.val() == "" || address.val() == null ) { var  error =+error + +1;
        $('label[for="address"] b').after('<small class="text-danger"> This field required!</small>  ').css('color', 'red');address.css('border-color', '#a94442');
    }else{
        $('label[for="address"] b').css('color', 'green'); $('label[for="address"] small').html('').css('color', 'green');address.css('border-color', 'green')
    }
    // country
    if (country.val() == "" || country.val() == null ) { var  error =+error + +1;
        $('label[for="country"] b').after('<small class="text-danger"> This field required!</small>  ').css('color', 'red');country.css('border-color', '#a94442');
    }else{
        $('label[for="country"] b').css('color', 'green'); $('label[for="country"] small').html('').css('color', 'green');country.css('border-color', 'green')
    }
    // province
    if (province.val() == "" || province.val() == null ) { var  error =+error + +1;
        $('label[for="province"] b').after('<small class="text-danger"> This field required!</small>  ').css('color', 'red');province.css('border-color', '#a94442');
    }else{
        $('label[for="province"] b').css('color', 'green'); $('label[for="province"] small').html('').css('color', 'green');province.css('border-color', 'green')
    }
    // city
    if (city.val() == "" || city.val() == null ) { var  error =+error + +1;
        $('label[for="city"] b').after('<small class="text-danger"> This field required!</small>  ').css('color', 'red');city.css('border-color', '#a94442');
    }else{
        $('label[for="city"] b').css('color', 'green'); $('label[for="city"] small').html('').css('color', 'green');city.css('border-color', 'green')
    }
    // price
    if (price.val() == "" || price.val() == null ) { var  error =+error + +1;
        $('label[for="price"] b').after('<small class="text-danger"> This field required!</small>  ').css('color', 'red');price.css('border-color', '#a94442');
    }else{
        //str.replace("Microsoft", "W3Schools");
        //var price_val = str.replace()
        if($.isNumeric(price.val().replace(/,/g,""))){
            $('label[for="price"] b').css('color', 'green'); $('label[for="price"] small').html('').css('color', 'green');price.css('border-color', 'green');
        }else{
            $('label[for="price"] b').after('<small class="text-danger"> Numeric value allowed!</small>  ').css('color', 'red');price.css('border-color', '#a94442');
        }
    }
    // propertyType
    if (propertyType.val() == "" || propertyType.val() == null ) { var  error =+error + +1;
        $('label[for="propertyType"] b').after('<small class="text-danger"> This field required!</small>  ').css('color', 'red');propertyType.css('border-color', '#a94442');
    }else{
        $('label[for="propertyType"] b').css('color', 'green'); $('label[for="propertyType"] small').html('').css('color', 'green');propertyType.css('border-color', 'green')
    }
    // contractType
    if (contractType.val() == "" || contractType.val() == null ) { var  error =+error + +1;
        $('label[for="contractType"] b').after('<small class="text-danger"> This field required!</small>  ').css('color', 'red');contractType.css('border-color', '#a94442');
    }else{
        $('label[for="contractType"] b').css('color', 'green'); $('label[for="contractType"] small').html('').css('color', 'green');contractType.css('border-color', 'green')
    }
    // description
    if (description.val() == "" || description.val() == null ) { var  error =+error + +1;
        $('label[for="description"] b').after('<small class="text-danger"> This field required!</small>  ').css('color', 'red');description.css('border-color', '#a94442');
    }else{
        $('label[for="description"] b').css('color', 'green'); $('label[for="description"] small').html('').css('color', 'green');description.css('border-color', 'green')
    }

    // baths
    if (baths.val() == "" || baths.val() == null ) { var  error =+error + +1;
        $('label[for="baths"] b').after('<small class="text-danger"> This field required!</small>  ').css('color', 'red');baths.css('border-color', '#a94442');
    }else{
        $('label[for="baths"] b').css('color', 'green'); $('label[for="baths"] small').html('').css('color', 'green');baths.css('border-color', 'green')
    }
    // beds
    if (beds.val() == "" || beds.val() == null ) { var  error =+error + +1;
        $('label[for="beds"] b').after('<small class="text-danger"> This field required!</small>  ').css('color', 'red');beds.css('border-color', '#a94442');
    }else{
        $('label[for="beds"] b').css('color', 'green'); $('label[for="beds"] small').html('').css('color', 'green');beds.css('border-color', 'green')
    }
    //rooms
    if (rooms.val() == "" || rooms.val() == null ) { var  error =+error + +1;
        $('label[for="rooms"] b').after('<small class="text-danger"> This field required!</small>  ').css('color', 'red');rooms.css('border-color', '#a94442');
    }else{
        $('label[for="rooms"] b').css('color', 'green'); $('label[for="rooms"] small').html('').css('color', 'green');rooms.css('border-color', 'green')
    }
    // area
    if (area.val() == "" || area.val() == null ) { var  error =+error + +1;
        $('label[for="area"] b').after('<small class="text-danger"> This field required!</small>  ').css('color', 'red');area.css('border-color', '#a94442');
    }else{
        $('label[for="area"] b').css('color', 'green'); $('label[for="area"] small').html('').css('color', 'green');area.css('border-color', 'green')
    }
    // furnish
    if (furnish.val() == "" || furnish.val() == null ) { var  error =+error + +1;
        $('label[for="furnish"] b').after('<small class="text-danger"> This field required!</small>  ').css('color', 'red');furnish.css('border-color', '#a94442');
    }else{
        $('label[for="furnish"] b').css('color', 'green'); $('label[for="furnish"] small').html('').css('color', 'green');furnish.css('border-color', 'green')
    }

    //alert(error);
     if(error < 1 ){

    var ajaxData = new FormData();

    //$.each($("input[type=file]"), function(i, obj) {
    //    $.each(obj.files,function(j,file){
    //        ajaxData.append('photo['+j+']', file);//i had to change "i" by "j"
    //    });
    //});

    // amenties

    if($('input[name=electricity]').is(':checked')){var electricity = $('input[name=electricity]:checked').val();}else{var electricity = 0;}
    if( $('input[name=sui_gas]').is(':checked')){var sui_gass = $('input[name=sui_gass]').val();}else{var sui_gass = 0;}
    if( $('input[name=water]').is(':checked')){var water = $('input[name=water]').val();}else{var water = 0;}
    if( $('input[name=pool]').is(':checked')){var pool = $('input[name=pool]').val();}else{var pool = 0;}
    if( $('input[name=garden]').is(':checked')){var garden = $('input[name=garden]').val();}else{var garden = 0;}
    if( $('input[name=balcony]').is(':checked')){var balcony = $('input[name=balcony]').val();}else{var balcony = 0;}
    if( $('input[name=garage]').is(':checked')){var garage = $('input[name=garage]').val();}else{var garage = 0;}
    if( $('input[name=air_condition]').is(':checked')){var air_condition = $('input[name=air_condition]').val();}else{var air_condition = 0;}
    if( $('input[name=boundary_wall]').is(':checked')){var boundary_wall = $('input[name=boundary_wall]').val();}else{var boundary_wall = 0;}

    // bind varibles
    ajaxData.append("title", title.val());
    ajaxData.append("location", location.val());
    ajaxData.append("address", address.val());
    ajaxData.append("country", country.val());
    ajaxData.append("province", province.val());
    ajaxData.append("city", city.val());
    ajaxData.append("description", description.val());
    ajaxData.append("beds", beds.val());
    ajaxData.append("baths", baths.val());
    ajaxData.append("area", area.val());
    ajaxData.append("furnish", furnish.val());
    ajaxData.append("price", price.val().replace(/,/g,''));
    ajaxData.append("propertyType", propertyType.val());
    ajaxData.append("contractType", contractType.val());
    ajaxData.append("electricity", electricity);
    ajaxData.append("sui_gass", sui_gass);
    ajaxData.append("water", water);
    ajaxData.append("pool", pool);
    ajaxData.append("garden", garden);
    ajaxData.append("balcony", balcony);
    ajaxData.append("garage", garage);
    ajaxData.append("air_condition",  air_condition);
    ajaxData.append("boundary_wall", boundary_wall);
    ajaxData.append("id", id.val());

         //console.log(ajaxData);

    jQuery.ajax({
        url:base_url+"Ajax_script/edit_property",
        type:'POST',
        data:ajaxData,
        cache: false,
        processData: false, // Don't process the files
        contentType: false, // Set content type to false
        success:function(data) {
            alert(data);
            console.log(data);

            var data =  $.parseJSON(data);

            if(data.errors){
                for (i = 0; i < data.errors.length; i++) {
                    $('.submit-err').before('<div class="col-md-3 err"><div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Error!</strong> '+data.errors[i]+'</div></div>');
                }
            }else if(data.data == "y"){

                $('.submit-err').html('<div class="alertBox success text-center"><h4>SUCCESS! <span>Your Property Updated Successfully.Visible After Review</span></h4></div>');
            }else if(data.data == "err"){
                $('.submit-err').html('<div class="alertBox error text-center"><h4>ERROR! <span>Undefined Error. Try again.</span></h4></div>');
            }
        },
        error: function(errorThrown){
            alert('error');
        }
    });

    }// end error if
}

// show selected image
function readURL(input,id) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('.file_'+id).attr('src', e.target.result);
        }
        //alert('ok');
        reader.readAsDataURL(input.files[0]);
    }
}
// ############################################################   start   #####################

function loadImage(loc, this_one){

    $('#'+loc+ ' label i').after('<i onclick="del_img(this)" class="glyphicon glyphicon-trash text-danger"></i>');

    $('.file_'+loc).attr('src','');
    $('.file_'+loc).attr('src',base_url+'assets/images/cat_loading.gif');
    $('.file_'+loc).attr('height','25px');
    $('.file_'+loc).attr('width','25px');
    //readURL(cc,1);
    //
    var pro_id = $('input[name="pro_id"]').val();
    var id =  $(this_one).closest('div').attr('id');
    $('#'+id+' label i.text-danger').addClass('glyphicon-trash');

//    image upload
    var formdata = new FormData();
    var file = $('#file_'+id);

    var individual_file = file[0].files[0];
    formdata.append("photo", individual_file);
    formdata.append("prop_id", pro_id);
    formdata.append("img_id", id);

    jQuery.ajax({
        url: base_url+'Ajax_script/upload_image',
        type:'POST',
        data:formdata,
        cache: false,
        processData: false, // Don't process the files
        contentType: false, // Set content type to false

        success:function(res) {
            //alert(res);
            if(res != "") {
                var obj = $.parseJSON(res);
                if (obj.data == 'y') {
                    readURL(this_one, loc);
                    $('.file_'+loc).attr('height','111px');
                    $('.file_'+loc).attr('width','113px');
                    $('.img-info').html('');
                }
            }else{
                $('.img-info').html('Error please try again!').addClass('text-red');
                $('.file_'+loc).attr('src','');
            }
        },
        error: function(errorThrown){
            swal('Error!', errorThrown, 'error');
        }
    });
}




$("#file_1").change(function(){
    // loading image
    loadImage(1, this);

});
$("#file_2").change(function(){
    loadImage(2, this);
});
$("#file_3").change(function(){
    // load image
    loadImage(3, this);
    //alert('ok');
});
$("#file_4").change(function(){
    // load image
    loadImage(4, this);
    //alert('ok');
});
$("#file_5").change(function(){
    // load image
    loadImage(5, this);
    //alert('ok');
});
$("#file_6").change(function(){
    // load image
    loadImage(6, this);
    //alert('ok');
});
$("#file_7").change(function(){
    // load image
    loadImage(7, this);
    //alert('ok');
});
$("#file_8").change(function(){
    // load image
    loadImage(8, this);
});

//############################################################   end  #############################

function del_img(e){
    //console.log(e);
    var id = $('input[name="pro_id"]').val();

    //alert(id);

    $(e).removeClass('glyphicon-trash');
    var img_id =  $(e).closest('div').attr('id');
        $('.file_'+img_id).attr('src', '');
        $('#file_'+img_id).val('');

        //alert(id);

    if($.isNumeric(img_id ) && $.isNumeric( id ) ){
        $.post(base_url+'Ajax_script/delete_image',
            {img_id:img_id, prop_id:id},
            function (data){
             //console.log(data);
            var obj = $.parseJSON(data);

            if(obj.response == 'err'){
                alert('Error!');
            }
        });

    }else{
        alert('error');
    }
}

function reset_password(){
    $('.conf_perr, .old_perr, .new_perr').html('');

    var old_pass = $('input[name="old_pass"]');
    var conf_pass = $('input[name="conf_pass"]');
    var new_pass = $('input[name="new_pass"]');

    if(old_pass.val() == "" || old_pass.val() == null){
        $('.old_perr').html('Old password required!');
        old_pass.focus();
        return false;
    }
    if(new_pass.val() =="" || new_pass.val() == null){
        $('.new_perr').html('New password required!');
        new_pass.focus();
        return false;
    }
    if( new_pass.val().length < 6 ){
        $('.new_perr').html('Password length must be 6 or more!');
        new_pass.focus();
        return false;
    }else if( new_pass.val() != conf_pass.val() ){
        //new_pass.css('border-color', 'red');
        conf_pass.focus();
        $('.conf_perr').html('Password mismatch!');
    }else{
        return true;
    }
}


// contact with agent
function contact_agent() {
    reg_err = 0;
    var name = $('#user_name');
    var email = $('#email_id');
    var message = $('#user_message');
    var captcha_code = $('.captcha_code');
    var chk = $('#cus').data('value');

    if(chk == 'cu'){
       var cuurl =  base_url+'Ajax_script/contact_us';
    }else{
        var cuurl =  base_url+'Ajax_script/contact_agent';
    }

    $('small').html('');
    // title
    if (name.val() == "" || name.val() == null ) { reg_err =+reg_err + +1;
        $('label[for="user_name"]').after('<small class="text-danger"> This field required!</small>  ').css('color', 'red');name.css('border-color', '#a94442');
    }else{
        $('label[for="user_name"]').css('color', 'green'); $('label[for="user_name"] small').html('');name.css('border-color', 'green')
    }
    //captcha code
    if (captcha_code.val() == "" || captcha_code.val() == null ) { reg_err =+reg_err + +1;
        $('label[for="v_captcha"]').after('<small class="text-danger"> This field required!</small>  ').css('color', 'red');captcha_code.css('border-color', '#a94442');
    }
    if (message.val() == "" || message.val() == null ) { reg_err =+reg_err + +1;
        $('label[for="user_message"]').after('<small class="text-danger"> This field required!</small>  ').css('color', 'red');message.css('border-color', '#a94442');
    }else{
        $('label[for="user_message"]').css('color', 'green'); $('label[for="user_message"] small').html('');message.css('border-color', 'green');
    }
    if (email.val() == "" || email.val() == null ) { reg_err = +reg_err + +1;
        $('label[for="email_id"]').after('<small class="text-danger"> This field required!</small>  ').css('color', 'red');email.css('border-color', '#a94442');
    }else if (emailPattern.test(email.val()) == false) {
            reg_err = +reg_err + +1;
            $('label[for="email_id"]').after('<small class="text-danger"> Invalid Email Id!</small>  ').css('color', 'red');email.css('border-color', '#a94442');
        }else{
        $('label[for="email_id"]').css('color', 'green'); $('label[for="email_id"] small').html('');email.css('border-color', 'green');
    }
    if(reg_err < 1 ){
        $.post(cuurl,
            {name:name.val(), email:email.val(),message:message.val(), code:captcha_code.val()},
            function (data) {
                //alert(data);
               var obj = $.parseJSON(data);
               if(obj.e_err == 1){
                   $('label[for="email_id"]').after('<small class="text-danger"> Invalid Email Id!</small>  ').css('color', 'red');email.css('border-color', '#a94442');
               }
                if(obj.captcha_err == 1){
                    $('label[for="v_captcha"]').after('<small class="text-danger"> Invalid Code!</small>  ').css('color', 'red');captcha_code.css('border-color', '#a94442');
                }
                if(obj.m_err == 1){
                    $('label[for="user_message"]').after('<small class="text-danger"> Message body should be less than 1000 letters!</small>  ').css('color', 'red');message.css('border-color', '#a94442');
                }
                if(obj.data == 'y'){
                    $('.con_msg').html('<h2>Email successfully send!</h2>').addClass('alert alert-success');
                    $('#contact_agent').hide();
                }
                if(obj.data == 'not_send'){
                    $('.con_msg').html('<h2>Email not send!</h2>').addClass('alert alert-danger');
                    $('#contact_agent').hide();
                }
            });
    }
}

function refresh_captcha(){
    $('input[name="captcha_code"]').val('');
    $.post(base_url+'Ajax_script/refresh_captcha', function(data){
        var obj = $.parseJSON(data);
        $('#captcha img').attr('src', base_url+'captcha_img/'+obj.file);
    });
}

$(document).ready(function(){
   $('#contact_submit').click(function () {
      alert('ok');
   });
});