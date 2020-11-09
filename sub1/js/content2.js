//회사소개 tab
var cnt=2;
$('.content_area .summary .content_list').show();
$('.content_area .summary .tab').addClass('on');

$('.content_area .tab').click(function(){
    var index=0;
    index=$(this).parents('section').index();
    
    $('.content_area .content_list').hide();
    $(this).parent().next().show();
    
    for(var i=1;i<=cnt;i++){
        $('.tab'+i).removeClass('on');
    }
    $(this).addClass('on');
})
