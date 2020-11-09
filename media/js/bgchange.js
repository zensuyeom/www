var screenSize=$(window).width();
var screenHeight=$(window).height();
var current=false;
$("#content").css('margin-top',screenHeight);

if(screenSize>768){
    $('.imgBG').show();
    $('.subBG').hide();
}
if(screenSize<=768){
    $('.imgBG').hide();
    $('.subBG').show();
}
$(window).resize(function(){
      screenSize = $(window).width(); 
      screenHeight = $(window).height();
    
    $("#content").css('margin-top',screenHeight);
    
    if( screenSize > 768 && current==false){
      	
        $(".imgBG").show();
        $(".subBG").hide();
        current=true;
      }
      if(screenSize <= 768){
        $(".imgBG").hide();
        $(".subBG").show();
        current=false;
      }
});