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
    <link rel="stylesheet" href="../lib/css/font.css" type="text/css" />
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
        .notice_wrapper
        {
            background-position: center top;
            background-color: #f4f4f4;
        }
    </style>
    <script type="text/javascript">
    $(function(){
        
        var idx = window.location.href.indexOf('.php');
        idx = window.location.href.slice(idx - 2,idx);
        
        $.getJSON("../lib/json/notice.json", function(e){
            $.each(e.notice, function(i, field){
                //i를 바꾸면 윗 화면으로 나타남
               if(i == 0){
                   $('.title_num').html(field.number);
                   $('.title_title').html(field.title);
                   $('.title_date').html(field.date);
                   $('.title_content td').html(field.content);
               }
               //개시판 한 페이지의 개시물의 갯수
               if(i < 10){
                   var insert = '';
                   insert += '<tr>'
                   insert += '<td class="under_num">'+field.number+'</td>'
                   insert += '<td class="under_content"><a class="under_cover" href="../notice/notice'+field.number+'.php">'+field.title+'</a></td>'
                   insert += '<td class="under_date">'+field.date+'</td>'
                   insert += '</tr>'
                   $('.bbs tbody').append(insert);
               }
            });
        });
        // 네비버튼
        $(document).on('click','.list-nav li a',function(){
            $(this).removeClass('list-nav-off').addClass('list-nav-on').parent('li').siblings().find('a').removeClass('list-nav-on').addClass('list-nav-off');
            var num = $(this).parent('li').index();
            
            $('.bbs tbody tr').remove();
            $.getJSON("../lib/json/notice.json", function(e){
                $.each(e.notice, function(i, field){
                    
                    if(i >= (10 * num) && i < 10 * (num + 1) ){
                        console.log(i)
                        var insert = '';
                        insert += '<tr>'
                        insert += '<td class="under_num">'+field.number+'</td>'
                        insert += '<td class="under_content"><a class="under_cover" href="notice'+field.number+'.php">'+field.title+'</a></td>'
                        insert += '<td class="under_date">'+field.date+'</td>'
                        insert += '</tr>'
                           
                        $('.bbs tbody').append(insert);
                    }
                });
            });
            return false;
        });
    });
    </script>
</head>
    
<body> 
    <?php include("header.php"); ?>
    <div class="notice_wrapper">
        <section>
            
            <div class="sect-title">NOTICE</div>
            
            <div class="sect-main">
                <div class="full_box">
                    <div class="notice-wrapper">
                        <div class="bbs_container">    
                            <div class="bbs_content">
                                <table class="noti_top">
                                    <colgroup>
                                        <col width="4%"></col>
                                        <col width="88%"></col>
                                        <col width="8%"></col>
                                    </colgroup>
                                    <thead>
                                        <tr>
                                            <td class="title_num">29</td>
                                            <td class="title_title">제목</td>
                                            <td class="title_date">날짜</td>
                                        </tr>
                                    </thead>
                                    <tbody class="title_content">
                                        <tr>
                                            <td colspan="3"></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="bbs">
                                    <table>
                                        <colgroup>
                                            <col width="4%"></col>
                                            <col width="88%"></col>
                                            <col width="8%"></col>
                                        </colgroup>
                                        <tbody>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="list-nav">
                    <ul>
                        <li><a href="#" class="list-nav-on">1</a></li>
                        <li><a href="#" class="list-nav-off">2</a></li>
                        <li><a href="#" class="list-nav-off">3</a></li>
                    </ul>
                </div>
            </div>

                
        </section>
    </div>
    <?php include("footer.php"); ?>
</body>
</html>

