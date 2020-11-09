//click down
$('.content_area .hide a').click(function(){
    var myArticle=$(this).parent();
    if(myArticle.hasClass('hide')){
        $('h4').removeClass('show').addClass('hide');
        $('.substance').slideUp(100);
        myArticle.removeClass('hide').addClass('show');
        myArticle.find('a span').text('▲');
        myArticle.next('.substance').slideDown(100);
        $('.hide').find('a span').text('▼');
    }else{
        myArticle.removeClass('show').addClass('hide');
        myArticle.next('.substance').slideUp(100);
        myArticle.find('a span').text('▼');
    }
})