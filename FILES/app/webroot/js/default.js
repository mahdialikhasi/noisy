$(document).ready(function(){
	if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
 		/*$('body').append('<script src="/js/jquery.mobile.min.js" type="text/javascript"></script>');
 		$("body").on("swipeleft",function(){
			$('.mobile-toggle').click()
		});
		$("body").on("swiperight",function(){
			$('.mobile-toggle').click()
		});*/
		$("meta[name='viewport']").attr("content", 'width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no');
	}else{
		$('head').append('<link href="/css/desktop.css" type="text/css" rel="stylesheet"></link>');
	}
	$('#container').css('display', 'block');
	$('#container').click(function(){
		if($('#right').hasClass('visible')){
			$('.mobile-toggle').click()
		}
	});
        function blink(){
            var thisText;
            var headerContent = $('#header p.blink').text();
            if(headerContent[headerContent.length -1] == '|'){
                $('#header p.blink').text(function(_,txt){
                    return txt.slice(0, -1);
                });
            }else{
                $('#header p.blink').text(function(){
                    thisText = $(this).text();
                    return thisText + '|';
                });
            }
        }
        setInterval(blink, 400);
        var text = 'echo "I\'m " . $Mahdi; ';
        $.each(text.split(''), function(i, letter){
            setTimeout(function(){
                $('#header #main').html($('#header #main').html() + letter);
            }, 200*i);
        });
        $("#right .bg-move").animate({"right": "-152px"}, 1100);
        $("#right .wrapper").delay(1300).fadeIn("slow");
        setTimeout(function(){
            $("#header #main").html('echo "I\'m " . <span class="mahdi">$Mahdi</span>; ')
        }, 4000);
        /*$(window).scroll( function(){    
	        $('.blog-content .blog-body img').not('.showed').each( function(i){	            
	            var bottom_of_object = $(this).position().top + $(this).outerHeight();
	            var bottom_of_window = $(window).scrollTop() + $(window).height();	            
	            if( bottom_of_window > bottom_of_object ){	
                  	$('this').addClass('showed');
	                $('this').fadeIn(400);
	            }          
	        });    
    	});*/
        var sitePath;
        function activeMenu(){
		sitePath = top.location.pathname.toString().split('/');
	        sitePath = sitePath[1];
	        if(sitePath == ''){
	        	$('.lastBlogContent .blog-description *:last-child').each(function(){
				text = $(this).text();
				if ( text[text.length -4]== '�' ){
					$(this).text(function(_,txt){
		                    		return txt.slice(0, -5);
		                	});         
		                	text = $(this).text();   
		                	$(this).text(function(_,txt){
		                    		return text + '...';
		                	});    	
				}
			});
	        	$("#nav li").removeClass();
	    		$("#nav li:eq(0)").addClass('active');
	        }else{
	        	if(sitePath == 'blogs'){
	        		$("#nav li").removeClass();
	    			$("#nav li:eq(1)").addClass('active');
	        	}else{
	        		if(sitePath == 'works'){
	        			$("#nav li").removeClass();
	    				$("#nav li:eq(2)").addClass('active');
	        		}else{
	        			if(sitePath == 'about'){
	        				$("#nav li").removeClass();
	    					$("#nav li:eq(3)").addClass('active');
	        			}
	        		}
	        	}
	        }
	}       
        activeMenu();
        var siteURL = "http://" + top.location.host.toString();
        var internalLinks, afterTitle, title, address, location;
        function AjaxLoadContent(){
        	//console.log($(document).height());
	        internalLinks = $("a[href^='"+siteURL+"'], a[href^='/'], a[href^='./'], a[href^='../']");
	        $(internalLinks).on('click', function(){
	            address = $(this).attr('href');
	            address = address.split(' ').join('%20') + ' #content';
	            location = $(this).attr('href');
	            $('#content').load(address,function(data){
	            	$(data).find('script').appendTo('#content');
	            	afterTitle = data.split('<title>');
	                title = afterTitle[1].split('</title>')[0];
	                document.title = title;
	                window.history.pushState(null, null, location);
	                
	            });
	            return false;
	        });
        }
        AjaxLoadContent();
        $( document ).ajaxStart(function() {
            //if(window.home == 'home'){
            //}else{
		    if($('#right').hasClass('visible')){
		    	$('.mobile-toggle').click()
		    }
		    $( "#loading" ).show();
	            $('#content').hide('slide', 300); 
	   //}           
        });
        $( document ).ajaxStop(function() {
            /*if(window.home == 'home'){
            	    window.page = window.page +1;
            	    console.log(window.page);
            	    $('lastBlogs').prepend(window.olddata);
            	    $(internalLinks).off('click');
	            AjaxLoadContent();
	            window.home = 'nohome';
            }else{*/
	            $( "#loading" ).hide();
	            $('#content').show('slide', 400);
	            $('html, body').animate({scrollTop : 0},800);
	            activeMenu();
	            $(internalLinks).off('click');
	            AjaxLoadContent();
	            $('#session').text('');
	   //}
        });
        $('.mobile-toggle').click(function(){
            $('#right').toggleClass('visible');
            $('#container').toggleClass('novisible');
        });
    });
                            
                            
                            
                            