$(document).ready(function(){
	$(".button-collapse").sideNav({
		edge: 'right', // Choose the horizontal origin
		closeOnClick: true // Closes side-nav on <a> clicks, useful for Angular/Meteor
	});
	// Initialize collapsible (uncomment the line below if you use the dropdown variation)
	//$('.collapsible').collapsible();
    $('.carousel.carousel-slider').carousel({full_width: true});
    $(function(){
      	$(".typed").typed({
        	strings: ["Hello!", "My name is Mahdi Alikhasi", "I'm a web designer", "I'm a web devepoler","I love linux",":(){: | : & }; :"],
        	startDelay: 10,
        	typeSpeed: 10,
        	callback: function(){
        		shift();
        	}
        });
    });
    function shift(){
      $(".text-editor-wrap").addClass("shift-text");
      $(".terminal-height").text('10');
  	}
  	$('.carousel.carousel-slider').carousel({full_width:true});
  	setInterval(function(){$('.carousel.carousel-slider').carousel('next');},10000);
  	$('select').material_select();
  	//$('.chips').material_chip();
  	/*Ajax loading*/
  	var sitePath;
  	var baseurl = 'noisy';
  	/*a function to find current menu*/
    function activeMenu(){
		sitePath = top.location.pathname.toString().split('/');		
		if (baseurl == '') {
			sitePath = sitePath[1];
		}else{
			sitePath = sitePath[2];
		}		
		//console.log(sitePath);
	    if(sitePath == ''){	      	
	       	$(".side-nav .links li").removeClass('active');
	   		$(".side-nav .links li:eq(0)").addClass('active');
	    }else if (sitePath == 'blogs'){
	       	$(".side-nav .links li").removeClass('active');
	   		$(".side-nav .links li:eq(1)").addClass('active');
	    }else if(sitePath == 'about'){
	    	$(".side-nav .links li").removeClass('active');
	   		$(".side-nav .links li:eq(4)").addClass('active');
	    }else if(sitePath == 'books'){
    		$(".side-nav .links li").removeClass('active');
	   		$(".side-nav .links li:eq(2)").addClass('active');
	    }else if(sitePath == 'cv'){
	    	$(".side-nav .links li").removeClass('active');
	   		$(".side-nav .links li:eq(3)").addClass('active');
	    }else if(sitePath == 'contacts'){
	    	$(".side-nav .links li").removeClass('active');
	   		$(".side-nav .links li:eq(5)").addClass('active');
	    }
	}       
    activeMenu();
    var siteURL = "http://" + top.location.host.toString();    
    var internalLinks, afterTitle, title, address, location, mainContent, breadcrumb;
    function AjaxLoadContent(){    	
	    internalLinks = $("a[href^='"+siteURL+"'], a[href^='/'], a[href^='./'], a[href^='../']");
	    $(internalLinks).on('click', function(){
	        address = $(this).attr('href');	        
	        mainContent = address.split(' ').join('%20') + ' #data ';
	        breadcrumb =  address.split(' ').join('%20') + ' .nav-wrapper > *'      
	        location = $(this).attr('href');
	        $('#content').load(mainContent,function(data,status,xhr){
	        	if (status == 'error') {
	        		breadcrumb = '<div class="col s12"><div class="container"><a href="/noisy/" class="breadcrumb">خانه</a></div></div>';	        		
	        		$('.nav-wrapper').html(breadcrumb);				    
	            	title = xhr.status + " " + xhr.statusText;
	            	document.title = title;
	            	window.history.pushState(null, null, location);
	            	var msg = 'خطایی رخ داده است :';
	            	Materialize.toast(msg + '<span class="ltr">' + xhr.status + " " + xhr.statusText + "</span>", 6000);
	        		$('#data').html(xhr.responseText);
	        		$( "#loading" ).removeClass('active');
				    $( "#loading" ).addClass('hide');
				    $('#content').removeClass('hidden');	    
				    activeMenu();
				    $(internalLinks).off('click');
				    AjaxLoadContent();
				    $('#session').text('');				    
	        	}else if(status == 'success'){
	        		$('.nav-wrapper').load(breadcrumb);
	           		$(data).find('script').appendTo('#content');
	           		afterTitle = data.split('<title>');
	            	title = afterTitle[1].split('</title>')[0];
	            	document.title = title;
	            	window.history.pushState(null, null, location);
	        	}	        	
	        });
		    return false;
	    });
    }
    AjaxLoadContent();
    $.ajaxSetup({async:true});
    $( document ).ajaxStart(function() {
    	$('html, body').animate({scrollTop : 0},800);
    	$('#content').addClass('hidden');    
	    $( "#loading" ).removeClass('hide');
	    $( "#loading" ).addClass('active');	    
    });
    $(document).ajaxStop(function(){
    	$( "#loading" ).removeClass('active');
	    $( "#loading" ).addClass('hide');
	    $('#content').removeClass('hidden');	    
	    activeMenu();
	    $(internalLinks).off('click');
	    AjaxLoadContent();
	    $('#session').text('');
    });
});