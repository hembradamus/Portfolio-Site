// Generated by CoffeeScript 1.4.0
/*
jQuery Waypoints - v2.0.1
Copyright (c) 2011-2013 Caleb Troughton
Dual licensed under the MIT license and GPL license.
https://github.com/imakewebthings/jquery-waypoints/blob/master/licenses.txt
*/(function(){var e,t,n,r,i,s,o,u,a,f,l,c,h,p,d,v,m=[].indexOf||function(e){for(var t=0,n=this.length;t<n;t++)if(t in this&&this[t]===e)return t;return-1},g=[].slice;e=window.jQuery;t=e(window);i={horizontal:{},vertical:{}};s=1;u={};o="waypoints-context-id";l="resize.waypoints";c="scroll.waypoints";h=1;p="waypoints-waypoint-ids";d="waypoint";v="waypoints";n=function(){function t(t){var n=this;this.$element=t;this.element=t[0];this.didResize=!1;this.didScroll=!1;this.id="context"+s++;this.oldScroll={x:t.scrollLeft(),y:t.scrollTop()};this.waypoints={horizontal:{},vertical:{}};t.data(o,this.id);u[this.id]=this;t.bind(c,function(){var t;if(!n.didScroll){n.didScroll=!0;t=function(){n.doScroll();return n.didScroll=!1};return window.setTimeout(t,e[v].settings.scrollThrottle)}});t.bind(l,function(){var t;if(!n.didResize){n.didResize=!0;t=function(){e[v]("refresh");return n.didResize=!1};return window.setTimeout(t,e[v].settings.resizeThrottle)}})}t.prototype.doScroll=function(){var t,n=this;t={horizontal:{newScroll:this.$element.scrollLeft(),oldScroll:this.oldScroll.x,forward:"right",backward:"left"},vertical:{newScroll:this.$element.scrollTop(),oldScroll:this.oldScroll.y,forward:"down",backward:"up"}};m.call(window,"ontouchstart")>=0&&(!t.vertical.oldScroll||!t.vertical.newScroll)&&e[v]("refresh");e.each(t,function(t,r){var i,s,o;o=[];s=r.newScroll>r.oldScroll;i=s?r.forward:r.backward;e.each(n.waypoints[t],function(e,t){var n,i;if(r.oldScroll<(n=t.offset)&&n<=r.newScroll)return o.push(t);if(r.newScroll<(i=t.offset)&&i<=r.oldScroll)return o.push(t)});o.sort(function(e,t){return e.offset-t.offset});s||o.reverse();return e.each(o,function(e,t){if(t.options.continuous||e===o.length-1)return t.trigger([i])})});return this.oldScroll={x:t.horizontal.newScroll,y:t.vertical.newScroll}};t.prototype.refresh=function(){var t,n,r,i=this;r=e.isWindow(this.element);n=this.$element.offset();this.doScroll();t={horizontal:{contextOffset:r?0:n.left,contextScroll:r?0:this.oldScroll.x,contextDimension:this.$element.width(),oldScroll:this.oldScroll.x,forward:"right",backward:"left",offsetProp:"left"},vertical:{contextOffset:r?0:n.top,contextScroll:r?0:this.oldScroll.y,contextDimension:r?e[v]("viewportHeight"):this.$element.height(),oldScroll:this.oldScroll.y,forward:"down",backward:"up",offsetProp:"top"}};return e.each(t,function(t,n){return e.each(i.waypoints[t],function(t,r){var i,s,o,u,a;i=r.options.offset;o=r.offset;s=e.isWindow(r.element)?0:r.$element.offset()[n.offsetProp];if(e.isFunction(i))i=i.apply(r.element);else if(typeof i=="string"){i=parseFloat(i);r.options.offset.indexOf("%")>-1&&(i=Math.ceil(n.contextDimension*i/100))}r.offset=s-n.contextOffset+n.contextScroll-i;if(r.options.onlyOnScroll&&o!=null||!r.enabled)return;if(o!==null&&o<(u=n.oldScroll)&&u<=r.offset)return r.trigger([n.backward]);if(o!==null&&o>(a=n.oldScroll)&&a>=r.offset)return r.trigger([n.forward]);if(o===null&&n.oldScroll>=r.offset)return r.trigger([n.forward])})})};t.prototype.checkEmpty=function(){if(e.isEmptyObject(this.waypoints.horizontal)&&e.isEmptyObject(this.waypoints.vertical)){this.$element.unbind([l,c].join(" "));return delete u[this.id]}};return t}();r=function(){function t(t,n,r){var s,o;r=e.extend({},e.fn[d].defaults,r);r.offset==="bottom-in-view"&&(r.offset=function(){var t;t=e[v]("viewportHeight");e.isWindow(n.element)||(t=n.$element.height());return t-e(this).outerHeight()});this.$element=t;this.element=t[0];this.axis=r.horizontal?"horizontal":"vertical";this.callback=r.handler;this.context=n;this.enabled=r.enabled;this.id="waypoints"+h++;this.offset=null;this.options=r;n.waypoints[this.axis][this.id]=this;i[this.axis][this.id]=this;s=(o=t.data(p))!=null?o:[];s.push(this.id);t.data(p,s)}t.prototype.trigger=function(e){if(!this.enabled)return;this.callback!=null&&this.callback.apply(this.element,e);if(this.options.triggerOnce)return this.destroy()};t.prototype.disable=function(){return this.enabled=!1};t.prototype.enable=function(){this.context.refresh();return this.enabled=!0};t.prototype.destroy=function(){delete i[this.axis][this.id];delete this.context.waypoints[this.axis][this.id];return this.context.checkEmpty()};t.getWaypointsByElement=function(t){var n,r;r=e(t).data(p);if(!r)return[];n=e.extend({},i.horizontal,i.vertical);return e.map(r,function(e){return n[e]})};return t}();f={init:function(t,i){var s;i==null&&(i={});(s=i.handler)==null&&(i.handler=t);this.each(function(){var t,s,a,f;t=e(this);a=(f=i.context)!=null?f:e.fn[d].defaults.context;e.isWindow(a)||(a=t.closest(a));a=e(a);s=u[a.data(o)];s||(s=new n(a));return new r(t,s,i)});e[v]("refresh");return this},disable:function(){return f._invoke(this,"disable")},enable:function(){return f._invoke(this,"enable")},destroy:function(){return f._invoke(this,"destroy")},prev:function(e,t){return f._traverse.call(this,e,t,function(e,t,n){if(t>0)return e.push(n[t-1])})},next:function(e,t){return f._traverse.call(this,e,t,function(e,t,n){if(t<n.length-1)return e.push(n[t+1])})},_traverse:function(t,n,r){var i,s;t==null&&(t="vertical");n==null&&(n=window);s=a.aggregate(n);i=[];this.each(function(){var n;n=e.inArray(this,s[t]);return r(i,n,s[t])});return this.pushStack(i)},_invoke:function(t,n){t.each(function(){var t;t=r.getWaypointsByElement(this);return e.each(t,function(e,t){t[n]();return!0})});return this}};e.fn[d]=function(){var t,n;n=arguments[0],t=2<=arguments.length?g.call(arguments,1):[];return f[n]?f[n].apply(this,t):e.isFunction(n)?f.init.apply(this,arguments):e.isPlainObject(n)?f.init.apply(this,[null,n]):n?e.error("The "+n+" method does not exist in jQuery Waypoints."):e.error("jQuery Waypoints needs a callback function or handler option.")};e.fn[d].defaults={context:window,continuous:!0,enabled:!0,horizontal:!1,offset:0,triggerOnce:!1};a={refresh:function(){return e.each(u,function(e,t){return t.refresh()})},viewportHeight:function(){var e;return(e=window.innerHeight)!=null?e:t.height()},aggregate:function(t){var n,r,s;n=i;t&&(n=(s=u[e(t).data(o)])!=null?s.waypoints:void 0);if(!n)return[];r={horizontal:[],vertical:[]};e.each(r,function(t,i){e.each(n[t],function(e,t){return i.push(t)});i.sort(function(e,t){return e.offset-t.offset});r[t]=e.map(i,function(e){return e.element});return r[t]=e.unique(r[t])});return r},above:function(e){e==null&&(e=window);return a._filter(e,"vertical",function(e,t){return t.offset<=e.oldScroll.y})},below:function(e){e==null&&(e=window);return a._filter(e,"vertical",function(e,t){return t.offset>e.oldScroll.y})},left:function(e){e==null&&(e=window);return a._filter(e,"horizontal",function(e,t){return t.offset<=e.oldScroll.x})},right:function(e){e==null&&(e=window);return a._filter(e,"horizontal",function(e,t){return t.offset>e.oldScroll.x})},enable:function(){return a._invoke("enable")},disable:function(){return a._invoke("disable")},destroy:function(){return a._invoke("destroy")},extendFn:function(e,t){return f[e]=t},_invoke:function(t){var n;n=e.extend({},i.vertical,i.horizontal);return e.each(n,function(e,n){n[t]();return!0})},_filter:function(t,n,r){var i,s;i=u[e(t).data(o)];if(!i)return[];s=[];e.each(i.waypoints[n],function(e,t){if(r(i,t))return s.push(t)});s.sort(function(e,t){return e.offset-t.offset});return e.map(s,function(e){return e.element})}};e[v]=function(){var e,t;t=arguments[0],e=2<=arguments.length?g.call(arguments,1):[];return a[t]?a[t].apply(null,e):a.aggregate.call(null,t)};e[v].settings={resizeThrottle:100,scrollThrottle:30};t.load(function(){return e[v]("refresh")})}).call(this);