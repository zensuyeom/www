//비주얼 슬라이드
var timeonoff;
var imageCount=3;
var cnt=1;
var direct=1;
var position=0;
var onoff=true;

$('.btn1').css('width','36').css('background','#33a8e4');
$('.visual_text li:eq(0)').fadeIn('slow');

function moveg(){
    cnt+=direct;
    if(cnt==imageCount)direct=-1;
    if(cnt==1)direct=1;
    
    if(cnt==1){position=0;}
    else if(cnt==2){position=-2000;}
    else if(cnt==3){position=-4000;}
    
    $('.visual_text li').hide();
    $('.visual_text li:eq('+(cnt-1)+')').fadeIn('slow');
    
    $('.mbutton').css('width','24').css('background','#fff');
    $('.btn'+cnt).css('width','36').css('background','#33a8e4');
    
    $('.gallery').animate({left:position},'slow');
}

timeonoff=setInterval(moveg,4000);

$('.mbutton').click(function(event){
    var $target=$(event.target);
    clearInterval(timeonoff);
    
    $('.mbutton').css('width','24').css('background','#fff');
    
    if($target.is('.btn1')){
        position=0;
        cnt=1;
        direct=1;
    }else if($target.is('.btn2')){
        position=-2000;
        cnt=2;
    }else if($target.is('.btn3')){
        position=-4000;
        cnt=3;
        direct=-1;
    }
    $('.gallery').animate({left:position},'slow');
    $('.visual_text li').hide();
    $('.visual_text li:eq('+(cnt-1)+')').fadeIn('slow');
    
    $('.btn'+cnt).css('width','36').css('background','#33a8e4');
    
    timeonoff=setInterval(moveg,4000);
    
    if(onoff==false){
        onoff==true;
        $('.ps').css('background','url(images/stop_button.png)');
    }
});

//play/stop 버튼 클릭시 동작
$('.ps').click(function(){
    if(onoff==true){
        clearInterval(timeonoff);
        $(this).css('background','url(images/play_button.png)');
        onoff=false;
    }else{
        timeonoff=setInterval(moveg,4000);
        $(this).css('background','url(images/stop_button.png)');
        onoff=true;
    }
});
