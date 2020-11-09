$('.casting a').click(function(){
    var index=$(this).parent().index();
    
    $('.actor li').eq(index).fadeIn('slow').siblings().fadeOut('fast');
    
});

$('.music_lp').hover(function(){
    $(this).children().eq(1).css('left','60%')
},function(){
    $(this).children().eq(1).css('left','50%')
    });