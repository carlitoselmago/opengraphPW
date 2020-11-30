# opengraphPW

An Open Graph class for autocreation of meta tags and open graph tags.

upload it to your templates folder and use it like this:

"""
<head>
	<?php
	include_once("./opengraphPW/opengraphPW.php");
	$OG=new openGraph($page,$pages,$config->urls->templates.'img/cover.jpg',"The College Club");
	?>
 </head>
 """
