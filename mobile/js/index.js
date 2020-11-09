//faq
var position=0;
var movesize=22;
var timeonoff;

function faqMove(){
    position-=movesize;
    $('.slide').stop().animate({top:position},'slow',function(){
        if(position==-110){
            $('.slide').css('top',0);
            position=0;
        }
    })
}

timeonoff=setInterval(faqMove, 3000);
$('.slide ul').after($('.slide ul').clone());
$('.slide ul').hover(function(){clearInterval(timeonoff);},function(){timeonoff= setInterval(faqMove, 3000); });

//care
var cnt=2;

$('.care div ul:eq(0)').show();
$('.care .tab1').addClass('on');
$('.care .circle1').addClass('circle_on');

$('.tab').click(function(){
    var index=0;
    index=$(this).parent().index();
    
    $('.care div ul').hide();
    $(this).parents('ul').next().children().eq(index).show();
    
    for(var i=1; i<=cnt; i++){
        $('.tab'+i).removeClass('on');
        $('.circle'+i).removeClass('circle_on');
    }
    
    $(this).addClass('on');
    $('.circle'+(index+1)).addClass('circle_on');
    $('.circle'+(index-1)).removeClass('circle_on');
})

$('.circle').click(function(){
    var index=0;
    index=$(this).index();
    
    $('.care div ul').hide();
    $(this).parent().prev().children().eq(index).show();
    
    for(var i=1; i<=cnt; i++){
        $('.tab'+i).removeClass('on');
        $('.circle'+i).removeClass('circle_on');
    }
    
    $(this).addClass('circle_on');
    $('.tab'+(index+1)).addClass('on');
})





