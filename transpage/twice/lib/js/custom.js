$(document).ready(function(){


// 메뉴 클릭 이벤트
    $('.nav button').click(function(){

        if(!$('.nav ul').is('.open')){
            $('.nav ul').addClass('open');
            $('.nav ul').css({'display':'block'});
        }else{
            $('.nav ul').removeClass('open');
            $('.nav ul').css({'display':'none'});
        }
    })


// 반응형 보정
$(window).resize(function(){
    if($(window).width() >= 777 ){
        $('.nav ul').css({'display':'block'});
    }else{
        if($('.nav ul').is('.open')){
            $('.nav ul').css({'display':'block'});
        }else{
            $('.nav ul').css({'display':'none'});
        }
    }

});

// 네비버튼 이벤트
$(document).on('click','.list-nav li a',function(){
    $(this).removeClass('list-nav-on a').addClass('list-nav-on').parent('li').siblings().find('a').removeClass('list-nav-on').addClass('list-nav-off');
});
$(document).on('mouseenter','.list-nav li a',function(){
    if ( $(this).attr('class') === 'list-nav-off') $(this).removeClass('list-nav-off').addClass('list-nav-on a');
    
}).on('mouseleave','.list-nav li a',function(){
    if ( $(this).attr('class') === 'list-nav-on a') $(this).removeClass('list-nav-on a').addClass('list-nav-off');
});


});
