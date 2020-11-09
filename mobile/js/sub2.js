//스와이퍼
var swiper=new Swiper('.swiper-container',{
    autoHeight:true,
    speed:500
});

swiper.on('slideChange',function(){
    $('.tab_menu .active').removeClass('active');
        $('.tab_menu a').eq(swiper.activeIndex).addClass('active');
});

$('.tab_menu a').on('touchstart mousedown', function(e){
    e.preventDefault();
    $('.tab_menu .active').removeClass('active');
    $(this).addClass('active');
    
    swiper.slideTo($('.tab_menu a').index(this));
});

$('.tab_menu a').click(function(e) {
    e.preventDefault();			
});
//stick menu
var h1=$('.content_top').offset().top-100;

$(window).on('scroll',function(){
    var scroll=$(window).scrollTop();
    
    if(scroll>h1){
        $('.tab_menu').addClass('nav_on');
        $('#headerArea').hide();
    }else{
        $('.tab_menu').removeClass('nav_on');
        $('#headerArea').show();
    }
});