$('.search a').toggle(function(){
    $(this).next().fadeIn('slow');
}, function(){
    $(this).next().fadeOut('fast');
});