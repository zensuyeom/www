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

//faq열리고닫힘
var article=$('.article')
$('.article a').click(function(){
    var myArticle=$(this).parents('.article');
    
    if(myArticle.hasClass('hide')){
        article.find('.answer').slideUp(100);
        article.removeClass('show').addClass('hide');
        myArticle.removeClass('hide').addClass('show');
        myArticle.find('.answer').slideDown(100);
        myArticle.find('span').text('▲');
        $('.hide').find('span').text('▼');
    }else{
        myArticle.removeClass('show').addClass('hide');
        myArticle.find('.answer').slideUp(100);
        myArticle.find('span').text('▼');
    }
});
