//top move
$('.top_button').click(function(){
    $('html,body').stop().animate({'scrollTop':0},1000);
});

//nav
var count=0;

$('.btn').click(function(){
    var documentHeight=$(document).height();
    
    count++;
    
    if(count%2==1){
        $('.box').css('height',documentHeight);
        $('#gnb').css('height',documentHeight);

        $('#gnb').stop().animate({right:0,opacity:1}, 'slow');
        $('.box').show();

        $(this).removeClass('off').addClass('on');
    }else{
        $('#gnb').stop().animate({right:'-100%', opacity:0},'fast');
        $('.box').hide();
        $(this).addClass('off').removeClass('on');
    }
})
$('.box').click(function(){
    count=0;
    $('#gnb').stop().animate({right:'-100%', opacity:0},'fast');
    $('.box').hide();
    $('.btn').removeClass('on').addClass('off');
})

//2depth
var onoff=[false,false,false,false]
var arrcount=onoff.length;

$('.depth1 a').click(function(){
    var ind=$(this).parents('.depth1').index();
    
    if(onoff[ind]==false){
        $(this).parent().next().slideDown('slow');
        
        $(this).parents('.depth1').siblings().children('ul').slideUp('fast');
        
        for(var i=0; i<arrcount; i++) onoff[i]=false;
        
        onoff[ind]=true;
        
        $('.depth1 a span').text('▼')
        $(this).children().text('▲');
    }else{
        $(this).parent().next().slideUp('fast');
        onoff[ind]=false;
        $(this).children().text('▼')
    }
})