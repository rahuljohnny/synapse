"use strict";
$(document).ready(function() {

    var postID = 0;
    var postBodyElement;

    $('.msg').fadeOut(3000);
    $('.err').fadeOut(3000);
    $('.err0').fadeOut(3000);

    $('.posts').find('.expressions').find('#edit').on('click', function (event) {
        //alert("clicked!");
        event.preventDefault();
        //postBodyElement = event.target.parentNode.parentNode.parentNode.childNodes[3].childNodes[3];
        postBodyElement = event.target.parentNode.parentNode.parentNode.parentNode.childNodes[1].childNodes[3];

        var postBody = postBodyElement.textContent;


        postID = event.target.parentNode.parentNode.parentNode.parentNode.dataset['postid'];

        console.log(postID);

        $('#post-body').val(postBody);
        $("#edit-modal").modal();
    });


        $('#edit-modal').find('.modal-dialog').find('.modal-content').find('.modal-footer')
          .find('#modal-save').on('click', function (event){

            var body = $('textarea#post-body').val();

            //$('.posts').find('.expressions').find('#edit').find("#post-body").val(body);




            $.ajax({
                type: 'POST',
                url: urlNew,
                //############################################################
                data: "body=" + body + "&id=" +postID +"&_token=" + token,

                success:function (msg){
                    $(postBodyElement).text(msg['body']);
                    //$(postBodyElement).text(body);

                    console.log(msg);
                }


            });

            $("#edit-modal").modal("hide");

    });
});







