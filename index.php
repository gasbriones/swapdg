<?php
session_name("SWAPDesign");
session_start();
$hour = date('G');
if (($hour > 6) && ($hour < 20)) {
  $time = "day";
} else {
  $time = "night";
}
$year = date('y');

if (empty($_SESSION['swapLang'])) {
	$_SESSION['swapLang'] = "en";
}


?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="StyleSheet" href="css/swap.css" TYPE="text/css">
<link rel="StyleSheet" href="css/jquery.bxslider.css" TYPE="text/css">
<script type="text/javascript" src="js/jquery-2.1.3.min.js"></script>
<script type="text/javascript" src="js/jquery.bxslider.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery.isotope/2.2.0/isotope.pkgd.min.js"></script>
<script type="text/javascript" src="js/jquery-lionbars.0.3.js"></script>
<script type="text/javascript">
   //no conflict jquery
    jQuery.noConflict();

</script>

<script type="text/javascript" src="js/mootools-1.2.6-core.js"></script>
<script type="text/javascript" src="js/mootools-1.2.5.1-more.js"></script>
<script type="text/javascript" src="js/functions.js"></script>
<script type="text/javascript">
var bgimg = new Element("img"),
  current = "about";
  currentgroup = "";

bgimg.addEvent("load", function() {
	window.addEvent('domready', function() {
		onLoadSetup();
		if ((Browser.Engine.trident == true) && (Browser.Engine.version == 4)) {
			window.addEvent('resize', function() {
				ie6Events();
			});
		} else {
			window.addEvent('resize', function() {
				makeScrollbar( window, $('mainscrollbar'), $('mainhandle') );
			});
		}
	});
});
bgimg.src = "media/bg.jpg";
</script>
<title>Swap</title>

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-26308487-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</head>

<body id="body">
<div id="wrapper">
  <div id="content" class="clearfix">
    <div id="hd">
      <img src="media/swap.png" id="swap" alt="Swap Design Studio" style="display:none" />
      <img src="media/pix.png" id="whatis" alt="Design and Communication" />
      <nav id="mainnav" class="mainnav">
        <ul>
          <li class="selected"><a href="about"><img src="media/menu_about.png" /></a></li>
          <li><a href="portfolio"><img src="media/menu_portfolio.png" /></a></li>
          <li><a href="contact"><img src="media/menu_contact.png" /></a></li>
        </ul>
      </nav>
      <div id="metadata" class="clearfix">
        <div id="year">.<?php echo $year; ?>/</div>
        <a href="mailto:info@swapdg.com"><img src="media/mail.png" id="mail" alt="info@swapdg.com" /></a><br/>
        <img src="media/ba-argentina.png" id="location" alt="Buenos Aires - Argentina" /><br/>
        <div id="langSelector" <?php if ( $_SESSION['swapLang'] == "en" ) { ?>class="en"<?php } else { ?>class="es"<?php } ?>></div><br/>
        <ul class="social-icons">
            <li><a href="https://www.facebook.com/pages/SWAP-design/1574322016165546"  class="fb" target="_blank"></a></li>
            <li><a href="https://twitter.com/swap_design" class="tw" target="_blank"></a></li>
        </ul>
      </div>
    </div>
    <div id="bd">
      <img src="media/pix.png" id="news" class="title" alt="News" style="visibility:hidden;" />
      <div id="newscontent" style="visibility:hidden;"></div>
      <div id="aboutswap">
        <div id="aboutswapcontent" style="visibility:hidden">
          <img src="media/welcome.png" id="welcome" alt="Welcome" />
          <img src="media/ourservices.png" id="ourservices" alt="Our services" /><?php
          if ( $_SESSION['swapLang'] == "en" ) { ?>
            <p class="about">Swap is a graphic design studio that creates brands, advertising and marketing campaigns. Fully committed to meet the needs of our clients.</p>
            <p class="about">We are always expanding our creative thinking in new directions.</p>
            <p class="about">We offer a design service combining our knowledge and experience.</p>
            <p class="about">If you like what you see and want to see more, please email us</p><?php
           } else { ?>
             <p class="about">Swap es un estudio de dise&ntilde;o y comunicaci&oacute;n orientado a la creaci&oacute;n de marcas <br/> y campa&ntilde;as publicitarias. La imagen de una marca es muy importante para la <br/> identidad de una empresa, por esto nos comprometemos buscando una imagen <br/> y comunicaci&oacute;n adecuada para cada empresa. Ofrecemos un servicio de dise&ntilde;o<br/> combinando experiencia y conocimiento en: imagen corporativa, campa&ntilde;as <br/> publicitarias, packaging, websites, fotograf&iacute;a, retoques digitales y producci&oacute;n gr&aacute;fica.</p><?php
            } ?>
          <p class="mailto"><a href="mailto:info@swapdg.com.ar" class="mailto">info@swapdg.com.ar</a></p>
        </div>
        <div id="aboutswapbg" style="visibility:hidden"></div>
      </div>
      <img src="media/pix.png" id="comments" class="title" alt="Comments" style="visibility:hidden;" />
      <div id="commentscontent" style="visibility:hidden;" ></div>

      <div id="right">
        <div id="calendar" style="visibility:hidden;" class="clearfix"><?php
          include("calendar.php"); ?>
        </div>
        <div id="latestworks" style="visibility:hidden;" class="clearfix"><?php
          include("latestworks.php"); ?>
        </div>
        <div id="leavecomments" style="visibility:hidden;"><?php
          if (empty($_SESSION['commentsent'])) {
            include("commentsform.php");
          } else {
            include("messagesent.php");
          } ?>
        </div>
      </div>
    </div>

    <div id="contact" class="smallpop" style="display:none">
      <!-- img src="media/closepop.png" class="close" alt="Close" onclick="swapsection('about')" / -->
      <img src="media/contact.png" class="header" alt="Contact" />
      <div id="contactcontent"></div>
    </div>

    <div id="portfolio" style="display:none" class="clearfix">
      <div id="header"><img src="media/pix.png" class="header" alt="Portfolio" /></div>
      <ul id="menu">
        <li data-filter="Brand">Brand</li>
        <li data-filter="Print">Print</li>
        <li data-filter="Website">Websites</li>
        <li data-filter="Packaging">Packaging</li>
      </ul>
      <div id="portfoliocontent" class="clearfix"></div>
    </div>
  </div>
</div>
<div style="display:none">
    <img id="file" src="portfolio/univeler-01.jpg">
    <img id="file" src="portfolio/univeler-02.jpg">


</div>
</body>
</html>