
//A. Hover Menu 문제 
$(function(){
    
    $('.nav-menu ul li').mouseenter(function(){
        $(this).css({
        'background-color':'#BBB'
        }).children('a').css('color','#FFF')
        // console.log('aa')
    }).mouseleave(function(){
        $(this).css({
        'background-color':'#CCC'
        }).children('a').css('color','#000')
    })
    
})



//B. ScrollMove Menu 문제
$(function(){
    var spot =[];
    $('.content section').each(function(){
         spot.push($(this).offset().top);
        //  console.log(spot);
    })
    
    $('.nav-menu ul li a').click(function(){
        // console.log('bb')
        var idx = $(this).parent().index();
        
        $('body,html').animate({
            scrollTop:spot[idx]
        })
       return false
    })
   
})   
   
   
   
// C. Slide Banner  문제
$(function(){
    var idx = 0;
    var slideWidth = $('.slidebanner').width();
    var sbli =$('.slidebanner ul li')
    var ran = Math.floor(Math.random() * sbli.length)
    // console.log(ran) 
    
    sbli.eq(ran).addClass('on').siblings().removeClass('on')
    sbli.eq(ran).children('img').css('display','block')
    $('.slidebanner .next').click(function(){
        sbli.eq(ran).removeClass('on').children('img').animate({
            'left':-slideWidth
        }).parent().next().addClass('on').children('img').css({
            'display':'block',
            'left':slideWidth
        }).stop().animate({
            'left':0
        })
        
        ran ++
        
        if(ran == sbli.length){
            ran = 0 
            sbli.eq(ran).children('img').css({
                'display':'block',
                'left':slideWidth
            }).stop().animate({
                'left':0
            }).parent().addClass('on').siblings().removeClass('on')
        }
    })
    
    $('.slidebanner .prev').click(function(){
        sbli.eq(ran).removeClass('on').children('img').animate({
            'left':slideWidth
        }).parent().prev().addClass('on').children('img').css({
            'display':'block',
            'left':-slideWidth
        }).stop().animate({
            'left':0
        })
        
        ran --
        
        if(ran < 0){
            ran = sbli.length-1
            sbli.eq(ran).children('img').css({
                'display':'block',
                'left':-slideWidth
            }).stop().animate({
                'left':0
            }).parent().addClass('on').siblings().removeClass('on')
        }
    })
    
    var setIn =setInterval(function(){
          
        $('.slidebanner .next').click()
        },4500)
    
    $('.slidebanner ul li').mouseenter(function(){
        clearInterval(setIn)
    }).mouseleave(function(){
        setIn =setInterval(function(){
             $('.slidebanner .next').click()
        },4500)
    })
    
    
    $('.slidebanner ul li a').click(function(){
        var idx_a = $(this).parent().index();
        var idx_on = $('.slidebanner ul li.on').index();
        console.log(idx_a,idx_on)
        
        if(idx_a > idx_on){
            sbli.eq(idx_a).addClass('on').children('img').css({
                'display':'block',
                'left':slideWidth
            }).animate({
                'left':0
            })
            sbli.eq(idx_on).removeClass('on').children('img').animate({
                'left':-slideWidth
            })
        }else if(idx_a < idx_on){
             sbli.eq(idx_a).addClass('on').children('img').css({
                'display':'block',
                'left':-slideWidth
            }).animate({
                'left':0
            })
            sbli.eq(idx_on).removeClass('on').children('img').animate({
                'left':slideWidth
            })
        }
        return false
    })
    
   
    
})


// D. Fade Banner 문제
$(function(){
    var idx = 0
    var liLen = $('.fadebanner ul li').length
    var li = $('.fadebanner ul li')
    // console.log(idx,liLen)
    
    function fade(){
         idx++
        $('.fadebanner ul li.on img').stop().fadeOut(1000).parent().removeClass('on').next().addClass('on').children('img').fadeIn(1000)
        //   console.log(idx,liLen)
         
        if(idx >= liLen){
            idx=0
            li.eq(0).addClass('on').children('img').fadeIn(1000)
            // console.log(idx,liLen)
        }
    }
        
   var fadeSet = setInterval(function(){
         fade()
    }, 4800)
    
    li.mouseenter(function(){
        clearInterval(fadeSet)
    }).mouseleave(function(){
        fadeSet = setInterval(function(){
            fade()
        }, 4800)
                
    })
    
    
    var fadeWidth = $('.fadebanner').width();
    
    $('.fadebanner ul li a').click(function(){
        var idx_a = $(this).parent().index();
        var idx_on = $('.fadebanner ul li.on').index();
        console.log(idx_a,idx_on)
        
        if(idx_a > idx_on){
            li.eq(idx_on).removeClass('on').children('img').fadeOut(1000)
            li.eq(idx_a).addClass('on').children('img').fadeIn(1000)
           
        }else if(idx_a < idx_on){
            li.eq(idx_a).addClass('on').children('img').fadeIn(1000)
            li.eq(idx_on).removeClass('on').children('img').fadeOut(1000)
        }
        
        return false
    })
})


// E. SNS Move List Gellay 문제

$(function(){
    
    $('.movie-view ul li a').click(function(){
        var href = $(this).attr('href');
        var local = 'https://www.youtube.com/embed/'+href+'?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allowfullscreen';
        
        $('.movie-view .view iframe').attr('src',local);
        
        
        $(this).children('img').fadeTo(500,0.5).parent().parent().siblings().find('img').fadeTo(500,1)
       
        
        
        return false 
    })
})


// F. Wing banner 문제
$(function(){
    
})

// G. Layout Popup
$(function(){
    $('.btngroup button').click(function(){
        var tag = "";
        tag +='<div class="blind">';
        tag += '</div>';
        $('body .content').prepend(tag)
        
        $('.blind').fadeTo(1000,0.5)
    })
})




// ======================================================================
// // A. Hover Menu
// $(function(){
//     $('header div nav ul li').mouseenter(function(){
//         $(this).css('background-color','#AAA').children().css('color','#FFF')
//         return false
//         // console.log('aa')
//     }).mouseleave(function(){
//         $(this).css('background-color','#CCC').children().css('color','#000')
//         return false
//     })
// })


// // B. ScrollMove Menu
// $(function(){
//     var pot = []
//     $('div section').each(function(){
//         pot.push($(this).offset().top)
//         console.log(pot)
//     })
//     $('header div nav ul li a').click(function(){
//         var idx_b = $(this).parent().index()
//         // console.log(idx_b)
//         $('body,html').animate({
//             scrollTop:pot[idx_b]
//         })
//         return false
//     })
// })


// // C. Slide Banner
// $(function(){
//     var idx_c = 0;
//     var sbwid = $('.slidebanner').width();
//     var sbli = $('.slidebanner ul li')
//     var rans = Math.floor(Math.random() * sbli.length)
//     // console.log(rans)


//     sbli.eq(rans).addClass('on').siblings().removeClass('on');
//     sbli.eq(rans).children('img').css('display','block')

//     $('.slidebanner .next').click(function(){
//         sbli.eq(rans).removeClass('on').children('img').animate({
//             'left':-sbwid
//         }).parent().next().addClass('on').children('img').css({
//             'left':sbwid,
//             'display':'block'
//         }).stop().animate({
//             'left':0
//         })

//         rans ++

//         if(rans == sbli.length){
//             rans = 0
//             sbli.eq(rans).children('img').css({
//                 'left':sbwid,
//                 'display':'block'
//             }).stop().animate({
//                 'left':0
//             }).parent().addClass('on').siblings().removeClass('on')
//         }
//     })

//     $('.slidebanner .prev').click(function(){
//         sbli.eq(rans).removeClass('on').children('img').animate({
//             'left':sbwid
//         }).parent().prev().addClass('on').children('img').css({
//             'left':-sbwid,
//             'display':'block'
//         }).stop().animate({
//             'left':0
//         })

//         rans --

//         if(rans < 0){
//             rans = sbli.length-1
//             sbli.eq(rans).children('img').css({
//                 'left':-sbwid,
//                 'display':'block'
//             }).stop().animate({
//                 'left':0
//             }).parent().addClass('on').siblings().removeClass('on')
//         }
//     })

//     var jeu = setInterval(function(){
//         $('.slidebanner .next').click()
//     },4500)

//     $('.slidebanner').mouseenter(function(){
//         clearInterval(jeu)
//     }).mouseleave(function(){
//         jeu = setInterval(function(){
//             $('.slidebanner .next').click()
//         },4500)
//     })


//     $('.slidebanner ul li a').click(function(){
//         var idx_a = $(this).parent().index()
//         var idx_on = $('.slidebanner ul li.on').index()
//         if(idx_a > idx_on){
//             sbli.eq(idx_a).addClass('on').children('img').css({
//                 'left':sbwid,
//                 'display':'block'
//             }).stop().animate({
//                 'left':0
//             })
//             sbli.eq(idx_on).removeClass('on').children('img').animate({
//                 'left':-sbwid
//             })
//         }else if(idx_a < idx_on){
//             sbli.eq(idx_a).addClass('on').children('img').css({
//                 'left':-sbwid,
//                 'display':'block'
//             }).stop().animate({
//                 'left':0
//             })
//             sbli.eq(idx_on).removeClass('on').children('img').animate({
//                 'left':sbwid
//             })
//         }
//         return false
//     })
// })


// // D. Fade Banner
// $(function(){
//     var idx_d = 0;
//     var fbLen = $('.fadebanner ul li').length;
//     var fbli = $('.fadebanner ul li');
//     // console.log(idx_d,fbLen)

//     function fade(){
//          idx_d ++
//         $('.fadebanner ul li.on img').stop().fadeOut(1000).parent().removeClass('on').next().addClass('on').children('img').fadeIn(1000)
//         //   console.log(idx_d,fbLen)

//         if(idx_d >= fbLen){
//             idx_d = 0;
//             fbli.eq(0).addClass('on').children('img').fadeIn(1000)
//             // console.log(idx_d,fbLen)
//         }
//     }

//   var fadeSet = setInterval(function(){
//          fade()
//     }, 4800)

//     fbli.mouseenter(function(){
//         clearInterval(fadeSet)
//     }).mouseleave(function(){
//         fadeSet = setInterval(function(){
//             fade()
//         }, 4800)

//     })


//     var fadeWidth = $('.fadebanner').width();

//     $('.fadebanner ul li a').click(function(){
//         var idx_a = $(this).parent().index();
//         var idx_on = $('.fadebanner ul li.on').index();
//         // console.log(idx_a,idx_on)


//             fbli.eq(idx_on).removeClass('on').children('img').fadeOut(1000)
//             fbli.eq(idx_a).addClass('on').children('img').fadeIn(1000)



//         return false
//     })
// })


// // E. SNS Move List Gellay
// $(function(){
//     $('.movie-view ul li a').click(function(){
//         var href = $(this).attr('href');
//         var add = 'https://www.youtube.com/embed/'+ href +'?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allowfullscreen'
//         $('.view iframe').attr('src',add)

//         // console.log(href,add)
//         $(this).children('img').fadeTo(500,0.3).parents('li').siblings().find('img').fadeTo(500,1)
//         return false
//     })
// })


// // F. Wing banner


// // G. Layout Popup
// $(function(){
//     $('.btngroup button').click(function(){
//         var tag = "";
//         tag += '<div class="blind">'
//         tag += '</div>'
//         // console.log('gg');
//         var poTop = $('.h-type').position().top
//         var tpHei = $('.h-type').height()
//             console.log(poTop)
//         $('body .btngroup').prepend(tag);
//         $('.blind').css({
//             'top':poTop,
//             'bottom':function(){
//                 var topHei = poTop + tpHei
//                 console.log(topHei)
//                 return -topHei
//             }
//         }).fadeTo(1000, 0.3);

//         var popPlus = poTop +200
//         console.log(popPlus)
//         $(this).next('div').css({
//             'display':'block',
//             'top':0
//         }).animate({
//             'top':popPlus
//         });
//     })

//     $('.btngroup .pop').append('<button class="closebtn">X</button>')

//     $('.closebtn').css({
//         'text-decoration':'none',
//         'width':'20px',
//         'height':'20px'
//     })

//     $('.closebtn').click(function(){
//         $('.blind').fadeOut(1000,function(){
//               $(this).remove()
//           })
//         $('.pop').animate({
//             'top':0
//         })

//     })
// })
