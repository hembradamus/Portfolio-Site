(function($) {
            $j('li.proj-icon.interactive a').fancybox({
            arrows          : true,
            autoSize        : false,
			closeBtn   		: true,
			padding			: 60,
			height			: '90%',
			width			: '90%' ,
			'ajax'          : {
									dataFilter: function(data) {
									return $(data).find('.proj-content')[0];
									}
                              } ,
			helpers			: {
									title:  null
                              },
            beforeLoad		: function(){
									$j('html, body').animate({
										scrollTop: $j('#port-commissions').offset().top
									});
								},
            afterShow		: 	function() {
            						/*window.history.pushState('object or string','commissions Project', this['href']);*/
            						$j('.fancybox-next').css({'right':'-60px'});
            						$j('.fancybox-prev').css({'left':'-60px'});
									$j('#descContainter div#overview').show();
									$j('#descContainter').jScrollPane();
									$j('#slides').slidesjs();
            						var barHeight = $j('div.jspDrag').attr('height');
            						console.log(barHeight);
									
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
			
            $('li.proj-icon.static a').fancybox({
            arrows          : true,
            autoSize        : false,
			closeBtn   		: true,
			width			: 1020,
			'ajax'          : {
									dataFilter: function(data) {
									return $(data).find('.proj-content')[0];
									}
                              } ,
			helpers			: {
									title:  null
                              }
			});
			
            $('li.proj-icon.video a').fancybox({
            arrows          : true,
            autoSize        : false,
			closeBtn   		: true,
			width			: 1020,
			'ajax'          : {
									dataFilter: function(data) {
									return $(data).find('#content')[0];
									}
                              } ,
			helpers			: {
									title:  null
                              }
			});


            
			$('.post-link').fancybox({
			maxWidth			: 960,
			maxHeight		: '90%',
			'ajax'			: {
									dataFilter: function(data) {
									return $(data).find('#content')[0];
                                    }
                              },
			helpers			: {
									title:  null
                              }
			});
			
			
})(jQuery);