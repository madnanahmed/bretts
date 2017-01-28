$(document).ready(function() {
    $("#fileUpload").on('change', function() {
        //Get count of selected files
        var countFiles = $(this)[0].files.length;
        $('.img-info').html('');
        if(countFiles > 8){

            $('.img-info').html('<b class="text-danger">Warning!</b>  8 images allowed');
            $('#fileUpload').val('');
        }else {

            var imgPath = $(this)[0].value;
            var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
            var image_holder = $("#image-holder");
            image_holder.empty();
            if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
                if (typeof(FileReader) != "undefined") {
                    //loop for each file selected for uploaded.
                    for (var i = 0; i < countFiles; i++) {
                        var reader = new FileReader();
                        reader.onload = function (e) {
                            $("<img />", {
                                "src": e.target.result,
                                "class": "img-responsive pull-left",

                                "style": "margin:0px 0px 2px 2px;height:100px;width:80px;border: 2px solid rgba(255, 193, 7, 0.55);"
                            }).appendTo(image_holder);
                        }

                        image_holder.show();
                        reader.readAsDataURL($(this)[0].files[i]);
                    }
                } else {
                    alert("This browser does not support FileReader.");
                }
            } else {
                alert("Pls select only images");
            }
        }
    });
});