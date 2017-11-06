/*
* @Author: 宏达
* @Date:   2017-10-07 18:06:02
* @Last Modified by:   宏达
* @Last Modified time: 2017-10-20 10:51:31
*/
window.onload=function(){
/*banner图*/
	let banner=document.querySelector('.banner');
	let slide=banner.querySelector('ul');
	let lis=slide.querySelectorAll('li');
	let textw=parseInt(getComputedStyle(banner,null).width);
	let button=banner.querySelector('.slide-button');
	let left=button.querySelectorAll('li')[0];
	let right=button.querySelectorAll('li')[1];
	let now=0;
	let next=0;
	let flag=true;
	// let t=setInterval(move, 2000);
    
 //    banner.onmouseover=function(){
 //    	clearInterval(t);
 //    }
 //    banner.onmouseout=function(){
 //    	t=setInterval(move, 2000);
 //    }
	// function move(){
 //        next++;
 //        if(next==lis.length){
 //        	next=0;
 //        }
 //        lis[next].style.left = textw+'px';
 //        animate(lis[now],{left:-textw});
 //        animate(lis[next],{left:0},function(){
 //            flag=true;
 //        });
 //        now=next;
	// }
	// function moveL(){
 //        next--;
 //        if(next<0){
 //        	next=lis.length-1;
 //        }
 //        lis[next].style.left = -textw+'px';
 //        animate(lis[now],{left:textw});
 //        animate(lis[next],{left:0},function(){
 //            flag=true;
 //        });
 //        now=next;
	// }
	// left.onclick=function(){
	// 	if (!flag) {
 //            return;
 //        }
	// 	moveL();
	// 	flag=false;
	// }
	// right.onclick=function(){
	// 	if (!flag) {
 //            return;
 //        }
	// 	move();
	// 	flag=false;
	// }
    $(function() {
                $(banner).mouseenter(function() {
                    $('.left').css('opacity','1');
                    $('.right').css('opacity','1');
                });
                $(banner).mouseleave(function() {
                    $('.left').css('opacity','0');
                    $('.right').css('opacity','0');
                });
                var n = 0;
                $('.right').click(function() {
                    clearInterval(timer);
                    n ++;
                    if (n >= $('.slides li').length) {
                        n = 0;
                    }
                    $('.slides li').eq(n).fadeIn(100).siblings().hide();
                    $('#banner-num li').eq(n).addClass('active').siblings().removeClass('active');
                    // Move();
                });
                $('.left').click(function() {
                    clearInterval(timer);
                    n --;
                    if (n < 0) {
                        n = $('.slides li').length - 1;
                    }
                    $('.slides li').eq(n).fadeIn(100).siblings().hide();
                    $('#banner-num li').eq(n).addClass('active').siblings().removeClass('active');
                    // Move();
                });
                $('#banner-num li').mouseenter(function() {
                    clearInterval(timer);
                    n=$('#banner-num li').index(this);
                    $('.slides li').eq(n).fadeIn(800).siblings().hide();
                    $('#banner-num li').eq(n).addClass('active').siblings().removeClass('active');
                    Move();
                });
                $('.banner').mouseover(function(){
                    clearInterval(timer);
                })
                $('.banner').mouseout(function(){
                    timer = setInterval(function() {
                        n ++;
                        if(n >= $('.slides li').length) {
                            n = 0;
                        }
                        $('.slides li').eq(n).fadeIn(100).siblings().hide();
                        $('#banner-num li').eq(n).addClass('active').siblings().removeClass('active');
                    },2000);
                })
                var timer = null;
                function Move() {
                    clearInterval(timer);
                    timer = setInterval(function() {
                        n ++;
                        if(n >= $('.slides li').length) {
                            n = 0;
                        }
                        $('.slides li').eq(n).css('display','block');
                        $('.slides li').eq(n).fadeIn(100).siblings().hide();
                        $('#banner-num li').eq(n).addClass('active').siblings().removeClass('active');
                    },2000);
                }
                Move();
            });// 
/*返回顶部*/
    // window.onscroll=function(){
    // 	let top=document.querySelector('.top-button');
    // 	let scrolltop=document.documentElement.scrollTop;
    // 	if(scrolltop>400){
    // 		top.style.display='block';
    // 	}else{
    // 		top.style.display='none';
    // 	}
    // 	top.onclick=function(){
    //        animate(document.documentElement,{scrollTop:0});
    //     }
    // }
    $(document).ready(function(){
        $('.top-button').hide();
        $(function(){
            $(window).scroll(function(){
                if($(window).scrollTop()>400){
                    $('.top-button').fadeIn(1500);
                }else{
                    $('.top-button').fadeOut(1500);
                }
            })
            $('.top-button').click(function(){
                $('body,html').animate({scrollTop:0},1000);
                return false;
            })
        })
    })
/*收起展开*/
    $(function(){
        $('.text').hide();
        $(':button').click(function(){
            $('.text').toggle('fast');
            $(this).val($(this).val()=="Read More"?"Pack Up":"Read More");
        })
    })

}
