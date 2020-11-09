//자주하는질문 tab
var cnt=2;
$('.content_area .faq .content_list').show();
$('.content_area .faq .tab').addClass('on');

$('.content_area .tab').click(function(){
    var index=0;
    index=$(this).parents('section').index();
    
    $('.content_area .content_list').hide();
    $(this).parent().next().show();
    
    for(var i=1;i<=cnt;i++){
        $('.tab'+i).removeClass('on');
    }
    $(this).addClass('on');
})

//depth_tab
var depth=3;
$('.faq1 .depth_contlist').show();
$('.faq1 .depth_tab').addClass('on_depth_tab')

$('.faq .depth_tab').click(function(){
    var index=0;
    index=$(this).parent('section').index();
    
    $('.faq .depth_contlist').hide();
    $(this).parent().next().show();
    
    for(var j=1;j<=depth;j++){
        $('.depth_tab'+j).removeClass('on_depth_tab');
    }
    $(this).addClass('on_depth_tab')
})

//qna 열리고 닫힘
var article=$('.faq .article');

$('.faq .article a').click(function(){
    var myArticle=$(this).parents('.article');
    
    if(myArticle.hasClass('hide')){
        article.find('.answer').slideUp(100);
        article.removeClass('show').addClass('hide');
        myArticle.removeClass('hide').addClass('show');
        myArticle.find('.answer').slideDown(100);
        myArticle.find('span').text('▲');
        $('.faq .hide').find('span').text('▼');
    }else{
        myArticle.removeClass('show').addClass('hide');
        myArticle.find('.answer').slideUp(100);
        myArticle.find('span').text('▼');
    }
})