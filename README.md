# opengraphPW

An Open Graph class for autocreation of meta and open graph tags in Processwire.

## Installation

upload it to your templates folder and use it like this:

## Usage

```php
<head>
	<?php
	include_once("./opengraphPW/opengraphPW.php");
	$OG=new openGraph(
		$page, // current PW page, required
		$pages, // PW pages wire object, required
		$config->urls->templates.'img/cover.jpg', // A general image (1200x628px recomended) for pages like a home page where there's no content image, optional
		"Title of your website"); // A generic title if the home element is called something like "home", optional
	?>
 </head>
```

The class will automatically print the tags 
