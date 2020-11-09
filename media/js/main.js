//cast 높이맞추기
var boxHeight=$('.cast .cast_box li img').height();
$('.cast .cast_box li:eq(1)').css('height',boxHeight);
$(window).resize(function(){
    boxHeight=$('.cast .cast_box li img').height();
    $('.cast .cast_box li:eq(1)').css('height',boxHeight);
});

//cast 이동

$('.cast .cast_list li').first().show().siblings().hide();
var count=0;

$('.cast .right_btn').click(function(){
    count++;
    if(count%5==1){
        $('.cast .cast_list li:eq(1)').fadeIn('slow').siblings().hide();
    }else if(count%5==2){
        $('.cast .cast_list li:eq(2)').fadeIn('slow').siblings().hide();
    }else if(count%5==3){
        $('.cast .cast_list li:eq(3)').fadeIn('slow').siblings().hide();
    }else if(count%5==4){
        $('.cast .cast_list li:eq(4)').fadeIn('slow').siblings().hide();
    }else if(count%5==0){
        $('.cast .cast_list li:eq(0)').fadeIn('slow').siblings().hide();
    }if(count%5==-1){
        $('.cast .cast_list li:eq(4)').fadeIn('slow').siblings().hide();
    }else if(count%5==-2){
        $('.cast .cast_list li:eq(3)').fadeIn('slow').siblings().hide();
    }else if(count%5==-3){
        $('.cast .cast_list li:eq(2)').fadeIn('slow').siblings().hide();
    }else if(count%5==-4){
        $('.cast .cast_list li:eq(1)').fadeIn('slow').siblings().hide();
    }
});
    
$('.cast .left_btn').click(function(){
    count--;
    if(count%5==-1){
        $('.cast .cast_list li:eq(4)').fadeIn('slow').siblings().hide();
    }else if(count%5==-2){
        $('.cast .cast_list li:eq(3)').fadeIn('slow').siblings().hide();
    }else if(count%5==-3){
        $('.cast .cast_list li:eq(2)').fadeIn('slow').siblings().hide();
    }else if(count%5==-4){
        $('.cast .cast_list li:eq(1)').fadeIn('slow').siblings().hide();
    }else if(count%5==0){
        $('.cast .cast_list li:eq(0)').fadeIn('slow').siblings().hide();
    }else if(count%5==1){
        $('.cast .cast_list li:eq(1)').fadeIn('slow').siblings().hide();
    }else if(count%5==2){
        $('.cast .cast_list li:eq(2)').fadeIn('slow').siblings().hide();
    }else if(count%5==3){
        $('.cast .cast_list li:eq(3)').fadeIn('slow').siblings().hide();
    }else if(count%5==4){
        $('.cast .cast_list li:eq(4)').fadeIn('slow').siblings().hide();
    }
});    



//photo hover
$('.photo .photo_box a').hover(function(){
    $(this).children('dl').stop().fadeIn('slow');
},function(){
     $(this).children('dl').stop().fadeOut('fast');
})

//trailer hover
$('.trailer a').mouseenter(function(){
    var num=$(this).parent().index()+1
    $(this).children('img').attr('src','images/trailer'+num+'.jpg')
});
$('.trailer a').mouseleave(function(){
    var num=$(this).parent().index()+1
    $(this).children('img').attr('src','images/trailer'+num+'off.jpg')
});

//top button
var th=$('#headerArea').height()+$('.about').height();

$('.top_button').hide();

$(window).on('scroll',function(){
    var scroll=$(window).scrollTop();

    if(scroll>th){
        $('.top_button').fadeIn('slow');
    }else{
        $('.top_button').fadeOut('fast');
    }
});

$('.top_button').click(function(){
    $('html,body').stop().animate({'scrollTop':0},1000);
});

//nav 열림닫힘

$('#headerArea .headerInner .btn').toggle(function(){
    $('#gnb ul').slideDown('slow');
},function(){
        $('#gnb ul').slideUp('fast');
})
