

/*
$('.row-posts').find('.posts').find('.expressions').find('.a').eq(1).on('click',function(){
    $("#edit-modal").modal();
});
*/



$(document).ready(function(){
    $('.posts').find('.expressions').find('#edit').on('click',function(){
        //console.log('Clicked on edittttt');
        $("#edit-modal").modal();
    });
});

