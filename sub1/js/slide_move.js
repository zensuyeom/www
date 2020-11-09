//연혁 슬라이드 무브
$('.content_list a').click(function(){
        var value=0;
        if($(this).hasClass('link1')){
            value=$('.history h4:eq(3)').offset().top;
        }else if($(this).hasClass('link2')){
            value=2201;
            //value=$('.history h4:eq(2)').offset().top;
        }else if($(this).hasClass('link3')){
            value=1321;
            //value=$('.history h4:eq(1)').offset().top;
        }else if($(this).hasClass('link4')){
            value=963;
            //value=$('.history h4:eq(0)').offset().top;
        }
        $('html,body').stop().animate({'scrollTop':value},1000);
});