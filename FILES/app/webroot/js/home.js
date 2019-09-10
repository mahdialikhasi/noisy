$(document).ready(function(){
	var page = 2;
	$(window).scroll( function(){
		var bottom_of_page = $(document).outerHeight() - 10;
		var bottom_of_window = $(window).scrollTop() + $(window).height(); 
            	if( bottom_of_window > bottom_of_page ){
            		var address = '/pages/home/page:' + page + ' #lastBlogs';
            		window.olddata = $('#lastBlogs').html();
            		window.home='home';
                	$('#content #lastBlogs').load(address,function(response, status, xhr ){
                		if ( status == "error" ) {
                			$('#lastBlogs').append('<p class="msg msf-info">مطلب قدیمی تری وجود ندارد</p>');
                		}
                	});
                	//$('#lastBlogs').prepend(olddata);
            	}
	});
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
});