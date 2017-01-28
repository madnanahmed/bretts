/**
 * Created by muhammad adnan on 10/9/2016.
 */

 var AjaxUrl = 'http://localhost/thepakland/index.php/Ajax_script/';
//var AjaxUrl = 'http://thepakland.com/index.php/Ajax_script/';

function search_load_city(id){
    if(!isNaN(id) && id !=""){
        $.post(AjaxUrl + 'get_city_by_province_id', {'id' : id}, function(data) {
            var json = jQuery.parseJSON(data);
            // empty city options
            $('#city select').html(' <option value=""> Select City </option> ');
            for (i = 0; i < json.data.length; i++) {
                $('#city select').append('<option value="'+json.data[i].id+'">'+json.data[i].title+'</option>').css('text-transform','capitalize');
            }
            //$('#city label').html('City');
            $('#city').css('display','block');
        });
    }else{
        alert('Please select province');
    }
}
function search_load_province(id){
    if(!isNaN(id)){
        $.post(AjaxUrl + 'get_province_by_country_id', {'id' : id}, function(data) {
            var json = jQuery.parseJSON(data);
            // empty city options
            $('#province_loader select').html(' <option value=""> Select Province </option> ');
            for (i = 0; i < json.data.length; i++) {
                $('#province_loader select').append('<option value="'+json.data[i].id+'">'+json.data[i].title+'</option>').css('text-transform','capitalize');
            }
            $('#city select').html(' <option value=""> Select City </option> ');
            $('#province_loader').css('display','block');
        });
    }else{
        alert('Please select country ');
    }
}



