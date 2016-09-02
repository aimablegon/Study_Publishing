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
        .schedule_wrapper,body
        {
            background-position: center top;
            background-color: #f4f4f4;
        }
        section{
            margin-bottom:70px;
        }
        
    </style>
    <script type="text/javascript">
    //달력만들기
        var day = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
        var date = new Date();
        var currentYear = date.getFullYear();
            //년도를 구함
        var currentMonth = date.getMonth() + 1;
            //월을 구함. 월은 0부터 시작하므로 +1, 12월은 11을 출력
        var currentDate = date.getDate();
            //오늘 일자.
            date.setDate(1);
        var currentDay = date.getDay();
            //이번달 1일의 요일은 출력. 0은 일요일 6은 토요일
        
            // id에 달력 집어 넣음, date는 현재 년 월 일 ex.2015-3-27 
        function kCalendar(id, date) {
            var kCalendar = document.getElementById(id);
            
            if( typeof( date ) !== 'undefined' ) {
                date = date.split('-');
                date[1] = date[1] - 1;
                date = new Date(date[0], date[1], date[2]);
                
                currentYear = date.getFullYear();
                    //년도를 구함
                currentMonth = date.getMonth() + 1;
                    //월을 구함. 월은 0부터 시작하므로 +1, 12월은 11을 출력
                currentDate = date.getDate();
                    //오늘 일자.
                    date.setDate(1);
                currentDay = date.getDay();
                //이번달 1일의 요일은 출력. 0은 일요일 6은 토요일
            }
            var dateString = new Array('sun', 'mon', 'tue', 'wed', 'thu', 'fri', 'sat');
            var lastDate = new Array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
            if( (currentYear % 4 === 0 && currentYear % 100 !== 0) || currentYear % 400 === 0 )
            lastDate[1] = 29;
            //각 달의 마지막 일을 계산, 윤년의 경우 년도가 4의 배수이고 100의 배수가 아닐 때 혹은 400의 배수일 때 2월달이 29일 임.
            
            var currentLastDate = lastDate[currentMonth-1];
            var week = Math.ceil( ( currentDay + currentLastDate ) / 7 );
            //총 몇 주인지 구함.
            
            var calendar = '';
           
            $('.yearMonth h3').text(currentYear+'.'+currentMonth);
            
            var dateNum = 1 - currentDay;
            for(var i = 0; i < week; i++) {
                calendar += '<tr>';
                    for(var j = 0; j < 7; j++, dateNum++) {
                            if( dateNum < 1 || dateNum > currentLastDate ) {
                                calendar += '<td class="' + dateString[j] + '"> </td>';
                                continue;
                            }
                        calendar += '<td class="' + dateString[j] + '">' + dateNum + '</td>';
                    }
                calendar += '</tr>';
            }
         
            kCalendar.innerHTML = calendar;
            }
    $(function(){

        //버튼 클릭 함수
        var btnClick = function(plus){
            
            $('#input').children('tr').remove();
            $('#sche-list').children('li').remove();
            
            var year, month;
            year = currentYear;
            
            if(plus == 1) {  
                if( currentMonth == 12){
                    year = currentYear + plus;
                    month = 1;
                }else month = Number(currentMonth) + plus;
            }else{
                if( currentMonth == 1){
                    year = currentYear + plus;
                    month = 12;
                }else month = Number(currentMonth) + plus;
            }
            
            kCalendar('input',year+'-'+month+'-'+currentDate);
            
            $.getJSON("../lib/json/schedule.json", function(e){
                for(var i in e.schedule){
                    if(month == e.schedule[i].month && currentYear  == e.schedule[i].year){
                        
                        for(var j in $('.cal td').length){
                            if(e.schedule[i].date == $('.cal td').eq(j).text() ){
                                console.log($('.cal td').eq(j).text())
                            }
                        }
                        var insert ='<li><strong>'+e.schedule[i].date+' '+day[e.schedule[i].day]+'</strong><p class="sche-text"><img style="vertical-align:middle;" src="../lib/images/sch_icon_'+e.schedule[i].class+'.gif">'+e.schedule[i].body+'</p></li>';
                        $('#sche-list').append(insert);
                    }
                    
                }
            });
        }
        //달력생성
        btnClick(0);
        
        //이전달 click
        $('.btn.pm').click(function(){
            btnClick(-1);
        })
        //다음달 click
        $('.btn.nm').click(function(){
            btnClick(1);
        })
       
    })
        

    </script>
</head>
    
<body> 
    <?php include("header.php"); ?>
    <div class="schedule_wrapper">
        <section>
            
            <div class="sect-title">NOTICE</div>
                <div class="sect-main">
                    <div class="full_box">
                        <div class="sche_wrap">

                            <div class="yearMonth">
                                <h3>2016.9</h3>
                                <span class="btn pm"><a ><img src="../lib/images/btn_paging_prev.gif" alt="이전달"></a></span>
                                <span class="btn nm"><a ><img src="../lib/images/btn_paging_next.gif" alt="다음달"></a></span>
                            </div>
                    
                            <table class="cal" cellspacing="0">
                                <colgroup>
                                    <col width="50">
                                    <col width="50">
                                    <col width="50">
                                    <col width="50">
                                    <col width="50">
                                    <col width="50">
                                    <col width="50">
                                </colgroup>
                                <thead>
                                    <tr>
                                    <th scope="col" class="sun">SUN</th>
                                    <th scope="col">MON</th>
                                    <th scope="col">TUE</th>
                                    <th scope="col">WED</th>
                                    <th scope="col">THU</th>
                                    <th scope="col">FRI</th>
                                    <th scope="col">SAT</th>
                                    </tr>
                                </thead>
                                <tbody id="input">	
                                    
                                    
                                    
                                </tbody>
                            </table>
                            
                            <div id="sche-list">
                                <ul>
                                </ul>
                            </div>
                            <div class="sche_icon_info">
                                <ul>
                                    <li><span><img src="../lib/images/sch_icon_t.gif" alt="TV"></span><p>TV</p></li>
                                    <li><span><img src="../lib/images/sch_icon_m.gif" alt="Magazine"></span><p>Magazine</p></li>
                                    <li><span><img src="../lib/images/sch_icon_r.gif" alt="Radio"></span><p>Radio</p></li>
                                    <li><span><img src="../lib/images/sch_icon_c.gif" alt="Concert"></span><p>Concert</p></li>
                                    <li><span><img src="../lib/images/sch_icon_e.gif" alt="ETC"></span><p>ETC</p></li>
                                </ul>
                            </div>
                            
                        </div>
                    </div>
                    <div class="clear_fix"></div>
                </div>
            
        </section>
    </div>
    <?php include("footer.php"); ?>
</body>
</html>

