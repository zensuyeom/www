//top button
var th=$('#headerArea').height()+$('.visual').height();

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