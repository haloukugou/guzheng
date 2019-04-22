/*全局主题 开始*/
/*价格四舍五入取两位小数*/
function returnPrice(value){
    var value=Math.round(parseFloat(value)*100)/100;
    var xsd=value.toString().split(".");
    if(xsd.length==1){
        value=value.toString()+".00";
        return value;
    }
    if(xsd.length>1){
        if(xsd[1].length<2){value=value.toString()+"0";}
        return value;
    }
}
/*公共common.min.js*/
if(function(a){a.extend({browserSelector:function(){!function(a){(jQuery.browser=jQuery.browser||{}).mobile=/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4))}(navigator.userAgent||navigator.vendor||window.opera);var b="ontouchstart"in window||navigator.msMaxTouchPoints,d=navigator.userAgent,e=d.toLowerCase(),f=function(a){return e.indexOf(a)>-1},g="gecko",h="webkit",i="safari",j="opera",k=document.documentElement,l=[!/opera|webtv/i.test(e)&&/msie\s(\d)/.test(e)?"ie ie"+parseFloat(navigator.appVersion.split("MSIE")[1]):f("firefox/2")?g+" ff2":f("firefox/3.5")?g+" ff3 ff3_5":f("firefox/3")?g+" ff3":f("gecko/")?g:f("opera")?j+(/version\/(\d+)/.test(e)?" "+j+RegExp.jQuery1:/opera(\s|\/)(\d+)/.test(e)?" "+j+RegExp.jQuery2:""):f("konqueror")?"konqueror":f("chrome")?h+" chrome":f("iron")?h+" iron":f("applewebkit/")?h+" "+i+(/version\/(\d+)/.test(e)?" "+i+RegExp.jQuery1:""):f("mozilla/")?g:"",f("j2me")?"mobile":f("iphone")?"iphone":f("ipod")?"ipod":f("mac")?"mac":f("darwin")?"mac":f("webtv")?"webtv":f("win")?"win":f("freebsd")?"freebsd":f("x11")||f("linux")?"linux":"","js"];c=l.join(" "),a.browser.mobile&&(c+=" mobile"),b&&(c+=" touch"),k.className+=" "+c;var m=/Edge/.test(navigator.userAgent);m&&a("html").removeClass("chrome").addClass("edge");var n=!window.ActiveXObject&&"ActiveXObject"in window;return n?void a("html").removeClass("gecko").addClass("ie ie11"):(a("body").hasClass("dark")&&a("html").addClass("dark"),void(a("body").hasClass("boxed")&&a("html").addClass("boxed")))}}),a.browserSelector()}(jQuery),function(a){function b(a,b){return a.toFixed(b.decimals)}a.fn.countTo=function(b){return b=b||{},a(this).each(function(){function c(){k+=g,j++,d(k),"function"==typeof e.onUpdate&&e.onUpdate.call(h,k),j>=f&&(i.removeData("countTo"),clearInterval(l.interval),k=e.to,"function"==typeof e.onComplete&&e.onComplete.call(h,k))}function d(a){var b=e.formatter.call(h,a,e);i.html(b)}var e=a.extend({},a.fn.countTo.defaults,{from:a(this).data("from"),to:a(this).data("to"),speed:a(this).data("speed"),refreshInterval:a(this).data("refresh-interval"),decimals:a(this).data("decimals")},b),f=Math.ceil(e.speed/e.refreshInterval),g=(e.to-e.from)/f,h=this,i=a(this),j=0,k=e.from,l=i.data("countTo")||{};i.data("countTo",l),l.interval&&clearInterval(l.interval),l.interval=setInterval(c,e.refreshInterval),d(k)})},a.fn.countTo.defaults={from:0,to:0,speed:1e3,refreshInterval:100,decimals:0,formatter:b,onUpdate:null,onComplete:null}}(jQuery),function(a){
var b=a(window);a.fn.visible=function(c,d,e,f){if(!(this.length<1)){e=e||"both";var g=this.length>1?this.eq(0):this,h="undefined"!=typeof f&&null!==f,i=h?a(f):b,j=h?i.position():0,k=g.get(0),l=i.outerWidth(),m=i.outerHeight(),n=d===!0?k.offsetWidth*k.offsetHeight:!0;if("function"==typeof k.getBoundingClientRect){var o=k.getBoundingClientRect(),p=h?o.top-j.top>=0&&o.top<m+j.top:o.top>=0&&o.top<m,q=h?o.bottom-j.top>0&&o.bottom<=m+j.top:o.bottom>0&&o.bottom<=m,r=h?o.left-j.left>=0&&o.left<l+j.left-50:o.left>=0&&o.left<l-50,s=h?o.right-j.left>0&&o.right<l+j.left-50:o.right>0&&o.right<=l-50,t=c?p||q:p&&q,u=c?r||s:r&&s,t=o.top<0&&o.bottom>m?!0:t,u=o.left<0&&o.right>l?!0:u;if("both"===e)return n&&t&&u;if("vertical"===e)return n&&t;if("horizontal"===e)return n&&u}else{var v=h?0:j,w=v+m,x=i.scrollLeft(),y=x+l,z=g.position(),A=z.top,B=A+g.height(),C=z.left,D=C+g.width(),E=c===!0?B:A,F=c===!0?A:B,G=c===!0?D:C,H=c===!0?C:D;if("both"===e)return!!n&&w>=F&&E>=v&&y>=H&&G>=x;if("vertical"===e)return!!n&&w>=F&&E>=v;if("horizontal"===e)return!!n&&y>=H&&G>=x}}}}(jQuery),function(a){"use strict";var b,c={action:function(){},runOnLoad:!1,duration:500},d=c,e=!1,f={};f.init=function(){for(var b=0;b<=arguments.length;b++){var c=arguments[b];switch(typeof c){case"function":d.action=c;break;case"boolean":d.runOnLoad=c;break;case"number":d.duration=c}}return this.each(function(){d.runOnLoad&&d.action(),a(this).resize(function(){f.timedAction.call(this)})})},f.timedAction=function(a,c){var f=function(){var a=d.duration;if(e){var c=new Date-b;if(a=d.duration-c,0>=a)return clearTimeout(e),e=!1,void d.action()}g(a)},g=function(a){e=setTimeout(f,a)};b=new Date,"number"==typeof c&&(d.duration=c),"function"==typeof a&&(d.action=a),e||f()},a.fn.afterResize=function(a){return f[a]?f[a].apply(this,Array.prototype.slice.call(arguments,1)):f.init.apply(this,arguments)}}(jQuery),function(a){var b=-1,c=-1,d=function(b){var c=1,d=a(b),f=null,g=[];return d.each(function(){var b=a(this),d=b.offset().top-e(b.css("margin-top")),h=g.length>0?g[g.length-1]:null;null===h?g.push(b):Math.floor(Math.abs(f-d))<=c?g[g.length-1]=h.add(b):g.push(b),f=d}),g},e=function(a){return parseFloat(a)||0},f=function(b){var c={byRow:!0,remove:!1,property:"height"};return"object"==typeof b?a.extend(c,b):("boolean"==typeof b?c.byRow=b:"remove"===b&&(c.remove=!0),c)},g=a.fn.matchHeight=function(b){var c=f(b);if(c.remove){var d=this;return this.css(c.property,""),a.each(g._groups,function(a,b){b.elements=b.elements.not(d)}),this}return this.length<=1?this:(g._groups.push({elements:this,options:c}),g._apply(this,c),this)};g._groups=[],g._throttle=80,g._maintainScroll=!1,g._beforeUpdate=null,g._afterUpdate=null,g._apply=function(b,c){var h=f(c),i=a(b),j=[i],k=a(window).scrollTop(),l=a("html").outerHeight(!0),m=i.parents().filter(":hidden");return m.each(function(){var b=a(this);b.data("style-cache",b.attr("style"))}),m.css("display","block"),h.byRow&&(i.each(function(){var b=a(this),c="inline-block"===b.css("display")?"inline-block":"block";b.data("style-cache",b.attr("style")),b.css({display:c,"padding-top":"0","padding-bottom":"0","margin-top":"0","margin-bottom":"0","border-top-width":"0","border-bottom-width":"0",height:"100px"})}),j=d(i),i.each(function(){var b=a(this);b.attr("style",b.data("style-cache")||"")})),a.each(j,function(b,c){var d=a(c),f=0;return h.byRow&&d.length<=1?void d.css(h.property,""):(d.each(function(){var b=a(this),c="inline-block"===b.css("display")?"inline-block":"block",d={display:c};d[h.property]="",b.css(d),b.outerHeight(!1)>f&&(f=b.outerHeight(!1)),b.css("display","")}),void d.each(function(){var b=a(this),c=0;"border-box"!==b.css("box-sizing")&&(c+=e(b.css("border-top-width"))+e(b.css("border-bottom-width")),c+=e(b.css("padding-top"))+e(b.css("padding-bottom"))),b.css(h.property,f-c)}))}),m.each(function(){var b=a(this);b.attr("style",b.data("style-cache")||null)}),g._maintainScroll&&a(window).scrollTop(k/l*a("html").outerHeight(!0)),this},g._applyDataApi=function(){var b={};a("[data-match-height], [data-mh]").each(function(){var c=a(this),d=c.attr("data-match-height")||c.attr("data-mh");d in b?b[d]=b[d].add(c):b[d]=c}),a.each(b,function(){this.matchHeight(!0)})};var h=function(b){g._beforeUpdate&&g._beforeUpdate(b,g._groups),a.each(g._groups,function(){g._apply(this.elements,this.options)}),g._afterUpdate&&g._afterUpdate(b,g._groups)};g._update=function(d,e){if(e&&"resize"===e.type){var f=a(window).width();if(f===b)return;b=f}d?-1===c&&(c=setTimeout(function(){h(e),c=-1},g._throttle)):h(e)},a(g._applyDataApi),a(window).bind("load",function(a){g._update(!1,a)}),a(window).bind("resize orientationchange",function(a){g._update(!0,a)})}(jQuery),
function(a,b){fontSpy=function(a,c){var d=b("html"),e=b("body"),f=a;if("string"!=typeof f||""===f)throw"A valid fontName is required. fontName must be a string and must not be an empty string.";var g={font:f,fontClass:f.toLowerCase().replace(/\s/g,""),success:function(){},failure:function(){},testFont:"Courier New",testString:"QW@HhsXJ",glyphs:"",delay:50,timeOut:1e3,callback:b.noop},h=b.extend(g,c),i=b("<span>"+h.testString+h.glyphs+"</span>").css("position","absolute").css("top","-9999px").css("left","-9999px").css("visibility","hidden").css("fontFamily",h.testFont).css("fontSize","250px");e.append(i);var j=i.outerWidth();i.css("fontFamily",h.font+","+h.testFont);var k=function(){d.addClass("no-"+h.fontClass),h&&h.failure&&h.failure(),h.callback(new Error("FontSpy timeout")),i.remove()},l=function(){h.callback(),d.addClass(h.fontClass),h&&h.success&&h.success(),i.remove()},m=function(){setTimeout(n,h.delay),h.timeOut=h.timeOut-h.delay},n=function(){var a=i.outerWidth();j!==a?l():h.timeOut<0?k():m()};n()}}(this,jQuery),function(a){"function"==typeof define&&define.amd?define(["jquery"],a):"object"==typeof exports?module.exports=a(require("jquery")):a(jQuery)}(function(a){var b="waitForImages",c=function(a){return a.srcset&&a.sizes}(new Image);a.waitForImages={hasImageProperties:["backgroundImage","listStyleImage","borderImage","borderCornerImage","cursor"],hasImageAttributes:["srcset"]},a.expr.pseudos["has-src"]=function(b){return a(b).is('img[src][src!=""]')},a.expr.pseudos.uncached=function(b){return a(b).is(":has-src")?!b.complete:!1},a.fn.waitForImages=function(){var d,e,f,g=0,h=0,i=a.Deferred(),j=this,k=[],l=a.waitForImages.hasImageProperties||[],m=a.waitForImages.hasImageAttributes||[],n=/url\(\s*(['"]?)(.*?)\1\s*\)/g;if(a.isPlainObject(arguments[0])?(f=arguments[0].waitForAll,e=arguments[0].each,d=arguments[0].finished):1===arguments.length&&"boolean"===a.type(arguments[0])?f=arguments[0]:(d=arguments[0],e=arguments[1],f=arguments[2]),d=d||a.noop,e=e||a.noop,f=!!f,!a.isFunction(d)||!a.isFunction(e))throw new TypeError("An invalid callback was supplied.");return this.each(function(){var b=a(this);f?b.find("*").addBack().each(function(){var b=a(this);b.is("img:has-src")&&!b.is("[srcset]")&&k.push({src:b.attr("src"),element:b[0]}),a.each(l,function(a,c){var d,e=b.css(c);if(!e)return!0;for(;d=n.exec(e);)k.push({src:d[2],element:b[0]})}),a.each(m,function(a,c){var d=b.attr(c);return d?void k.push({src:b.attr("src"),srcset:b.attr("srcset"),element:b[0]}):!0})}):b.find("img:has-src").each(function(){k.push({src:this.src,element:this})})}),g=k.length,h=0,0===g&&(d.call(j),i.resolveWith(j)),a.each(k,function(f,k){var l=new Image,m="load."+b+" error."+b;a(l).one(m,function n(b){var c=[h,g,"load"==b.type];return h++,e.apply(k.element,c),i.notifyWith(k.element,c),a(this).off(m,n),h==g?(d.call(j[0]),i.resolveWith(j[0]),!1):void 0}),c&&k.srcset&&(l.srcset=k.srcset,l.sizes=k.sizes),l.src=k.src}),i.promise()}}),function(a){a('[data-toggle="tooltip"]').tooltip(),a('[data-toggle="popover"]').popover()}(jQuery),$('a[data-toggle="tab"]').on("shown.bs.tab",function(a){$(this).parents(".nav-tabs").find(".active").removeClass("active"),$(this).addClass("active").parent().addClass("active")}),!$("html").hasClass("disable-onload-scroll")&&window.location.hash&&(window.scrollTo(0,0),$(window).on("load",function(){setTimeout(function(){var a=window.location.hash,b=$(window).width()<768?180:90;$("body").addClass("scrolling"),$("html, body").animate({scrollTop:$(a).offset().top-b},600,"easeOutQuad",function(){$("body").removeClass("scrolling")})},1)})),$("[data-title-border]").get(0)){var $pageHeaderTitleBorder=$('<span class="page-header-title-border"></span>'),$pageHeaderTitle=$("[data-title-border]"),$window=$(window);$pageHeaderTitle.before($pageHeaderTitleBorder);var setPageHeaderTitleBorderWidth=function(){$pageHeaderTitleBorder.width($pageHeaderTitle.width())};$window.afterResize(function(){setPageHeaderTitleBorderWidth()}),setPageHeaderTitleBorderWidth(),$pageHeaderTitleBorder.addClass("visible")}!function(a){var b={$wrapper:a(".footer-reveal"),init:function(){var a=this;a.build(),a.events()},build:function(){var b=this,c=b.$wrapper.outerHeight(!0),d=a(window).height()-a(".header-body").height();c>d?(a("#footer").removeClass("footer-reveal"),a(".main").css("margin-bottom",0)):(a("#footer").addClass("footer-reveal"),a(".main").css("margin-bottom",c))},events:function(){var b=this,c=a(window);c.on("load",function(){c.afterResize(function(){b.build()})})}};a(".footer-reveal").get(0)&&b.init()}(jQuery),function(a){a.fn.extend({textRotator:function(b){var c={fadeSpeed:500,pauseSpeed:100,child:null},b=a.extend(c,b);return this.each(function(){var c=b,d=a(this),e=a(d.children(),d);if(e.each(function(){a(this).hide()}),c.child)var f=c.child;else var f=a(d).children(":first");a(f).fadeIn(c.fadeSpeed,function(){a(f).delay(c.pauseSpeed).fadeOut(c.fadeSpeed,function(){var b=a(this).next();0==b.length&&(b=a(d).children(":first")),a(d).textRotator({child:b,fadeSpeed:c.fadeSpeed,pauseSpeed:c.pauseSpeed})})})})}})}(jQuery),function(a){var b={$wrapper:a(".notice-top-bar"),$body:a(".body"),init:function(){var a=this;a.build()},build:function(){var b=this;a(window).on("load",function(){setTimeout(function(){b.$body.css({"margin-top":b.$wrapper.outerHeight(),transition:"ease margin 300ms"}),a("#noticeTopBarContent").textRotator({fadeSpeed:500,pauseSpeed:5e3})},1e3)})}};a(".notice-top-bar").get(0)&&b.init()}(jQuery),function(a){a(".close-theme-switcher-bar").on("click",function(){a(this).closest(".header-top").css({height:0,"min-height":0,overflow:"hidden"})})}(jQuery),function(a){a('a[data-toggle="tab"]').on("shown.bs.tab",function(b){var c=a(a(b.target).attr("href"));c.get(0)&&c.find(".owl-carousel").trigger("refresh.owl.carousel")})}(jQuery);
/*主题theme.js*/
window.theme = {};
//主题公共函数
window.theme.fn = {
	getOptions: function(opts) {
		if (typeof(opts) == 'object') {
			return opts;
		} else if (typeof(opts) == 'string') {
			try {
				return JSON.parse(opts.replace(/'/g,'"').replace(';',''));
			} catch(e) {
				return {};
			}
		} else {
			return {};
		}
	}
};
//导航
(function(theme, $) {
	theme = theme || {};
	var initialized = false;
	$.extend(theme, {
		Nav: {
			defaults: {
				wrapper: $('#mainNav'),
				scrollDelay: 600,
				scrollAnimation: 'easeOutQuad'
			},
			initialize: function($wrapper, opts) {
				if (initialized) {
					return this;
				}
				initialized = true;
				this.$wrapper = ($wrapper || this.defaults.wrapper);
				this
					.setOptions(opts)
					.build()
					.events();
				return this;
			},
			setOptions: function(opts) {
				this.options = $.extend(true, {}, this.defaults, opts, theme.fn.getOptions(this.$wrapper.data('plugin-options')));
				return this;
			},
			build: function() {
				var self = this,
					$html = $('html'),
					$header = $('#header'),
					$headerNavMain = $('#header .header-nav-main'),
					thumbInfoPreview;
				//图片预览
				self.$wrapper.find('a[data-thumb-preview]').each(function() {
					thumbInfoPreview = $('<span />').addClass('thumb-info thumb-info-preview')
											.append($('<span />').addClass('thumb-info-wrapper')
												.append($('<span />').addClass('thumb-info-image').css('background-image', 'url(' + $(this).data('thumb-preview') + ')')
										   )
									   );
					$(this).append(thumbInfoPreview);
				});
				//侧边头部及下拉
				if($html.hasClass('side-header') || $html.hasClass('side-header-hamburguer-sidebar')) {
					//侧边头部右边
					if($html.hasClass('side-header-right') || $html.hasClass('side-header-hamburguer-sidebar-right')) {
						if(!$html.hasClass('side-header-right-no-reverse')) {
							$header.find('.dropdown-submenu').addClass('dropdown-reverse');
						}
					}
				} else {
					//反向
					self.checkReverse = function() {
						self.$wrapper.find('.dropdown, .dropdown-submenu').removeClass('dropdown-reverse');
						self.$wrapper.find('.dropdown:not(.manual):not(.dropdown-mega), .dropdown-submenu:not(.manual)').each(function() {
							if(!$(this).find('.dropdown-menu').visible( false, true, 'horizontal' )  ) {
								$(this).addClass('dropdown-reverse');
							}
						});
					}
					self.checkReverse();
	 				$(window).on('resize', function() {
						self.checkReverse();
	 				});
				}
				//克隆项目
				if($headerNavMain.hasClass('header-nav-main-clone-items')) {
			    	$headerNavMain.find('nav > ul > li > a').each(function(){
				    	var parent = $(this).parent(),
				    		clone  = $(this).clone(),
				    		clone2 = $(this).clone(),
				    		wrapper = $('<span class="wrapper-items-cloned"></span>');
				    	//配置类
				    	$(this).addClass('item-original');
				    	clone2.addClass('item-two');
				    	//插入DOM
				    	parent.prepend(wrapper);
				    	wrapper.append(clone).append(clone2);
				    });
				}
				//浮动
				if($('#header.header-floating-icons').get(0) && $(window).width() > 991) {
					var menuFloatingAnim = {
						$menuFloating: $('#header.header-floating-icons .header-container > .header-row'),
						build: function() {
							var self = this;
							self.init();
						},
						init: function(){
							var self  = this,
								divisor = 0;
							$(window).scroll(function() {
							    var scrollPercent = 100 * $(window).scrollTop() / ($(document).height() - $(window).height()),
							    	st = $(this).scrollTop();
								divisor = $(document).height() / $(window).height();
							    self.$menuFloating.find('.header-column > .header-row').css({
							    	transform : 'translateY( calc('+ scrollPercent +'vh - '+ st / divisor +'px) )' 
							    });
							});
						}
					}
					menuFloatingAnim.build();
				}
				//侧边
				if($('.header-nav-links-vertical-slide').get(0)) {
					var slideNavigation = {
						$mainNav: $('#mainNav'),
						$mainNavItem: $('#mainNav li'),
						build: function(){
							var self = this;
							self.menuNav();
						},
						menuNav: function(){
							var self = this;
							self.$mainNavItem.on('click', function(e){
								var currentMenuItem 	= $(this),
									currentMenu 		= $(this).parent(),
									nextMenu        	= $(this).find('ul').first(),
									prevMenu        	= $(this).closest('.next-menu'),
									isSubMenu       	= currentMenuItem.hasClass('dropdown') || currentMenuItem.hasClass('dropdown-submenu'),
									isBack          	= currentMenuItem.hasClass('back-button'),
									nextMenuHeightDiff  = ( ( nextMenu.find('> li').length * nextMenu.find('> li').outerHeight() ) - nextMenu.outerHeight() ),
									prevMenuHeightDiff  = ( ( prevMenu.find('> li').length * prevMenu.find('> li').outerHeight() ) - prevMenu.outerHeight() );
								if( isSubMenu ) {
									currentMenu.addClass('next-menu');
									nextMenu.addClass('visible');
									currentMenu.css({
										overflow: 'visible',
										'overflow-y': 'visible'
									});
									if( nextMenuHeightDiff > 0 ) {
										nextMenu.css({
											overflow: 'hidden',
											'overflow-y': 'scroll'
										});
									}
									for( i = 0; i < nextMenu.find('> li').length; i++ ) {
										if( nextMenu.outerHeight() < ($('.header-row-side-header').outerHeight() - 100) ) {
											nextMenu.css({
												height: nextMenu.outerHeight() + nextMenu.find('> li').outerHeight()
											});
										}
									}
									nextMenu.css({
										'padding-top': nextMenuHeightDiff + 'px'
									});
								}
								if( isBack ) {
									currentMenu.parent().parent().removeClass('next-menu');
									currentMenu.removeClass('visible');
									if( prevMenuHeightDiff > 0 ) {
										prevMenu.css({
											overflow: 'hidden',
											'overflow-y': 'scroll'
										});
									}
								}
								e.stopPropagation();
							});
						}
					}
					$(window).trigger('resize');
					if( $(window).width() > 991 ) {
						slideNavigation.build();
					}
					$(document).ready(function(){
						$(window).afterResize(function(){
							if( $(window).width() > 991 ) {
								slideNavigation.build();
							}
						});
					});
				}
				//头部导航移动端黑色
				if($('.header-nav-main-mobile-dark').get(0)) {
					$('#header:not(.header-transparent-dark-bottom-border):not(.header-transparent-light-bottom-border)').addClass('header-no-border-bottom');
				}
				return this;
			},
			events: function() {
				var self    = this,
					$html   = $('html'),
					$header = $('#header'),
					$window = $(window),
					headerBodyHeight = $('.header-body').outerHeight();
				$header.find('a[href="#"]').on('click', function(e) {
					e.preventDefault();
				});
				//移动端箭头
				$header.find('.dropdown-toggle, .dropdown-submenu > a')
					.append('<i class="fa fa-chevron-down"></i>');
				$header.find('.dropdown-toggle[href="#"], .dropdown-submenu a[href="#"], .dropdown-toggle[href!="#"] .fa-chevron-down, .dropdown-submenu a[href!="#"] .fa-chevron-down').on('click', function(e) {
					e.preventDefault();
					if ($window.width() < 992) {
						$(this).closest('li').toggleClass('open');
						//调整头部高度
						var height = ( $header.hasClass('header-effect-shrink') && $html.hasClass('sticky-header-active') ) ? theme.StickyHeader.options.stickyHeaderContainerHeight : headerBodyHeight;
						$('.header-body').animate({
					 		height: ($('.header-nav-main nav').outerHeight(true) + height) + 10
					 	}, 0);
					}
				});
				//增加open类
				$header.find('.header-nav-click-to-open .dropdown-toggle[href="#"], .header-nav-click-to-open .dropdown-submenu a[href="#"]').on('click', function(e) {
					e.preventDefault();
					if ($window.width() > 991) {
						if (!$(this).closest('li').hasClass('open')) {
							var $li = $(this).closest('li'),
								isSub = false;
							if ( $(this).parent().hasClass('dropdown-submenu') ) {
								isSub = true;
							}
							$(this).closest('.dropdown-menu').find('.dropdown-submenu.open').removeClass('open');
							$(this).parent('.dropdown').parent().find('.dropdown.open').removeClass('open');
							if (!isSub) {
								$(this).parent().find('.dropdown-submenu.open').removeClass('open');
							}
							$li.addClass('open');
							$(document).off('click.nav-click-to-open').on('click.nav-click-to-open', function (e) {
								if (!$li.is(e.target) && $li.has(e.target).length === 0) {
									$li.removeClass('open');
									$li.parents('.open').removeClass('open');
								}
							});
						} else {
							$(this).closest('li').removeClass('open');
						}
						$window.trigger('resize');
					}
				});
				//折叠导航
				$header.find('[data-collapse-nav]').on('click', function(e) {
					$(this).parents('.collapse').removeClass('show');
				});
				//顶部特征
				$header.find('.header-nav-features-toggle').on('click', function(e) {
					e.preventDefault();
					var $toggleParent = $(this).parent();
					if (!$(this).siblings('.header-nav-features-dropdown').hasClass('show')) {
						var $dropdown = $(this).siblings('.header-nav-features-dropdown');
						$('.header-nav-features-dropdown.show').removeClass('show');
						$dropdown.addClass('show');
						$(document).off('click.header-nav-features-toggle').on('click.header-nav-features-toggle', function (e) {
							if (!$toggleParent.is(e.target) && $toggleParent.has(e.target).length === 0) {
								$('.header-nav-features-dropdown.show').removeClass('show');
							}
						});
						if ($(this).attr('data-focus')) {
							$('#' + $(this).attr('data-focus')).focus();
						}
					} else {
						$(this).siblings('.header-nav-features-dropdown').removeClass('show');
					}
				});
				//面包屑菜单
				var hamburguerMenuBtn = $('.hamburguer-btn'),
					hamburguerSideHeader = $('#header.side-header, #header.side-header-overlay-full-screen');
				hamburguerMenuBtn.on('click', function(){
					if($(this).attr('data-set-active') != 'false') {
						$(this).toggleClass('active');
					}
					hamburguerSideHeader.toggleClass('side-header-hide');
					$html.toggleClass('side-header-hide');

					$window.trigger('resize');
				});
				$('.hamburguer-close').on('click', function(){
					$('.hamburguer-btn:not(.hamburguer-btn-side-header-mobile-show)').trigger('click');
				});				
				//移动端菜单打开时设置头部高度
				$('.header-nav-main nav').on('show.bs.collapse', function () {
				 	$(this).removeClass('closed');
				 	//增加移动端菜单opened类
				 	$('html').addClass('mobile-menu-opened');
			 		$('.header-body').animate({
				 		height: ($('.header-body').outerHeight() + $('.header-nav-main nav').outerHeight(true)) + 10
				 	});
				 	//头部在侧边栏下面 / 头部 底部 侧边栏 - 滚动到菜单的位置
				 	if( $('#header').is('.header-bottom-slider, .header-below-slider') && !$('html').hasClass('sticky-header-active') ) {
				 		self.scrollToTarget( $('#header'), 0 );
				 	}
				});
				//当移动端菜单折叠时设置头部高度
				$('.header-nav-main nav').on('hide.bs.collapse', function () {
				 	$(this).addClass('closed');
				 	//移除移动端菜单opened类
				 	$('html').removeClass('mobile-menu-opened');
			 		$('.header-body').animate({
				 		height: ($('.header-body').outerHeight() - $('.header-nav-main nav').outerHeight(true))
				 	}, function(){
				 		$(this).height('auto');
				 	});
				});
				//头部收缩效果-在移动端适应头部高度
				$window.on('stickyHeader.activate', function(){
					if( $window.width() < 992 && $header.hasClass('header-effect-shrink') ) {
						if( $('.header-btn-collapse-nav').attr('aria-expanded') == 'true' ) {
							$('.header-body').animate({
						 		height: ( $('.header-nav-main nav').outerHeight(true) + theme.StickyHeader.options.stickyHeaderContainerHeight ) + ( ($('.header-nav-bar').get(0)) ? $('.header-nav-bar').outerHeight() : 0 ) 
						 	});
						}
					}
				});
				$window.on('stickyHeader.deactivate', function(){
					if( $window.width() < 992 && $header.hasClass('header-effect-shrink') ) {
						if( $('.header-btn-collapse-nav').attr('aria-expanded') == 'true' ) {
							$('.header-body').animate({
						 		height: headerBodyHeight + $('.header-nav-main nav').outerHeight(true) + 10
						 	});
						}
					}
				});
				//侧边头部-改变初始头部高度的值
				$(document).ready(function(){
					if( $window.width() > 991 ) {
						var flag = false;
						$window.on('resize', function(){
							if( $window.width() < 992 && flag == false ) {
								headerBodyHeight = $('.header-body').outerHeight();
								flag = true;
								setTimeout(function(){
									flag = false;
								}, 500);
							}
						});
					}
				});
				//侧边头部-在移动端设置头部高度
				if( $html.hasClass('side-header') ) {
					if( $window.width() < 992 ) {
						$header.css({
							height: $('.header-body .header-container').outerHeight() + (parseInt( $('.header-body').css('border-top-width') ) + parseInt( $('.header-body').css('border-bottom-width') ))
						});
					}
					$(document).ready(function(){
						$window.afterResize(function(){
							if( $window.width() < 992 ) {
								$header.css({
									height: $('.header-body .header-container').outerHeight() + (parseInt( $('.header-body').css('border-top-width') ) + parseInt( $('.header-body').css('border-bottom-width') ))
								});
							} else {
								$header.css({
									height: ''
								});
							}
						});
					});
				}
				//锚点位置
				$('[data-hash]').each(function() {
					var target = $(this).attr('href'),
						offset = ($(this).is("[data-hash-offset]") ? $(this).data('hash-offset') : 0);
					if($(target).get(0)) {
						$(this).on('click', function(e) {
							e.preventDefault();
							if( !$(e.target).is('i') ) {
								//如果打开时关闭折叠
								$(this).parents('.collapse.show').collapse('hide');
								self.scrollToTarget(target, offset);
							}
							return;
						});
					}
				});
				//浮动
				if($('#header.header-floating-icons').get(0)) {
					$('#header.header-floating-icons [data-hash]').off().each(function() {
						var target = $(this).attr('href'),
							offset = ($(this).is("[data-hash-offset]") ? $(this).data('hash-offset') : 0);
						if($(target).get(0)) {
							$(this).on('click', function(e) {
								e.preventDefault();
									$('html, body').animate({
										scrollTop: $(target).offset().top - offset
									}, 600, 'easeOutQuad', function() {

									});
								return;
							});
						}
					});
				}
				return this;
			},
			scrollToTarget: function(target, offset) {
				var self = this;
				$('body').addClass('scrolling');
				$('html, body').animate({
					scrollTop: $(target).offset().top - offset
				}, self.options.scrollDelay, self.options.scrollAnimation, function() {
					$('body').removeClass('scrolling');
				});
				return this;
			}
		}
	});
}).apply(this, [window.theme, jQuery]);
//固定头部
(function(theme, $) {
	theme = theme || {};
	var initialized = false;
	$.extend(theme, {
		StickyHeader: {
			defaults: {
				wrapper: $('#header'),
				headerBody: $('#header .header-body'),
				stickyEnabled: true,
				stickyEnableOnBoxed: true,
				stickyEnableOnMobile: true,
				stickyStartAt: 0,
				stickyStartAtElement: false,
				stickySetTop: 0,
				stickyEffect: '',
				stickyHeaderContainerHeight: false,
				stickyChangeLogo: false,
				stickyChangeLogoWrapper: true
			},
			initialize: function($wrapper, opts) {
				if (initialized) {
					return this;
				}
				initialized = true;
				this.$wrapper = ($wrapper || this.defaults.wrapper);
				this
					.setOptions(opts)
					.build()
					.events();
				return this;
			},
			setOptions: function(opts) {
				this.options = $.extend(true, {}, this.defaults, opts, theme.fn.getOptions(this.$wrapper.data('plugin-options')));
				return this;
			},
			build: function() {
				if (!this.options.stickyEnableOnBoxed && $('html').hasClass('boxed') || $('html').hasClass('side-header-hamburguer-sidebar') || !this.options.stickyEnabled) {
					return this;
				}
				var self = this,
					$html = $('html'),
					$window = $(window),
					sideHeader = $html.hasClass('side-header'),
					initialHeaderTopHeight = self.options.wrapper.find('.header-top').outerHeight(),
					initialHeaderContainerHeight = self.options.wrapper.find('.header-container').outerHeight(),
					minHeight;
				//html类
				$html.addClass('sticky-header-enabled');
				if (parseInt(self.options.stickySetTop) < 0) {
					$html.addClass('sticky-header-negative');
				}
				//设置开始动作
				if(self.options.stickyStartAtElement) {
					var $stickyStartAtElement = $(self.options.stickyStartAtElement);
					$(window).on('scroll resize', function() {
						self.options.stickyStartAt = $stickyStartAtElement.offset().top;
					});
					$(window).trigger('resize');
				}
				//定义最小高度
				if( self.options.wrapper.find('.header-top').get(0) ) {
					minHeight = ( initialHeaderTopHeight + initialHeaderContainerHeight );
				} else {
					minHeight = initialHeaderContainerHeight;
				}
				//设置Wrapper最小高度
				if( !sideHeader ) {
					if( !$('.header-logo-sticky-change').get(0) ) {
						self.options.wrapper.css('height', self.options.headerBody.outerHeight());
					} else {
						$window.on('stickyChangeLogo.loaded', function(){
							self.options.wrapper.css('height', self.options.headerBody.outerHeight());
						});
					}
					if( self.options.stickyEffect == 'shrink' ) {
						//页面中部重新加载时防止页面错误
						$(document).ready(function(){
							if( $window.scrollTop() >= self.options.stickyStartAt ) {
								self.options.wrapper.find('.header-container').on('transitionend webkitTransitionEnd oTransitionEnd', function(){
									self.options.headerBody.css('position', 'fixed');
								});
							} else {
								self.options.headerBody.css('position', 'fixed');
							}
						});
						self.options.wrapper.find('.header-container').css('height', initialHeaderContainerHeight);
						self.options.wrapper.find('.header-top').css('height', initialHeaderTopHeight);
					}
				}
				//固定头部Container高度
				if( self.options.stickyHeaderContainerHeight ) {
					self.options.wrapper.find('.header-container').css('height', self.options.wrapper.find('.header-container').outerHeight());
				}
				//Boxed
				if($html.hasClass('boxed') && self.options.stickyEffect == 'shrink') {
					if( (parseInt(self.options.stickyStartAt) == 0) && $window.width() > 991) {
						self.options.stickyStartAt = 30;
					}
					//设置头部绝对位置
					self.options.headerBody.css('position','absolute');
					//设置绝对位置当boxed布局时的顶部间隔
					$window.on('scroll', function(){
						if( $window.scrollTop() > $('.body').offset().top ) {
							self.options.headerBody.css({
								'position' : 'fixed',
								'top' : 0
							});								
						} else {
							self.options.headerBody.css({
								'position' : 'absolute',
								'top' : 0
							});
						}
					});
				}
				//检查固定头部/防止同一时间多次运行Flags
				var activate_flag   = true,
					deactivate_flag = false;
				self.checkStickyHeader = function() {
					if( $window.width() > 991 && $html.hasClass('side-header') ) {
						$html.removeClass('sticky-header-active');
						activate_flag = true;
						return;
					}
					if ($window.scrollTop() >= parseInt(self.options.stickyStartAt)) {
						if( activate_flag ) {
							self.activateStickyHeader();
							activate_flag = false;
							deactivate_flag = true;
						}
					} else {
						if( deactivate_flag ) {
							self.deactivateStickyHeader();
							deactivate_flag = false;
							activate_flag = true;
						}
					}
				};
				//固定头部是激活状态
				self.activateStickyHeader = function() {
					if ($window.width() < 992) {
						if (!self.options.stickyEnableOnMobile) {
							self.deactivateStickyHeader();
							return;
						}
					} else {
						if (sideHeader) {
							self.deactivateStickyHeader();
							return;
						}
					}
					$html.addClass('sticky-header-active');
					//固定效果 - Reveal
					if( self.options.stickyEffect == 'reveal' ) {
						self.options.headerBody.css('top','-' + self.options.stickyStartAt + 'px');
						self.options.headerBody.animate({
							top: self.options.stickySetTop
						}, 400, function() {});
					}
					//固定效果 - Shrink
					if( self.options.stickyEffect == 'shrink' ) {
						//如果到顶
						if( self.options.wrapper.find('.header-top').get(0) ) {
							self.options.wrapper.find('.header-top').css({
								height: 0,
								'min-height': 0,
								overflow: 'hidden'
							});
						}
						//头部Container
						if( self.options.stickyHeaderContainerHeight ) {
							self.options.wrapper.find('.header-container').css({
								height: self.options.stickyHeaderContainerHeight,
								'min-height': 0
							});
						} else {
							self.options.wrapper.find('.header-container').css({
								height: (initialHeaderContainerHeight / 3) * 2, // 2/3的container高度
								'min-height': 0
							});
							var y = initialHeaderContainerHeight - ((initialHeaderContainerHeight / 3) * 2);
							$('.main').css({
								transform: 'translate3d(0, -'+ y +'px, 0)',
								transition: 'ease transform 300ms'
							});
							if($html.hasClass('boxed')) {
								self.options.headerBody.css('position','fixed');
							}
						}
					}
					self.options.headerBody.css('top', self.options.stickySetTop);
					if (self.options.stickyChangeLogo) {
						self.changeLogo(true);
					}
					//设置元素样式
					$('[data-sticky-header-style]').each(function() {
						var $el = $(this),
							css = theme.fn.getOptions($el.data('sticky-header-style-active')),
							opts = theme.fn.getOptions($el.data('sticky-header-style'));

						if( $window.width() > opts.minResolution ) {
							$el.css(css);
						}
					});
					$.event.trigger({
						type: 'stickyHeader.activate'
					});
				};
				//删除固定头部
				self.deactivateStickyHeader = function() {
					$html.removeClass('sticky-header-active');
					//固定效果 - Shrink
					if( self.options.stickyEffect == 'shrink' ) {
						//Boxed布局
						if( $html.hasClass('boxed') ) {
							//设置头部绝对位置
							self.options.headerBody.css('position','absolute');
							if( $window.scrollTop() > $('.body').offset().top ) {
								//设置头部固定位置
								self.options.headerBody.css('position','fixed');								
							}
						} else {
							//设置头部固定位置
							self.options.headerBody.css('position','fixed');
						}
						//如果头部到顶
						if( self.options.wrapper.find('.header-top').get(0) ) {
							self.options.wrapper.find('.header-top').css({
								height: initialHeaderTopHeight,
								overflow: 'visible'
							});
						}
						//头部Container
						self.options.wrapper.find('.header-container').css({
							height: initialHeaderContainerHeight
						});
					}
					self.options.headerBody.css('top', 0);
					if (self.options.stickyChangeLogo) {
						self.changeLogo(false);
					}
					//设置元素样式
					$('[data-sticky-header-style]').each(function() {
						var $el = $(this),
							css = theme.fn.getOptions($el.data('sticky-header-style-deactive')),
							opts = theme.fn.getOptions($el.data('sticky-header-style'));
						if( $window.width() > opts.minResolution ) {
							$el.css(css);
						}
					});
					$.event.trigger({
						type: 'stickyHeader.deactivate'
					});
				};
				//一直固定
				if (parseInt(self.options.stickyStartAt) <= 0) {
					self.activateStickyHeader();
				}
				//顶部通知条
				if ($('.notice-top-bar').get(0)) {
					self.options.stickyStartAt = $('.notice-top-bar').outerHeight();
				}
				//设置Logo
				if (self.options.stickyChangeLogo) {
					var $logoWrapper = self.options.wrapper.find('.header-logo'),
						$logo = $logoWrapper.find('img'),
						logoWidth = $logo.attr('width'),
						logoHeight = $logo.attr('height'),
						logoSmallTop = parseInt($logo.attr('data-sticky-top') ? $logo.attr('data-sticky-top') : 0),
						logoSmallWidth = parseInt($logo.attr('data-sticky-width') ? $logo.attr('data-sticky-width') : 'auto'),
						logoSmallHeight = parseInt($logo.attr('data-sticky-height') ? $logo.attr('data-sticky-height') : 'auto');
					if (self.options.stickyChangeLogoWrapper) {
						$logoWrapper.css({
							'width': $logo.outerWidth(true),
							'height': $logo.outerHeight(true)
						});
					}
					self.changeLogo = function(activate) {
						if(activate) {
							$logo.css({
								'top': logoSmallTop,
								'width': logoSmallWidth,
								'height': logoSmallHeight
							});
						} else {
							$logo.css({
								'top': 0,
								'width': logoWidth,
								'height': logoHeight
							});
						}
					}
					$.event.trigger({
						type: 'stickyChangeLogo.loaded'
					});
				}
				//侧边头部
				var headerBodyHeight,
					flag = false;
				self.checkSideHeader = function() {
					if($window.width() < 992 && flag == false) {
						headerBodyHeight = self.options.headerBody.height();
						flag = true;
					}
					if(self.options.stickyStartAt == 0 && sideHeader) {
						self.options.wrapper.css('min-height', 0);
					}
					if(self.options.stickyStartAt > 0 && sideHeader && $window.width() < 992) {
						self.options.wrapper.css('min-height', headerBodyHeight);
					}
				}
				return this;
			},
			events: function() {
				var self = this;
				if (!this.options.stickyEnableOnBoxed && $('body').hasClass('boxed') || $('html').hasClass('side-header-hamburguer-sidebar') || !this.options.stickyEnabled) {
					return this;
				}
				if (!self.options.alwaysStickyEnabled) {
					$(window).on('scroll resize', function() {
						self.checkStickyHeader();
					});
				} else {
					self.activateStickyHeader();
				}
				$(window).on('load resize', function(){
					self.checkSideHeader();
				});
				return this;
			}
		}
	});
}).apply(this, [window.theme, jQuery]);
/*公共初始化theme.init.js*/
(function($) {
	'use strict';
	//固定头部
	if (typeof theme.StickyHeader !== 'undefined') {
		theme.StickyHeader.initialize();
	}
	//导航菜单
	if (typeof theme.Nav !== 'undefined') {
		theme.Nav.initialize();
	}
}).apply(this, [jQuery]);
/*全局主题 结束*/
/*在线客服*/
$(function(){
    $(".chat-float").on("click",function(){
        if($(this).hasClass("active")){
            $(this).removeClass("active");
            $(".chat-menu").animate({
                "right":"20px"
            })
        }else{
            $(this).addClass("active");
            $(".chat-menu").animate({
                "right":"-72px"
            })
        }
    })
	$("#chat-id").each(function(){
		$(this).find(".btn-qq").mouseenter(function(){
			$(this).find(".qq").fadeIn("fast");
		});
		$(this).find(".btn-qq").mouseleave(function(){
			$(this).find(".qq").fadeOut("fast");
		});
		$(this).find(".btn-wx").mouseenter(function(){
			$(this).find(".pic").fadeIn("fast");
		});
		$(this).find(".btn-wx").mouseleave(function(){
			$(this).find(".pic").fadeOut("fast");
		});
		$(this).find(".btn-phone").mouseenter(function(){
			$(this).find(".phone").fadeIn("fast");
		});
		$(this).find(".btn-phone").mouseleave(function(){
			$(this).find(".phone").fadeOut("fast");
		});
		$(this).find(".btn-box1").mouseenter(function(){
			$(this).find(".box1").fadeIn("fast");
		});
		$(this).find(".btn-box1").mouseleave(function(){
			$(this).find(".box1").fadeOut("fast");
		});
		$(this).find(".btn-top").click(function(){
			$("html, body").animate({
				"scroll-top":0
			},"fast");
		});
	});
	var lastRmenuStatus=false;
	$(window).scroll(function(){//bug
		var _top=$(window).scrollTop();
		if(_top>200){
			$("#chat-id").data("expanded",true);
		}else{
			$("#chat-id").data("expanded",false);
		}
		if($("#chat-id").data("expanded")!=lastRmenuStatus){
			lastRmenuStatus=$("#chat-id").data("expanded");
			if(lastRmenuStatus){
				$("#chat-id .btn-top").slideDown();
			}else{
				$("#chat-id .btn-top").slideUp();
			}
		}
	});
});
/*展开伸缩，如：FAQ*/
// Toggle
(function(theme, $) {
    theme = theme || {};
    var instanceName = '__toggle';
    var PluginToggle = function($el, opts) {
        return this.initialize($el, opts);
    };
    PluginToggle.defaults = {
        duration: 350,
        isAccordion: false
    };
    PluginToggle.prototype = {
        initialize: function($el, opts) {
            if ($el.data(instanceName)) {
                return this;
            }
            this.$el = $el;
            this
                .setData()
                .setOptions(opts)
                .build();
            return this;
        },
        setData: function() {
            this.$el.data(instanceName, this);

            return this;
        },
        setOptions: function(opts) {
            this.options = $.extend(true, {}, PluginToggle.defaults, opts, {
                wrapper: this.$el
            });
            return this;
        },
        build: function() {
            var self = this,
                $wrapper = this.options.wrapper,
                $items = $wrapper.find('> .toggle'),
                $el = null;
            $items.each(function() {
                $el = $(this);
                if ($el.hasClass('active')) {
                    $el.find('> p').addClass('preview-active');
                    $el.find('> .toggle-content').slideDown(self.options.duration);
                }
                self.events($el);
            });
            if (self.options.isAccordion) {
                self.options.duration = self.options.duration / 2;
            }
            return this;
        },
        events: function($el) {
            var self = this,
                previewParCurrentHeight = 0,
                previewParAnimateHeight = 0,
                toggleContent = null;
            $el.find('> label').click(function(e) {
                var $this = $(this),
                    parentSection = $this.parent(),
                    parentWrapper = $this.parents('.toggle'),
                    previewPar = null,
                    closeElement = null;
                if (self.options.isAccordion && typeof(e.originalEvent) != 'undefined') {
                    closeElement = parentWrapper.find('.toggle.active > label');
                    if (closeElement[0] == $this[0]) {
                        return;
                    }
                }
                parentSection.toggleClass('active');
                // Preview Paragraph
                if (parentSection.find('> p').get(0)) {
                    previewPar = parentSection.find('> p');
                    previewParCurrentHeight = previewPar.css('height');
                    previewPar.css('height', 'auto');
                    previewParAnimateHeight = previewPar.css('height');
                    previewPar.css('height', previewParCurrentHeight);
                }
                // Content
                toggleContent = parentSection.find('> .toggle-content');
                if (parentSection.hasClass('active')) {
                    $(previewPar).animate({
                        height: previewParAnimateHeight
                    }, self.options.duration, function() {
                        $(this).addClass('preview-active');
                    });
                    toggleContent.slideDown(self.options.duration, function() {
                        if (closeElement) {
                            closeElement.trigger('click');
                        }
                    });
                } else {
                    $(previewPar).animate({
                        height: 0
                    }, self.options.duration, function() {
                        $(this).removeClass('preview-active');
                    });
                    toggleContent.slideUp(self.options.duration);
                }
            });
        }
    };
    // expose to scope
    $.extend(theme, {
        PluginToggle: PluginToggle
    });
    // jquery plugin
    $.fn.themePluginToggle = function(opts) {
        return this.map(function() {
            var $this = $(this);
            if ($this.data(instanceName)) {
                return $this.data(instanceName);
            } else {
                return new PluginToggle($this, opts);
            }
        });
    }
}).apply(this, [window.theme, jQuery]);
// Toggle
(function($) {
    'use strict';
    if ($.isFunction($.fn['themePluginToggle'])) {
        $(function() {
            $('[data-plugin-toggle]:not(.manual)').each(function() {
                var $this = $(this),
                    opts;
                var pluginOptions = theme.fn.getOptions($this.data('plugin-options'));
                if (pluginOptions)
                    opts = pluginOptions;
                $this.themePluginToggle(opts);
            });
        });
    }
}).apply(this, [jQuery]);