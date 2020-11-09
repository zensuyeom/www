//공기질관리 stick menu
var h1=$('.content_top').offset().top-300;
var h2=$('.virtue').offset().top-300;
var h3=$('.product').offset().top-300;

$('.tab_menu li:eq(0)').find('a').addClass('spy');

$(window).on('scroll',function(){
    var scroll=$(window).scrollTop();
    
    if(scroll>h1){
        $('.tab_menu').addClass('nav_on');
        $('#headerArea').hide();
    }else{
        $('.tab_menu').removeClass('nav_on');
        $('#headerArea').show();
    }
    
    $('.tab_menu li').find('a').removeClass('spy');
    
    if(scroll>=0 && scroll<h3){
        $('.tab_menu li:eq(0)').find('a').addClass('spy');
    }else if(scroll>=h3){
        $('.tab_menu li:eq(1)').find('a').addClass('spy');
    }
});

$('.tab_menu a').click(function(){
    var value=0;
    
    if($(this).hasClass('link1')){
        value=h2;
    }else if($(this).hasClass('link2')){
        value=h3;
    }
    
    $('html,body').stop().animate({'scrollTop':value},1000);
});

//dialog 띄우기


$('.detail1').click(function(){
    $('.dialog').hide();
    $('.dialog1').css('background','#fff').fadeIn();
    $('.box').show();
});
$('.detail2').click(function(){
    $('.dialog').hide();
    $('.dialog2').css('background','#fff').fadeIn();
    $('.box').show();
});
$('.detail3').click(function(){
    $('.dialog').hide();
    $('.dialog3').css('background','#fff').fadeIn();
    $('.box').show();
});
$('.detail4').click(function(){
    $('.dialog').hide();
    $('.dialog4').css('background','#fff').fadeIn();
    $('.box').show();
});
$('.detail5').click(function(){
    $('.dialog').hide();
    $('.dialog5').css('background','#fff').fadeIn();
    $('.box').show();
});
$('.detail6').click(function(){
    $('.dialog').hide();
    $('.dialog6').css('background','#fff').fadeIn();
    $('.box').show();
});


$('.close_btn, .box').click(function(){
    $('.dialog').fadeOut();
    $('.box').hide();
})



