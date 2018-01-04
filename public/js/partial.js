"use strict";
$(document).ready(function() {

    var postID = 0;
    var postBodyElement;
    var pageLoadCounts = 0;

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

        //console.log(postID);

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

                    //console.log(msg);
                    1;
                }


            });

            $("#edit-modal").modal("hide");

    });

      $('.like').on('click',function(event)
      {
          event.preventDefault();


          //likeStatus = event.target.parentNode.parentNode.parentNode.parentNode.dataset['likestatus']; //data binding variable names become lower cased
          var likeStatus = event.target.id; //data binding variable names become lower cased
          var isLike;

          if(event.target.parentNode.parentNode.previousElementSibling == null){
              isLike = 1;
          }
          else {
              isLike = 0;
          }

          var postID = event.target.parentNode.parentNode.parentNode.parentNode.dataset['postid'];
          //console.log(event.target.parentNode.parentNode.parentNode.parentNode);
          //console.log(event.target.parentNode.parentNode.previousElementSibling);
          $.ajax({
              type: 'POST',
              url: urlLike,
              data: "isLike=" + isLike + "&postID=" + postID +"&_token=" + token,

              success:function (msg){
                  console.log('#####################################################**');
                  console.log(msg);

                  //console.log('########################################################');

                  //console.log('clicked on-');
                  //console.log(msg['like']);

                  //console.log('past like status-');
                  //console.log(likeStatus);
                  console.log('*******************************************');
                  //event.target.parentNode.parentNode.parentNode.childNodes[1].childNodes[1].innerHTML = '<i class="fa fa-thumbs-o-up fa-lg" aria-hidden="true" id="notliked">'+'</i>'; //1 is like
                  console.log('*******************************************');
                  /**/
                  if(msg['like'] == 1){
                      event.target.parentNode.parentNode.parentNode.childNodes[3].childNodes[1].innerHTML = '<i class="fa fa-thumbs-o-down fa-lg" aria-hidden="true" id="notunliked">'+'</i>'; //1 is like

                      //event.target.parentNode.parentNode.parentNode.childNodes[3].childNodes[1].innerHTML = '<i class="fa fa-thumbs-o-up fa-lg" aria-hidden="true" id="notliked">'+'</i>';
                      if(likeStatus == 'notliked'){
                          //likeStatus = 'liked';
                          event.target.parentNode.innerHTML = '<i class="fa fa-thumbs-up fa-lg like" aria-hidden="true" id="liked">'+'</i>';
                      }
                      else if(likeStatus == 'liked'){
                          //likeStatus = 'notliked';
                          event.target.parentNode.innerHTML = '<i class="fa fa-thumbs-o-up fa-lg" aria-hidden="true" id="notliked">'+'</i>';
                      }
                  }
                  else if(msg['like'] == 0){ //If unlike button is pressed
                      //event.target.parentNode.previousElementSibling.innerHTML = '<i class="fa fa-thumbs-o-up fa-lg" aria-hidden="true" id="notliked">'+'</i>';
                      //event.target.parentNode.parentNode.parentNode.childNodes[1].childNodes[1].innerHTML = '<i class="fa fa-thumbs-o-down fa-lg" aria-hidden="true" id="notliked">'+'</i>';

                      event.target.parentNode.parentNode.parentNode.childNodes[1].childNodes[1].innerHTML = '<i class="fa fa-thumbs-o-up fa-lg" aria-hidden="true" id="notliked">'+'</i>'; //1 is like

                      if(likeStatus == 'notunliked'){
                          event.target.parentNode.innerHTML = '<i class="fa fa-thumbs-down fa-lg" aria-hidden="true" id="unliked">'+'</i>';
                          //console.log(event.target.previousElementSibling.innerHTML);
                          //event.target.parentNode.innerHTML = '<i class="fa fa-thumbs-down fa-lg" aria-hidden="true" id="unliked">'+'</i>';
                          //unlikeStatus = 1;
                      }
                      else if(likeStatus == 'unliked'){
                          event.target.parentNode.innerHTML = '<i class="fa fa-thumbs-o-down fa-lg" aria-hidden="true" id="notunliked">'+'</i>';
                      }
                  }
                  console.log("=====================================================");


                  /*
                  //repost the two status
                  $.ajax({
                      type: 'POST',
                      url: urlLite,
                      data: "likeStatus=" + likeStatus + "&unlikeStatus=" + unlikeStatus + "&_token=" + token,
                 

                  success:function(msg){
                          console.log(msg);
                  }

                  });

                  */
              }
      });
    });
});







