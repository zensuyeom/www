//네비게이션
$('.dropdownmenu').hover(function(){
    $('.dropdownmenu .menu ul').fadeIn('normal',function(){
        $(this).stop();});
    $('#headerArea').animate({height:286},'fast').clearQueue();
},function(){
    $('.dropdownmenu .menu ul').fadeOut('fast');
    $('#headerArea').animate({height:131},'fast').clearQueue();
})

//tab키
$('.depth1').on('focus',function(){
    $('.dropdownmenu .menu ul').slideDown('fast');
    $('#headerArea').animate({height:286},'fast').clearQueue();
    })
$('.dropdownmenu .menu li:last').find('a').on('blur',function(){
    $('.dropdownmenu .menu ul').slideUp('fast');
    $('#headerArea').animate({height:131},'fast').clearQueue();
})
