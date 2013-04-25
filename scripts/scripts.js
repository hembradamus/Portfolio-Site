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
/*$j(document).ready(function() {
	$j(window).resize(function() {
		var bodyheight = $j(window).height();
		$j('.port-section').height(bodyheight);
	}); 
});*/
$j(function(){
	if (window.location.hash.indexOf('#port-video') > 0){
	}
});
//icon content
$j(function fancyFeast() {
	$j('#aboutIcon').click(function(e){
		e.preventDefault();
		$j.fancybox({
			'padding'		: 40,
			'autoSize'		: false,
			'width'			: 1100,
			'height'		: '85%',
			'titleShow'		: false,
			'href'			: '#aboutPage',
			'afterShow'		: function(){
									$j('.fancybox-inner').jScrollPane();
									$j('.jspVerticalBar').css({
										'top'	: 104,
										'right'	: 23
									});
								}
		});
	});
	$j('#resumeIcon').click(function(e){
		e.preventDefault();
		$j.fancybox({
			'padding'		: 40,
			'autoSize'		: false,
			'width'			: 1100,
			'height'		: '85%',
			'scrolling'		: 'yes',
			'titleShow'		: false,
			'href'			: '#resumePage',
			'beforeShow'	: function(){
				var win=null;
				var content = $j('#resumePage');
				$j('#resPrint').click(function(e){
					$j('#fancybox-wrap').append('<div id="fancy_print"></div>');
					e.preventDefault();
					win = window.open("width=200,height=200");
					self.focus();
					win.document.open();
					win.document.write('<'+'html'+'><'+'head'+'><'+'link rel="stylesheet" ');
					win.document.write('href="http:'+'/'+'/'+'randyhembrador.com'+'/'+'wp-content'+'/'+'themes'+'/'+'hembradorlab'+'/'+'style.css"');
					win.document.write('><'+'/'+'head'+'><'+'body'+'>');
					win.document.write(content.html());
					win.document.write('<'+'/'+'body'+'><'+'/'+'html'+'>');
					win.document.close();
					win.print();
					win.close();
				});
			},
		'afterShow'			: function(){
									$j('.fancybox-inner').jScrollPane();
									$j('.jspVerticalBar').css({
										'top'	: 104,
										'right'	: 23
									});
								}
		});
	});
	$j('#contactIcon').click(function(e){
		e.preventDefault();
		$j.fancybox({
			'padding'		: 40,
			'autoSize'		: false,
			'width'			: 560,
			'height'		: 450,
			'titleShow'		: false,
			'href'			: '#contactForm'
		});
	});
});

//homepage scroll homeHeader
$j(function menuScroll() {
	$j('.homeHeader .port-nav ul a').click(function(e) {
		var navTarget = this.href;
		if(navTarget.indexOf("video") > 0) {
		e.preventDefault();
			$j('html, body').animate({
				scrollTop: $j('#port-video').offset().top
			});
		}
		else if(navTarget.indexOf("static") > 0) {
		e.preventDefault();
			$j('html, body').animate({
				scrollTop: $j('#port-static').offset().top
			});
		}
		else if(navTarget.indexOf("interactive") > 0) {
		e.preventDefault();
			$j('html, body').animate({
				scrollTop: $j('#port-interactive').offset().top
			});
		}
	});
	$j('.homeHeader #smallTitle a').click(function(e) {
		e.preventDefault();
		$j('html, body').animate({
			scrollTop: $j('html').offset().top
		}, 250);
	});
});

//pointer shiiiiiit
$j(function() {
	$j('#top-navigation ul').append('<div id="pointerOuterContainer"><div id="pointerInnerContainer"><div id="menuPointer"></div></div></div>');
});


//Open Latest Item
$j(function() {
	$j("a.latest").click(function LatestScroll(e){
		e.preventDefault();
		var targetURL = this.href;
		console.log(targetURL);
		function intFancy() {
			$j.fancybox({
			'type'			: 'ajax',
			'href'			: targetURL,
            arrows          : true,
            autoSize        : false,
			closeBtn		: true,
			padding			: 60,
			height			: '90%',
			width			: '90%' ,
			'ajax'          : {
									dataFilter: function(data) {
									return $j(data).find('.proj-content')[0];
									}
                              } ,
			helpers			: {
									title:  null
                              },
			afterShow		: 	function() {
									/*window.history.pushState('object or string','Interactive Project', this['href']);*/
									$j('.fancybox-next').css({'right':'-60px'});
									$j('.fancybox-prev').css({'left':'-60px'});
									$j('#descContainter div#overview').show();
									$j('#descContainter').jScrollPane();
									$j('a#intOverview').click(function(e){
										e.preventDefault();
										$j('.intCurrent').removeClass('intCurrent');
										$j('#descContainter div.intDescription').hide();
										$j('#descContainter div#overview').show();
										$j('#descContainter').jScrollPane();
										$j(this).addClass('intCurrent');
									});
									$j('a#intChallenges').click(function(e){
										e.preventDefault();
										$j('.intCurrent').removeClass('intCurrent');
										$j('#descContainter div.intDescription').hide();
										$j('#descContainter div#challenges').show();
										$j('#descContainter').jScrollPane();
										$j(this).addClass('intCurrent');
									});
									$j('a#intAchievements').click(function(e){
										e.preventDefault();
										$j('.intCurrent').removeClass('intCurrent');
										$j('#descContainter div.intDescription').hide();
										$j('#descContainter div#achievements').show();
										$j('#descContainter').jScrollPane();
										$j(this).addClass('intCurrent');
									});
								}
			});
		}

		function staFancy(){
			$j.fancybox({
            arrows          : true,
            autoSize        : false,
			closeBtn   		: true,
			maxHeight		: '90%',
			minWidth		: '75%' ,
			'ajax'          : {
									dataFilter: function(data) {
									return $j(data).find('.proj-content')[0];
									}
                              } ,
			helpers			: {
									title:  null
                              },
            beforeLoad		: function(){
									$j('html, body').animate({
										scrollTop: $j('#port-static').offset().top
									});
								}
			});
		}

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
			setTimeout(intFancy, 250);
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
			url: '../../../../../wp-admin/admin-ajax.php',
			data: {
				'action': 'vidRefresh',
				'vidID': postID
			},
			dataType: 'json',
			success: function(data){
				var vidPrefix = '<iframe src="';
				var vidURL = data.vidURL;
				var vidSuffix = '" width="100%" height="100%" frameborder="0" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen=""></iframe>';
				var vidFrame = vidPrefix.concat(vidURL,vidSuffix);

				$j('.video-content').animate({opacity:0},100,function(){
					$j('.video-content').attr('id', data.vidID);
					$j('#video-player').html(vidFrame);
					$j('span.vid-title').html(data.title);
					$j('div#vid-description span.title').html(data.title);
					$j('div#vid-description span.date').html(data.date);
					$j('div#vid-description span.description').html(data.description);
					$j('div#vid-description span.client').html(data.client);
					$j('div#vid-description div.format').html(data.format);
				});
				$j('iframe').one('load', $j('.video-content').animate({opacity:1},250));
				$j('html, body').stop().animate({
					scrollTop: $j('#port-video').offset().top
				});
				setTimeout(applyCurrent,250);
			},
			error: function(MLHttpRequest, textStatus, errorThrown){
				alert(errorThrown);
			}
		});
	});
});



//Site search results appear in Fancybox
$j(function fancySearch() {
	$j('.fancySearch').submit(function fancySearch(e){
		e.preventDefault();
        var sexyQuery = $j('#s').val();
        function searchResults(row, title, date, excerpt) {
        		row.find('a').text(title);
				row.find('#date').text(date);
				row.find('#excerpt').text(excerpt);
			}
        if (sexyQuery === ''){
        }
		else{
			$j.fancybox({
				'padding'		: 40,
				'autoSize'		: false,
				'width'			: '50px',
				'height'		: '50px',
				'scrolling'		: 'no',
				'titleShow'		: false,
				'href'			: '#loading',
				'closeBtn'		:false
			});
			$j.ajax({
				url: '../../../../../wp-admin/admin-ajax.php',
				data: {
					'action': 'ajaxSearch',
					'sexyQuery': sexyQuery
				},
				dataType: 'json',
				success: function(data){
					if ($j.isEmptyObject(data)){
						$j('.searchTerm').html(sexyQuery);
						$j.fancybox({
							'padding'		: 40,
							'autoSize'		: false,
							'height'		: '300px',
							'scrolling'		: 'no',
							'titleShow'		: false,
							'href'			: '#fail'
						});
					}
					else {
						$j('.searchTerm').html(sexyQuery);
						$j('#resultContainer').html('');
						$j.each(data, function(i){
							$j('#searchResults div.template').clone().removeClass('template').addClass('newResult').appendTo('#resultContainer');
							$j('#searchResults div.newResult a[href]').html(data[i].title);
							$j('#searchResults div.newResult a').attr('href', data[i].url);
							$j('#searchResults div.newResult #date').html(data[i].date);
							$j('#searchResults div.newResult #excerpt').html(data[i].excerpt);
							$j('#searchResults div.newResult').removeClass('newResult');
						});
						$j.fancybox({
							'padding'		: 60,
							'autoSize'		: false,
							'height'		: '85%',
							'width'			: '75%',
							'scrolling'		: 'auto',
							'titleShow'		: false,
							'href'			: '#success',
							'afterShow'		:	function(){
												$j('.fancybox-inner').jScrollPane();
												$j('.jspVerticalBar').css({
													'top'	: 104,
													'right'	: 23
												});
											}
						});
					}
				},
				error: function(MLHttpRequest, textStatus, errorThrown){
					alert(errorThrown);
				}
			});
		}
	});
});
$j(function(){
	$j('#futluse').submit(function(e){
		e.preventDefault();
	});
});

//Style functions
$j(function prepFancyElements() {
	$j('#searchField input#s').css({
			'backgroundColor':'transparent',
			'color':'rgba(0,0,0,0)',
			'border':'none'
		});
	$j('.int-proj-info')
	.add('#descContainter div#challenges')
	.add('#descContainter div#achievements')
	.hide();
	$j('#vid-description').css({
		'padding':'40px 0px'
	});
});

//int-proj icon "More Info" hover
$j(function(){
	$j('#int-icons li.proj-icon div.reveal>a>div').add('#int-icons div.reveal>ul>li>a#intIconInfo').hover(function(){
		$j('#int-icons div.reveal>ul>li>a#intIconInfo').css({'opacity':'1'});
	},
	function(){
		$j('#int-icons div.reveal>ul>li>a#intIconInfo').css({'opacity':'.3'});
	});
});

//search toggle
$j(function searchToggle() {
	$j('#searchField input#s').on('focus', function() {
		this.select;
		$j('#searchField input#s').stop().animate({
			'width':'175px',
			'backgroundColor':'#fff',
			'color':'rgba(0,0,0,1)'
		},{duration:200,queue:false});
	});
	$j('#searchField input#s').on('blur', function() {
		$j('#searchField input#s').stop().animate({
			'width':'35px',
			'backgroundColor':'transparent',
			'color':'rgba(0,0,0,0)'
		},{duration:200,queue:false});
	});
});

/*top scroll button*/
$j(function() {
	$j('#homeHeader #smallTitle').add('#scrollTop a').click(function(e){
		e.preventDefault();
		$j('html, body').stop().animate({
			scrollTop: $j('html').offset().top
		},1000);
	});
});

/*more videos button*/
$j(function() {
	$j('a#vidMore').click(function(e){
		e.preventDefault();
		$j('html, body').stop().animate({
			scrollTop: $j('ul#vid-icons').offset().top
		});
	});
});

/*now playing scroll*/
$j(function() {
	$j('div.now-playing').click(function(e){
		e.preventDefault();
		$j('html, body').stop().animate({
			scrollTop: $j('#port-video').offset().top
		}, 250);
	});
});

/*video information button*/
$j(function() {
	$j('#currentVidTitle nav #vidInfo').toggle(function(){
		$j('#currentVidTitle nav #vidInfo').css({'background-position':'100px 200px'});
		$j('#video-player').animate({
			'width':'480px'
		});
		$j('#vid-description').animate({
			'width':'400px',
			'padding':'40px 40px',
			'opacity':'1'
		});
		$j('#vid-description h1')
		.add('#vid-description .profile-info')
		.add('#vid-description > span').delay(250).animate({
			'opacity':'1'
		});
	},
	function() {
		$j('#currentVidTitle nav #vidInfo').css({'background-position':'300px 200px'});
		$j('#vid-description h1')
		.add('#vid-description .profile-info')
		.add('#vid-description > span').animate({
			'opacity':'0'
		});
		$j('#video-player').delay(250).animate({
			'width':'960px'
		});
		$j('#vid-description').delay(250).animate({
			'width':'1px',
			'padding':'40px 0px',
			'opacity':'0'
		});
	});
});

/*subnav tabs*/
$j(function() {
	$j('#descContainter div#overview').show();
	/*$j('#descContainter').jScrollPane();*/

	$j('a#intOverview').click(function(e){
		e.preventDefault();
		$j('.intCurrent').removeClass('intCurrent');
		$j('#descContainter div.intDescription').hide();
		$j('#descContainter div#overview').show();
		$j('#descContainter').jScrollPane();
		$j(this).addClass('intCurrent');
	});
	$j('a#intChallenges').click(function(e){
		e.preventDefault();
		$j('.intCurrent').removeClass('intCurrent');
		$j('#descContainter div.intDescription').hide();
		$j('#descContainter div#challenges').show();
		$j('#descContainter').jScrollPane();
		$j(this).addClass('intCurrent');
	});
	$j('a#intAchievements').click(function(e){
		e.preventDefault();
		$j('.intCurrent').removeClass('intCurrent');
		$j('#descContainter div.intDescription').hide();
		$j('#descContainter div#achievements').show();
		$j('#descContainter').jScrollPane();
		$j(this).addClass('intCurrent');
	});
});

//slides
$j(function() {
  $j('#slides').slidesjs();
});

/*iframe
$j(function() {
	$j('iframe').each(function() {
		$j(this).attr("src", $j(this).attr("src") + '?wmode=transparent');
	});
});/*

/*tooltiptime*/
$j(function tooltip(){
	$j('.tip').hover(function(e){
		var titleText = $j(this).attr('title');
		var btnParent = $j(this).parent();
		var btnLength = titleText.length;
		var btnWidth = btnLength*.75;

		$j(this).data('tipText',titleText).removeAttr('title');
		$j(btnParent).append('<div class="tooltip"><div class="blackArrow"></div><div class="toolText"></div></div>');
		$j('.toolText').text(titleText).css('width', (btnLength *.5) + 'rem');
		$j(this).siblings('.tooltip').show();
	},function(){
		$j(this).attr('title', $j(this).data('tipText'));
		$j('.tooltip').remove();
	});
});


/*waypoints*/
$j(function(){
	$j('#waypointTrigger').waypoint(function(direction){
		if(direction === 'down'){
			$j('#homeHeader #top-navigation').animate({
				'backgroundColor':'#000000',
				'height':'3.7rem',
				'borderBottomColor':'#81c0ea',
				'borderBottomStyle':'solid',
				'borderBottomWidth':'6px'
			},200);
			$j('#menuPointer').animate({
				'border-bottom-width':'15px',
				'left':'-7rem'
			},200);
			$j('#homeHeader #top-navigation li a').animate({
				'fontSize':'.8rem',
				'padding':'1.3rem 1.75rem'
			},200);
			$j('#homeHeader #top-navigation').addClass('stuck');
			$j('#homeHeader #smallTitle').add('#scrollTop').fadeIn();
			$j('#homeHeader #secondary_menu li').delay(500).addClass('hoverNav');
		}
	});
	$j('#waypointTrigger').waypoint(function(direction){
		if(direction === 'up'){
			$j('#homeHeader #top-navigation').stop().animate({
				'backgroundColor':'transparent',
				'height':'2rem',
				'borderBottomColor':'transparent',
				'borderBottomStyle':'solid',
				'borderBottomWidth':'6px'
			},200);
			$j('#homeHeader #top-navigation li a').animate({
				'fontSize':'.9rem',
				'padding':'.3rem 2.5rem .5rem'
			},200);
			$j('#homeHeader #top-navigation').removeClass('stuck');
			$j('#menuPointer').animate({
				'left':'0',
				'border-bottom-color':'transparent'
			},{duration: 200});
			$j('#homeHeader #smallTitle').add('#scrollTop').fadeOut();
			$j('#homeHeader #secondary_menu li').removeClass('hoverNav');
		}
	});

	$j('#port-interactive').waypoint(function(direction){
		if(direction === 'down'){
			$j('#smallTitle').animate({
				backgroundColor: $j.Color('#81b7e2')
			}, {duration: 200, queue: false});
			$j('h1').animate({
				color: $j.Color('#81b7e2')
			}, {duration: 200, queue: false});
			$j('#top-navigation').animate({
				borderBottomColor: $j.Color('#81b7e2')
			}, {duration: 200, queue: false});
			$j('#menuPointer').animate({
				'border-bottom-color':'#81b7e2',
				'left':'4.25rem'
			},{duration: 200, queue: false});
			$j('.result').css({'border-left-color': '#1c69c4'});
			$j('.searchTerm').css({'color': '#1c69c4'});
		}
		if(direction === 'up'){
			$j('#menuPointer').animate({
				'border-bottom-color':'transparent',
				'left':'-7rem'
			},{duration: 200, queue: false});
		}
	},{ offset:40, continuous:false });

	$j('#port-interactive h1').waypoint(function(direction){
		if(direction === 'up'){
			$j('#smallTitle').animate({
				backgroundColor: $j.Color('#81b7e2')
			}, {duration: 200, queue: false});
			$j('h1').animate({
				color: $j.Color('#81b7e2')
			}, {duration: 200, queue: false});
			$j('#top-navigation').animate({
				borderBottomColor: $j.Color('#81b7e2')
			}, {duration: 200, queue: false});
			$j('#menuPointer').animate({
				'border-bottom-color':'#81b7e2',
				'left':'4.25rem'
			},{duration: 200, queue: false});
		}
	},{ offset:0, continuous:false });

	$j('#port-static').waypoint(function(direction){
		if(direction === 'down'){
			$j('#smallTitle').animate({
				backgroundColor: $j.Color('#e57070')
			}, {duration: 200, queue: false});
			$j('h1').animate({
				color: $j.Color('#e57070')
			}, {duration: 200, queue: false});
			$j('#top-navigation').animate({
				borderBottomColor: $j.Color('#e57070')
			}, {duration: 200, queue: false});
			$j('#menuPointer').animate({
				'border-bottom-color':'#e57070',
				'left':'12.75rem'
			},{duration: 200, queue: false});
		}
	},{ offset:40, continuous:false });

	$j('#port-static h1').waypoint(function(direction){
		if(direction === 'up'){
			$j('#smallTitle').animate({
				backgroundColor: $j.Color('#e57070')
			}, {duration: 200, queue: false});
			$j('h1').animate({
				color: $j.Color('#e57070')
			}, {duration: 200, queue: false});
			$j('#top-navigation').animate({
				borderBottomColor: $j.Color('#e57070')
			}, {duration: 200, queue: false});
			$j('#menuPointer').animate({
				'border-bottom-color':'#e57070',
				'left':'12.75rem'
			},{duration: 200, queue: false});
		}
	},{ offset:0, continuous:false });

	$j('#port-video').waypoint(function(direction){
		if(direction === 'down'){
			$j('#smallTitle').animate({
				backgroundColor: $j.Color('#76c469')
			}, {duration: 200, queue: false});
			$j('h1').animate({
				color: $j.Color('#76c469')
			}, {duration: 200, queue: false});
			$j('#top-navigation').animate({
				borderBottomColor: $j.Color('#76c469')
			}, {duration: 200, queue: false});
			$j('#menuPointer').animate({
				'border-bottom-color':'#76c469',
				'left':'19.75rem'
			},{duration: 200, queue: false});
		}
	},{ offset:40, continuous:false});

	$j('#vid-player').waypoint(function(direction){
		if(direction === 'up'){
			$j('#smallTitle').animate({
				backgroundColor: $j.Color('#76c469')
			}, {duration: 200, queue: false});
			$j('h1').animate({
				color: $j.Color('#76c469')
			}, {duration: 200, queue: false});
			$j('#top-navigation').animate({
				borderBottomColor: $j.Color('#76c469')
			}, {duration: 200, queue: false});
			$j('#menuPointer').animate({
				'border-bottom-color':'#76c469',
				'left':'19.75rem'
			},{duration: 200, queue: false});
		}
	},{ offset:0, continuous:false});
});