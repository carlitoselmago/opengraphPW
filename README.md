# opengraphPW

An Open Graph class for autocreation of meta tags and open graph tags.

## Installation

upload it to your templates folder and use it like this:

## Usage

```php
<head>
	<?php
	include_once("./opengraphPW/opengraphPW.php");
	$OG=new openGraph($page,$pages,$config->urls->templates.'img/cover.jpg',"Title of your website");
	?>
 </head>
```

## Options and defaults

$page : current PW page
$pages : PW pages wire object
$defaultimg : A general image (1200x628px recomended) for pages like a home page where there's no content image
$hometitle : A generic title if the home element is called something like "home"

