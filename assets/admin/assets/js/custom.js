var pathname = window.location.pathname;
var sp =  pathname.split('/');
var dashboard = sp.pop();


if(dashboard == 'dashboard') {
    $(document).ready(function () {
        var cc = "";
        $.post(base_url + 'Ajax_script/dashboard_chart', {data: 'chart'}, function (resp) {
            var obj = $.parseJSON(resp);
            $('#total_users').html(obj.total_user);
            $('#total_property').html(obj.total_property);
        });

        // history checks
        setInterval(function () {
            var history = 'history';
            $.post(base_url + 'Ajax_script/get_history_alerts', {history: history}, function (data) {
                //console.log(data);
                var obj = $.parseJSON(data);
                //console.log(obj);
                $('.ajx_alert').html(obj.total);
                $(".ajx_result").html('');
                if (obj.total > 0) {
                    $(".ajx_result").html('<button onclick="clear_data()" class="btn btn-warning">Clear data</button>');
                } else {
                    $(".ajx_result").html('<p>Waiting for fresh data ...</p>');
                }
                for (var i = 0; i < obj.result.length; i++) {
                    if (obj.result[i].type == '2') var text = 'Signup';
                    if (obj.result[i].type == '4') var text = 'Added Property';
                    $(".ajx_result").append('<li class="list-group-item"><div class="media"><div class="media-left media-middle"><div class="media-body"><p class="m-a-0"><a href="#">' + obj.result[i].name + '</a> <span class="label label-success">' + text + '</span></p><small class="text-muted"><i class="glyphicon glyphicon-time md-18"></i> <span class="icon-text">' + obj.result[i].login_date + ' ago</span></small></div></div></li>');
                }
            });
        }, 5000);
    });
    function clear_data() {
        var history = 'history';
        $.post(base_url + 'Ajax_script/clear_history', {history: history}, function (data) {
            console.log(data);
        });
    }
    function property_chart(year) {
        if (!isNaN(year)) {
            $.post(base_url + 'Ajax_script/dashboard_chart', {year: year}, function (resp) {
                $('.refresh a').html('<i class="glyphicon glyphicon-refresh"><small> loading.. </small></i>');
                window.location.href = base_url + 'admin/dashboard';
            });
        }
    }
}

function show_pass(id){
    $('#pass_'+id +' .password_hidden').removeClass();
    $('#pass_'+id +' a').attr('onclick', 'hide_pass("'+id+'")');
    $('#pass_'+id +' a b').html('');
    $('#pass_'+id +' .glyphicon').addClass('text-danger');
    $('.glyphicon').css('width', '20px');
}
function hide_pass(id){
    $('#pass_'+id +' span:first-child').addClass('password_hidden');
    $('#pass_'+id +' a').attr('onclick', 'show_pass("'+id+'")');
    $('#pass_'+id +' a b').html(' ........ ');
    $('#pass_'+id +' .glyphicon').removeClass('text-danger');
}

function deactive_user(id, row_id){
    if(confirm('Are You sure to inactive user.\r\n Note: Properties of this user will be deactivated!')){
        $('#row_'+row_id).css('background-color','pink').hide('slow');
        $.post(base_url + 'Ajax_script/inactive_user', {id: id}, function (data) {
            console.log(data);
        });
    }
}

function active_user(id, row_id){
    if(confirm('Are You sure to active user.\r\n Note: Properties of this user will be activated!')){
        $('#row_'+row_id).css('background-color','#9BFF96').hide('slow');
        $.post(base_url + 'Ajax_script/active_user', {id: id}, function (data) {
            console.log(data);
        });
    }
}

function show_password(){
    var chk = $('#password').attr('type');

    if(chk == 'password'){
        $('#password').attr('type','text');
        //$('.material-icons').text('lock_outline');
    }
    if(chk == 'text'){
        $('#password').attr('type','password');
        //$('.material-icons').text('lock_open');
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
                    console.log(data);
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

function load_province(id){
    if(!isNaN(id) && id != 0){
        //$('province_loader').attr('src',base_url + 'assets/images/ajax-load.gif');
        $('.province_loader').html('<img src="'+base_url+'assets/images/ajax-load.gif">');
        $.post(base_url+'Ajax_script/get_province_by_country_id', {'id' : id}, function(data) {
            var json = jQuery.parseJSON(data);
            // empty city options
            $('#province select').html(' <option value=""> Select Province </option> ');
            for (i = 0; i < json.data.length; i++) {
                $('#province select').append('<option value="'+json.data[i].id+'">'+json.data[i].title+'</option>').css('text-transform','capitalize');
            }
            $('.province_loader').html('');
        });
    }else{
        alert('Please select country ');
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
        return false;
    }else{
        return true;
    }
}
