<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="웹 퍼블리셔 김범영의 포트폴리오 웹사이트입니다">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="BYK">
    <title>Twice</title>
    <!-- ===== Font ===== -->
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
    <link rel="stylesheet" href="../lib/css/flaticon.css" type="text/css" />
    <!-- ===== style.css ===== -->
    <link rel="stylesheet" href="../lib/css/style.css" type="text/css" />
    <!-- ===== responsice.css ===== -->
    <link rel="stylesheet" href="../lib/css/responsive.css" type="text/css" />
    <!-- ===== JQuery ===== -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- ===== custom.js ===== -->
    <script src="../lib/js/custom.js"></script>
    <style type="text/css">
        header{
            position:absolute;
            top:0;
            left:0;
            width:100%;
            z-index:99;
        }
        .profile_wrapper{
            position:fixed;
            overflow:hidden;
            width: 100%;
            height: 100%;
        }
        
    </style>
    <script type="text/javascript">
    $(function(){
        // 배경 가운데 조정 함수
        function bgCenter(){
            var winW = $(window).width();
            var winH = $(window).height();
        
            if(winW / winH >= 1.5){
        
                $('.profile_wrapper .bg').css({
                    'width':winW,
                    'height':winW / 1.5,
                    'marginTop': (winH - winW / 1.5)*0.5,
                    'marginLeft':0
                });
            }else if(winW / winH < 1.5){
                $('.profile_wrapper .bg').css({
                    'width':winH * 1.5,
                    'height':winH,
                    'marginTop':0,
                    'marginLeft': (winW - winH * 1.5)*0.5
                });
            }
        }
        var img = new Image();
        img.src = "../lib/images/tp_9.jpg"
        img.onload = function(){
            bgCenter();
            $(window).resize(function(){
                bgCenter();
            });
        }
        // 썸네일 클릭
        $('.thumb').parent('a').click(function(){
            
            var adr = $(this).children('.thumb').attr('src');
            var idx = adr.indexOf('.jpg');
            idx = adr.slice(idx - 1,idx);
            $(this).addClass('on').parents('.content').siblings().find('.on').removeClass('on');
            
            var img = new Image();
            img.src = '../lib/images/tp_'+idx+'.jpg';
            img.onload = function(){
                $('.bg').stop().fadeOut(500,function(){
                    $('.bg').attr('src','../lib/images/tp_'+idx+'.jpg');
                }).fadeIn(500);
            }
            
            
            return false;
            
        });
        // NEXT 버튼 클릭
        $('.nextImageBtn').click(function(){
            idx = $('.on').parents('.content').index()
            if(idx == $('.content').length - 1){
                $('.content').eq(0).find('a').click().addClass('on').parents('.content').siblings().find('.on').removeClass('on');
            }else $('.content').eq(idx + 1).find('a').click().addClass('on').parents('.content').siblings().find('.on').removeClass('on');
            
            return false;
        });
        // PREV 버튼 클릭
        $('.prevImageBtn').click(function(){
            idx = $('.on').parents('.content').index()
            if(idx == 0){
                $('.content').eq( $('.content').length - 1).find('a').click().addClass('on').parents('.content').siblings().find('.on').removeClass('on');
            }else $('.content').eq(idx - 1).find('a').click().addClass('on').parents('.content').siblings().find('.on').removeClass('on');
            
            return false;
        });
    });
    </script>
</head>
<body>
    <?php include("header.php"); ?>
    
    <div class="profile_wrapper">
        <img class="bg" src="../lib/images/tp_9.jpg"></img>
    </div>
    <div class="btns">
        <a class="nextImageBtn" title="next"></a>
        <a class="prevImageBtn" title="prev"></a>
    </div>
    <div id="thumbnails_wrapper">
        <div id="outer_container">
            <div class="thumbScroller" style="width: 250px;">
            	<div class="container" style="margin-left: 0px;">
                
                    <div class="content">
                        <div><a href="tp_1.jpg"><img src="../lib/images/1.jpg" class="thumb"></a></div>
                    </div>
                    
                    <div class="content">
                        <div><a href="tp_2.jpg"><img src="../lib/images/2.jpg" class="thumb"></a></div>
                    </div>
                    
                    <div class="content">
                        <div><a href="tp_3.jpg"><img src="../lib/images/3.jpg" class="thumb"></a></div>
                    </div>
                    
                    <div class="content">
                        <div><a href="tp_4.jpg"><img src="../lib/images/4.jpg" class="thumb"></a></div>
                    </div>
                    
                    <div class="content">
                        <div><a href="tp_5.jpg"><img src="../lib/images/5.jpg" class="thumb"></a></div>
                    </div>
                    
                    <div class="content">
                        <div><a href="tp_6.jpg"><img src="../lib/images/6.jpg" class="thumb"></a></div>
                    </div>
                    
                    <div class="content">
                        <div><a href="tp_7.jpg"><img src="../lib/images/7.jpg" class="thumb"></a></div>
                    </div>        

                    <div class="content">
                        <div><a href="tp_8.jpg"><img src="../lib/images/8.jpg" class="thumb"></a></div>
                    </div>           

                    <div class="content">
                        <div><a href="tp_9.jpg" class="on"><img src="../lib/images/9.jpg" class="thumb"></a></div>
                    </div>    

            	</div>
            </div>
        </div>
    </div>
</body>
</html>