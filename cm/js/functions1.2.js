function swapClientTabs2(client,selected) {
	if (currentTab != selected) {
		if ( currentTab != "" ) {
			$(currentTab).className = "";
		}
		$(selected).className = "current";
		currentTab = selected;
		file = client + "-" + selected;
		loadContent2("contentHere",file);
	}
}

function loadContent2(container, filename) {
	var url = "content/" + filename + ".html"
	var mContainer = $(container);
	new Request.HTML({ update: mContainer }).get(url);
}

function fadein(el,value) {
	var myFx = new Fx.Tween(el, {duration:"short"}).start("opacity",0,value);
}

function fadeout(el,value) {
	var myFx = new Fx.Tween(el, {duration:"short"}).start("opacity",value,0);
}

function getFullPath(path, filename) {
	return path + "/" + filename;
}

function createPopup() {
		var wsize = window.getSize();
		var wscroll = window.getScroll();
		var initX = wsize.x / 2;
		initX = initX.round() - 160;
		var initY = wsize.y / 2;
		initY = initY.round() - 57 + wscroll.y;
		var preload = new Element("img", {src:"image/preload.gif"});
		var popup = new Element("div", {
			id:"popup"
		});
		popup.setStyles({
			background:"#FFF url(image/preload.gif) no-repeat center center",
      border:"1px solid #AAA",
			height:"114px",
			left:initX + "px",
			opacity:0,
			padding:"5px 30px",
			position:"absolute",
			top:initY + "px",
			width:"320px",
			zIndex:"9999"
		});
		var closeButton = new Element("img", {
			alt:"Close",
			id:"galleryCloseButton",
			src:"image/closePopup.png",
			title:"Close"
		});
		closeButton.setStyles({
			cursor:"pointer",
      height:"15px",
			right:"5px",
			position:"absolute",
			top:"5px",
      width:"15px",
      zIndex:999
		});
		popup.inject(document.body);
		var myFx = new Fx.Tween("popup", {duration:"short"});
		myFx.start("opacity",0,1);
		closeButton.inject($("popup"));
		$("galleryCloseButton").addEvent("click", function() { closePopupImg(); });
}

function popupGallery(client, folder, galleryImgs, galleryTitles, galleryTexts, actual, showbuttons) {
	var filename = galleryImgs[actual];
  var path = "image/" + client + "/" + folder;
	showing = actual;
	if ( !($chk($("popup"))) ) {
    createPopup();
		var galleryImg = new Element("img", {
			id:"galleryImg"
		});
		galleryImg.inject($("popup"));
		var fxImgHide = new Fx.Morph("galleryImg").set({"opacity":0});
    var previousButton = new Element("img", {
      alt:"Previous",
      id:"galleryPrevButton",
      src:"image/imgGalleryPrev.png",
      title:"Previous"
    });
    previousButton.setStyles({
      cursor:"pointer",
      height:"30px",
      left:"0",
      position:"absolute",
      top:"50px",
      width:"24px"
    })
    var nextButton = new Element("img", {
      alt:"Next",
      id:"galleryNextButton",
      src:"image/imgGalleryNext.png",
      title:"Next"
    });
    nextButton.setStyles({
      cursor:"pointer",
      height:"30px",
      right:"0",
      position:"absolute",
      top:"50px",
      width:"24px"
    });
    var imgData = new Element("div", {
      id:"imgData"
    });
    imgData.setStyles({
      background:"#FFF",
      bottom:"5px",
      color:"#000",
      left:"30px",
      opacity:0,
      padding:"12px 5px 5px",
      position:"absolute"
    });
    var imgDataHide = new Element("a", {
     id:"imgDataHide",
     href:"javascript:void(0)"
    });
    imgDataHide.setStyles({
     color:"#000",
     fontSize:"10px",
     position:"absolute",
     right:"3px",
     top:"1px"
    });
    imgDataHide.innerHTML = "Hide info";
    var imgDataShow = new Element("a", {
     id:"imgDataShow",
     href:"javascript:void(0)"
    });
    imgDataShow.setStyles({
     background:"#FFF",
     color:"#000",
     fontSize:"10px",
     padding:"3px",
     position:"absolute",
     right:"29px",
     bottom:"5px"
    });
    imgDataShow.innerHTML = "Show info";
    imgData.inject($("popup"));
    imgDataHide.inject($("imgData"));
    imgDataShow.inject($("popup"));
    $("imgDataHide").addEvent("click", function() {
     fadeout("imgData",".7");
     showingImgData=false;
     fadein("imgDataShow",".7");
    });
    $("imgDataShow").addEvent("click", function() {
     fadein("imgData",".7");
     showingImgData=true;
     fadeout("imgDataShow",".7");
    }); 
    var imgTitle = new Element("div", {
      id:"imgTitle"
    });
    imgTitle.setStyles({
      fontSize:"11px"
    });
    imgTitle.inject($("imgData"));
    var imgText = new Element("p", {
      id:"imgText"
    });
    imgText.setStyles({
      fontSize:"10px",
      margin:0,
      padding:0
    });
    imgText.inject($("imgData"));
    if (showbuttons != false) {
      previousButton.inject($("popup"));
      nextButton.inject($("popup"));
    }
		window.addEvent("resize", function() { changeImg(path,"",galleryImgs,galleryTitles,galleryTexts); });
		loadImage(path,filename,galleryImgs,galleryTitles,galleryTexts);
	}
}

function loadImage(path,filename,galleryImgs,titles,texts) {
	$("popup").setStyles({
		background:"#FFF url(image/preload.gif) no-repeat center center"
	});
	var imgPath = getFullPath(path,filename);
  if ( titles != null ) {
    var title = titles[showing];
  }
  if ( texts != null ) {
    var text = texts[showing];
  }
	var imgPreloader = new Image();
	imgPreloader.onload = function() {
		setImage(imgPath,(imgPreloader.width), (imgPreloader.height),title,text);
    if ( $chk($("galleryPrevButton")) ) {
  		$("galleryPrevButton").addEvent("click", function() { changeImg(path,"prev",galleryImgs,titles,texts); });
    }
    if ( $chk($("galleryNextButton")) ) {
  		$("galleryNextButton").addEvent("click", function() { changeImg(path,"next",galleryImgs,titles,texts); });
    }
	};
	imgPreloader.src = imgPath;
}

function setImage(imgPath,newWidth, newHeight,title,text) {
	$("popup").setStyles({
		background:"#FFF"
	});
	var myEffect = new Fx.Morph("popup", { duration:"short" });
	var popupcoords = $("popup").getCoordinates();
	var wsize = window.getSize();
	var newX = ((wsize.x - newWidth) / 2).round();
	var wscroll = window.getScroll();
	var newY = (( wsize.y - newHeight) / 2).round() + wscroll.y;
  var newTopPos = (newHeight /2).round() + "px";
  if ( $chk($("galleryPrevButton")) ) {
    var movePrev = new Fx.Tween("galleryPrevButton", { duration:"short" });
    movePrev.start("top",newTopPos);
  }
  if ( $chk($("galleryNextButton")) ) {
    var movePrev = new Fx.Tween("galleryNextButton", { duration:"short" });
    movePrev.start("top",newTopPos);
  }
	myEffect.start({
		height:[popupcoords.height -12, newHeight],
		left:[popupcoords.left, newX],
		top:[popupcoords.top, newY],
		width:[popupcoords.width -62, newWidth]
	}).chain(
		function() {
			$("galleryImg").src = imgPath,
      $("imgData").setStyle("width",newWidth-10),
			fadein("galleryImg",1),
      showImgData(title,text)
		}
	);
}

function showImgData(title,text) {
 if ($chk(title)) { $("imgTitle").innerHTML = "<b>" + title + "</b>"; }
 if ($chk(text)) { $("imgText").innerHTML = text; }
 if ( showingImgData == false ) {
   $("imgData").setStyle("opacity",0);
   $("imgDataShow").setStyle("opacity",.7);
 } else if ($chk(title) || $chk(text)) {
   $("imgData").setStyles({opacity:.7});
   $("imgDataShow").setStyle("opacity",0);
 }
} 

function changeImg(path,follow,galleryImgs,titles,texts) {
	$("galleryPrevButton").removeEvents();
	$("galleryNextButton").removeEvents();
	if ( follow == "prev" ) {
		var nextImg = getPrevImage(galleryImgs);
	} else if ( follow == "next" ){
		var nextImg = getNextImage(galleryImgs);
	} else {
		var nextImg = galleryImgs[showing];
	}
	$("imgData").setStyles({"opacity":0});
  $("imgDataShow").setStyles({"opacity":0});
	var myFx = new Fx.Tween("galleryImg", {duration:"short"});
	myFx.start("opacity",1,0).chain(
		function() { loadImage(path,nextImg,galleryImgs,titles,texts) }
	);
}

function getNextImage(galleryImgs) {
	if ( showing < galleryImgs.length-1 ) {
		showing++;
	} else {
		showing = 0;
	}
	return galleryImgs[showing];
}

function getPrevImage(galleryImgs) {
	if ( showing > 0 ) {
		showing--;
	} else {
		showing = galleryImgs.length-1;
	}
	return galleryImgs[showing];
}

function closePopupImg() {
	$("popup").empty();
	var myFx = new Fx.Morph("popup", {duration:"200"});
	var popupCoord = $("popup").getCoordinates();
	myFx.start({
		"height":popupCoord.height - 20,
		"left":popupCoord.left + 10,
		"opacity":0,
		"padding":0,
		"top":popupCoord.top + 5,
		"width":[popupCoord.width -10,popupCoord.width - 30]
	}).chain(
		function() {
			window.removeEvents("resize");
			var removedPopup = $("popup").dispose();
		}
	);
}

function popupFlashMovie(client,folder,file,mwidth,mheight) {
	if ( !($chk($("popup"))) ) {
    createPopup();
    var path = "image/" + client + "/" + folder + "/" + file + ".swf";
  	$("popup").setStyles({
  		background:"#FFF"
  	});
  	var myEffect = new Fx.Morph("popup", { duration:"short" });
  	var popupcoords = $("popup").getCoordinates();
  	var wsize = window.getSize();
  	var newX = ((wsize.x - mwidth) / 2).round();
  	var wscroll = window.getScroll();
  	var newY = (( wsize.y - mheight) / 2).round() + wscroll.y;
  	myEffect.start({
  		height:[popupcoords.height -20, mheight],
  		left:[popupcoords.left, newX],
  		top:[popupcoords.top, newY],
  		width:[popupcoords.width -20, mwidth]
  	}).chain(
  		function() {
        var movieContainer = new Element("div", {
          id:"movieContainer"
        });
        movieContainer.inject($("popup"));
        var mySwiff = new Swiff(path, {
          container:$("movieContainer"),
          height:mheight,
          id:"swiffmovie",
          width:mwidth,
          wmode:"opaque"
        });
        retry = setTimeout("givefocus('swiffmovie')", 500);
  		}
  	);
  }
}

function givefocus(el) {
  if ( $chk($(el)) ) {
    $(el).focus();
  } else {
    clearTimeout(retry);
  }
}