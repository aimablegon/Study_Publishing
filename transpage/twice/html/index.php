<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="웹 퍼블리셔 김범영의 포트폴리오 웹사이트입니다">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="BYK">
    <title>Twice</title>
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
    <!-- ===== Font ===== -->
    <link rel="stylesheet" href="../lib/css/flaticon.css" type="text/css" />
    <!-- ===== style.css ===== -->
    <link rel="stylesheet" href="../lib/css/style.css" type="text/css" />
    <!-- ===== responsice.css ===== -->
    <link rel="stylesheet" href="../lib/css/responsive.css" type="text/css" />
    <!-- ===== JQuery ===== -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- ===== custom.js ===== -->
    <script src="../lib/js/custom.js"></script>
    <script type="text/javascript">
        $(window).load(function(){
            $('.wrapper').fadeIn(500);
        })
    </script>

    <style>
        .wrapper { height:100%; background-repeat:no-repeat; background-size:cover; }
        @media screen and (min-width:769px){
            .wrapper {background-image:url('../lib/images/main_img.jpg'); background-position:top center;}

        }
        @media screen and (max-width:769px){
            .wrapper .logo { position:relative; margin:0 auto; top:0%; transition:1s; transform:scale(0.7,0.7); }
            .wrapper {background-image:url('../lib/images/main_img2.jpg'); background-position:center center;}
        }
    </style>
</head>
<body>
    <div class="wrapper" style="display:none;">

        <?php include("header.php"); ?>

        <div class="logo"></div>

		<?php include("footer.php"); ?>
    </div>
</body>
</html>
