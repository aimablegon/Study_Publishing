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
        .video_wrapper
        {
            background-position: center top;
            background-color: #f4f4f4;
        }
    </style>
    <script type="text/javascript">
    $(function(){
        $('#video-list li a').click(function(){
            var adr = $(this).attr('href');
            $('.movie iframe').attr('src',adr);
            return false;
        })
    });
    </script>
</head>
    
<body> 
    <?php include("header.php"); ?>
    <div class="video_wrapper">
        <section>
            
            <div class="sect-title">VIDEO</div>
            
            <div class="sect-main">
                
                <div class="movie">
                    <iframe src="https://www.youtube.com/embed/c7rCyll5AeY" frameborder="0" allowfullscreen></iframe>
                </div>
                
                <div id="video-list">
                    <ul>
                        <li>
                        <a href="https://www.youtube.com/embed/c7rCyll5AeY"><img src="../lib/images/mqdefault.jpg"></a>
                        <p>TWICE(트와이스) "CH... <br>
                          2016.04.25</p>
                        </li>
                        
                        <li>
                        <a href="https://www.youtube.com/embed/xe9UVM4yfhE"><img src="../lib/images/mqdefault2.jpg"></a>
                        <p>TWICE(트와이스) "CH... <br>
                          2016.04.23</p>
                        </li>
                        
                        <li>
                        <a href="https://www.youtube.com/embed/c7rCyll5AeY"><img src="../lib/images/mqdefault3.jpg"></a>
                        <p>TWICE(트와이스) "CH... <br>
                          2016.04.22</p>
                        </li>
                    </ul>
                    
                    <div class="clear"></div>
                    
                </div>
                
                <div id="list-nav">
                    <ul>
                        <li><a class="list-nav-on">1</a></li>
                        <li><a class="list-nav-off">2</a></li>
                    </ul>
                </div>
            
            </div>
        </section>
    </div>
    <?php include("footer.php"); ?>
</body>
</html>

