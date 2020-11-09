//cesco service 스크롤에 따른 움직임
var h1=$('.service li:eq(1)').offset().top-600;
var h2=$('.service li:eq(2)').offset().top-600;
var h=$('.service').offset().top-600;

$(window).on('scroll',function(){
    var scroll = $(window).scrollTop();
    if(scroll>=h && scroll<h1){
        $('.service li:eq(0)').addClass('box_rmove')
    }else if(scroll>=h1 && scroll<h2){
        $('.service li:eq(1)').addClass('box_lmove')
    }else if(scroll>=h2){
        $('.service li:eq(2)').addClass('box_rmove')
    }
})
//care tab
var cnt_t=3;
$('.care .content_list ul:eq(0)').show();
$('.care .tab1').addClass('on');

$('.tab').click(function(){
    var index=0;
    index=$(this).parent().index();
    
    $('.care .content_list ul').hide();
    $(this).parents('ul').next().children().eq(index).show();
    
    for(var i=1; i<=cnt_t; i++){
        $('.tab'+i).removeClass('on');
    }
    $(this).addClass('on');
})