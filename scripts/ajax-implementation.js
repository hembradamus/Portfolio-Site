var $j = jQuery.noConflict();

//set section height
$j(function setHeight() {
	var siteHeight = $j(window).height();
	$j('.port-section').css('minHeight',siteHeight);
	$j(window).resize(function() {
		var newHeight = $j(window).height();
		$j('.port-section').animate('height',newHeight);
	});
});

//Open Latest Item
$j(function() {
	function latestFancy() {
		$j.fancybox({
			'type'			: 'ajax',
			'href'			: targetURL,
			closeClick      : false,
			padding         : 20,
			arrows          : true,
			autoSize        : false,
			nextClick       : true,
			height			: '95%',
			width			: '90%',
			'ajax'          : {
									dataFilter: function(data) {
									return $j(data).find('#proj-content')[0];
								}
							},
			helpers			: {
									title:  null
							}
			});
	}

	$j("a.latest").click(function LatestScroll(e){
		e.preventDefault();
		targetURL = this.href;
		
		if(targetURL.indexOf("?p=") > 0) {
			$j('html, body').animate({
				scrollTop: $j("#port-news").offset().top
			}, 1000);
			setTimeout(latestFancy, 1000);
		}
		else if(targetURL.indexOf("video") > 0) {
			$j('html, body').animate({
				scrollTop: $j("#port-video").offset().top
			}, 750);
		}
		else if(targetURL.indexOf("static") > 0) {
			$j('html, body').animate({
				scrollTop: $j("#port-static").offset().top
			}, 500);
			setTimeout(latestFancy, 500);
		}
		else if(targetURL.indexOf("interactive") > 0) {
			$j('html, body').animate({
				scrollTop: $j("#port-interactive").offset().top
			}, 250);
			setTimeout(latestFancy, 250);
		}
	});
});


//Apply "Current" class to videos
$j(function applyCurrent() {
	var diddles = $j('.video-content').attr('id');
	$j('div#port-video li.current').removeClass('current');
	$j("div#port-video li a#"+diddles).parent('li').addClass('current');

	$j('ul#vid-icons > li > a').click(function vidSwap(e){
		e.preventDefault();
		var vidID = this.id;
		var postID = vidID.replace("vid-","");

		$j.ajax({
			url: 'http://localhost:8888/hembradorlab/wp-admin/admin-ajax.php',
			data: {
				'action': 'vidRefresh',
				'vidID': postID
			},
			dataType: 'json',
			success: function(data){
				var vidPrefix = '<iframe src="';
				var vidURL = data.vidURL;
				var vidSuffix = '" width="100%" height="70%" frameborder="0" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen="" style="background:#a00;"></iframe>';
				var vidFrame = vidPrefix.concat(vidURL,vidSuffix);
				
				$j('.video-content').animate({opacity:0},100,function(){
					$j('.video-content').attr('id', data.vidID);
					$j('#video-player').html(vidFrame);
					$j('span.vid-title').html(data.title);
					$j('div.vid-description span.title').html(data.title);
					$j('div.vid-description span.date').html(data.date);
					$j('div.vid-description span.description').html(data.description);
					$j('div.vid-description span.client').html(data.client);
					$j('div.vid-description div.format').html(data.format);
				});
				$j('iframe').one('load', $j('.video-content').animate({opacity:1},250));
				$j('html, body').animate({
					scrollTop: $j("#port-video").offset().top
				});
				setTimeout(applyCurrent,250);
			},
			error: function(MLHttpRequest, textStatus, errorThrown){
				alert(errorThrown);
			}
		});
	});
});


//Video Selection (loading video to player)
$j(function() {
	
});


//Site search results appear in Fancybox
$j(function fancySearch() {
	$j('#searchform').submit(function sexySearch(e){
		e.preventDefault();
        var sexyQuery = $j('#s').val();
        //NEED AN ERROR MESSAGE FOR EMPTY SEARCH
		$j.fancybox({//PUT LOADING GRAPHIC HERE - DIMENSIONS SHOULD MATCH FINAL CONTENT REFRESH
					content	:	'#coax'
				});
		$j.ajax({
			url: 'http://localhost:8888/hembradorlab/wp-admin/admin-ajax.php',
			data: {
				'action': 'ajaxSearch',
				'sexyQuery': sexyQuery
			},
			dataType: 'json',
			success: function(data){
				$j('div.fancybox-inner').html('<div id="fancysexy">Your search for <strong>' + sexyQuery + '</strong> pooped out:</div>');
				//INSERT "IF OBJECT = {}" STATEMENT HERE - make the following code "else"
				$j.each(data, function(i){
					$j('#fancysexy').append(
						'<div><a href="' + data[i].url + '" class="' + data[i].type +'">' + data[i].title + '</a></div>'
					);
				});
			},
			error: function(MLHttpRequest, textStatus, errorThrown){
				alert('OMFG BEANZ ' + errorThrown);
			}
		});
	});
});

$j(function styletime() {
	$j('a#searchIcon').click(function(e) {
		e.preventDefault();
		$j('#searchField').toggle(function() {
			$j('#s').focus();
		});
	});
});