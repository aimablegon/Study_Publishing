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
    
        /*bg*/
        .gallery_wrapper
        {
            background-position: center top;
            background-color: #f4f4f4;
        }
    </style>
    <script type="text/javascript">
    var imsiH = null;
    var imsiW = null;
    var idx = null;
    $(function(){
        $('.gallery_wrapper').fadeIn(1000);

        $.getJSON("../lib/json/gallery.json", function(e){
            $.each(e.gallery, function(i, field){
                //갯수 조절
                if(i<30){
                    $('.photos ul').append('<li><a href="'+field.large+'.jpg"><img src="../lib/gallery/'+field.small+'.jpg"></a></li>')
                }
            });
            // 네비버튼생성
            for(i=0; i < parseInt(Number(e.gallery.length) / 30) + 1; i++){
                $('.list-nav ul').append('<li><a href="../gallery/gallery'+(parseInt(Number(e.gallery.length) / 30) - (i - 1))+'.php" class="list-nav-off">'+i+'</a></li>')
            }
            //page변수 필요 ->eq안에
            $('.list-nav ul li').eq(0).children('a').removeClass('list-nav-off').addClass('list-nav-on');
        });
        
// 가운데 정렬 함수
function popRe(W,H,target,callback) {
    var ratio = H / W;
    target.css({"height": imsiH});
    target.css({"width": imsiW});
    
    if($(window).width() < target.width() + 30){
        target.css({"width": $(window).width() - 30,"height": ($(window).width() - 20) * ratio});
    }
    if($(window).height() < target.height() + 30){
        target.css({"height": $(window).height() - 30});
    }
    
    target.animate({
        'marginLeft': -target.width() / 2,
        'marginTop': -target.height() / 2
    },1,function(){
        callback();    
        console.log('before');
    });
    
    
}
//버튼 클릭 이벤트 함수
function popMove(V){
    $('.pop_box').addClass('fir');
    var adr = $('.photos li').eq(idx + V).children('a').attr('href')
    var img = new Image();
    var insert = '<div class="pop_box sec" style="display:none">';
        insert += '<div class="shadow">';
        insert += '<div class="pop_content">';
        insert += '<img src="../lib/gallery/'+adr+'">';
        insert += '<div class="close_btn"></div><div class="prev_box"><span class="prev_btn"></span></div><div class="next_box"><span class="next_btn"></span></div>';
        insert += '</div></div></div>';
        
    
    var go = null;
    var ready = null;
    
    if(V == 1){
        go = '35%';
        ready = '65%';
    }else {
        go = '65%';
        ready = '35%';
    }
    
    idx += V;
    img.src = '../lib/gallery/'+adr;
    img.onload = function() {
        imsiW = this.width;
        imsiH = this.height;
    
        $('.blind').append(insert).find('.sec').animate({
            left: ready,
            opacity:0
        },1,function(){
            
            popRe(imsiW,imsiH,$('.sec'),function(){
                $('.sec').css('display','inline-block');
                $('.sec').animate({
                    left: '50%',
                    opacity:1,
                }).removeClass('sec').addClass('fir');
            });
            
            $('.fir').animate({
                opacity:0,
                left: go
            },500,function(){
                $(this).remove();
            })
            
        })
        
    }
}
        //팝업 생성
        $(document).on('click','.photos li a',function(){
            imsiH = null;
            imsiW = null;
            idx = $(this).parent('li').index();
            
            var adr = $(this).attr('href');
            var insert = '';
            
            insert += '<div class="blind">';
            insert += '<div class="pop_box">';
            insert += '<div class="shadow">';
            insert += '<div class="pop_content">';
            insert += '<img src="../lib/gallery/'+adr+'">';
            insert += '<div class="close_btn"></div><div class="prev_box"><span class="prev_btn"></span></div><div class="next_box"><span class="next_btn"></span></div>';
            insert += '</div></div></div></div>';
            $('body').append(insert);
            
            var img = new Image();
            img.src = '../lib/gallery/'+adr;
            img.onload = function() {
                imsiW = this.width;
                imsiH = this.height;
                
                popRe(imsiW,imsiH,$('.pop_box'),function(){});
                
                $('.blind').fadeIn(200);
            }
           
            return false;
        });
        //팝업 닫기
        $(document).on('click','.blind',function(){
            $('.blind').fadeOut(function(){
                $('.blind').remove();
            });
            imsiH = null;
            imsiW = null;
            ratio = null;
        });
        //리사이즈 이벤트, 팝업 가운데 정렬
        $(window).resize(function(){
            popRe(imsiW,imsiH,$('.pop_box'));
        });
        //PREV NEXT 버튼 클릭
        $(document).on('click','.next_box',function(){
            
           if(idx == 29) idx = -1;
            popMove(1);
            return false;
        })
        $(document).on('click','.prev_box',function(){
            
            if(idx == 0) idx = 30;
            popMove(-1);
            return false;
        })
        
    });
    </script>
</head>
    
<body> 
    <?php include("header.php"); ?>
    <div class="gallery_wrapper"style="display:none;">
        <section>
            
            <div class="sect-title">NOTICE</div>
            
            <div class="sect-main">
                <div class="full_box">
                    <div class="photos">
                        <ul>
                            
                        </ul>
                    </div>
                
                </div>
                <div class="list-nav">
                    <ul>
                    </ul>
                </div>
            </div>
        </section>
    </div>
    
    <?php include("../html/footer.php"); ?>
</body>
</html>