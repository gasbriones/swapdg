var myScroller;

var preload = new Element("img", {src:"media/loading.gif"});
var scrollbarImg = new Element("img", {src:"media/handle-vert.png"});
var closeImg = new Element("img", {src:"media/popup-close.png"});

fullHeight = function(el) {
	if ($chk($(el))) {
		var winsize = window.getScrollSize();
		var wheight = winsize.y;
		$(el).setStyle("height",wheight);
	}
}

ie6Events = function() {
	makeScrollbar( window, $('mainscrollbar'), $('mainhandle') );
	fullHeight("overlay");
}

function loadSwiff(movie,container,mheight,mwidth,currentLang) {
	var path = movie;
	var mySwiff = new Swiff(path, {
		container:container,
		height:mheight,
		width:mwidth
	});
}

function onLoadSetup() {
	$("body").setStyle("background-image","url(media/bg.jpg)");
	$("swap").setStyles({ "top":"-180px", "display":"" });
	$("langSelector").addEvent('click', function() {
		var myLangChangeRequest = new Request.HTML({
		 onSuccess: function() {
			window.location = "index.php";
		 }
	  }).get("swapLang.php");
	});
	var myFx = new Fx.Tween("swap", {
		duration:"long", link:"ignore", onComplete: function() {
			loadSwiff("menu.swf","navmenu",80,210);
			loadSwiff("news.swf","newscontent",60,495);
			loadSwiff("comments.swf","commentscontent",60,495);
			loadSwiff("portfolio-menu.swf","menu",20,300);
			var calendar = $("calendar").getCoordinates();
			var latestworks = $("latestworks").getCoordinates();
			var leavecomments = $("leavecomments").getCoordinates();
			var windows = window.getSize();
			var dimsy = calendar.height + latestworks.height + leavecomments.height;
			var dims = $("aboutswapcontent").getSize();
			$("aboutswapbg").setStyles({
				height:dimsy + "px",
				opacity:0,
				width:dims.x + "px"
			});
			$("aboutswapcontent").setStyles({
				opacity:0
			});
			fadein("aboutswapbg",.4);
			fadein("aboutswapcontent",1);
			$("calendar").setStyles({
				visibility:"visible",
				opacity:0
			});
			$("latestworks").setStyles({
				visibility:"visible",
				opacity:0
			});
			$("leavecomments").setStyles({
				visibility:"visible",
				opacity:0
			});
			$("news").setStyle("visibility","visible");
			$("newscontent").setStyle("visibility","visible");
			$("comments").setStyle("visibility","visible");
			$("commentscontent").setStyle("visibility","visible");
			var myFx2 = new Fx.Tween("calendar", { duration:300, onComplete:function() {
				var myFx3 = new Fx.Tween("latestworks", { duration:300, onComplete:function() {
					var myFx4 = new Fx.Tween("leavecomments", { duration:300, onComplete:function() {
						$("text").focus();
					} }).start("opacity",0,1);
				} }).start("opacity",0,1);
			} }).start("opacity",0,1);
			makeScrollbar( window, $('mainscrollbar'), $('mainhandle') );
		}
	});
	myFx.start("top","-180px",0);
}

function displayoverlay() {
	var overlay = new Element("div", {
		id:"overlay"
	});
	overlay.setStyles({
		'background-color':'#000',
		'height':'100%',
		'left':'0px',
		'opacity':'.8',
		'top':'0px',
		'width':'100%',
		'z-index':'7'
	});
	overlay.inject(document.body);
	if ((Browser.Engine.trident == true) && (Browser.Engine.version == 4)) {
		$("overlay").setStyle("position","absolute");
		fullHeight("overlay");
	} else {
		overlay.setStyle("position","fixed");
	}
	makeScrollbar( window, $('mainscrollbar'), $('mainhandle') );
}

function destroyoverlay() {
	var tween = new Fx.Tween("overlay", { duration:"short" });
	tween.start("opacity",0).chain(
		function() {
			$("overlay").destroy();
			makeScrollbar( window, $('mainscrollbar'), $('mainhandle') );
		}
	);
}

function opencontact() {
  var myHTMLRequest = new Request.HTML({
    update:"contactcontent",
    onSuccess: function() {
      makeScrollbar( window, $('mainscrollbar'), $('mainhandle') );
    }
  }).get("contactform.php");
	$("contact").setStyles({
		opacity:0,
		display:""
	});
	fadein("contact",1);
}

function openportfolio() {
	$("portfolio").setStyles({
		opacity:0,
		display:""
	});
	loadportfolio();
	fadein("portfolio",1);
}

function loadportfolio() {
	$("portfoliocontent").addClass("showingContent");
	var myHTMLRequest = new Request.HTML({
		update:"portfoliocontent",
		onSuccess: function() {
			var portfolioH = $("portfoliocontent").getSize().y;
			var begin = new Fx.Scroll("portfoliocontent");
			begin.set(0,portfolioH);
			begin.toTop.delay(1000, begin);
			makeScrollbar( window, $('mainscrollbar'), $('mainhandle') );
			makeScroller();
			if ((Browser.Engine.trident == true) && (Browser.Engine.version == 4)) {
				fullHeight("overlay");
			}
		}
	}).get("portfolio.php");
}

function closesection(section) {
	var tween = new Fx.Tween(section, { duration:"short", onComplete:function() {
		if (section == "portfolio") {
			$("portfoliocontent").empty();
			$("portfoliocontent").removeClass("showingContent");
		}
	} });
	tween.start("opacity",0).chain (
		function() {
			makeScrollbar( window, $('mainscrollbar'), $('mainhandle') );
		}
	);
}

function swapsection(selected) {
	if ( selected != current ) {
		if ( current != "about" ) {
			closesection(current);
		}
		if (selected != "about") {
			if ( !($chk($("overlay")))) {
				displayoverlay();
			}
			switch(selected) {
				case "contact": opencontact(); break;
				case "portfolio": openportfolio(); break;
			}
		} else {
			destroyoverlay();
		}
		current = selected;
	}
}

function sendmail(mform) {
  if ( !( ($chk(mform.name.value)) && ($chk(mform.email.value)) && ($chk(mform.text.value)) ) ) {
    $("contacterrormsg").set("text","All fields are required");
  } else {
    $("contacterrormsg").set("text","");
    var myHTMLRequest = new Request.HTML({
      url:"sendmail.php",
      update:"contactcontent"
    }).post(mform);
  }
}

function sendcomment(mform) {
  if ($chk(mform.text.value)) {
    var myHTMLRequest = new Request.HTML({
      url:"sendcomment.php",
      update:"leavecomments"
    }).post(mform);
  }
}

makeScrollbar = function(content,scrollbar,handle,horizontal,ignoreMouse) {
	if ($chk($("mainscrollbar"))) {
		$("mainscrollbar").destroy();
	}
	var portfolioscroll = 0;
	if ( (current == "portfolio") && ( Browser.Engine.webkit ) ) {
		portfolioscroll = $("portfolio").getSize().y + 260 - content.getSize().y;
	}
	if ( portfolioscroll < 0 ) { portfolioscroll = 0; }
	var steps = content.getScrollSize().y + portfolioscroll - content.getSize().y;
	if ( steps > 0 ) {
		var scrollbar = new Element("div", {
			"class":"scrollbar-vert",
			"id":"mainscrollbar",
			"styles": {
				"opacity":.7
			}
		});
		var handle = new Element("div", {
			"class":"handle-vert",
			"id":"mainhandle"
		});
		scrollbar.inject("content","top");
		if ((Browser.Engine.trident == true) && (Browser.Engine.version == 4)) {
			fullHeight("mainscrollbar");
		}
		handle.inject("mainscrollbar");
		var slider = new Slider(scrollbar, handle, {
			steps: steps,
			mode: 'vertical',
			onChange: function(step){
				// Scrolls the content element in y direction.
				var x = 0;
				var y = step;
				content.scrollTo(x,y);
			}
		}).set(0);
		if( !(ignoreMouse) ){
			// Scroll the content element when the mousewheel is used within the 
			// content or the scrollbar element.
			$$(content, scrollbar).addEvent('mousewheel', function(e){	
				e = new Event(e).stop();
				var step = slider.step - e.wheel * 30;
				slider.set(step);
			});
		}
		// Stops the handle dragging process when the mouse leaves the document body.
		$(document.body).addEvent('mouseleave',function(){slider.drag.stop()});
	}
}

function fadein(el,value) {
	var myFx = new Fx.Tween(el, {duration:"long"}).start("opacity",0,value);
}

function fadeout(el,value) {
	var myFx = new Fx.Tween(el, {duration:"short"}).start("opacity",value,0);
}

function showgallery(gallery,imagesstring) {
  if ( !($chk($("popup"))) ) {
    stopScroller();
    var wsize = window.getSize();
    var wscroll = window.getScroll();
    var initX = wsize.x / 2;
    initX = initX.round() - 150;
    var initY = wsize.y / 2;
    initY = initY.round() - 75 + wscroll.y;
    var popup = new Element("div", {
      id:"popup"
    });
    var imgcontainer = new Element("div", {
      id:"imgcontainer"
    });
    popup.setStyles({
      height:"150px",
      left:initX + "px",
      opacity:0,
      top:initY + "px",
      width:"300px"
    });
    imgcontainer.setStyle("position","relative");
    popup.inject(document.body);
    imgcontainer.inject($("popup"));
    var murl = 'portfolio-popup.php?gallery='+gallery;
    var req = new Request.HTML({
      url:murl,
      update:"popup",
      onSuccess: function() {
        portfoliopopup(imagesstring);
      }
    });
    req.send();
  }
}

function portfoliopopup(imagesstring) {
	try {
	var popupcoords = $("popup").getCoordinates();
	var wsize = window.getSize();
	var newX = ((wsize.x - popupcoords.width) / 2).round() + "px";
	var wscroll = window.getScroll();
	var newY = (( wsize.y - popupcoords.height) / 2).round() + wscroll.y + "px";
	$("popup").setStyles({
		left:newX,
		top:newY
	});
	var myFx = new Fx.Tween("popup", {duration:"long"}).start("opacity",0,1).chain(
		function() {
			var myTips = new Tips('.tooltip', { className:'tooltipbox' });
			var images = imagesstring.split(",");
			loadimg(images[0]);
		}
	);
	} catch(e) { }
}

function loadimg(image) {
  fadeout("file",0);
  $("file").setStyle("visibility","hidden");
  $("popupfooter").setStyles({
    "opacity":0,
    "visibility":"visible"
  });
  var imgPath = "portfolio/" + image;
  var imgPreloader = new Element("img");
  imgPreloader.addEvent("load", function() {
    showimage(imgPath,(imgPreloader.width), (imgPreloader.height));
  });
  imgPreloader.src = imgPath;
}

function swapgalleryimg(image) {
  loadimg(image);
}

function showimage(imgPath,newWidth,newHeight) {
	var myEffect = new Fx.Morph("popup", { duration:"short" });
	var popupcoords = $("popup").getCoordinates();
	var wsize = window.getSize();
  var fsize = $("popupfooter").getSize();
	var newX = ((wsize.x - newWidth - 8) / 2).round();
	var wscroll = window.getScroll();
	var newY = (( wsize.y - newHeight) / 2).round() + wscroll.y;
  var newTopPos = (newHeight /2).round() + "px";
  $("file").setStyles({
    "opacity":0,
    "visibility":"visible"
  });
	$("file").src = imgPath;
	myEffect.start({
		height:[popupcoords.height -15, newHeight + fsize.y],
		left:[popupcoords.left, newX],
		top:[popupcoords.top, newY],
		width:[popupcoords.width -20, newWidth]
	}).chain(
		function() {
			fadein("file",1);
			fadein("popupfooter",1);
		}
	);
}

function closepopup() {
	var myFx = new Fx.Morph("popup", {duration:"200"});
	myFx.start({
		"opacity":0
	}).chain(
		function() {
			$$(".tooltipbox").each( function(item, index) {
				item.empty();
				var removedTooltip = item.dispose();
			});
			$("popup").empty();
			var removedPopup = $("popup").dispose();
			try { startScroller(); } catch(e) { }
		}
	);
}

function portfoliofilter(group) {
	if (currentgroup != "") {
		var groupbw = 'img.' + currentgroup + 'bw';
		var groupcolor = 'img.' + currentgroup + 'color';
		var imgsbw = $$(groupbw);
		var imgscolor = $$(groupcolor);
		var i = 0;
		while ( img = imgscolor[i] ) {
			img.setStyle("display","none");
			i++;
		}
		i = 0;
		while ( img = imgsbw[i] ) {
			img.setStyle("display","");
			i++;
		}
	}
	currentgroup = "";
	var newgroupbw = 'img.' + group + 'bw';
	var newgroupcolor = 'img.' + group + 'color';
	imgsbw = $$(newgroupbw);
	imgscolor = $$(newgroupcolor);
	i = 0;
	while ( img = imgsbw[i] ) {
		(img).setStyle("display","none");
		i++;
	}
	i = 0;
	while ( img = imgscolor[i] ) {
		(img).setStyle("display","");
		i++;
	}
	currentgroup = group;
}

function updateCalendar(reftime,months) {
  var myHTMLRequest = new Request.HTML({
    update:"calendar"
  }).get("calendar.php?reftime="+reftime+"&months="+months);
}

function removeshadow(img) {
	var bw = "img"+img+"bw";
	var color = "img"+img+"color";
	$(bw).setStyle('opacity',1);
	$(color).setStyle('opacity',1);
}

function showshadow(img) {
	var bw = "img"+img+"bw";
	var color = "img"+img+"color";
	$(bw).setStyle('opacity',.85);
	$(color).setStyle('opacity',.85);
}

function removeshadowlw(img) {
	var mimg = "home"+img;
	$(mimg).setStyle('opacity',1);
}

function showshadowlw(img) {
	var mimg = "home"+img;
	$(mimg).setStyle('opacity',.85);
}

function makeScroller() {
	myScroller = new Scroller($("portfoliocontent"), { area:290, velocity:.1, fps:18 } );
	startScroller();
}

function startScroller() {
	myScroller.start();
}

function stopScroller() {
	myScroller.stop.bind(myScroller);
}