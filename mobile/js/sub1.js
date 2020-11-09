//스와이퍼
var swiper=new Swiper('.swiper-container',{
    autoHeight:true,
    speed:500
});

swiper.on('slideChange',function(){
    $('.tabs .active').removeClass('active');
        $('.tabs a').eq(swiper.activeIndex).addClass('active');
});

$('.tabs a').on('touchstart mousedown', function(e){
    e.preventDefault();
    $('.tabs .active').removeClass('active');
    $(this).addClass('active');
    
    swiper.slideTo($('.tabs a').index(this));
});

$('.tabs a').click(function(e) {
    e.preventDefault();			
});

//연혁 슬라이드 무브
$('.history ul a').click(function(){
    var value=0;
    if($(this).hasClass('link1')){
        value=$('.history section:eq(3)').offset().top;
    }else if($(this).hasClass('link2')){
        value=$('.history section:eq(2)').offset().top;
    }else if($(this).hasClass('link3')){
        value=$('.history section:eq(1)').offset().top;
    }else if($(this).hasClass('link4')){
        value=$('.history section:eq(0)').offset().top;
    }
    $('html,body').stop().animate({'scrollTop':value-25},1000);
})