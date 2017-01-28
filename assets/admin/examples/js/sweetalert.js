(function ($) {
	$('body').on('click', '.try-sweet-simpleMessage', simpleMessage);
	$('body').on('click', '.try-sweet-simpleTitle', simpleTitle);
	$('body').on('click', '.try-sweet-successMessage', successMessage);
	$('body').on('click', '.try-sweet-warningConfirm', warningConfirm);
	$('body').on('click', '.try-sweet-warningCallback', warningCallback);
	$('body').on('click', '.try-sweet-htmlMessag', htmlMessage);
    	

    function simpleMessage() {
        swal({title:"Here's a message!",  confirmButtonColor: "#039BE5"});
    }
    function simpleTitle() {
        swal({ title:"Here's a message!", text: "It's pretty, isn't it?",  confirmButtonColor: "#039BE5" });
    }
    function successMessage() {
        swal({ title:"Good job!", text:"You clicked the button!", type:"success",   confirmButtonColor: "#039BE5"})
    }
    function warningConfirm()
    {
        swal({   title: "Are you sure?",   text: "You will not be able to recover this imaginary file!",   type: "warning",   showCancelButton: true,   confirmButtonColor: "#039BE5",   confirmButtonText: "Yes, delete it!",   closeOnConfirm: false }, function(){   swal({title:"Deleted!", text:"Your imaginary file has been deleted.", type:"success",  confirmButtonColor: "#039BE5"}); });
    }
    function warningCallback() {
        swal({   title: "Are you sure?",   text: "You will not be able to recover this imaginary file!",   type: "warning",   showCancelButton: true,   confirmButtonColor: "#039BE5",   confirmButtonText: "Yes, delete it!",   cancelButtonText: "No, cancel plx!",   closeOnConfirm: false,   closeOnCancel: false }, function(isConfirm){   if (isConfirm) {     swal({title:"Deleted!", text:"Your imaginary file has been deleted.", type:"success",   confirmButtonColor: "#039BE5"});   } else {     swal({ title:"Cancelled", text:"Your imaginary file is safe :)", type:"error" ,  confirmButtonColor: "#039BE5" });   } });
    }
    function htmlMessage() {
        swal({   title: 'HTML <small>Title</small>!',   text: 'A custom <span style="color:#F8BB86">html<span> message.',   html: true ,   confirmButtonColor: "#039BE5"});

    }

}(jQuery));