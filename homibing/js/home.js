// =============================ssam
var spot = [];


$(window).load(function(){
	
	$('.content>div').each(function(i,e){
		
		spot.push($(e).offset().top)
		
	});
	
	
	$(window).scroll(function(){
		
		var sct = $(this).scrollTop();
		
		
		$('.content>div').each(function(i,e){
			
			
			
			if(sct+$(window).height() > spot[i] && sct+$(window).height() < spot[i]+$(e).height()  && !$(e).is('.on')){
				
				$(e).addClass('on').siblings().removeClass('on');
				moveAnimation(i)
				
				
				
			}
			
			
		})
		
		
	})
	
	
	http://jsbin.com/kopuhomamo/5/edit?html,js,output
	
	function moveAnimation(caseNum){
		
		switch (caseNum) {
		
		  case 0 : console.log(caseNum); break;
		  case 1 : console.log(caseNum); break;
		  case 2 : console.log(caseNum); break;
		  case 3 : console.log(caseNum); break;
		  case 4 : console.log(caseNum); break;
		  case 5 : console.log(caseNum); break;
		  case 6 : console.log(caseNum); break;
		  case 7 : console.log(caseNum); break;
		  case 8 : console.log(caseNum); break;
		  
		}
		
	}
	
	
	
	
	
});














































// $(function(){
// 	var spot = [];
// 	var st_spot=[];
// //	var win =$(window).height();
// //    console.log(win)
//     $('.wrapper .sc_js>div').each(function(i){
//         var num = $(this).offset().top;
        
//     	spot.push(num)
// //        console.log(i)
//     })
// //    console.log(spot)
//     $('.wrapper [class^=section]').each(function(){
//     	var st_num = $(this).offset().top;
//     	st_spot.push(st_num)
//     })
    
    
    
    
    
//     var st_js = $('.wrapper .sc_js').width()
//     	$(window).trigger('scroll')
//     $(window).scroll(function(){
//         var sct = $(this).scrollTop()
// //        console.log(sct)
//         var sct_win =sct+$(window).height();
// //        console.log(sct_win)
        
        
//         $('.wrapper .sc_js>div').each(function(i){
//             var tt  = spot[i] - sct  
// ////            console.log(tt)
//             var len= spot.length;
// //            console.log(len);
//             if(sct+$(window).height() !== $(document).height() && !$(this).is('on')){
        		
//             	$(this).addClass('on').fadeTo(100,1).css({
//             		'left':'10%'
//             	}).stop().animate({
//             		'left':'0%'
//             	},1500)
            	
//         	}else if(sct+$(window).height() !== $(document).height() &&  $(this).is('.on')){
// 	            	$(this).removeClass('on').fadeTo(100,1).css({
// 	            		'left':'10%'
// 	            	}).stop().animate({
// 	            		'left':'0%'
// 	            	},1500).
	            	
        		
            	
//         		console.log('ss')
//         	}
            
            
            
            
            
            
            
            
//            
//            if(sct+$(window).height() >= spot[i] && $(this).is('.on')){
//            	
//            	$(this).removeClass('on').fadeTo(100,1).css({
//            		'left':'10%'
//            	}).stop().animate({
//            		'left':'0%'
//            	},1500)
//            	
//            	
//            	
//        	}else if(sct+$(window).height() >=spot[i] && !$(this).is('.on')){
//        		
//            	$(this).addClass('on').fadeTo(100,1).css({
//            		'left':'10%'
//            	}).stop().animate({
//            		'left':'0%'
//            	},1500)
//            	
//        	}	
//   ====================         
            
            
            
            
            
            
            
            
            
        	if(sct+$(window).height() >=spot[i] && !$(this).is('.on')){
        		
            	$(this).addClass('on').fadeTo(100,1).css({
            		'left':'10%'
            	}).stop().animate({
            		'left':'0%'
            	},1500)
            	
        	}else if(sct+$(window).height() >= spot[i] && $(this).is('.on')){
            	
            	$(this).removeClass('on').fadeTo(100,1).css({
            		'left':'10%'
            	}).stop().animate({
            		'left':'0%'
            	},1500)
            	
            	
            	
        	}	
          	
                    })
        
    })
	
})	
            	
            	
//            	
//            }else if(sct >= tt && $(this).is('.on')){
//            	
//            	$(this).removeClass('on').fadeTo(100,1).css({
//            		'left':'10%'
//            	}).animate({
//            		'left':'0%'
//            	},2000).stop()
//            }
//탑에서 시작했으니 올릴땐, 바텀을 기준으로??? 흠....
           









// 다시 올라왔을때, 애니메이트 다시 사용 가능.
//	$(window).scroll(function(){
//        var sct = $(this).scrollTop()
//        console.log(sct)
//        $('.wrapper .sc_js>div').each(function(i){
////            var tt  = spot[i] - sct  
////            console.log(tt)
//            
//        	if(sct+$(window).height() >=spot[i] && !$(this).is('.on')){
//            	
//            	$(this).addClass('on').fadeTo(200,1).css({
//            		'left':'10%'
//            	}).animate({
//            		'left':'0%'
//            	},1000)
//            }else if(sct+$(window).height() < spot[i] && $(this).is('.on')){
//            	
//            	$(this).removeClass('on')
//            }
//            
//        })
//        
//    })