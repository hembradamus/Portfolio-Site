var $j=jQuery.noConflict();$j(function(){var t=$j(window).height();$j(".port-section").css("minHeight",t);$j(window).resize(function(){var e=$j(window).height();$j(".port-section").animate("height",e)})});$j(function(){window.location.hash.indexOf("#port-video")>0});$j(function(){$j("#aboutIcon").click(function(e){e.preventDefault();$j.fancybox({padding:40,autoSize:!1,width:1100,height:"85%",titleShow:!1,href:"#aboutPage",afterShow:function(){$j(".fancybox-inner").jScrollPane();$j(".jspVerticalBar").css({top:104,right:23})}})});$j("#resumeIcon").click(function(e){e.preventDefault();$j.fancybox({padding:40,autoSize:!1,width:1100,height:"85%",scrolling:"yes",titleShow:!1,href:"#resumePage",beforeShow:function(){var e=null,t=$j("#resumePage");$j("#resPrint").click(function(n){$j("#fancybox-wrap").append('<div id="fancy_print"></div>');n.preventDefault();e=window.open("width=200,height=200");self.focus();e.document.open();e.document.write('<html><head><link rel="stylesheet" ');e.document.write('href="http://randyhembrador.com/wp-content/themes/hembradorlab/style.css"');e.document.write("></head><body>");e.document.write(t.html());e.document.write("</body></html>");e.document.close();e.print();e.close()})},afterShow:function(){$j(".fancybox-inner").jScrollPane();$j(".jspVerticalBar").css({top:104,right:23})}})});$j("#contactIcon").click(function(e){e.preventDefault();$j.fancybox({padding:40,autoSize:!1,width:560,height:450,titleShow:!1,href:"#contactForm"})})});$j(function(){$j(".homeHeader .port-nav ul a").click(function(e){var t=this.href;if(t.indexOf("video")>0){e.preventDefault();$j("html, body").animate({scrollTop:$j("#port-video").offset().top})}else if(t.indexOf("static")>0){e.preventDefault();$j("html, body").animate({scrollTop:$j("#port-static").offset().top})}else if(t.indexOf("interactive")>0){e.preventDefault();$j("html, body").animate({scrollTop:$j("#port-interactive").offset().top})}});$j(".homeHeader #smallTitle a").click(function(e){e.preventDefault();$j("html, body").animate({scrollTop:$j("html").offset().top},250)})});$j(function(){$j("#top-navigation ul").append('<div id="pointerOuterContainer"><div id="pointerInnerContainer"><div id="menuPointer"></div></div></div>')});$j(function(){$j("a.latest").click(function(t){function r(){$j.fancybox({type:"ajax",href:n,arrows:!0,autoSize:!1,closeBtn:!0,padding:60,height:"90%",width:"90%",ajax:{dataFilter:function(e){return $j(e).find(".proj-content")[0]}},helpers:{title:null},afterShow:function(){$j(".fancybox-next").css({right:"-60px"});$j(".fancybox-prev").css({left:"-60px"});$j("#descContainter div#overview").show();$j("#descContainter").jScrollPane();$j("a#intOverview").click(function(e){e.preventDefault();$j(".intCurrent").removeClass("intCurrent");$j("#descContainter div.intDescription").hide();$j("#descContainter div#overview").show();$j("#descContainter").jScrollPane();$j(this).addClass("intCurrent")});$j("a#intChallenges").click(function(e){e.preventDefault();$j(".intCurrent").removeClass("intCurrent");$j("#descContainter div.intDescription").hide();$j("#descContainter div#challenges").show();$j("#descContainter").jScrollPane();$j(this).addClass("intCurrent")});$j("a#intAchievements").click(function(e){e.preventDefault();$j(".intCurrent").removeClass("intCurrent");$j("#descContainter div.intDescription").hide();$j("#descContainter div#achievements").show();$j("#descContainter").jScrollPane();$j(this).addClass("intCurrent")})}})}function i(){$j.fancybox({arrows:!0,autoSize:!1,closeBtn:!0,maxHeight:"90%",minWidth:"75%",ajax:{dataFilter:function(e){return $j(e).find(".proj-content")[0]}},helpers:{title:null},beforeLoad:function(){$j("html, body").animate({scrollTop:$j("#port-static").offset().top})}})}t.preventDefault();var n=this.href;console.log(n);if(n.indexOf("?p=")>0){$j("html, body").animate({scrollTop:$j("#port-news").offset().top},1e3);setTimeout(latestFancy,1e3)}else if(n.indexOf("video")>0)$j("html, body").animate({scrollTop:$j("#port-video").offset().top},750);else if(n.indexOf("static")>0){$j("html, body").animate({scrollTop:$j("#port-static").offset().top},500);setTimeout(latestFancy,500)}else if(n.indexOf("interactive")>0){$j("html, body").animate({scrollTop:$j("#port-interactive").offset().top},250);setTimeout(r,250)}})});$j(function e(){var t=$j(".video-content").attr("id");$j("div#port-video li.current").removeClass("current");$j("div#port-video li a#"+t).parent("li").addClass("current");$j("ul#vid-icons > li > a").click(function(n){n.preventDefault();var r=this.id,i=r.replace("vid-","");$j.ajax({url:"../../../../../wp-admin/admin-ajax.php",data:{action:"vidRefresh",vidID:i},dataType:"json",success:function(t){var n='<iframe src="',r=t.vidURL,i='" width="100%" height="100%" frameborder="0" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen=""></iframe>',s=n.concat(r,i);$j(".video-content").animate({opacity:0},100,function(){$j(".video-content").attr("id",t.vidID);$j("#video-player").html(s);$j("span.vid-title").html(t.title);$j("div#vid-description span.title").html(t.title);$j("div#vid-description span.date").html(t.date);$j("div#vid-description span.description").html(t.description);$j("div#vid-description span.client").html(t.client);$j("div#vid-description div.format").html(t.format)});$j("iframe").one("load",$j(".video-content").animate({opacity:1},250));$j("html, body").stop().animate({scrollTop:$j("#port-video").offset().top});setTimeout(e,250)},error:function(e,t,n){alert(n)}})})});$j(function(){$j(".fancySearch").submit(function(t){function r(e,t,n,r){e.find("a").text(t);e.find("#date").text(n);e.find("#excerpt").text(r)}t.preventDefault();var n=$j("#s").val();if(n!==""){$j.fancybox({padding:40,autoSize:!1,width:"50px",height:"50px",scrolling:"no",titleShow:!1,href:"#loading",closeBtn:!1});$j.ajax({url:"../../../../../wp-admin/admin-ajax.php",data:{action:"ajaxSearch",sexyQuery:n},dataType:"json",success:function(e){if($j.isEmptyObject(e)){$j(".searchTerm").html(n);$j.fancybox({padding:40,autoSize:!1,height:"300px",scrolling:"no",titleShow:!1,href:"#fail"})}else{$j(".searchTerm").html(n);$j("#resultContainer").html("");$j.each(e,function(t){$j("#searchResults div.template").clone().removeClass("template").addClass("newResult").appendTo("#resultContainer");$j("#searchResults div.newResult a[href]").html(e[t].title);$j("#searchResults div.newResult a").attr("href",e[t].url);$j("#searchResults div.newResult #date").html(e[t].date);$j("#searchResults div.newResult #excerpt").html(e[t].excerpt);$j("#searchResults div.newResult").removeClass("newResult")});$j.fancybox({padding:60,autoSize:!1,height:"85%",width:"75%",scrolling:"auto",titleShow:!1,href:"#success",afterShow:function(){$j(".fancybox-inner").jScrollPane();$j(".jspVerticalBar").css({top:104,right:23})}})}},error:function(e,t,n){alert(n)}})}})});$j(function(){$j("#futluse").submit(function(e){e.preventDefault()})});$j(function(){$j("#searchField input#s").css({backgroundColor:"transparent",color:"rgba(0,0,0,0)",border:"none"});$j(".int-proj-info").add("#descContainter div#challenges").add("#descContainter div#achievements").hide();$j("#vid-description").css({padding:"40px 0px"})});$j(function(){$j("#int-icons li.proj-icon div.reveal>a>div").add("#int-icons div.reveal>ul>li>a#intIconInfo").hover(function(){$j("#int-icons div.reveal>ul>li>a#intIconInfo").css({opacity:"1"})},function(){$j("#int-icons div.reveal>ul>li>a#intIconInfo").css({opacity:".3"})})});$j(function(){$j("#searchField input#s").on("focus",function(){this.select;$j("#searchField input#s").stop().animate({width:"175px",backgroundColor:"#fff",color:"rgba(0,0,0,1)"},{duration:200,queue:!1})});$j("#searchField input#s").on("blur",function(){$j("#searchField input#s").stop().animate({width:"35px",backgroundColor:"transparent",color:"rgba(0,0,0,0)"},{duration:200,queue:!1})})});$j(function(){$j("#homeHeader #smallTitle").add("#scrollTop a").click(function(e){e.preventDefault();$j("html, body").stop().animate({scrollTop:$j("html").offset().top},1e3)})});$j(function(){$j("a#vidMore").click(function(e){e.preventDefault();$j("html, body").stop().animate({scrollTop:$j("ul#vid-icons").offset().top})})});$j(function(){$j("div.now-playing").click(function(e){e.preventDefault();$j("html, body").stop().animate({scrollTop:$j("#port-video").offset().top},250)})});$j(function(){$j("#currentVidTitle nav #vidInfo").toggle(function(){$j("#currentVidTitle nav #vidInfo").css({"background-position":"100px 200px"});$j("#video-player").animate({width:"480px"});$j("#vid-description").animate({width:"400px",padding:"40px 40px",opacity:"1"});$j("#vid-description h1").add("#vid-description .profile-info").add("#vid-description > span").delay(250).animate({opacity:"1"})},function(){$j("#currentVidTitle nav #vidInfo").css({"background-position":"300px 200px"});$j("#vid-description h1").add("#vid-description .profile-info").add("#vid-description > span").animate({opacity:"0"});$j("#video-player").delay(250).animate({width:"960px"});$j("#vid-description").delay(250).animate({width:"1px",padding:"40px 0px",opacity:"0"})})});$j(function(){$j("#descContainter div#overview").show();$j("a#intOverview").click(function(e){e.preventDefault();$j(".intCurrent").removeClass("intCurrent");$j("#descContainter div.intDescription").hide();$j("#descContainter div#overview").show();$j("#descContainter").jScrollPane();$j(this).addClass("intCurrent")});$j("a#intChallenges").click(function(e){e.preventDefault();$j(".intCurrent").removeClass("intCurrent");$j("#descContainter div.intDescription").hide();$j("#descContainter div#challenges").show();$j("#descContainter").jScrollPane();$j(this).addClass("intCurrent")});$j("a#intAchievements").click(function(e){e.preventDefault();$j(".intCurrent").removeClass("intCurrent");$j("#descContainter div.intDescription").hide();$j("#descContainter div#achievements").show();$j("#descContainter").jScrollPane();$j(this).addClass("intCurrent")})});$j(function(){$j("#slides").slidesjs()});$j(function(){$j(".tip").hover(function(e){var t=$j(this).attr("title"),n=$j(this).parent(),r=t.length,i=r*.75;$j(this).data("tipText",t).removeAttr("title");$j(n).append('<div class="tooltip"><div class="blackArrow"></div><div class="toolText"></div></div>');$j(".toolText").text(t).css("width",r*.5+"rem");$j(this).siblings(".tooltip").show()},function(){$j(this).attr("title",$j(this).data("tipText"));$j(".tooltip").remove()})});$j(function(){$j("#waypointTrigger").waypoint(function(e){if(e==="down"){$j("#homeHeader #top-navigation").animate({backgroundColor:"#000000",height:"3.7rem",borderBottomColor:"#81c0ea",borderBottomStyle:"solid",borderBottomWidth:"6px"},200);$j("#menuPointer").animate({"border-bottom-width":"15px",left:"-7rem"},200);$j("#homeHeader #top-navigation li a").animate({fontSize:".8rem",padding:"1.3rem 1.75rem"},200);$j("#homeHeader #top-navigation").addClass("stuck");$j("#homeHeader #smallTitle").add("#scrollTop").fadeIn();$j("#homeHeader #secondary_menu li").delay(500).addClass("hoverNav")}});$j("#waypointTrigger").waypoint(function(e){if(e==="up"){$j("#homeHeader #top-navigation").stop().animate({backgroundColor:"transparent",height:"2rem",borderBottomColor:"transparent",borderBottomStyle:"solid",borderBottomWidth:"6px"},200);$j("#homeHeader #top-navigation li a").animate({fontSize:".9rem",padding:".3rem 2.5rem .5rem"},200);$j("#homeHeader #top-navigation").removeClass("stuck");$j("#menuPointer").animate({left:"0","border-bottom-color":"transparent"},{duration:200});$j("#homeHeader #smallTitle").add("#scrollTop").fadeOut();$j("#homeHeader #secondary_menu li").removeClass("hoverNav")}});$j("#port-interactive").waypoint(function(e){if(e==="down"){$j("#smallTitle").animate({backgroundColor:$j.Color("#81b7e2")},{duration:200,queue:!1});$j("h1").animate({color:$j.Color("#81b7e2")},{duration:200,queue:!1});$j("#top-navigation").animate({borderBottomColor:$j.Color("#81b7e2")},{duration:200,queue:!1});$j("#menuPointer").animate({"border-bottom-color":"#81b7e2",left:"4.25rem"},{duration:200,queue:!1});$j(".result").css({"border-left-color":"#1c69c4"});$j(".searchTerm").css({color:"#1c69c4"})}e==="up"&&$j("#menuPointer").animate({"border-bottom-color":"transparent",left:"-7rem"},{duration:200,queue:!1})},{offset:40,continuous:!1});$j("#port-interactive h1").waypoint(function(e){if(e==="up"){$j("#smallTitle").animate({backgroundColor:$j.Color("#81b7e2")},{duration:200,queue:!1});$j("h1").animate({color:$j.Color("#81b7e2")},{duration:200,queue:!1});$j("#top-navigation").animate({borderBottomColor:$j.Color("#81b7e2")},{duration:200,queue:!1});$j("#menuPointer").animate({"border-bottom-color":"#81b7e2",left:"4.25rem"},{duration:200,queue:!1})}},{offset:0,continuous:!1});$j("#port-static").waypoint(function(e){if(e==="down"){$j("#smallTitle").animate({backgroundColor:$j.Color("#e57070")},{duration:200,queue:!1});$j("h1").animate({color:$j.Color("#e57070")},{duration:200,queue:!1});$j("#top-navigation").animate({borderBottomColor:$j.Color("#e57070")},{duration:200,queue:!1});$j("#menuPointer").animate({"border-bottom-color":"#e57070",left:"12.75rem"},{duration:200,queue:!1})}},{offset:40,continuous:!1});$j("#port-static h1").waypoint(function(e){if(e==="up"){$j("#smallTitle").animate({backgroundColor:$j.Color("#e57070")},{duration:200,queue:!1});$j("h1").animate({color:$j.Color("#e57070")},{duration:200,queue:!1});$j("#top-navigation").animate({borderBottomColor:$j.Color("#e57070")},{duration:200,queue:!1});$j("#menuPointer").animate({"border-bottom-color":"#e57070",left:"12.75rem"},{duration:200,queue:!1})}},{offset:0,continuous:!1});$j("#port-video").waypoint(function(e){if(e==="down"){$j("#smallTitle").animate({backgroundColor:$j.Color("#76c469")},{duration:200,queue:!1});$j("h1").animate({color:$j.Color("#76c469")},{duration:200,queue:!1});$j("#top-navigation").animate({borderBottomColor:$j.Color("#76c469")},{duration:200,queue:!1});$j("#menuPointer").animate({"border-bottom-color":"#76c469",left:"19.75rem"},{duration:200,queue:!1})}},{offset:40,continuous:!1});$j("#vid-player").waypoint(function(e){if(e==="up"){$j("#smallTitle").animate({backgroundColor:$j.Color("#76c469")},{duration:200,queue:!1});$j("h1").animate({color:$j.Color("#76c469")},{duration:200,queue:!1});$j("#top-navigation").animate({borderBottomColor:$j.Color("#76c469")},{duration:200,queue:!1});$j("#menuPointer").animate({"border-bottom-color":"#76c469",left:"19.75rem"},{duration:200,queue:!1})}},{offset:0,continuous:!1})});